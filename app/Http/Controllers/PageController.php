<?php

namespace App\Http\Controllers;
use App\Models\pointsModel;
use App\Models\polylinesModel;
use App\Models\polygonsModel;
use App\Models\User;

use Illuminate\Http\Request;

class PageController extends Controller
{
    protected $points;
    protected $polylines;
    protected $polygons;
    protected $users;

    public function __construct()
    {
        $this->points = new pointsModel();
        $this->polylines = new polylinesModel();
        $this->polygons = new polygonsModel();
        $this->users = new User();
    }

    public function landingpage()
    {
        $data = [
            'title' => 'PGWL',
            'points' => $this->points->count(),
            'polylines' => $this->polylines->count(),
            'polygons' => $this->polygons->count(),
            'users' => $this->users->count(),
            ];
        return view('home', $data);
    }

    public function peta()
    {
        $data = [
            'title' => 'Peta',
            ];
        return view('map', $data);
    }

    public function tabel()
    {
        $data = [
            'title' => 'Tabel',
            'points' => $this->points->all(),
            'polylines' => $this->polylines->all(),
            'polygons' => $this->polygons->all(),
            ];

        return view('table', $data);
    }



}
