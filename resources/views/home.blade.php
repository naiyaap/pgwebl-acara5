@extends('layouts.template')

@section('styles')
    <style>
        body {
            margin: 0;
        }

        .navbar-brand {
            font-weight: bold;
        }
    </style>
@endsection
</head>

<body>

    @section('content')
        <div class="container mt-4">
            <div class="card">
                <div class="card-header bg-info text-white">
                    <h3>Aplikasi Geospasial CRUD</h3>
                </div>
                <div class="card-body">
                    Aplikasi ini dibuat untuk memenuhi tugas mata kuliah Pemrograman Geospasial Web Lanjut.
                    Aplikasi ini menggunakan Laravel sebagai framework backend dan Leaflet untuk menampilkan peta
                    interaktif.
                    Pengguna dapat membuat, mengedit, dan menghapus poligon pada peta, serta menyimpan data tersebut ke
                    dalam database.
                    Aplikasi ini juga dilengkapi dengan fitur autentikasi untuk memastikan bahwa hanya pengguna yang
                    terdaftar yang dapat mengakses fitur-fitur tertentu.
                </div>
            </div>

            <div class="container mt-3">
                <div class="row mt-4">
                    <div class="col-3">
                        <div class="card border-primary">
                            <div class="card-header">
                                <h3>Jumlah Titik</h3>
                            </div>
                            <div class="card-body text-center">
                                <h1>{{ $points }}</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="card">
                            <div class="card-header border-success">
                                <h3>Jumlah Garis</h3>
                            </div>
                            <div class="card-body text-center">
                                <h1>{{ $polylines }}</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="card">
                            <div class="card-header border-info">
                                <h3>Jumlah Area</h3>
                            </div>
                            <div class="card-body text-center">
                                <h1>{{ $polygons }}</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="card">
                            <div class="card-header border-warning">
                                <h3>Jumlah User</h3>
                            </div>
                            <div class="card-body text-center">
                                <h1>{{ $users }}</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
