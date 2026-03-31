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
        $request->validate([
            'name' => 'required|string|max:255',
            'geometry_polylines' => 'required',
            'description' => 'required|string',
        ],
        [
            'name.required' => 'Nama polyline wajib diisi.',
            'geometry_polylines.required' => 'Geometri polyline wajib diisi.',
            'name.max' => 'Nama polyline tidak boleh lebih dari 255 karakter.',
            'name,string' => 'Nama polyline harus berupa teks.',
            'description.required' => 'Deskripsi polyline wajib diisi.',
            'description.string' => 'Deskripsi polyline harus berupa teks.',
        ]);

        $data = [
            'name' => $request->name,
            'geom' => $request->geometry_polylines,
            'description' => $request->description,
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
