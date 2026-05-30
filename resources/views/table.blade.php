@extends('layouts.template')

@section('styles')
    <link rel="stylesheet" href="https://cdn.datatables.net/2.3.8/css/dataTables.dataTables.css">
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
            <div class="card-header">
                <h3>Tabel Data Point</h3>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped" id="tabeldatapoints">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nama</th>
                            <th>Deskripsi</th>
                            <th>Foto</th>
                            <th>Tanggal Pembuatan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $no = 1;
                        @endphp
                        @foreach ($points as $point)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $point->name }}</td>
                                <td>{{ $point->description }}</td>
                                <td>
                                    <img src="{{ asset('storage/images' . '/'. $point->image) }}" alt="" width="200">
                                </td>
                                <td>{{ $point->created_at }}</td>
                            </tr>


                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div class="card mt-4">
            <div class="card-header">
                <h3>Tabel Data Polyline</h3>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped" id="tabeldatapolyline">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nama</th>
                            <th>Deskripsi</th>
                            <th>Foto</th>
                            <th>Tanggal Pembuatan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $no = 1;
                        @endphp
                        @foreach ($polylines as $polyline)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $polyline->name }}</td>
                                <td>{{ $polyline->description }}</td>
                                <td>
                                    <img src="{{ asset('storage/images' . '/'. $polyline->image) }}" alt="" width="200">
                                </td>
                                <td>{{ $polyline->created_at }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div class="card mt-4">
            <div class="card-header">
                <h3>Tabel Data Polygons</h3>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped" id="tabeldatapolygons">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nama</th>
                            <th>Deskripsi</th>
                            <th>Foto</th>
                            <th>Tanggal Pembuatan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $no = 1;
                        @endphp
                        @foreach ($polygons as $polygon)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $polygon->name }}</td>
                                <td>{{ $polygon->description }}</td>
                                <td>
                                    <img src="{{ asset('storage/images' . '/'. $polygon->image) }}" alt="" width="200">
                                </td>
                                <td>{{ $polygon->created_at }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
@endsection

@section('scripts')
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdn.datatables.net/2.3.8/js/dataTables.js"></script>
    <script>
        new DataTable('#tabeldatapoints');
        new DataTable('#tabeldatapolyline');
        new DataTable('#tabeldatapolygons');
    </script>
@endsection
