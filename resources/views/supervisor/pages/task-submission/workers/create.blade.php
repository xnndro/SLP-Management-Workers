@extends('supervisor.layouts.master')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <h3 class="mb-3">Tambahkan Pekerja</h3>
        <div class="card">
            <div class="card-body">
                <form action="">
                    <div class="mb-3 row">
                        <label for="staticEmail" class="col-sm-2 col-form-label">Nama</label>
                        <div class="col-sm-10">
                        <input type="text" class="form-control" id="staticEmail" value="email@example.com">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="staticEmail" class="col-sm-2 col-form-label">Posisi</label>
                        <div class="col-sm-10">
                        <input type="text" class="form-control" id="staticEmail" value="email@example.com">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="staticEmail" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                        <input type="text" class="form-control" id="staticEmail" value="email@example.com">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
                        <div class="col-sm-10">
                        <input type="password" class="form-control" id="inputPassword">
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