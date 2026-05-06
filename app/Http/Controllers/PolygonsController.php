<?php

namespace App\Http\Controllers;

use App\Models\polygonsModel;
use Illuminate\Http\Request;

class PolygonsController extends Controller
{
    protected $polygons;

    public function __construct()
    {
        $this->polygons = new polygonsModel();
    }
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
                'geometry_polygons' => 'required',
                'description' => 'required|string',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            ],
            [
                'name.required' => 'Nama polygon wajib diisi.',
                'geometry_polygons.required' => 'Geometri polygon wajib diisi.',
                'name.max' => 'Nama polygon tidak boleh lebih dari 255 karakter.',
                'name,string' => 'Nama polygon harus berupa teks.',
                'description.required' => 'Deskripsi polygon wajib diisi.',
                'description.string' => 'Deskripsi polygon harus berupa teks.',
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
            $name_image = time() . "_polygon." . strtolower($image->getClientOriginalExtension());
            $image->move('storage/images', $name_image);
        } else {
            $name_image = null;
        }

        $data = [
            'name' => $request->name,
            'geom' => $request->geometry_polygons,
            'description' => $request->description,
            'image' => $name_image
        ];

        // Simpan data ke database
        if (!$this->polygons->create($data)) {
            return redirect()->back()->with('error', 'Gagal menyimpan polygon!');
        }

        //Kembali ke halaman peta
        return redirect()->route('peta')->with('success', 'Polygon berhasil disimpan!');
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
        $image = $this->polygons->find($id)->image;

        // Hapus data dari database
        if (!$this->polygons->destroy($id)) {
            return redirect()->route('peta')->with('error', 'Gagal menghapus polygon!');
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
        return redirect()->route('peta')->with('success', 'Polygon berhasil dihapus!');
    }
}
