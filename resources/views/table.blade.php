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
            <div class="card-header">
                <h3>Tabel Data</h3>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nama</th>
                            <th>Kantor</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>5</td>
                            <td>Leon S. Kennedy</td>
                            <td>Division of Security Operations Office, Washington D.C.</td>
                        </tr>
                        <tr>
                            <td>6</td>
                            <td>Jill Valentine</td>
                            <td>Bioterrorism Security Assessment Alliance (BSAA) HQ, Europe</td>
                        </tr>
                        <tr>
                            <td>7</td>
                            <td>Chris Redfield</td>
                            <td>BSAA North America Branch, New York</td>
                        </tr>
                        <tr>
                            <td>8</td>
                            <td>Claire Redfield</td>
                            <td>TerraSave Headquarters, Washington D.C.</td>
                        </tr>
                        <tr>
                            <td>9</td>
                            <td>Barry Burton</td>
                            <td>Umbrella Security Service, Raccoon City</td>
                        <tr>
                            <td>10</td>
                            <td>Rebecca Chambers</td>
                            <td>University Research Laboratory, Chicago</td>
                        </tr>
                        <tr>
                            <td>11</td>
                            <td>Carlos Oliveira</td>
                            <td>Umbrella Biohazard Countermeasure Service (UBCS), Raccoon City</td>
                        </tr>
                        <tr>
                            <td>12</td>
                            <td>Albert Wesker</td>
                            <td>Umbrella Corporation Research Facility, Raccoon City</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
@endsection
