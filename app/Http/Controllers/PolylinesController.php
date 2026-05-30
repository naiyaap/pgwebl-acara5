<?php

namespace App\Http\Controllers;

use App\Models\polylinesModel;
use Illuminate\Http\Request;

class PolylinesController extends Controller
{
    protected $polylines;

    public function __construct()
    {

        $this->polylines = new polylinesModel();
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //Validasi input
        $request->validate(
            [
                'name' => 'required|string|max:255',
                'geometry_polylines' => 'required',
                'description' => 'required|string',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            ],
            [
                'name.required' => 'Nama polyline wajib diisi.',
                'geometry_polylines.required' => 'Geometri polyline wajib diisi.',
                'name.max' => 'Nama polyline tidak boleh lebih dari 255 karakter.',
                'name,string' => 'Nama polyline harus berupa teks.',
                'description.required' => 'Deskripsi polyline wajib diisi.',
                'description.string' => 'Deskripsi polyline harus berupa teks.',
                'image.image' => 'File gambar tidak valid.',
                'image.mimes' => 'Format gambar tidak didukung. Harus berupa JPEG, PNG, JPG, atau GIF.',
                'image.max' => 'Ukuran gambar terlalu besar. Maksimal 2MB.',
            ]
        );

        // Cek dan buat direktori penyimpanan gambar jika belum ada
        if (!is_dir('storage/images')) {
            mkdir('./storage/images', 0777);
        }

        // Cek apakah ada file gambar yang diunggah
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name_image = time() . "_polyline." . strtolower($image->getClientOriginalExtension());
            $image->move('storage/images', $name_image);
        } else {
            $name_image = null;
        }

        $data = [
            'name' => $request->name,
            'geom' => $request->geometry_polylines,
            'description' => $request->description,
            'image' => $name_image,
        ];

        // Simpan data ke database
        if (!$this->polylines->create($data)) {
            return redirect()->back()->with('error', 'Gagal menyimpan polyline!');
        }

        //Kembali ke halaman peta
        return redirect()->route('peta')->with('success', 'Polyline berhasil disimpan!');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = [
            'title' => 'Edit Polyline',
            'id' => $id,
            ];

        return view('map-edit-polylines', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
         //Validasi input
        $request->validate(
            [
                'name' => 'required|string|max:255',
                'geometry' => 'required',
                'description' => 'required|string',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            ],
            [
                'name.required' => 'Nama polyline wajib diisi.',
                'geometry.required' => 'Geometri polyline wajib diisi.',
                'name.max' => 'Nama polyline tidak boleh lebih dari 255 karakter.',
                'name,string' => 'Nama polyline harus berupa teks.',
                'description.required' => 'Deskripsi polyline wajib diisi.',
                'description.string' => 'Deskripsi polyline harus berupa teks.',
                'image.image' => 'File gambar tidak valid.',
                'image.mimes' => 'Format gambar tidak didukung. Harus berupa JPEG, PNG, JPG, atau GIF.',
                'image.max' => 'Ukuran gambar terlalu besar. Maksimal 2MB.',
            ]
        );

        // Cek dan buat direktori penyimpanan gambar jika belum ada
        if (!is_dir('storage/images')) {
            mkdir('./storage/images', 0777);
        }

        $image_old = $this->polylines->find($id)->image;

        // Cek apakah ada file gambar yang diunggah
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name_image = time() . "_polyline." . strtolower($image->getClientOriginalExtension());
            $image->move('storage/images', $name_image);

            //Hapus file gambar jika ada
        if ($image_old != null) {
            // Cek apakah file gambar ada sebelum menghapus
            if (file_exists('storage/images/' . $image_old)) {
                // Hapus file gambar dari direktori
                unlink('storage/images/' . $image_old);
            }
        }

        } else {
            $name_image = $image_old;
        }

        $data = [
            'name' => $request->name,
            'geom' => $request->geometry,
            'description' => $request->description,
            'image' => $name_image
        ];

        // Simpan update data ke database
        if (!$this->polylines->find($id)->update($data)) {
            return redirect()->back()->with('error', 'Gagal memperbarui data polyline!');
        }

        //Kembali ke halaman peta
        return redirect()->route('peta')->with('success', 'Polyline berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //Mencari nama file gambar yang akan dihapus
        $image = $this->polylines->find($id)->image;

        // Hapus data dari database
        if (!$this->polylines->destroy($id)) {
            return redirect()->route('peta')->with('error', 'Gagal menghapus polyline!');
        }

        //Hapus file gambar jika ada
        if ($image != null) {
            // Cek apakah file gambar ada sebelum menghapus
            if (file_exists('storage/images/' . $image)) {
                // Hapus file gambar dari direktori
                unlink('storage/images/' . $image);
            }
        }

        //Kembali ke halaman peta
        return redirect()->route('peta')->with('success', 'Polyline berhasil dihapus!');
    }
}
