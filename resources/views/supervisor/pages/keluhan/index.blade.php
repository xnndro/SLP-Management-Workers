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
                        <img class="complain-icon" src="{{asset('../../assets/images/keluhan-fasilitas.svg')}}" width="70" alt="">
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
                        <img src="{{asset('../../assets/images/write-board.svg')}}" class="m-n5" width="180">
                    </div>
                    <div class="ms-auto align-items-center">
                        <h6 class="font-weight-normal text-truncate">Menunggu</h6>
                        <div class="d-flex align-items-center">
                            <h2 class="text-white font-weight-medium">{{$count_wait}}</h2>
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
                            <h2 class="text-white font-weight-medium">{{$count_process}}</h2>
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
                            <h2 class="text-white font-weight-medium">{{$count_finished}}</h2>
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

@if(count($complains) != 0)
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
                                <th>No</th>
                                <th>Jenis</th>
                                <th>Judul</th>
                                <th>Tanggal Dilaporkan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($complains as $key => $complain)
                            <tr>
                                <td>{{$key + 1}}</td>
                                <td>Fasilitas</td>
                                <td>
                                    <a class="fw-bold" href="{{route('keluhanShow',$complain->id)}}">{{$complain->complain_title}}</a>
                                </td>
                                <td>{{$complain->created_at}}</td>
                                @if ($complain->report_status == 1)    
                                    <td>
                                        <div class="d-flex justify-content-center">
                                            <button type="button" data-bs-toggle="modal" data-bs-target="#assignTask{{$complain->id}}"
                                                class="btn waves-effect waves-light btn-primary w-100">
                                                Tugaskan</button>
                                        </div>
                                    </td>
                                    <div class="modal fade" id="assignTask{{$complain->id}}" tabindex="-1" role="dialog" aria-labelledby="assignTask{{$complain->id}}" aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <!-- <h4 class="modal-title" id="assignTask{{$complain->id}}">Large modal</h4> -->
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form class="row gy-4 m-4 mt-0" method="POST" action="{{route('keluhanPenugasan', $complain->id)}}" enctype="multipart/form-data">
                                                        @csrf
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
                                                                        <select name="pekerja" class="form-select @error('pekerja') is-invalid @enderror" id="inputGroupSelect01">
                                                                            <option value="pilih" selected>Pilih...</option>
                                                                            @foreach ($users as $user)
                                                                            <option value="{{$user->id}}">{{$user->name}}</option>
                                                                            @endforeach
                                                                        </select>
                                                                        @error('pekerja')
                                                                            <div class="text-danger">{{ $message }}</div>
                                                                        @enderror
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
                                                                        <select name="urgensi" class="form-select @error('urgensi') is-invalid @enderror" id="inputGroupSelect01">
                                                                            <option value="pilih" selected>Pilih...</option>
                                                                            @foreach ($urgencies as $urgency)
                                                                            <option value="{{$urgency->id}}">{{$urgency->name}}</option>
                                                                            @endforeach
                                                                        </select>
                                                                        @error('urgensi')
                                                                            <div class="text-danger">{{ $message }}</div>
                                                                        @enderror
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                    
                                                        <div class="col-sm-12 col-md-12 col-lg-12 d-flex align-items-start">
                                                            <div class="row d-flex col-12">
                                                                <div class="col-sm-6 col-md-6 col-lg-4">
                                                                    <h4 class="fw-medium text-dark">Catatan Penugasan</h4>
                                                                </div>
                                                                <div class="d-none d-lg-block col-lg-1">
                                                                    <h5 class="fw-medium text-dark">:</h4>
                                                                </div>
                                                                <div class="col-sm-12 col-md-12 col-lg-12 my-2">
                                                                    <div class="form-group">
                                                                        <textarea name="catatan_penugasan" class="form-control @error('catatan_penugasan') is-invalid @enderror" id="placeholder"
                                                                            placeholder="Masukkan Catatan Penugasan" cols="30" rows="10"></textarea>
                                                                        @error('catatan_penugasan')
                                                                            <div class="text-danger">{{ $message }}</div>
                                                                        @enderror
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                    
                                                        <div class="col-sm-12 col-md-12 col-lg-12 d-flex align-items-stretch mt-5">
                                                            <div class="row d-flex col-12 d-flex justify-content-between align-items-start">
                                                                <div class="col-6 d-flex">
                                                                    <a href="{{route('keluhanDecline',$complain->id)}}" 
                                                                        data-confirm-delete="true"
                                                                        class="btn waves-effect waves-light btn-danger w-50">Tolak
                                                                        Laporan</a>
                                                                </div>
                                                                <div class="col-6 d-flex justify-content-end">
                                                                    <input type="submit"
                                                                        class="btn waves-effect waves-light btn-primary w-50" value="Tugaskan">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div><!-- /.modal-content -->
                                        </div><!-- /.modal-dialog -->
                                    </div>

                                @elseif ($complain->report_status == 2)
                                    @if($complain->latestAssigned->assign_status == 1)
                                    <td>
                                        <div class="d-flex justify-content-center">
                                            <button type="button" data-bs-toggle="modal" data-bs-target="#editAssignTask{{$complain->id}}"
                                                class="btn waves-effect waves-light btn-warning text-white w-100">
                                                Edit</button>
                                        </div>
                                    </td>
                                    <!--  Modal content for edit assign task -->
                                    <div class="modal fade" id="editAssignTask{{$complain->id}}" tabindex="-1" role="dialog" aria-labelledby="editAssignTask{{$complain->id}}"
                                        aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <!-- <h4 class="modal-title" id="myLargeModalLabel">Large modal</h4> -->
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form class="row gy-4 m-4 mt-0" method="POST" action="{{route('keluhanPenugasanUpdate', $complain->latestAssigned->id)}}">
                                                        @csrf
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
                                                                        <select name="pekerja" class="form-select @error('pekerja') is-invalid @enderror" id="inputGroupSelect01">
                                                                            <option value="pilih">Pilih...</option>
                                                                            @foreach ($users as $user)
                                                                            <option 
                                                                            @if($complain->latestAssigned->user_id == $user->id)
                                                                            selected
                                                                            @endif value="{{$user->id}}">{{$user->name}}</option>
                                                                            @endforeach
                                                                        </select>
                                                                        @error('pekerja')
                                                                            <div class="text-danger">{{ $message }}</div>
                                                                        @enderror
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
                                                                        <select name="urgensi" class="form-select @error('urgensi') is-invalid @enderror" id="inputGroupSelect01">
                                                                            <option value="pilih">Pilih...</option>
                                                                            @foreach ($urgencies as $urgency)
                                                                            <option 
                                                                            @if($complain->complain_urgency == $urgency->id)
                                                                            selected
                                                                            @endif
                                                                            value="{{$urgency->id}}">{{$urgency->name}}</option>
                                                                            @endforeach
                                                                        </select>
                                                                        @error('urgensi')
                                                                            <div class="text-danger">{{ $message }}</div>
                                                                        @enderror
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
                                                                    <h4 class="fw-medium text-dark">:</h4>
                                                                </div>
                                                                <div class="col-sm-12 col-md-12 col-lg-12 my-2">
                                                                    <div class="form-group">
                                                                        <textarea name="catatan_penugasan" class="form-control @error('catatan_penugasan') is-invalid @enderror" id="placeholder"
                                                                            placeholder="Masukkan Catatan Penugasan" cols="30" rows="10">{{$complain->latestAssigned->assign_description}}</textarea>
                                                                        @error('catatan_penugasan')
                                                                            <div class="text-danger">{{ $message }}</div>
                                                                        @enderror
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-sm-12 col-md-12 col-lg-12 d-flex align-items-stretch mt-5">
                                                            <div class="row d-flex col-12 d-flex justify-content-between align-items-start">
                                                                <div class="col-6 d-flex">
                                                                    <a href="{{route('keluhanPenugasanDelete',$complain->latestAssigned->id)}}" 
                                                                        data-confirm-delete="true"
                                                                        class="btn waves-effect waves-light btn-danger w-50">Batalkan</a>
                                                                </div>
                                                                <div class="col-6 d-flex justify-content-end">
                                                                    <input type="submit"
                                                                        class="btn waves-effect waves-light btn-primary w-50" value="Tugaskan ulang">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div><!-- /.modal-content -->
                                        </div><!-- /.modal-dialog -->
                                    </div><!-- /.modal -->
                                    @elseif ($complain->latestAssigned->assign_status == 2)
                                    <td>
                                        <div class="d-flex justify-content-center">
                                        @if (is_null($complain->latestAssigned->submissions))
                                        <button class="btn btn-secondary disabled text-white w-100 flex-item mx-2">
                                            Proses
                                        </button>
                                        @else
                                            @if ($complain->latestAssigned->submissions->submission_status == 1)
                                            <a href="{{route('keluhanVerify', $complain->latestAssigned->id)}}" class="btn waves-effect waves-light bg-cyan text-white w-100 flex-item mx-2">
                                                Verifikasi
                                            </a>
                                            @elseif($complain->latestAssigned->submissions->submission_status == 2)
                                            <a href="{{route('keluhanShowFeedback', $complain->latestAssigned->id)}}" class="btn waves-effect waves-light btn-success w-100">
                                                Lihat Riwayat
                                            </a>
                                            @elseif($complain->latestAssigned->submissions->submission_status == 3)
                                            <button class="btn btn-secondary disabled text-white w-100 flex-item mx-2">
                                                Proses
                                            </button>
                                            @endif
                                        @endif
                                        </div>
                                    </td>
                                    @elseif ($complain->latestAssigned->assign_status == 3 && !is_null($complain->latestAssigned->latestDeclined))
                                    <td>
                                        <div class="d-flex justify-content-center">
                                            <button class="btn waves-effect waves-light btn-danger text-white w-100 flex-item mx-2"
                                                data-bs-toggle="modal" data-bs-target="#reAssignTask{{$complain->id}}">
                                                Tugaskan Lagi</button>
                                        </div>
                                    </td>
                                    <!--  Modal content for reassign task -->
                                    <div id="reAssignTask{{$complain->id}}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="reAssignTask{{$complain->id}}"
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
                                                                    <h5>{{$complain->latestAssigned->user->name}}</h5>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-sm-12 col-md-12 col-lg-12 d-flex align-items-start">
                                                            <div class="row d-flex col-12">
                                                                <div class="col-sm-6 col-md-6 col-lg-4">
                                                                    <h4 class="fw-medium text-dark">Alasan Penolakan</h4>
                                                                </div>
                                                                <div class="d-none d-lg-block col-lg-1">
                                                                    <h4 class="fw-medium text-dark">:</h4>
                                                                </div>
                                                                <div class="col-sm-12 col-md-12 col-lg-12 my-2">
                                                                    <div class="form-group">
                                                                        <textarea class="form-control" id="placeholder"
                                                                            placeholder="Masukkan Catatan Penugasan" cols="30" rows="10"
                                                                            disabled>{{$complain->latestAssigned->latestDeclined->decline_description}}</textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-sm-12 col-md-12 col-lg-12 d-flex align-items-stretch mt-5">
                                                            <div class="row d-flex col-12 d-flex justify-content-between align-items-start">
                                                                <div class="col-12 d-flex justify-content-end">
                                                                    <button type="button" class="btn waves-effect waves-light btn-primary w-25"
                                                                                    data-bs-dismiss="modal" data-bs-target="#editAssignTask{{$complain->id}}"
                                                                                    data-bs-toggle="modal">Tugaskan Baru</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div><!-- /.modal-content -->
                                        </div><!-- /.modal-dialog -->
                                    </div><!-- /.modal -->
                                    <!--  Modal content for edit assign task -->
                                    <div class="modal fade" id="editAssignTask{{$complain->id}}" tabindex="-1" role="dialog" aria-labelledby="editAssignTask{{$complain->id}}"
                                        aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <!-- <h4 class="modal-title" id="myLargeModalLabel">Large modal</h4> -->
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form class="row gy-4 m-4 mt-0" method="POST" action="{{route('keluhanPenugasanUpdate', $complain->latestAssigned->id)}}">
                                                        @csrf
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
                                                                        <select name="pekerja" class="form-select @error('pekerja') is-invalid @enderror" id="inputGroupSelect01">
                                                                            <option value="pilih">Pilih...</option>
                                                                            @foreach ($users as $user)
                                                                            <option 
                                                                            @if($complain->latestAssigned->user_id == $user->id)
                                                                            selected
                                                                            @endif value="{{$user->id}}">{{$user->name}}</option>
                                                                            @endforeach
                                                                        </select>
                                                                        @error('pekerja')
                                                                            <div class="text-danger">{{ $message }}</div>
                                                                        @enderror
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
                                                                        <select name="urgensi" class="form-select @error('urgensi') is-invalid @enderror" id="inputGroupSelect01">
                                                                            <option value="pilih">Pilih...</option>
                                                                            @foreach ($urgencies as $urgency)
                                                                            <option 
                                                                            @if($complain->complain_urgency == $urgency->id)
                                                                            selected
                                                                            @endif
                                                                            value="{{$urgency->id}}">{{$urgency->name}}</option>
                                                                            @endforeach
                                                                        </select>
                                                                        @error('urgensi')
                                                                            <div class="text-danger">{{ $message }}</div>
                                                                        @enderror
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
                                                                    <h4 class="fw-medium text-dark">:</h4>
                                                                </div>
                                                                <div class="col-sm-12 col-md-12 col-lg-12 my-2">
                                                                    <div class="form-group">
                                                                        <textarea name="catatan_penugasan" class="form-control @error('catatan_penugasan') is-invalid @enderror" id="placeholder"
                                                                            placeholder="Masukkan Catatan Penugasan" cols="30" rows="10">{{$complain->latestAssigned->assign_description}}</textarea>
                                                                        @error('catatan_penugasan')
                                                                            <div class="text-danger">{{ $message }}</div>
                                                                        @enderror
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-sm-12 col-md-12 col-lg-12 d-flex align-items-stretch mt-5">
                                                            <div class="row d-flex col-12 d-flex justify-content-between align-items-start">
                                                                <div class="col-6 d-flex">
                                                                    <a href="{{route('keluhanPenugasanDelete',$complain->latestAssigned->id)}}" 
                                                                        data-confirm-delete="true"
                                                                        class="btn waves-effect waves-light btn-danger w-50">Batalkan</a>
                                                                </div>
                                                                <div class="col-6 d-flex justify-content-end">
                                                                    <input type="submit"
                                                                        class="btn waves-effect waves-light btn-primary w-50" value="Tugaskan ulang">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div><!-- /.modal-content -->
                                        </div><!-- /.modal-dialog -->
                                    </div><!-- /.modal -->
                                    @endif
                                @endif
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@else
<!-- If there is no data -->
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
@endif

@endsection
