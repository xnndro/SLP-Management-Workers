@extends('supervisor.layouts.master')

@section('content')
<div class="row">
    <div class="col-sm-12 col-md-6">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Unggah Jadwal</h4>
                <form class="mt-4">
                    <div class="input-group flex-nowrap">
                        <div class="custom-file w-100">
                             <input class="form-control" type="file" id="formFile">
                        </div>
                        <button class="btn btn-outline-primary" type="button">
                            Unggah
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Riwayat</h4>
                <div class="table-responsive">
                    <table id="multi_col_order"
                        class="table border table-striped table-bordered text-nowrap" style="width:100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Bulan</th>
                                <th>Terakhir Diubah</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Januari</td>
                                <td>09-09-2023</td>
                                <td>
                                    <a href="javascript:void(0)" class="btn btn-sm btn-warning">Edit</a>
                                    <a href="javascript:void(0)" class="btn btn-sm btn-danger">Delete</a>
                                </td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Januari</td>
                                <td>09-09-2023</td>
                                <td>
                                    <a href="javascript:void(0)" class="btn btn-sm btn-warning">Edit</a>
                                    <a href="javascript:void(0)" class="btn btn-sm btn-danger">Delete</a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- If there is no schedulle added -->
<div class="row">    
    <div class="col-lg-12 mt-3">
        <div class="card">
            <div class="d-flex justify-content-center align-items-center flex-wrap mb-5">
                <div class="text-center">
                    <lottie-player src="https://assets10.lottiefiles.com/packages/lf20_vyL7gxqRAH.json"  background="transparent"  speed="1"  style="width: 300px; height: 300px;"  loop  autoplay></lottie-player>
                    <h5 class="mt-n5">Belum ada jadwal yang ditambahkan</h5>
                </div>
            </div>
        </div>
    </div>
</div>
    
@endsection