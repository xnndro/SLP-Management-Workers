@extends('supervisor.layouts.master')

@section('content')
<form action="{{ route('updatePanduan', ['id'=>$panduan->id]) }}" method="post" id='form' enctype="multipart/form-data">
    @csrf
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 align-self-center">
                <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Ubah Panduan</h4>
                <!-- PATH -->
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb m-0 p-0">
                            <li class="breadcrumb-item"><a style="color: #5F76E8;" href="{{ route('supervisorPanduan') }}" >Panduan</a></li>
                            <li class="breadcrumb-item text-muted active" aria-current="page">Ubah Panduan</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    {{-- Form --}}
    <div class="row col-md-12">
        <div class="col-lg-12 d-flex align-items-center justify-content-center">
            <div class="card" style="box-shadow: 0 1px 1px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
                <div class="card-body col-lg-12">
                    <form action="">
                        <div class="mb-3 row justify-content-between">
                            <label class="col-sm-4 col-form-label" style="color: #5F76E8;">Judul Panduan</label>
                            <div class="col-sm-8">
                            <input type="text" class="form-control" name="title" id="input" value="{{ $panduan->panduan_title }}">
                            </div>
                        </div>
                        <div class="mb-3 row justify-content-between">
                            <label class="col-sm-5 col-form-label" style="color: #5F76E8;">Posisi</label>
                            <div class="col-sm-5">
                                <select id="select" name="role_id" class="custom-select form-control bg-white custom-radius custom-shadow border-0">
                                    <option value="select">Select role</option>
                                    @foreach (\App\Models\Roles::all() as $role)
                                        @if ($panduan->role_id == $role->id)
                                            <option value="{{ $role->id }}" selected>{{ $role->role_name }}</option>
                                        @else
                                            <option value="{{ $role->id }}">{{ $role->role_name }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>  
                        <div class="mb-3 row">
                            <label for="textarea" class="col-sm-7 col-form-label" style="color: #5F76E8;">Hal yang perlu diperhatikan</label>
                            <div class="form-group">
                                <textarea class="form-control" rows="10" name="content" type="text" id="input" >{{ $panduan->panduan_content }}</textarea>
                            </div>
                        </div>
                        
                        {{-- Button --}}
                        <div class="d-flex justify-content-between">
                            {{-- <a href="{{ route('deletePanduan', $panduan->id) }}" style="background-color: transparent; color: #ff4f70;" class="ms-3" data-confirm-delete="true" class="btn-circle-lg"><i class="fa fa-trash"></i></a> --}}
                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                <button  type="submit" class="px-3 btn btn-primary">Simpan</button>
                                <a href="{{ route('supervisorPanduan') }}" class="px-3 btn btn-dark">Batalkan</a>
                            </div>
                        </div>
                    </form>
                </div>
                <img style="width: 250px;" src="{{asset('../../assets/images/sapu-form.png')}}" alt="">
            </div>
        </div>
    </div>
</form>
@endsection