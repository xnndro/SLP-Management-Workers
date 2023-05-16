@extends('supervisor.layouts.master')
@section('content')
    <!--  Start Modal -->
    <div class="modal fade" id="detail" tabindex="-1" role="dialog"
    aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md rounded-5">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="row align-items-center d-flex" style="width:80vh">
                        <div class="col-12 text-center">
                            <h4 class="modal-title text-black" id="myLargeModalLabel">Detail Cuti Pekerja</h4>
                        </div>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="">
                        <div class="mb-3 row">
                            <label for="idCuti" class="col-sm-4 col-form-label">ID</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control disable" id="idCuti" value="CT001" placeholder="Nama Lengkap" disabled>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="tanggalPengajuan" class="col-sm-4 col-form-label">Pengajuan</label>
                            <div class="col-sm-8">
                            <input type="date" class="form-control" id="idCuti" value="2022-10-11" disabled>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="fullName" class="col-sm-4 col-form-label">Nama Lengkap</label>
                            <div class="col-sm-8">
                            <input type="text" class="form-control" id="fullName" value="Xiboba Harianto" disabled>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="jobPosition" class="col-sm-4 col-form-label">Posisi</label>
                            <div class="col-sm-8">
                            <input type="text" class="form-control" id="jobPosition" value="House Keeping" disabled>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="kategoriCuti" class="col-sm-4 col-form-label">Kategori Cuti</label>
                            <div class="col-sm-8">
                                <select name="" class="form-select w-100" id="kategoriCuti" disabled>
                                    <option selected value="cuti_umum">Cuti Umum</option>
                                    <option value="cuti_menyusui_melahirkan">Cuti Menyusui & Melahirkan</option>
                                    <option value="cuti_kesehatan">Cuti Masalah Kesehatan</option>
                                    <option value="cuti_kedukaan">Cuti Kedukaan</option>
                                </select>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="tanggalMulai" class="col-sm-4 col-form-label">Tanggal Mulai Cuti</label>
                            <div class="col-sm-8">
                            <input type="date" class="form-control" id="tanggalMulai" value="2023-05-07" disabled>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="tanggalAkhir" class="col-sm-4 col-form-label">Tanggal Akhir Cuti</label>
                            <div class="col-sm-8">
                            <input type="date" class="form-control" id="tanggalAkhir" value="2023-06-07" disabled>
                            </div>
                        </div>
                        <div class="mb-4 row">
                            <label for="pesanCuti" class="col-sm-4 col-form-label">Pesan</label>
                            <div class="col-sm-8">
                            <textarea class="form-control" rows="7" id="pesanCuti" disabled>Butuh cuti bos, cape</textarea>
                            </div>
                        </div>

                        <div class="d-grid gap-2 d-md-flex justify-content-md-center">
                            <button type="button" class="btn btn-warning px-5" data-bs-dismiss="modal">Tutup</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- End Modal -->

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
            <div class="col-lg-4 d-flex justify-content-center align-items-center bottom-0 position-relative" style="margin-bottom: 13.4vh;">
                <img src="../../assets/images/list-cuti-icon.svg" alt="" class="img-fluid position-absolute">
            </div>
            <div class="col-lg-4 d-flex justify-content-center align-items-center">
                <div class="form-group">
                    <h5 class="text-black">Cari Berdasarkan nama</h5>
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Nama / Posisi" aria-label="Nama / Posisi" aria-describedby="button-addon2">
                        <button class="btn btn-outline-secondary" type="button" id="button-addon2">Cari</button>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 d-flex justify-content-center align-items-center">
                <div class="form-group">
                    <h5 class="text-black">Cari Berdasarkan Tanggal</h5>
                    <div class="input-group">
                        <input type="date" class="form-control" placeholder="DD/MM/YYYY" aria-label="DD/MM/YYYY" aria-describedby="button-addon2">
                        <button class="btn btn-outline-secondary" type="button" id="button-addon2">Cari</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-5">
        <div class="col-lg-3 col-sm-6">
            <div class="col-12 mb-3">
                <div class="card border-end card-hover bg-primary overflow-hidden my-3 my-sm-2">
                    <div class="card-body">
                        <div class="d-flex text-white">
                            <div>
                                <img src="../../assets/images/umum-icon.png" class="ms-1" width="auto">   
                            </div>
                            <div class="ms-auto">
                                <h6 class="font-weight-normal text-truncate">Cuti Umum</h6>
                                <div class="d-flex align-items-center">
                                    <h2 class="text-white font-weight-medium">10</h2>
                                    <p class="text-white font-weight-medium ms-2 mb-2">orang</p>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div> 
            </div>
            <div class="col-12 mb-3">
                <div class="card border-end card-hover bg-success overflow-hidden my-3 my-sm-2">
                    <div class="card-body">
                        <div class="d-flex text-white">
                            <div>
                                <img src="../../assets/images/hamil-icon.png" class="" width="100">   
                            </div>
                            <div class="ms-auto">
                                <h6 class="font-weight-normal text-truncate">Cuti Kehamilan</h6>
                                <div class="d-flex align-items-center">
                                    <h2 class="text-white font-weight-medium">15</h2>
                                    <p class="text-white font-weight-medium ms-2 mb-2">orang</p>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
            <div class="col-12 mb-3">
                <div class="card border-end card-hover bg-danger overflow-hidden my-3 my-sm-2">
                    <div class="card-body">
                        <div class="d-flex text-white">
                            <div>
                                <img src="../../assets/images/kesehatan icon.svg" class="" width="100">   
                            </div>
                            <div class="ms-auto">
                                <h6 class="font-weight-normal text-truncate">Cuti Kesehatan</h6>
                                <div class="d-flex align-items-center">
                                    <h2 class="text-white font-weight-medium">0</h2>
                                    <p class="text-white font-weight-medium ms-2 mb-2">orang</p>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
            <div class="col-12 mb-3">
                <div class="card border-end card-hover bg-warning overflow-hidden my-3 my-sm-2">
                    <div class="card-body">
                        <div class="d-flex text-white">
                            <div>
                                <img src="../../assets/images/pending-icon.svg" class="rounded-circle m-n5" width="150">   
                            </div>
                            <div class="ms-auto">
                                <h6 class="font-weight-normal text-truncate">Cuti Kedukaan</h6>
                                <div class="d-flex align-items-center">
                                    <h2 class="text-white font-weight-medium">0</h2>
                                    <p class="text-white font-weight-medium ms-2 mb-2">orang</p>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-8 col-sm-12">
            <!-- Start Table -->
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
                                        <tr>
                                            <td>CT001</td>
                                            <td>Xibaba</td>
                                            <td>House Keeping</td>
                                            <td>
                                                <button type="button" class=" btn border-0" data-bs-toggle="modal" data-bs-target="#detail">
                                                    <img src="../../assets/images/detail-icon.svg" alt="" srcset="">
                                                </button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>CT002</td>
                                            <td>Xiboba</td>
                                            <td>Fasecade Cleaner</td>
                                            <td>
                                                <button type="button" class="btn border-0" data-bs-toggle="modal" data-bs-target="#detail">
                                                    <img src="../../assets/images/detail-icon.svg" alt="" srcset="">
                                                </button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Table -->
            
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
        </div>
    </div>

@endsection