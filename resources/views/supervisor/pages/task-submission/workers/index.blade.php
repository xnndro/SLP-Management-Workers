@extends('supervisor.layouts.master')

@section('content')
<div class="row">
    <div class="col-lg-6">
        <h3>Daftar Pekerja</h3>
    </div>
    <!-- button at right side -->
    <div class="col-lg-6">
        <div class="text-lg-end mt-3 mt-lg-0">
            <a href="{{route('workersCreate')}}" class="btn text-white me-2" style="background-color: #31CFD2;">Tambah Pekerja</a>
        </div>      
    </div>
</div>
<div class="row">
    <div class="col-md-6 col-lg-3 col-xlg-3">
        <div class="card border-end card-hover bg-primary overflow-hidden">
            <div class="card-body">
                <div class="d-flex text-white">
                    <div>
                        <img src="../../assets/images/pending-icon.svg" class="rounded-circle m-n5" width="150">   
                    </div>
                    <div class="ms-auto">
                        <h6 class="font-weight-normal text-truncate">Total Pekerja</h6>
                        <div class="d-flex align-items-center">
                            <h2 class="text-white font-weight-medium">236</h2>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
    <div class="col-md-6 col-lg-3 col-xlg-3">
        <div class="card border-end card-hover bg-danger overflow-hidden">
            <div class="card-body">
                <div class="d-flex text-white">
                    <div>
                        <img src="../../assets/images/write-icon.svg" class="rounded-circle m-n5" width="150">   
                    </div>
                    <div class="ms-auto">
                        <h6 class="font-weight-normal text-truncate">Pekerja Aktif</h6>
                        <div class="d-flex align-items-center">
                            <h2 class="text-white font-weight-medium">236</h2>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
    <div class="col-md-6 col-lg-3 col-xlg-3">
        <div class="card border-end card-hover bg-success overflow-hidden">
            <div class="card-body">
                <div class="d-flex text-white">
                    <div>
                        <img src="../../assets/images/success-box.svg" class="rounded-circle m-n5" width="150">   
                    </div>
                    <div class="ms-auto">
                        <h6 class="font-weight-normal text-truncate">Pekerja Cuti</h6>
                        <div class="d-flex align-items-center">
                            <h2 class="text-white font-weight-medium">236</h2>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>

</div>

<div class="row">
   
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <!-- <h4 class="card-title">Pekerja</h4> -->
                <div class="table-responsive">
                    <table id="multi_col_order"
                        class="table border table-striped table-bordered text-nowrap" style="width:100%">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nama</th>
                                <th>Posisi</th>
                                <th>Status</th>
                                <th>Tanggal Bergabung</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Yanto</td>
                                <td>Aktif</td>
                                <td>HouseKeeping</td>
                                <td>09-09-2023</td>
                                <td>
                                    <a href="{{route('workersEdit')}}" class="btn btn-sm btn-warning">Edit</a>
                                    <a href="" class="btn btn-sm btn-danger" data-confirm-delete="true">Delete</a>
                                    <a href="{{route('workersSchedule')}}" class="btn btn-sm btn-primary">Lihat Jadwal</a>
                                </td>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>Yadi</td>
                                <td>Aktif</td>
                                <td>Cleaning</td>
                                <td>09-09-2023</td>
                                <td>
                                    <a href="{{route('workersEdit')}}" class="btn btn-sm btn-warning">Edit</a>
                                    <a href="" class="btn btn-sm btn-danger" data-confirm-delete="true">Delete</a>
                                    <a href="{{route('workersSchedule')}}" class="btn btn-sm btn-primary">Lihat Jadwal</a>
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
                    <lottie-player src="https://assets9.lottiefiles.com/packages/lf20_yxrxjnkt.json"  background="transparent"  speed="1"  style="width: 300px; height: 300px;"  loop  autoplay></lottie-player>
                    <h5 class="mt-n2">Belum ada pekerja yang ditambahkan</h5>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection