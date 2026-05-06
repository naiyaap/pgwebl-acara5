<?php

namespace App\Http\Controllers;

use App\Models\pointsModel;
use Illuminate\Http\Request;

class PointsController extends Controller
{
    protected $points;

    public function __construct()
    {
        $this->points = new pointsModel();
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
                'geometry_point' => 'required',
                'description' => 'required|string',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            ],
            [
                'name.required' => 'Nama point wajib diisi.',
                'geometry_point.required' => 'Geometri point wajib diisi.',
                'name.max' => 'Nama point tidak boleh lebih dari 255 karakter.',
                'name,string' => 'Nama point harus berupa teks.',
                'description.required' => 'Deskripsi point wajib diisi.',
                'description.string' => 'Deskripsi point harus berupa teks.',
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
            $name_image = time() . "_point." . strtolower($image->getClientOriginalExtension());
            $image->move('storage/images', $name_image);
        } else {
            $name_image = null;
        }

        $data = [
            'name' => $request->name,
            'geom' => $request->geometry_point,
            'description' => $request->description,
            'image' => $name_image
        ];

        // Simpan data ke database
        if (!$this->points->create($data)) {
            return redirect()->back()->with('error', 'Gagal menyimpan point!');
        }

        //Kembali ke halaman peta
        return redirect()->route('peta')->with('success', 'Point berhasil disimpan!');
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        //Mencari nama file gambar yang akan dihapus
        $image = $this->points->find($id)->image;

        // Hapus data dari database
        if (!$this->points->destroy($id)) {
            return redirect()->route('peta')->with('error', 'Gagal menghapus point!');
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
        return redirect()->route('peta')->with('success', 'Point berhasil dihapus!');
    }
}
