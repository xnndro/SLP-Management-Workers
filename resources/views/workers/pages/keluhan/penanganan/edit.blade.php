@extends('workers.layouts.master')

@section('content')
<!-- Modal for image preview -->
<div class="modal fade" id="image-preview" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myLargeModalLabel">IMG-2008-05-13T22:33:00</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
            </div>
            <div class="modal-body">
                <img class="img-fluid" id="preview" width="auto">
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div class="page-breadcrumb mt-n5 ms-n4 mb-3">
    <div class="row">
        <div class="col-7 align-self-center">
            <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Edit Penanganan Keluhan
            </h4>
            <div class="d-flex align-items-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb m-0 p-0">
                        <!-- <li class="breadcrumb-item"><a href="index.html" class="text-muted">Apps</a></li> -->
                        <li class="breadcrumb-item text-muted active" aria-current="page">
                            <a href="{{route('keluhanPenanganan')}}">
                                Daftar Penanganan Keluhan
                            </a> </li>
                        <li class="breadcrumb-item text-muted active" aria-current="page">Edit Penanganan Keluhan</li>
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
                            <div class="col-sm-12 col-md-12 col-lg-4">
                                <h5 class="card-title">Judul Keluhan</h4>
                            </div>
                            <div class="d-none d-lg-block col-lg-1">
                                <h5 class="card-title">:</h4>
                            </div>
                            <div class="col-sm-12 col-md-12 col-lg-7">
                                <a href="{{route('keluhanPenangananShow')}}">Air Urinoir Tidak Keluar</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-12 col-md-12 col-lg-12 d-flex align-items-start">
                        <div class="row d-flex col-12">
                            <div class="col-sm-6 col-md-6 col-lg-4">
                                <h5 class="card-title">Catatan Penugasan</h4>
                            </div>
                            <div class="d-none d-lg-block col-lg-1">
                                <h5 class="card-title">:</h4>
                            </div>
                            <div class="col-sm-12 col-md-12 col-lg-12 my-2">
                                <div class="form-group">
                                    <textarea class="form-control" id="placeholder"
                                        placeholder="Masukkan Deskripsi Keluhan" cols="30" rows="10"
                                        readonly>Tolong diapakan dulu apa itu supaya ga apa kali apanya</textarea>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="col-sm-12 col-md-12 col-lg-12 d-flex align-items-start">
                        <div class="row d-flex col-12">
                            <div class="col-sm-6 col-md-6 col-lg-4">
                                <h5 class="card-title">Waktu Dikerjakan</h4>
                            </div>
                            <div class="d-none d-lg-block col-lg-1">
                                <h5 class="card-title">:</h4>
                            </div>
                            <div class="col-sm-12 col-md-12 col-lg-7 mt-lg-n2">
                                <div class="input-group">
                                    <div class="form-group">
                                        <input type="datetime-local" class="form-control w-100"
                                            value="2008-05-13T22:33:00">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-12 col-md-12 col-lg-12 d-flex align-items-start">
                        <div class="row d-flex col-12">
                            <div class="col-sm-6 col-md-6 col-lg-5">
                                <h5 class="card-title">Catatan Penanganan</h4>
                            </div>
                            <div class="d-none d-lg-block col-lg-1">
                                <h5 class="card-title">:</h4>
                            </div>
                            <div class="col-sm-12 col-md-12 col-lg-12 my-2">
                                <div class="form-group">
                                    <textarea class="form-control" id="placeholder"
                                        placeholder="Masukkan Catatan Penanganan" cols="30"
                                        rows="10">Sudah Siap Bos</textarea>
                                </div>
                            </div>

                        </div>
                    </div>



                    <div class="col-sm-12 col-md-12 col-lg-12 d-flex align-items-start">
                        <div class="row d-flex col-12">
                            <div class="col-sm-6 col-md-6 col-lg-6">
                                <h5 class="card-title">Unggah Bukti Penanganan</h4>
                            </div>
                            <div class="d-none d-lg-block col-lg-1">
                                <h5 class="card-title">:</h4>
                            </div>
                            <div class="col-sm-12 col-md-12 col-lg-12 my-2">
                                <div class="input-group flex-nowrap">
                                    <div class="custom-file w-100">
                                        <input class="form-control" type="file" id="formFile"
                                            value="{{asset('../../assets/images/img2.jpg')}}">
                                    </div>
                                    <button class="btn btn-outline-secondary" data-bs-toggle="modal"
                                        data-bs-target="#image-preview" type="button">
                                        Lihat
                                    </button>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="col-sm-12 col-md-12 col-lg-12 d-flex align-items-stretch mt-5">
                        <div class="row d-flex col-12 d-flex justify-content-between align-items-start">
                            <div class="col-6">
                                <a href="{{route('keluhanPenanganan')}}"
                                    class="btn waves-effect waves-light btn-outline-primary w-75">Kembali</a>
                            </div>
                            <div class="col-6 d-flex justify-content-end">
                                <button type="button"
                                    class="btn waves-effect waves-light btn-primary w-75">Simpan</button>
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
