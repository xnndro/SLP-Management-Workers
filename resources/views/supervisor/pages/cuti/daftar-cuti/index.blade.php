@extends('supervisor.layouts.master')
@section('content')

    <!-- Start Title -->
    <div class="row">
        <div class="col-lg-12">
            <h2 class="text-black fw-500"></h2>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <h4></h4>
        </div>
    </div>
    <!-- End Title -->
    <div class="row" style="background-color: #31CFD2;margin-top: 10vh;">
        <div class="col-lg-12 d-flex flex-row justify-content-between">
            <div class="col-lg-4 d-flex justify-content-center align-items-center bottom-0 position-relative" style="margin-bottom: 17.5vh;">
                <img src="{{asset('../../assets/images/list-cuti-icon.svg')}}" alt="" class="img-fluid position-absolute">
            </div>
            <div class="col-lg-4 d-flex justify-content-center align-items-center">
                 <div class="form-group">
                     <h5 class="text-black">Cari Berdasarkan nama</h5>
                     <form action="" method="get">
                         <div class="input-group">
                             <input type="text" class="form-control" name="search_nama_posisi" placeholder="Nama / Posisi">
                             <button class="input-group-text btn btn-outline-secondary" type="submit" id="button-addon2">Cari</button>
                         </div>
                     </form>
                 </div>
            </div>
            <div class="col-lg-4 d-flex justify-content-center align-items-center">
                <div class="form-group">
                    <h5 class="text-black">Cari Berdasarkan Tanggal</h5>
                    <form action="" method="get">
                        <div class="input-group">
                            <input type="date" class="form-control" name="search_tanggal" placeholder="MM/DD/YYYY" >
                            <button class="input-group-text btn btn-outline-secondaryy" type="submit" id="button-addon2">Cari</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-5">
        <div class="col-lg-3 col-sm-12 sm-d-flex">
            <div class="row">
                <div class="col-lg-12 col-sm-6 mb-3">
                    <div class="card border-end card-hover bg-primary overflow-hidden my-3 my-sm-2">
                        <div class="card-body">
                            <div class="d-flex text-white">
                                <div>
                                    <img src="{{asset('../../assets/images/umum-icon.png')}}" class="ms-1" width="auto">   
                                </div>
                                <div class="ms-auto">
                                    <h6 class="font-weight-normal text-truncate">Cuti Umum</h6>
                                    <div class="d-flex align-items-center">
                                        <h2 class="text-white font-weight-medium">{{$umum}}</h2>
                                        <p class="text-white font-weight-medium ms-2 mb-2">rec</p>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div> 
                </div>
                <div class="col-lg-12 col-sm-6 mb-3">
                    <div class="card border-end card-hover bg-success overflow-hidden my-3 my-sm-2">
                        <div class="card-body">
                            <div class="d-flex text-white">
                                <div>
                                    <img src="{{asset('../../assets/images/hamil-icon.png')}}" class="" width="100">   
                                </div>
                                <div class="ms-auto">
                                    <h6 class="font-weight-normal text-truncate">Cuti Kehamilan</h6>
                                    <div class="d-flex align-items-center">
                                        <h2 class="text-white font-weight-medium">{{$mm}}</h2>
                                        <p class="text-white font-weight-medium ms-2 mb-2">rec</p>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 col-sm-6 mb-3">
                    <div class="card border-end card-hover bg-danger overflow-hidden my-3 my-sm-2">
                        <div class="card-body">
                            <div class="d-flex text-white">
                                <div>
                                    <img src="{{asset('../../assets/images/kesehatan-icon.svg')}}" class="" width="100">   
                                </div>
                                <div class="ms-auto">
                                    <h6 class="font-weight-normal text-truncate">Cuti Kesehatan</h6>
                                    <div class="d-flex align-items-center">
                                        <h2 class="text-white font-weight-medium">{{$kesehatan}}</h2>
                                        <p class="text-white font-weight-medium ms-2 mb-2">rec</p>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 col-sm-6 mb-3">
                    <div class="card border-end card-hover bg-warning overflow-hidden my-3 my-sm-2">
                        <div class="card-body">
                            <div class="d-flex text-white">
                                <div>
                                    <img src="{{asset('../../assets/images/pending-icon.svg')}}" class="rounded-circle m-n5" width="150">   
                                </div>
                                <div class="ms-auto">
                                    <h6 class="font-weight-normal text-truncate">Cuti Kedukaan</h6>
                                    <div class="d-flex align-items-center">
                                        <h2 class="text-white font-weight-medium">{{$kedukaan}}</h2>
                                        <p class="text-white font-weight-medium ms-2 mb-2">rec</p>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-8  col-sm-12">
            <!-- Start Table -->
            @if(count($data) > 0 )    
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="multi_col_order"
                                        class="table border table-striped table-bordered text-nowrap" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Nama Karyawan</th>
                                                <th>Posisi</th>
                                                <th>Detail</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($data as $data)    
                                                <tr>
                                                    <td>CT00{{$data->id}}</td>
                                                    <td>{{$data->user->name}}</td>
                                                    <td>{{$data->user->roles->role_name}}</td>
                                                    <td>
                                                        <button type="button" class=" btn border-0" data-bs-toggle="modal" data-bs-target="#detail{{$data->id}}">
                                                            <img src="{{asset('../../assets/images/detail-icon.svg')}}" alt="" srcset="">
                                                        </button>
                                                    </td>
                                                </tr>

                                                <!--  Start Modal -->
                                                <div class="modal fade" id="detail{{$data->id}}" value="{{$data->id}}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-md rounded-5">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <div class="row align-items-center d-flex" style="width:80vh">
                                                                    <div class="col-12 text-center">
                                                                        <h4 class="modal-title text-black text-center" id="myLargeModalLabel">Detail Cuti Pekerja</h4>
                                                                    </div>
                                                                </div>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form action="">
                                                                    <div class="mb-3 row">
                                                                        <label for="idCuti" class="col-sm-4 col-form-label">ID</label>
                                                                        <div class="col-sm-8">
                                                                            <input type="text" class="form-control disable" id="idCuti" value="CT00{{$data->id}}" placeholder="Nama Lengkap" disabled>
                                                                        </div>
                                                                    </div>
                                                                    <div class="mb-3 row">
                                                                        <label for="tanggalPengajuan" class="col-sm-4 col-form-label">Pengajuan</label>
                                                                        <div class="col-sm-8">
                                                                        <input type="date" class="form-control" id="idCuti" value="{{$data->created_at->format('Y-m-d')}}" disabled>
                                                                        </div>
                                                                    </div>
                                                                    <div class="mb-3 row">
                                                                        <label for="fullName" class="col-sm-4 col-form-label">Nama Lengkap</label>
                                                                        <div class="col-sm-8">
                                                                        <input type="text" class="form-control" id="fullName" value="{{$data->user->name}}" disabled>
                                                                        </div>
                                                                    </div>
                                                                    <div class="mb-3 row">
                                                                        <label for="jobPosition" class="col-sm-4 col-form-label">Posisi</label>
                                                                        <div class="col-sm-8">
                                                                        <input type="text" class="form-control" id="jobPosition" value="{{$data->user->roles->role_name}}" disabled>
                                                                        </div>
                                                                    </div>
                                                                    <div class="mb-3 row">
                                                                        <label for="kategoriCuti" class="col-sm-4 col-form-label">Kategori Cuti</label>
                                                                        <div class="col-sm-8">
                                                                            <select name="" class="form-select w-100" id="kategoriCuti" disabled>
                                                                                <option value="pilih">Pilih Kategori</option>
                                                                                <option value="cuti_umum" {{ $data->category->name ==
                                                                                    'Cuti Umum' ? 'selected' : '' }}>Cuti Umum</option>
                                                                                <option value="cuti_menyusui_melahirkan" {{ $data->
                                                                                    category->name == 'Cuti Menyusui & Melahirkan' ?
                                                                                    'selected' : '' }} >Cuti Menyusui & Melahirkan</option>
                                                                                <option value="cuti_kesehatan" {{ $data->category->name
                                                                                    == 'Cuti Masalah Kesehatan' ? 'selected' : '' }} >Cuti
                                                                                    Masalah Kesehatan</option>
                                                                                <option value="cuti_kedukaan" {{ $data->category->name ==
                                                                                    'Cuti Kedukaan' ? 'selected' : '' }} >Cuti Kedukaan
                                                                                </option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="mb-3 row">
                                                                        <label for="tanggalMulai" class="col-sm-4 col-form-label">Tanggal Mulai Cuti</label>
                                                                        <div class="col-sm-8">
                                                                        <input type="date" class="form-control" id="tanggalMulai" value="{{$data->start_date}}" disabled>
                                                                        </div>
                                                                    </div>
                                                                    <div class="mb-3 row">
                                                                        <label for="tanggalAkhir" class="col-sm-4 col-form-label">Tanggal Akhir Cuti</label>
                                                                        <div class="col-sm-8">
                                                                        <input type="date" class="form-control" id="tanggalAkhir" value="{{$data->end_date}}" disabled>
                                                                        </div>
                                                                    </div>
                                                                    <div class="mb-4 row">
                                                                        <label for="pesanCuti" class="col-sm-4 col-form-label">Pesan</label>
                                                                        <div class="col-sm-8">
                                                                        <textarea class="form-control" rows="7" id="pesanCuti" disabled>{{$data->message}}</textarea>
                                                                        </div>
                                                                    </div>
                                                                </form>
                                                                <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
                                                                    <a href="{{route('deleteCuti', $data->id)}}">
                                                                        <button type="submit" class="btn btn-danger" style="width:20vh" value="delete">Batalkan</button>
                                                                    </a>
                                                                    <div class="d-grid gap-2 d-md-flex justify-content-md-center">
                                                                        <button type="button" class="btn btn-primary px-5" data-bs-dismiss="modal">Tutup</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- End Modal -->
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @else
                 <!-- Start No record-->
                <div class="row">    
                    <div class="col-lg-12 mt-3">
                        <div class="card">
                            <div class="d-flex justify-content-center align-items-center flex-wrap mb-5">
                                <div class="text-center">
                                    <lottie-player src="https://assets9.lottiefiles.com/packages/lf20_khtt8ejx.json"  background="transparent"  speed="1"  style="width: 300px; height: 300px;"  loop  autoplay></lottie-player>
                                    <h5 class="mt-n2">Tidak Ada Pengajuan Cuti Pekerja</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Record -->
            @endif
            <!-- End Table -->
            
        </div>
    </div>

@endsection