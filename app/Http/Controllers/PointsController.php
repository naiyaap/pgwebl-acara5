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
        $request->validate([
            'name' => 'required|string|max:255',
            'geometry_point' => 'required',
            'description' => 'required|string',
        ],
        [
            'name.required' => 'Nama point wajib diisi.',
            'geometry_point.required' => 'Geometri point wajib diisi.',
            'name.max' => 'Nama point tidak boleh lebih dari 255 karakter.',
            'name,string' => 'Nama point harus berupa teks.',
            'description.required' => 'Deskripsi point wajib diisi.',
            'description.string' => 'Deskripsi point harus berupa teks.',
        ]);

        $data = [
            'name' => $request->name,
            'geom' => $request->geometry_point,
            'description' => $request->description,
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
        //
    }
}
