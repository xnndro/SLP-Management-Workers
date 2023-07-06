@extends('supervisor.layouts.master')

@section('content')
<form action="{{ route('updateInventaris', ['id'=>$inventory->id]) }}" method="post" id='form' enctype="multipart/form-data">
    @csrf
    <div class="page-breadcrumb mb-4">
        <div class="row">
            <div class="col-12 align-self-center">
                <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Ubah Inventaris</h4>
                <!-- PATH -->
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb m-0 p-0">
                            <li class="breadcrumb-item"><a style="color: #5F76E8;" href="{{ route('supervisorInventaris') }}">Inventaris</a></li>
                            <li class="breadcrumb-item text-muted active" aria-current="page">Ubah Inventaris</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="row col-md-12">
        <div class="col-lg-12 d-flex align-items-center justify-content-center">
            <div class="card" style="box-shadow: 0 1px 1px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
                <div class="card-body col-lg-12">
                    <form action="">
                        <div class="mb-4 container col-md-12 align-items-center d-flex justify-content-center" style="position: relative">
                            <div class="center d-flex justify-content-center align-items-center" style="margin: 10px 0px 20px 0px; background-color: #fcfdfa; padding: 30px; align-content: center;
                            flex-direction: column; border: 3px dotted #a3a3a3; border-radius: 5px;">
                                <header style="color: #5F76E8;">
                                    <h4>Ubah Foto</h4>
                                </header>
                                <form class="mt-10">
                                    <div class="input-group flex-nowrap">
                                        <div class="custom-file w-100">
                                            <input class="form-control @error('filegambar') is-invalid @enderror" value="{{  $inventory->inventaris_image }}" type="file" name="filegambar">
                                            @error('filegambar')
                                                    <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-sm-2 col-form-label" style="color: #5F76E8;">Nama</label>
                            <div class="col-sm-10">
                            <input type="text" class="form-control" name="nama" id="input" value="{{ $inventory->inventaris_name }}">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="textarea" class="col-sm-3 col-form-label" style="color: #5F76E8;">Deskripsi</label>
                            <div class="form-group">
                                <textarea class="form-control" rows="4" name="deskripsi" type="text" id="input">{{ $inventory->inventaris_description }}</textarea>
                            </div>
                        </div>
                        
                        <div class="mb-3 row">
                            <label class="col-sm-2 col-form-label" style="color: #5F76E8;">Total</label>
                            <div class="col-sm-10">
                            <input type="number" class="form-control" name="total" id="input" value="{{ $inventory->inventaris_total }}">
                            </div>
                        </div>
                        <div class="mb-3 row justify-content-between">
                            <label class="col-sm-5 col-form-label" style="color: #5F76E8;" >Dapat dilihat oleh</label>
                            <div class="col-sm-5">
                                <select id="select" name="role_id" class="custom-select form-control bg-white custom-radius custom-shadow border-0">
                                    @foreach (\App\Models\Roles::all() as $role)
                                        @if ($inventory->role_id == $role->id)
                                            <option value="{{ $role->id }}" selected>{{ $role->role_name }}</option>
                                        @else
                                            <option value="{{ $role->id }}">{{ $role->role_name }}</option>
                                        @endif
                                    @endforeach
                                </optgroup>
                            </select>
                            </div>
                        </div>    
                        
                        {{-- Button --}}
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <button class="px-3 btn btn-primary">Simpan</button>
                            <a href="{{ route('supervisorInventaris') }}" class="px-3 btn btn-dark">Batalkan</a>
                        </div>
                    </form>
                </div>
                <img style="width: 250px;" src="{{asset('../../assets/images/sapu-form.png')}}" alt="">
            </div>
        </div>
    </div>
</form>

@endsection