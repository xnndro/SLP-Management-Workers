@extends('workers.layouts.master')

@section('content')
<div class="page-breadcrumb mt-n5 ms-n4 mb-3">
    <div class="row">
        <div class="col-7 align-self-center">
            <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Formulir Pelaporan Keluhan
            </h4>
            <div class="d-flex align-items-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb m-0 p-0">
                        <!-- <li class="breadcrumb-item"><a href="index.html" class="text-muted">Apps</a></li> -->
                        <li class="breadcrumb-item text-muted active" aria-current="page">
                            <a href="{{route('keluhanPelaporan')}}">
                                Daftar Pelaporan Keluhan
                            </a> </li>
                        <li class="breadcrumb-item text-muted active" aria-current="page">Formulir Pelaporan Keluhan</li>
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
                            <div class="col-sm-6 col-md-6 col-lg-4">
                                <h5 class="card-title">Jenis Keluhan</h4>
                            </div>
                            <div class="d-none d-lg-block col-lg-1">
                                <h5 class="card-title">:</h4>
                            </div>
                            <div class="col-sm-0 col-md-0 col-lg-7 mt-lg-n2">
                                <div class="input-group">
                                    <select class="form-select" id="inputGroupSelect01">
                                        <option selected="">Pilih...</option>
                                        <option value="1">Inventaris</option>
                                        <option value="2">Fasilitas</option>
                                    </select>
                                </div>
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
                            <div class="col-sm-12 col-md-12 col-lg-7 mt-lg-n2">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="placeholder"
                                        placeholder="Masukkan Judul Keluhan">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-12 col-md-12 col-lg-12 d-flex align-items-start">
                        <div class="row d-flex col-12">
                            <div class="col-sm-6 col-md-6 col-lg-4">
                                <h5 class="card-title">Deskripsi Keluhan</h4>
                            </div>
                            <div class="d-none d-lg-block col-lg-1">
                                <h5 class="card-title">:</h4>
                            </div>
                            <div class="col-sm-12 col-md-12 col-lg-12 my-2">
                                <div class="form-group">
                                    <textarea class="form-control" id="placeholder"
                                        placeholder="Masukkan Deskripsi Keluhan" cols="30" rows="10"></textarea>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="col-sm-12 col-md-12 col-lg-12 d-flex align-items-start">
                        <div class="row d-flex col-12">
                            <div class="col-sm-6 col-md-6 col-lg-4">
                                <h5 class="card-title">Lokasi</h4>
                            </div>
                            <div class="d-none d-lg-block col-lg-1">
                                <h5 class="card-title">:</h4>
                            </div>
                            <div class="col-sm-0 col-md-0 col-lg-7 mt-n2">
                                <div class="input-group">
                                    <label class="input-group-text" for="inputGroupSelect01">Di</label>
                                    <select class="form-select" id="inputGroupSelect01">
                                        <option selected="">Pilih...</option>
                                        <option value="1">Tower A - R1001</option>
                                        <option value="2">Tower A - R1002</option>
                                    </select>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="col-sm-12 col-md-12 col-lg-12 d-flex align-items-stretch mt-5">
                        <div class="row d-flex col-12 d-flex justify-content-between align-items-start">
                            <div class="col-6">
                                <a href="{{route('keluhanPelaporan')}}"
                                    class="btn waves-effect waves-light btn-outline-primary w-75">Kembali</a>
                            </div>
                            <div class="col-6 d-flex justify-content-end">
                                <button type="button"
                                    class="btn waves-effect waves-light btn-primary w-75">Kirim</button>
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
