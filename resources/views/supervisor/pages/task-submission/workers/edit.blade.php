@extends('supervisor.layouts.master')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <h3 class="mb-3">Ubah Pekerja</h3>
        <div class="card">
            <div class="card-body">
                <form action="{{route('workersUpdate',$worker->id)}}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3 row">
                        <label for="staticEmail" class="col-sm-2 col-form-label">Nama</label>
                        <div class="col-sm-10">
                        <input type="text" class="form-control" id="staticEmail" value="{{$worker->name}}" name="nama">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="staticEmail" class="col-sm-2 col-form-label">Posisi</label>
                        <div class="col-sm-10">
                        {{-- select option with role selected id --}}
                        <select class="form-select" aria-label="Default select example" name="role">
                            @foreach($role as $role)
                                <option value="{{$role->id}}" @if($role->id == $worker->roles_id) selected @endif>{{$role->role_name}}</option>
                            @endforeach
                        </select>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="staticEmail" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                        <input type="text" class="form-control" id="staticEmail" value="{{$worker->email}}" name="email">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="staticEmail" class="col-sm-2 col-form-label">NIK</label>
                        <div class="col-sm-10">
                        <input type="text" class="form-control" id="staticEmail" value="{{$worker->user_nik}}" name="nik">
                        </div>
                    </div>

                    <!-- 2 button in div and that div is on right side -->
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <button type="submit" class="btn btn-primary">Ubah</button>
                        <a href="{{route('workers')}}" class="btn btn-dark">Batalkan</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection