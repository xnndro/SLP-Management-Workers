@extends('supervisor.layouts.master')

@section('content')
<div class="modal fade" id="image-preview" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myLargeModalLabel">Bukti Penanganan Keluhan : {{$asg->complain->complain_title}}</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
            </div>
            <div class="modal-body d-flex justify-content-center w-auto" style="min-height: 565px">
                <img class="img-fluid" src="{{ asset($asg->submissions->submission_img)}}" id="preview" alt="" style="height:auto; width: 795px">
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div class="page-breadcrumb mt-n5 ms-n4 mb-3">
    <div class="row">
        <div class="col-7 align-self-center">
            <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Ulasan Penanganan
            </h4>
            <div class="d-flex align-items-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb m-0 p-0">
                        <!-- <li class="breadcrumb-item"><a href="index.html" class="text-muted">Apps</a></li> -->
                        <li class="breadcrumb-item text-muted active" aria-current="page">
                            <a href="{{route('keluhan')}}">
                                Daftar Keluhan
                            </a> </li>
                        <li class="breadcrumb-item text-muted active" aria-current="page">Ulasan Penanganan</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-8">
        <div class="card p-3">
            <div class="card-body d-flex flex-column">
                <form class="row gy-4">
                    <div class="col-sm-12 col-md-12 col-lg-12 d-flex align-items-start">
                        <div class="row d-flex col-12">
                            <div class="col-sm-12 col-md-12 col-lg-4">
                                <h5 class="card-title">Judul Keluhan</h4>
                            </div>
                            <div class="d-none d-lg-block col-lg-1">
                                <h5 class="card-title">:</h4>
                            </div>
                            <div class="col-sm-12 col-md-12 col-lg-7">
                                @if ($user->roles_id == 1)
                                    <a class="fw-bold" href="{{route('keluhanShow',$asg->complain->id)}}">{{$asg->complain->complain_title}}</a>
                                @else
                                    <a class="fw-bold" href="{{route('keluhanPenangananShow',$asg->id)}}">{{$asg->complain->complain_title}}</a>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-12 col-md-12 col-lg-12 d-flex align-items-start">
                        <div class="row d-flex col-12">
                            <div class="col-sm-6 col-md-6 col-lg-4">
                                <h5 class="card-title">Tanggal Dikerjakan</h4>
                            </div>
                            <div class="d-none d-lg-block col-lg-1">
                                <h5 class="card-title">:</h4>
                            </div>
                            <div class="col-sm-12 col-md-12 col-lg-7">
                                <div class="input-group">
                                    <div class="form-group">
                                        <h5>{{$asg->submissions->created_at}} WIB</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-12 col-md-12 col-lg-12 d-flex align-items-start">
                        <div class="row d-flex col-12">
                            <div class="col-sm-6 col-md-6 col-lg-4">
                                <h5 class="card-title">Catatan Penanganan</h4>
                            </div>
                            <div class="d-none d-lg-block col-lg-1">
                                <h5 class="card-title">:</h4>
                            </div>
                            <div class="col-sm-12 col-md-12 col-lg-12 my-2">
                                <div class="form-group">
                                    <textarea class="form-control" id="placeholder" disabled
                                        placeholder="Masukkan Deskripsi Keluhan" cols="30" rows="10"
                                        disabled>{{$asg->submissions->submission_description}}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-12 col-md-12 col-lg-12 d-flex align-items-start">
                        <div class="row d-flex col-12">
                            <div class="col-sm-6 col-md-6 col-lg-4">
                                <h5 class="card-title">Bukti Penanganan</h4>
                            </div>
                            <div class="d-none d-lg-block col-lg-1">
                                <h5 class="card-title">:</h4>
                            </div>
                            <div class="col-sm-12 col-md-12 col-lg-12 my-2">
                                <div class="input-group flex-nowrap">
                                    <div class="custom-file w-100">
                                        <input class="form-control" type="text" id="formFile" disabled
                                            value="{{str_replace("/storage/uploads/penanganan/", "", $asg->submissions->submission_img)}}">
                                        {{-- <input class="form-control" type="text" id="formFile"
                                            value="{{asset('../../assets/images/img2.jpg')}}"> --}}
                                    </div>
                                    <button class="btn btn-outline-secondary" data-bs-toggle="modal"
                                        data-bs-target="#image-preview" type="button">
                                        Lihat
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-12 col-md-12 col-lg-12 d-flex align-items-start">
                        <div class="row d-flex col-12">
                            <div class="col-sm-6 col-md-6 col-lg-4">
                                <h5 class="card-title">Ulasan</h4>
                            </div>
                            <div class="d-none d-lg-block col-lg-1">
                                <h5 class="card-title">:</h4>
                            </div>
                            <div class="col-sm-12 col-md-12 col-lg-12 my-2">
                                <div class="form-group">
                                    <textarea name="ulasan" class="form-control @error('ulasan') is-invalid @enderror" id="placeholder" disabled
                                        placeholder="Masukkan catatan penanganan" cols="30" rows="10">{{$asg->submissions->submission_feedback}}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-12 col-md-12 col-lg-12 d-flex align-items-stretch mt-5">
                        <div class="row d-flex col-12 d-flex justify-content-between align-items-start">
                            <div class="col-12">
                                @if ($user->roles_id == 1)
                                <a href="{{route('keluhan')}}"
                                    class="btn waves-effect waves-light btn-outline-primary w-25">Kembali</a>
                                @else
                                <a href="{{route('keluhanPenanganan')}}"
                                    class="btn waves-effect waves-light btn-outline-primary w-25">Kembali</a>
                                @endif
                            </div>

                        </div>
                    </div>

                    <div class="col-sm-12 col-md-12 col-lg-12 d-flex align-items-start mt-5 mb-n4">
                        <img style="width: 250px;" src="{{asset('../../assets/images/sapu-form.png')}}" alt="">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
