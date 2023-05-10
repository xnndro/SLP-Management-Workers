@extends('workers.layouts.master')

@section('content')
<!-- Panduan -->
<div class="modal fade" id="scrollable-modal" tabindex="-1" role="dialog" aria-labelledby="scrollableModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="scrollableModalTitle">Modal title</h5>
            </div>
            <div class="modal-body">
                <p>
                        Cras mattis consectetur purus sit amet fermentum. Cras justo odio,
                    dapibus ac facilisis in, egestas
                    eget quam. Morbi leo risus, porta ac consectetur ac, vestibulum at
                    eros.
                </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                    Close
                </button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- End Panduan -->
 <!-- Komentar -->
<div class="modal fade" id="komentar" tabindex="-1" role="dialog" aria-labelledby="scrollableModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="scrollableModalTitle">Modal title</h5>
            </div>
            <div class="modal-body">
                <p>
                        kerja bagus budak
                </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                    Close
                </button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- End Komentar -->

<div class="modal fade" id="bukti" tabindex="-1" role="dialog"
aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myLargeModalLabel">Unggah Bukti Kerja</h4>
            </div>
            <div class="modal-body">
                <form action="">
                    <div class="mb-3">
                        <input class="form-control" type="file" id="formFile">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </form>
            </div>
        </div><!-- /.modal-content -->
        <!-- close button -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h3 class="card-title">Pekerjaan Hari ini</h3>
                <p class="card-text">Membersihkan Ruang Kelas A801</p>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                        data-bs-target="#scrollable-modal">Lihat Panduan</button>
                <button type="button" class="btn btn-success" data-bs-toggle="modal"
                        data-bs-target="#bukti">Unggah Bukti Pekerjaan</button>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <h3 class="mb-3">Riwayat Bukti Pekerjaan</h3>
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="multi_col_order"
                        class="table border table-striped table-bordered text-nowrap" style="width:100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Bulan</th>
                                <th>Terakhir Diubah</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Januari</td>
                                <td>09-09-2023</td>
                                <td>                                                                       
                                    <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#komentar">Lihat Komentar</button>
                                </td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Januari</td>
                                <td>09-09-2023</td>
                                <td>
                                    <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#komentar">Lihat Komentar</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection