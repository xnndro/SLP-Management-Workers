@extends('supervisor.layouts.master')

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
                        <h6 class="mb-0">Task Submission</h6> <span>See Details on Laporan Kerja Page</span>
                    </div>
                </div>
                <div class="badge"> <span>Important</span> </div>
            </div>
            <div class="mt-4">
                <h1 class="text-danger">{{$task}}</h1>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card p-3 mb-2">
            <div class="d-flex justify-content-between">
                <div class="d-flex flex-row align-items-center">
                    <div class="icon"> <i class="bx bxs-calendar"></i> </div>
                    <div class="ms-2 c-details">
                        <h6 class="mb-0">Paid Leave Request</h6> <span>See Details on Cuti Page</span>
                    </div>
                </div>
                <div class="badge"> <span>Important</span> </div>
            </div>
            <div class="mt-4">
                <h1 class="text-danger">{{$cuti}}</h1>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card p-3 mb-2">
            <div class="d-flex justify-content-between">
                <div class="d-flex flex-row align-items-center">
                    <div class="icon"> <i class="bx bx-message-dots"></i> </div>
                    <div class="ms-2 c-details">
                        <h6 class="mb-0">Keluhan</h6> <span>See Details on Keluhan Page</span>
                    </div>
                </div>
                <div class="badge"> <span>Important</span> </div>
            </div>
            <div class="mt-4">
                <h1 class="text-danger">{{$cuti}}</h1>
            </div>
        </div>
    </div>

</div>

@endsection