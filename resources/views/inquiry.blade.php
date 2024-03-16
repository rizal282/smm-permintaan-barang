<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Permintaan Barang</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body>
        <div class="container-fluid">
            <h2>Iquiry Permintaan Barang</h2>

            <div class="panel panel-default">
                <div class="panel-body">
                    <table class="table table-bordered">
                        <thead>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Department</th>
                            <th>Barang</th>
                            <th>Lokasi</th>
                            <th>Tersedia</th>
                            <th>Kuantiti</th>
                            <th>Keterangan</th>
                            <th>Status</th>
                        </thead>
                        <tbody id="inquiry-barang"></tbody>
                    </table>
                </div>
            </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="{{ asset('js/inquiry-barang.js') }}"></script>
    </body>
</html>
