@extends('supervisor.layouts.master')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <h3 class="mb-3">Tambahkan Pekerja</h3>
        <div class="card">
            <div class="card-body">
                <form action="{{route('workersStore')}}" method="POST">
                    @csrf
                    <div class="mb-3 row">
                        <label for="staticEmail" class="col-sm-2 col-form-label">Nama</label>
                        <div class="col-sm-10">
                        <input type="text" class="form-control" id="staticEmail" name="name" required>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="staticEmail" class="col-sm-2 col-form-label">Posisi</label>
                        <div class="col-sm-10">
                        <select class="form-select" aria-label="Default select example" name="role">
                            @foreach($role as $role)
                                <option value="{{$role->id}}">{{$role->role_name}}</option>
                            @endforeach
                        </select>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="staticEmail" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                        <input type="text" class="form-control" id="staticEmail" name="email" required>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
                        <div class="col-sm-10">
                        <input type="password" class="form-control" id="inputPassword" name="password" required>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        {{-- nik --}}
                        <label for="staticEmail" class="col-sm-2 col-form-label">NIK</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="staticEmail" name="nik" required>
                        </div>
                    </div>

                    <!-- 2 button in div and that div is on right side -->
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <button type="submit" class="btn btn-primary">Tambahkan</button>
                        <a href="{{route('workers')}}" class="btn btn-dark">Batalkan</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection