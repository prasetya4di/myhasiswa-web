@extends('template.layout')

@section('title', 'Matkul')

@section('content')
    <div class="header">
        <h1 class="page-header">
            Mata Kuliah
        </h1>

    </div>
    <div id="page-inner">

        <div class="row">
            <div class="col-md-12">
                <!-- Advanced Tables -->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Data Mata Kuliah
                        <button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#addMatkul">
                            <i class="fa fa-plus"></i> Tambah Matkul
                        </button>
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover" id="dataTables-matkul">
                                <thead>
                                <tr>
                                    <th>Kode Matkul</th>
                                    <th>Nama Matkul</th>
                                    <th>Jadwal</th>
                                    <th>Tanggal Mulai</th>
                                    <th>Tanggal Selesai</th>
                                    <th>Nama Dosen</th>
                                    <th>Link Kelas</th>
                                    <th>Aksi</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>TI19004</td>
                                    <td>Pemrograman Web</td>
                                    <td>Senin, 19:05</td>
                                    <td>05 Maret 2022</td>
                                    <td>06 September 2022</td>
                                    <td>Pak Dosen</td>
                                    <td><a href="https://www.google.com">https://www.google.com</a></td>
                                    <td>
                                        <button class="btn btn-warning" data-toggle="modal" data-target="#addMatkul">
                                            <i class="fa fa-edit"></i> Edit
                                        </button>
                                        <button class="btn btn-danger" data-toggle="modal" data-target="#deleteMatkul">
                                            <i class="fa fa-trash-o"></i> Delete
                                        </button>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
                <!--End Advanced Tables -->
            </div>
        </div>
        <!-- /. ROW  -->
    </div>
    <footer><p>All right reserved. Template by: <a href="http://webthemez.com">WebThemez.com</a></p></footer>
    <!--  Modals data Matakuliah -->
    <div class="modal fade" id="addMatkul" tabindex="-1" role="dialog" aria-labelledby="addMatkulLabel"
         aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Data Mata Kuliah</h4>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="sub-title">Kode Matkul</div>
                        <div>
                            <input type="text" class="form-control" placeholder="Kode Mata Kuliah" name="kode_matkul">
                        </div>
                        <div class="sub-title">Nama Matkul</div>
                        <div>
                            <input type="text" class="form-control" placeholder="Nama Mata Kuliah" name="nama">
                        </div>
                        <div class="sub-title">SKS</div>
                        <div>
                            <input type="number" class="form-control" placeholder="SKS" name="sks">
                        </div>
                        <div class="sub-title">Link Kelas</div>
                        <div>
                            <input type="text" class="form-control" placeholder="Link Kelas" name="link_kelas">
                        </div>
                        <div class="sub-title">Nama Dosen</div>
                        <div>
                            <input type="text" class="form-control" placeholder="Nama Dosen" name="nama_dosen">
                        </div>
                        <div class="sub-title">Waktu Kuliah</div>
                        <div>
                            <input type="time" class="form-control" placeholder="Waktu Kuliah" name="nama_dosen">
                        </div>
                        <div class="sub-title">Tanggal Mulai</div>
                        <div>
                            <input type="date" class="form-control" placeholder="Tanggal Mulai" name="nama_dosen">
                        </div>
                        <div class="sub-title">Tanggal Selesai</div>
                        <div>
                            <input type="date" class="form-control" placeholder="Tanggal Selesai" name="nama_dosen">
                        </div>
                        <div class="sub-title">Hari Kuliah <small>(Hari Kuliah otomatis sama dengan tanggal
                                mulai)</small></div>
                        <div>
                            <input disabled type="date" class="form-control" placeholder="Text input"
                                   name="hari_kuliah">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </div>
    </div>
    <!--  Modals data Matakuliah -->
    <div class="modal fade" id="deleteMatkul" tabindex="-1" role="dialog" aria-labelledby="deleteMatkulLabel"
         aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Konfimasi</h4>
                </div>
                <div class="modal-body">
                    <h3>Apakah anda yakin akan menghapus data ini ?</h3>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-danger">Hapus</button>
                </div>
            </div>
        </div>
    </div>
    <!-- End Modals -->
    @push('scripts')
        <script>
            $(document).ready(function () {
                $('#dataTables-matkul').dataTable();
            });
        </script>
    @endpush
@endsection
