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
        $request->validate([
            'name' => 'required|string|max:255',
            'geometry_polygons' => 'required',
            'description' => 'required|string',
        ],
        [
            'name.required' => 'Nama polygon wajib diisi.',
            'geometry_polygons.required' => 'Geometri polygon wajib diisi.',
            'name.max' => 'Nama polygon tidak boleh lebih dari 255 karakter.',
            'name,string' => 'Nama polygon harus berupa teks.',
            'description.required' => 'Deskripsi polygon wajib diisi.',
            'description.string' => 'Deskripsi polygon harus berupa teks.',
        ]);

        $data = [
            'name' => $request->name,
            'geom' => $request->geometry_polygons,
            'description' => $request->description,
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
        //
    }
}
