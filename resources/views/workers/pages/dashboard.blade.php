@extends('workers.layouts.master')

@push('after-style')
<style>
    .card {
    border: none;
    border-radius: 10px
}

.c-details span {
    font-weight: 300;
    font-size: 13px
}

.icon {
    width: 50px;
    height: 50px;
    background-color: #eee;
    border-radius: 15px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 39px
}

.badge span {
    background-color: #fffbec;
    width: 60px;
    height: 25px;
    padding-bottom: 3px;
    border-radius: 5px;
    display: flex;
    color: #fed85d;
    justify-content: center;
    align-items: center
}

.progress {
    height: 10px;
    border-radius: 10px
}

.progress div {
    background-color: red
}

.text1 {
    font-size: 14px;
    font-weight: 600
}

.text2 {
    color: #a5aec0
}
</style>
@endpush
@section('content')
<div class="row">
    <div class="col-md-4">
        <div class="card p-3 mb-2">
            <div class="d-flex justify-content-between">
                <div class="d-flex flex-row align-items-center">
                    <div class="icon"> <i class="bx bxs-paper-plane"></i> </div>
                    <div class="ms-2 c-details">
                        <h6 class="mb-0">Pelaporan Tugas</h6> <span>Lihat detail pada halaman Laporan</span>
                    </div>
                </div>
                <div class="badge"> <span>Penting</span> </div>
            </div>
            <div class="mt-4">
                <h1 class="text-primary">{{$task}}</h1>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card p-3 mb-2">
            <div class="d-flex justify-content-between">
                <div class="d-flex flex-row align-items-center">
                    <div class="icon"> <i class="bx bxs-calendar"></i> </div>
                    <div class="ms-2 c-details">
                        <h6 class="mb-0">Pengajuan Cuti</h6> <span>Lihat detail pada halaman Cuti</span>
                    </div>
                </div>
                <div class="badge"> <span>Penting</span> </div>
            </div>
            <div class="mt-4">
                <h1 class="text-success">{{$cuti}}</h1>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card p-3 mb-2">
            <div class="d-flex justify-content-between">
                <div class="d-flex flex-row align-items-center">
                    <div class="icon"> <i class="bx bx-message-dots"></i> </div>
                    <div class="ms-2 c-details">
                        <h6 class="mb-0">Keluhan</h6> <span>Lihat detail pada halaman Keluhan</span>
                    </div>
                </div>
                <div class="badge"> <span>Penting</span> </div>
            </div>
            <div class="mt-4">
                <h1 class="text-danger">{{$report}}</h1>
            </div>
        </div>
    </div>

</div>

<div class="row mt-3">
    <div class="col-lg-5">
        <h3>Panduan Terbaru</h3>
        <div class="row d-flex flex-row mt-3">
            @foreach ($panduan as $panduan)
                <!-- Panduan -->
                <div class="justify-content-center col-md-8 mx-3 mt-3">
                    <div class="card text-wrap">
                        <div style="position:absolute; top:0; bottom:0;" class="z-1">
                            <img src="{{ $panduan->panduan_image }}" style="position: relative; margin-top: -31px;" class=" p-2" width="100" >   
                        </div>
                        <div class="card-body text-wrap">
                            <div class="d-flex text-white mt-3 flex-wrap text-wrap">
                                <div class="mt-5">
                                    <h6 class="page-title font-weight-medium mb-1 text-break text-wrap" style="color: #0F98D6;">{{ $panduan->panduan_title }}</h6>
                                    <div class="d-flex align-items-end">
                                        <a href="{{ route('workersDetailPanduan', ['id'=>$panduan->id]) }}" class="me-3 px-4 btn btn-primary mt-2 z-1"><h6 class="mb-0">Lihat</h6></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>

@endsection