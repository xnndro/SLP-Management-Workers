@extends('supervisor.layouts.master')

@section('content')

<!-- Modal Content for Complain Informations -->
<div class="modal fade" id="scrollable-modal" tabindex="-1" role="dialog" aria-labelledby="scrollableModalTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header mx-4">
                <h3 class="modal-title text-dark fw-medium" id="scrollableModalTitle">Jenis Keluhan</h3>
            </div>
            <div class="modal-body mx-4">
                <div class="row">
                    <div class="col-4 d-flex justify-content-center align-items-start vertical-rule">
                        <img class="complain-icon" src="../../assets/images/keluhan-inventaris.svg" width="70" alt="">
                    </div>
                    <div class="col-8">
                        <h4 class="modal-title text-dark fw-medium" id="scrollableModalTitle">Inventaris
                        </h4>
                        <p>Laporan terkait kerusakan atau masalah pada inventaris alat kerja pekerja SLP</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4 d-flex justify-content-center align-items-start vertical-rule">
                        <img class="complain-icon" src="../../assets/images/keluhan-fasilitas.svg" width="70" alt="">
                    </div>
                    <div class="col-8">
                        <h4 class="modal-title text-dark fw-medium" id="scrollableModalTitle">Fasilitas</h4>
                        <p>Laporan terkait kerusakan atau masalah pada fasilitas di area lingkungan kerja
                            SLP</p>
                    </div>
                </div>
            </div>

            <div class="modal-header mx-4">
                <h3 class="modal-title text-dark fw-medium" id="scrollableModalTitle">Urgensi Keluhan</h3>
            </div>
            <div class="modal-body mx-4">
                <div class="row">
                    <div class="col-4 d-flex justify-content-center align-items-start vertical-rule">
                        <img class="complain-icon" src="../../assets/images/keluhan-genting.svg" width="70" alt="">
                    </div>
                    <div class="col-8">
                        <h4 class="modal-title text-dark fw-medium" id="scrollableModalTitle">Genting</h4>
                        <p>Keluhan pada level yang harus segera ditangani secepatnya</p>
                    </div>
                    <div class="col-4 d-flex justify-content-center align-items-start vertical-rule">
                        <img class="complain-icon" src="../../assets/images/keluhan-penting.svg" width="70" alt="">
                    </div>
                    <div class="col-8">
                        <h4 class="modal-title text-dark fw-medium" id="scrollableModalTitle">Penting</h4>
                        <p>Keluhan pada level yang boleh ditangani setelah pekerjaan reguler selesai</p>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!--  Modal content for the decline job -->
<div class="modal fade" id="declineJob" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title text-dark fw-medium" id="scrollableModalTitle">Air Urinoir Tidak
                    Keluar</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
            </div>
            <div class="modal-body">
                <form class="row m-4 gy-4 mt-0">
                    <div class="col-sm-12 col-md-12 col-lg-12 d-flex align-items-start">
                        <div class="row d-flex col-12">
                            <div class="col-sm-12 col-md-12 col-lg-4">
                                <h5 class="card-title text-dark fw-medium">Urgensi</h4>
                            </div>
                            <div class="d-none d-lg-block col-lg-1">
                                <h5 class="card-title">:</h4>
                            </div>
                            <div class="col-sm-12 col-md-12 col-lg-7 text-warning">
                                Penting
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-12 col-md-12 col-lg-12 d-flex align-items-start">
                        <div class="row d-flex col-12">
                            <div class="col-sm-6 col-md-6 col-lg-4">
                                <h5 class="card-title text-dark fw-medium">Catatan Penugasan</h4>
                            </div>
                            <div class="d-none d-lg-block col-lg-1">
                                <h5 class="card-title">:</h4>
                            </div>
                            <div class="col-sm-12 col-md-12 col-lg-12 my-2">
                                <div class="form-group">
                                    <textarea class="form-control" id="placeholder"
                                        placeholder="Masukkan Deskripsi Keluhan" cols="20" rows="5"
                                        readonly>Tolong diapakan dulu apa itu supaya ga apa kali apanya</textarea>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-12 col-md-12 col-lg-12 d-flex align-items-start">
                        <div class="row d-flex col-12">
                            <div class="col-sm-6 col-md-6 col-lg-4">
                                <h5 class="card-title text-dark fw-medium">Alasan Penolakan</h4>
                            </div>
                            <div class="d-none d-lg-block col-lg-1">
                                <h5 class="card-title">:</h4>
                            </div>
                            <div class="col-sm-12 col-md-12 col-lg-12 my-2">
                                <div class="form-group">
                                    <textarea class="form-control" id="placeholder"
                                        placeholder="Masukkan Alasan Penolakan" cols="20" rows="5"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-12 col-md-12 col-lg-12 d-flex align-items-end">
                        <div class="col-12 d-flex justify-content-end">
                            <button type="button" class="btn waves-effect waves-light btn-danger w-25">Tolak</button>
                        </div>
                    </div>
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!--  Modal content for assign task -->
<div class="modal fade" id="assignTask" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <!-- <h4 class="modal-title" id="myLargeModalLabel">Large modal</h4> -->
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
            </div>
            <div class="modal-body">
                <form class="row gy-4 m-4 mt-0">
                    <div class="col-sm-12 col-md-12 col-lg-12 d-flex align-items-start">
                        <div class="row d-flex col-12">
                            <div class="col-sm-6 col-md-6 col-lg-4">
                                <h4 class="fw-medium text-dark">Pekerja</h4>
                            </div>
                            <div class="d-none d-lg-block col-lg-1">
                                <h4 class="fw-medium text-dark">:</h4>
                            </div>
                            <div class="col-sm-0 col-md-0 col-lg-7 mt-lg-n2">
                                <div class="input-group">
                                    <select class="form-select" id="inputGroupSelect01">
                                        <option selected="">Pilih...</option>
                                        <option value="1">Teknisi - Jack Sparrow</option>
                                        <option value="2">HK - Harmione Ginger</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-12 col-md-12 col-lg-12 d-flex align-items-start">
                        <div class="row d-flex col-12">
                            <div class="col-sm-6 col-md-6 col-lg-4">
                                <h4 class="fw-medium text-dark">Urgensi</h4>
                            </div>
                            <div class="d-none d-lg-block col-lg-1">
                                <h4 class="fw-medium text-dark">:</h4>
                            </div>
                            <div class="col-sm-0 col-md-0 col-lg-7 mt-lg-n2">
                                <div class="input-group">
                                    <select class="form-select" id="inputGroupSelect01">
                                        <option selected="">Pilih...</option>
                                        <option value="1">Penting</option>
                                        <option value="2">Genting</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-12 col-md-12 col-lg-12 d-flex align-items-start">
                        <div class="row d-flex col-12">
                            <div class="col-sm-6 col-md-6 col-lg-4">
                                <h5 class="fw-medium text-dark">Catatan Penugasan</h4>
                            </div>
                            <div class="d-none d-lg-block col-lg-1">
                                <h5 class="fw-medium text-dark">:</h4>
                            </div>
                            <div class="col-sm-12 col-md-12 col-lg-12 my-2">
                                <div class="form-group">
                                    <textarea class="form-control" id="placeholder"
                                        placeholder="Masukkan Catatan Penugasan" cols="30" rows="10"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-12 col-md-12 col-lg-12 d-flex align-items-stretch mt-5">
                        <div class="row d-flex col-12 d-flex justify-content-between align-items-start">
                            <div class="col-6 d-flex">
                                <button type="button" class="btn waves-effect waves-light btn-danger w-50">Tolak
                                    Laporan</button>
                            </div>
                            <div class="col-6 d-flex justify-content-end">
                                <button type="button"
                                    class="btn waves-effect waves-light btn-primary w-50">Tugaskan</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!--  Modal content for edit assign task -->
<div class="modal fade" id="editAssignTask" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <!-- <h4 class="modal-title" id="myLargeModalLabel">Large modal</h4> -->
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
            </div>
            <div class="modal-body">
                <form class="row gy-4 m-4 mt-0">
                    <div class="col-sm-12 col-md-12 col-lg-12 d-flex align-items-start">
                        <div class="row d-flex col-12">
                            <div class="col-sm-6 col-md-6 col-lg-4">
                                <h4 class="fw-medium text-dark">Pekerja</h4>
                            </div>
                            <div class="d-none d-lg-block col-lg-1">
                                <h4 class="fw-medium text-dark">:</h4>
                            </div>
                            <div class="col-sm-0 col-md-0 col-lg-7 mt-lg-n2">
                                <div class="input-group">
                                    <select class="form-select" id="inputGroupSelect01">
                                        <option value="">Pilih...</option>
                                        <option selected="" value="1">Teknisi - Jack Sparrow</option>
                                        <option value="2">HK - Harmione Ginger</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-12 col-md-12 col-lg-12 d-flex align-items-start">
                        <div class="row d-flex col-12">
                            <div class="col-sm-6 col-md-6 col-lg-4">
                                <h4 class="fw-medium text-dark">Urgensi</h4>
                            </div>
                            <div class="d-none d-lg-block col-lg-1">
                                <h4 class="fw-medium text-dark">:</h4>
                            </div>
                            <div class="col-sm-0 col-md-0 col-lg-7 mt-lg-n2">
                                <div class="input-group">
                                    <select class="form-select" id="inputGroupSelect01">
                                        <option value="">Pilih...</option>
                                        <option selected="" value="1">Penting</option>
                                        <option value="2">Genting</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-12 col-md-12 col-lg-12 d-flex align-items-start">
                        <div class="row d-flex col-12">
                            <div class="col-sm-6 col-md-6 col-lg-4">
                                <h5 class="fw-medium text-dark">Catatan Penugasan</h4>
                            </div>
                            <div class="d-none d-lg-block col-lg-1">
                                <h5 class="fw-medium text-dark">:</h4>
                            </div>
                            <div class="col-sm-12 col-md-12 col-lg-12 my-2">
                                <div class="form-group">
                                    <textarea class="form-control" id="placeholder"
                                        placeholder="Masukkan Catatan Penugasan" cols="30"
                                        rows="10">Tolong diapakan dulu apa itu supaya ga apa kali apanya</textarea>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-12 col-md-12 col-lg-12 d-flex align-items-stretch mt-5">
                        <div class="row d-flex col-12 d-flex justify-content-between align-items-start">
                            <div class="col-6 d-flex">
                                <button type="button" class="btn waves-effect waves-light btn-danger w-50">Tolak
                                    Laporan</button>
                            </div>
                            <div class="col-6 d-flex justify-content-end">
                                <button type="button"
                                    class="btn waves-effect waves-light btn-primary w-50">Tugaskan</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!--  Modal content for reassign task -->
<div id="reAssignTask" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="reAssignTaskModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <!-- <h4 class="modal-title" id="myLargeModalLabel">Large modal</h4> -->
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
            </div>
            <div class="modal-body">
                <form class="row gy-4 m-4 mt-0">
                    <div class="col-sm-12 col-md-12 col-lg-12 d-flex align-items-start">
                        <div class="row d-flex col-12">
                            <div class="col-sm-6 col-md-6 col-lg-4">
                                <h4 class="fw-medium text-dark">Pekerja</h4>
                            </div>
                            <div class="d-none d-lg-block col-lg-1">
                                <h4 class="fw-medium text-dark">:</h4>
                            </div>
                            <div class="col-sm-0 col-md-0 col-lg-7">
                                <h5>Teknisi - Jack Sparrow</h5>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-12 col-md-12 col-lg-12 d-flex align-items-start">
                        <div class="row d-flex col-12">
                            <div class="col-sm-6 col-md-6 col-lg-4">
                                <h5 class="fw-medium text-dark">Alasan Penolakan</h4>
                            </div>
                            <div class="d-none d-lg-block col-lg-1">
                                <h5 class="fw-medium text-dark">:</h4>
                            </div>
                            <div class="col-sm-12 col-md-12 col-lg-12 my-2">
                                <div class="form-group">
                                    <textarea class="form-control" id="placeholder"
                                        placeholder="Masukkan Catatan Penugasan" cols="30" rows="10"
                                        readonly>Maaf saya sibux boss</textarea>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-12 col-md-12 col-lg-12 d-flex align-items-stretch mt-5">
                        <div class="row d-flex col-12 d-flex justify-content-between align-items-start">
                            <div class="col-6 d-flex">
                                <button type="button"
                                    class="btn waves-effect waves-light btn-warning text-white w-50">Tugaskan
                                    Lagi</button>
                            </div>
                            <div class="col-6 d-flex justify-content-end">
                                <!-- <button type="button" class="btn waves-effect waves-light btn-primary w-50"
                                                data-bs-dismiss="modal" data-bs-target="#newAssignTask"
                                                data-bs-toggle="modal">Tugaskan Baru</button> -->

                                <button type="button" class="btn waves-effect waves-light btn-primary w-50">Tugaskan
                                    Baru</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!--  Modal content for new assign task -->
<div id="newAssignTask" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="newAssignTaskModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <!-- <h4 class="modal-title" id="myLargeModalLabel">Large modal</h4> -->
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
            </div>
            <div class="modal-body">
                <form class="row gy-4 m-4 mt-0">
                    <div class="col-sm-12 col-md-12 col-lg-12 d-flex align-items-start">
                        <div class="row d-flex col-12">
                            <div class="col-sm-6 col-md-6 col-lg-4">
                                <h4 class="fw-medium text-dark">Pekerja</h4>
                            </div>
                            <div class="d-none d-lg-block col-lg-1">
                                <h4 class="fw-medium text-dark">:</h4>
                            </div>
                            <div class="col-sm-0 col-md-0 col-lg-7 mt-lg-n2">
                                <div class="input-group">
                                    <select class="form-select" id="inputGroupSelect01">
                                        <option selected="">Pilih...</option>
                                        <option value="1">Teknisi - Jack Sparrow</option>
                                        <option value="2">HK - Harmione Ginger</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-12 col-md-12 col-lg-12 d-flex align-items-start">
                        <div class="row d-flex col-12">
                            <div class="col-sm-6 col-md-6 col-lg-4">
                                <h4 class="fw-medium text-dark">Urgensi</h4>
                            </div>
                            <div class="d-none d-lg-block col-lg-1">
                                <h4 class="fw-medium text-dark">:</h4>
                            </div>
                            <div class="col-sm-0 col-md-0 col-lg-7 mt-lg-n2">
                                <div class="input-group">
                                    <select class="form-select" id="inputGroupSelect01">
                                        <option selected="">Pilih...</option>
                                        <option value="1">Penting</option>
                                        <option value="2">Genting</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-12 col-md-12 col-lg-12 d-flex align-items-start">
                        <div class="row d-flex col-12">
                            <div class="col-sm-6 col-md-6 col-lg-4">
                                <h5 class="fw-medium text-dark">Catatan Penugasan</h4>
                            </div>
                            <div class="d-none d-lg-block col-lg-1">
                                <h5 class="fw-medium text-dark">:</h4>
                            </div>
                            <div class="col-sm-12 col-md-12 col-lg-12 my-2">
                                <div class="form-group">
                                    <textarea class="form-control" id="placeholder"
                                        placeholder="Masukkan Catatan Penugasan" cols="30" rows="10"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-12 col-md-12 col-lg-12 d-flex align-items-stretch mt-5">
                        <div class="row d-flex col-12 d-flex justify-content-between align-items-start">
                            <div class="col-6 d-flex">
                                <button type="button" class="btn waves-effect waves-light btn-danger w-50">Tolak
                                    Laporan</button>
                            </div>
                            <div class="col-6 d-flex justify-content-end">
                                <button type="button"
                                    class="btn waves-effect waves-light btn-primary w-50">Tugaskan</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div class="page-breadcrumb mt-n5 ms-n4 mb-3">
    <div class="row">
        <div class="col-7 align-self-center">
            <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Daftar Keluhan
            </h4>
            <div class="d-flex align-items-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb m-0 p-0">
                        <!-- <li class="breadcrumb-item"><a href="index.html" class="text-muted">Apps</a></li> -->
                        <li class="breadcrumb-item text-muted active" aria-current="page">
                            <a href="{{route('keluhan')}}">
                                Daftar Keluhan
                            </a> </li>
                        <!-- <li class="breadcrumb-item text-muted active" aria-current="page">Daftar Keluhan</li> -->
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>


<div class="row my-3">
    <div class="col-md-6 col-lg-3 col-xlg-3">
        <div class="card card-hover bg-primary m-0">
            <div class="card-body">
                <div class="d-flex text-white">
                    <div>
                        <img src="../../assets/images/write-board.svg" class="m-n5" width="180">
                    </div>
                    <div class="ms-auto align-items-center">
                        <h6 class="font-weight-normal text-truncate">Menunggu</h6>
                        <div class="d-flex align-items-center">
                            <h2 class="text-white font-weight-medium">60</h2>
                            <!-- <span class="font-12">keluhan</span> -->
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="col-md-6 col-lg-3 col-xlg-3">
        <div class="card card-hover bg-danger m-0">
            <div class="card-body">
                <div class="d-flex text-white">
                    <div>
                        <img src="../../assets/images/clock.svg" class="m-n5" width="165">
                    </div>
                    <div class="ms-auto align-items-center">
                        <h6 class="font-weight-normal text-truncate">Proses</h6>
                        <div class="d-flex align-items-center">
                            <h2 class="text-white font-weight-medium">40</h2>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="col-md-6 col-lg-3 col-xlg-3">
        <div class="card card-hover bg-success m-0">
            <div class="card-body">
                <div class="d-flex text-white">
                    <div>
                        <img src="../../assets/images/checked-board.svg" class="m-n5" width="168">
                    </div>
                    <div class="ms-auto align-items-center">
                        <h6 class="font-weight-normal text-truncate">Selesai</h6>
                        <div class="d-flex align-items-center">
                            <h2 class="text-white font-weight-medium">17</h2>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- button at right side -->
    <div class="col-md-6 col-lg-3 col-xlg-3 d-flex flex-column justify-content-between align-items-stretch w-25">
        <div class="d-flex flex-column justify-content-between h-100">
            <div class="text-lg-end mt-3 mt-lg-0 flex-item">
                <!-- Standard  modal -->
                <button type="button" data-bs-toggle="modal" data-bs-target="#scrollable-modal"
                    class="btn btn-md text-white me-2" style="background-color: #31CFD2; width: 100%;">Informasi
                    Keluhan</button>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <!-- <h4 class="card-title">Pekerja</h4> -->
                <div class="table-responsive">
                    <table id="multi_col_order" class="table border table-striped table-bordered text-nowrap"
                        style="width:100%">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Jenis</th>
                                <th>Judul</th>
                                <th>Tanggal Dilaporkan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>KF0001</td>
                                <td>Fasilitas</td>
                                <td>
                                    <a class="fw-bold" href="{{route('keluhanShow')}}">Air Urinoir
                                        Tidak
                                        Keluar</a>
                                </td>
                                <td>09-09-2023</td>
                                <td>
                                    <div class="d-flex justify-content-center">
                                        <a href="{{route('keluhanShowFeedback')}}"
                                            class="btn waves-effect waves-light btn-success w-75">Lihat
                                            Riwayat</a>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>KF0001</td>
                                <td>Fasilitas</td>
                                <td>
                                    <a class="fw-bold" href="{{route('keluhanShow')}}">Air Urinoir
                                        Tidak
                                        Keluar</a>
                                </td>
                                <td>09-09-2023</td>
                                <td>
                                    <div class="d-flex justify-content-center">
                                        <btn type="button" data-bs-toggle="modal" data-bs-target="#assignTask"
                                            class="btn waves-effect waves-light btn-primary w-75">
                                            Tugaskan</btn>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>KF0001</td>
                                <td>Fasilitas</td>
                                <td>
                                    <a class="fw-bold" href="{{route('keluhanShow')}}">Air Urinoir
                                        Tidak
                                        Keluar</a>
                                </td>
                                <td>09-09-2023</td>
                                <td>
                                    <div class="d-flex justify-content-center">
                                        <btn type="button" data-bs-toggle="modal" data-bs-target="#editAssignTask"
                                            class="btn waves-effect waves-light btn-warning text-white w-75">
                                            Edit</btn>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>KF0001</td>
                                <td>Fasilitas</td>
                                <td>
                                    <a class="fw-bold" href="{{route('keluhanShow')}}">Air Urinoir
                                        Tidak
                                        Keluar</a>
                                </td>
                                <td>09-09-2023</td>
                                <td>
                                    <div class="d-flex justify-content-center">
                                        <a href="{{route('keluhanVerify')}}"
                                            class="btn waves-effect waves-light bg-cyan text-white w-75 flex-item mx-2">Verifikasi</a>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>KF0001</td>
                                <td>Fasilitas</td>
                                <td>
                                    <a class="fw-bold" href="{{route('keluhanShow')}}">Air Urinoir
                                        Tidak
                                        Keluar</a>
                                </td>
                                <td>09-09-2023</td>
                                <td>
                                    <div class="d-flex justify-content-center">
                                        <btn class="btn waves-effect waves-light btn-danger text-white w-75 flex-item mx-2"
                                            data-bs-toggle="modal" data-bs-target="#reAssignTask">
                                            Tugaskan
                                            Lagi</button>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- If there is no schedulle added -->
<div class="row">
    <div class="col-lg-12 mt-3">
        <div class="card">
            <div class="d-flex justify-content-center align-items-center flex-wrap mb-5">
                <div class="text-center">
                    <lottie-player src="https://assets2.lottiefiles.com/packages/lf20_htGEnnUdTG.json"
                        background="transparent" speed="1" style="width: 300px; height: 300px;" loop autoplay>
                    </lottie-player>
                    <h5 class="mt-lg-n2">Belum ada komplain yang masuk</h5>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
