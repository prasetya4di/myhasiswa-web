@extends('template.layout')

@section('title', 'Note')

@section('content')
    <div class="header">
        <h1 class="page-header">
            Notes
        </h1>
    </div>
    <div id="page-inner">

        <div class="row">
            <div class="col-md-12">
                <!-- Advanced Tables -->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Data Note
                        <button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#addNote">
                            <i class="fa fa-plus"></i> Tambah Note
                        </button>
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover" id="dataTables-note">
                                <thead>
                                <tr>
                                    <th>Kode Matkul</th>
                                    <th>Nama Matkul</th>
                                    <th>Tanggal</th>
                                    <th>Note</th>
                                    <th>Aksi</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>TI19004</td>
                                    <td>Pemrograman Web</td>
                                    <td>05 Maret 2022</td>
                                    <td>Contoh Note</td>
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
    <!--  Modals data note -->
    <div class="modal fade" id="addNote" tabindex="-1" role="dialog" aria-labelledby="addNoteLabel"
         aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Data Note</h4>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="sub-title">Kode Matkul</div>
                        <div>
                            <input type="text" class="form-control" placeholder="Kode Matkul" name="kode_matkul">
                        </div>
                        <div class="sub-title">Tanggal</div>
                        <div>
                            <input type="date" class="form-control" placeholder="Text input" name="tanggal">
                        </div>
                        <div class="sub-title">Note</div>
                        <div>
                            <textarea class="form-control" placeholder="Catatan" name="note"></textarea>
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
    <!--  Modals confirmation note -->
    <div class="modal fade" id="deleteNote" tabindex="-1" role="dialog" aria-labelledby="deleteNoteLabel"
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
                $('#dataTables-note').dataTable();
            });
        </script>
    @endpush
@endsection
