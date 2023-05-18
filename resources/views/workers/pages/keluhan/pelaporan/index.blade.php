@extends('workers.layouts.master')
@push('after-style')
<style>
    /* The actual vertical-rule (the vertical ruler) */
    .vertical-rule {
        position: relative;
        max-width: 1200px;
        margin: 0 auto;
        z-index: 1;
    }

    /* The actual vertical-rule (the vertical ruler) */
    .vertical-rule::after {
        content: '';
        position: absolute;
        width: 1px;
        background-color: #9eabc09c;
        top: 0;
        bottom: 0;
        left: 50%;
        margin-left: -3px;
        z-index: 1;
    }

    .complain-icon {
        z-index: 2;
    }

</style>
@endpush

@section('content')
<!--  Modal Complain Informations -->
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
                        <img class="complain-icon" src="{{asset('../../assets/images/keluhan-inventaris.svg')}}" width="70" alt="">
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
                        <img class="complain-icon" src="{{asset('../../assets/images/keluhan-genting.svg')}}" width="70" alt="">
                    </div>
                    <div class="col-8">
                        <h4 class="modal-title text-dark fw-medium" id="scrollableModalTitle">Genting</h4>
                        <p>Keluhan pada level yang harus segera ditangani secepatnya</p>
                    </div>
                    <div class="col-4 d-flex justify-content-center align-items-start vertical-rule">
                        <img class="complain-icon" src="{{asset('../../assets/images/keluhan-penting.svg')}}" width="70" alt="">
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
</div>

<div class="page-breadcrumb mt-n5 ms-n4 mb-3">
    <div class="row">
        <div class="col-7 align-self-center">
            <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Daftar Pelaporan Keluhan
            </h4>
            <div class="d-flex align-items-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb m-0 p-0">
                        <!-- <li class="breadcrumb-item"><a href="index.html" class="text-muted">Apps</a></li> -->
                        <li class="breadcrumb-item text-muted active" aria-current="page">
                            <a href="{{route('keluhanPelaporan')}}">
                                Daftar Pelaporan Keluhan
                            </a> </li>
                        <!-- <li class="breadcrumb-item text-muted active" aria-current="page">Unggah Pelaporan Keluhan</li> -->
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
                        <img src="{{asset('../../assets/images/write-board.svg')}}" class="m-n5" width="180">
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
                        <img src="{{asset('../../assets/images/clock.svg')}}" class="m-n5" width="165">
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
                        <img src="{{asset('../../assets/images/checked-board.svg')}}" class="m-n5" width="168">
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
            <div class="text-lg-end mt-3 mt-lg-0 flex-item">
                <a href="{{route('keluhanPelaporanCreate')}}" class="btn btn-md text-white me-2"
                    style="background-color: #31CFD2; width: 100%;">Buat Laporan</a>
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
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>KI0001</td>
                                <td>Inventaris</td>
                                <td>
                                    <a class="fw-bold" href="{{route('keluhanPelaporanShow')}}">Tangga Hilang</a>
                                </td>
                                <td>09-09-2023</td>
                                <td>Proses</td>
                            </tr>
                            <tr>
                                <td>KF0001</td>
                                <td>Fasilitas</td>
                                <td>
                                    <a class="fw-bold" href="{{route('keluhanPelaporanShow')}}">Air Urinoir Tidak
                                        Keluar</a>
                                </td>
                                <td>09-09-2023</td>
                                <td>Proses</td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- If there is no records -->
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
