@extends('supervisor.layouts.master')

@section('content')
<div class="d-flex row gap-3 mt-10">
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-lg-8 mb-4">
                <h4 class="page-title text-truncate text-dark font-weight-medium">Panduan</h4>
                <a href="{{ route('createPanduan') }}" class="col-md-3 mt-3 btn btn-success"><h6 class="m-1">Tambah Panduan</h6></a>
            </div>
            <form class="col-sm-4">
                <div class="customize-input">
                    <div class="d-flex justify-content-end align-items-center">
                        <input class="form-control custom-shadow custom-radius border-0 bg-white" type="search" placeholder="Search" aria-label="Search" name="search">
                        <svg style="position:absolute;" class="z-1 m-2 p-1" xmlns="http://www.w3.org/2000/svg" width="24" position="absolute" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search form-control-icon"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
                    </div>
                </div>
            </form>
        </div>
    </div>

    @forelse ($panduans as $panduan)
    <!-- Panduan -->
        <div class="justify-content-center col-md-3 mx-3 ms-5">
            <div class="card text-wrap">
                <div style="position:absolute; top:0; bottom:0;" class="z-1">
                    <img src="{{ $panduan->panduan_image }}" style="position: relative; margin-top: -31px;" class=" p-2" width="100" >   
                </div>
                <div class="card-body text-wrap">
                    <div class="d-flex text-white mt-3 flex-wrap text-wrap">
                        <div class="mt-5">
                            <h6 class="page-title font-weight-medium mb-1 text-break text-wrap" style="color: #0F98D6;">{{ $panduan->panduan_title }}</h6>
                            <div class="d-flex align-items-end">
                                <a href="{{ route('supervisorDetailPanduan', ['id'=>$panduan->id]) }}" class="me-3 px-4 btn btn-primary mt-2 z-1"><h6 class="mb-0">Lihat</h6></a>
                                {{-- <a href="{{ route('deletePanduan', $panduan->id) }}" style="background-color: transparent; color: #ff4f70;" class="ms-3 btn-circle-lg"><i data-confirm-delete="true" class="fa fa-trash"></i></a> --}}
                                <form action="{{route('deletePanduan', $panduan->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger">Hapus</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @empty
    <!-- If there is no panduan -->
        <div class="row">    
            <div class="col-lg-12 mt-3">
                <div class="card">
                    <div class="d-flex justify-content-center align-items-center flex-wrap mb-5">
                        <div class="text-center">
                            <lottie-player src="https://assets3.lottiefiles.com/packages/lf20_7ifso9nc.json"  background="transparent"  speed="1"  style="width: 300px; height: 300px;"  loop  autoplay></lottie-player>
                            <h5 class="mt-n2">Belum ada panduan yang ditambahkan</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforelse
</div>

@endsection