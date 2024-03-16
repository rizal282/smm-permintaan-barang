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
            <h2>Permintaan Barang</h2>

            <div class="panel panel-default">
                <div class="panel-heading">Tambah Permintaan Barang</div>
                <div class="panel-body">
                    <form method="post">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="employee-id">NIK Peminta</label>
                                    <select name="employee-id" id="employee-id" class="form-control">
                                        <option value=""></option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label for="employee-name">Nama</label>
                                    <input type="text" name="employee-name" id="employee-name" class="form-control" readonly>
                                </div>
                                <div class="col-md-4">
                                    <label for="employee-department">Departemen</label>
                                    <input type="text" name="employee-department" id="employee-department" class="form-control" readonly>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="">Tanggal Permintaan</label>
                                    <input type="date" name="tanggal-minta" id="tanggal-minta" class="form-control">
                                </div>
                            </div>
                        </div>

                        <h4>Daftar Barang</h4>
                        <div class="form-group">
                            <table class="table table-bordered" id="daftar-barang">
                                <thead>
                                        <th>Barang</th>
                                        <th>Lokasi</th>
                                        <th>Tersedia</th>
                                        <th>Kuantiti</th>
                                        <th>Satuan</th>
                                        <th>Keterangan</th>
                                        <th>Status</th>
                                        <th>X</th>
                                </thead>
                                <tbody id="form-input-barang">
                                </tbody>
                            </table>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-12">
                                    <a href="#" class="btn btn-success float-right" id="btn-tambah-barang">Tambah</a>
                                </div>
                            </div>
                        </div>
                    </form>

                    <div class="row">
                        <div class="col-md-6">
                            <button class="btn btn-primary float-right" id="btn-proses">Proses</button>&nbsp;
                            <a href="/permintaanbarang/inquiry" class="btn btn-success float-right" id="btn-inquiry">Inquiry Permintaan Barang</a>
                        </div>
                        <div class="col-md-6">
                            <button class="btn btn-link float-left" id="remove-form">Batal</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="{{ asset('js/permintaan-barang.js') }}"></script>
    </body>
</html>
