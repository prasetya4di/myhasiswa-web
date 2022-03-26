@extends('template.layout')

@section('title', 'Tugas')

@section('content')
    <div class="header">
        <h1 class="page-header">
            Tugas
        </h1>
    </div>
    <div id="page-inner">

        <div class="row">
            <div class="col-md-12">
                <!-- Advanced Tables -->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Data Tugas
                        <button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#addTugas">
                            <i class="fa fa-plus"></i> Tambah Tugas
                        </button>
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover" id="dataTables-tugas">
                                <thead>
                                <tr>
                                    <th>Kode Mata Kuliah</th>
                                    <th>Nama Mata Kuliah</th>
                                    <th>Tugas</th>
                                    <th>Tanggal Pengumpulan</th>
                                    <th>Link Pengumpulan</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>TI19004</td>
                                    <td>Pemrograman Web</td>
                                    <td>Bikin Web</td>
                                    <td>Senin, 19:05</td>
                                    <td>06 September 2022</td>
                                    <td><a href="https://www.google.com">https://www.google.com</a></td>
                                    <td>Active</td>
                                    <td>
                                        <button class="btn btn-warning" data-toggle="modal" data-target="#addTugas">
                                            <i class="fa fa-edit"></i> Edit
                                        </button>
                                        <button class="btn btn-danger" data-toggle="modal" data-target="#deleteTugas">
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
    <!--  Modals data Tugas -->
    <div class="modal fade" id="addTugas" tabindex="-1" role="dialog" aria-labelledby="addTugasLabel"
         aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Data Mata Kuliah</h4>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="sub-title">Kode Mata Kuliah</div>
                        <div>
                            <input type="text" class="form-control" placeholder="Kode Mata Kuliah" name="kode_matkul">
                        </div>
                        <div class="sub-title">Nama Tugas</div>
                        <div>
                            <input type="text" class="form-control" placeholder="Nama Mata Kuliah" name="nama">
                        </div>
                        <div class="sub-title">Tanggal Pengumpulan</div>
                        <div>
                            <input type="date" class="form-control" placeholder="Tanggal Pengumpulan"
                                   name="tanggal_pengumpulan">
                        </div>
                        <div class="sub-title">Link Pengumpulan</div>
                        <div>
                            <input type="text" class="form-control" placeholder="Link Kelas" name="link_pengumpulan">
                        </div>
                        <div class="sub-title">Status</div>
                        <div>
                            <input type="text" class="form-control" placeholder="Link Kelas" name="link_kelas">
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
    <!--  Modals confirmation tugas -->
    <div class="modal fade" id="deleteTugas" tabindex="-1" role="dialog" aria-labelledby="deleteTugasLabel"
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
                $('#dataTables-tugas').dataTable();
            });
        </script>
    @endpush
@endsection
