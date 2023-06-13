@extends('supervisor.layouts.master')
@section('content')
    <!--  Start Modal -->
    <div class="modal fade" id="detail" tabindex="-1" role="dialog"
    aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md rounded-5">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="row align-items-end" style="width:80vh">
                        <h4 class="modal-title text-black" id="myLargeModalLabel">Pengajuan Cuti Kerja</h4>
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

                        <!-- button -->
                        <div class="d-grid gap-2 d-md-flex justify-content-md-center">
                            <button type="submit" class="btn btn-primary" style="width:20vh">Setuju</button>
                            <button type="submit" class="btn btn-danger" style="width:20vh">Tolak</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- End Modal -->

    <!-- Start Title -->
    <div class="row">
        <div class="col-6">
            <div class="row">
                <div class="col-12">
                    <h3 class="text-black fw-500">Pengajuan Cuti Pekerja</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <h4>Karyawan SLP</h4>
                </div>
            </div>
        </div>
        <div class="col-6 ">
            <div class="text-end text-lg-end mt-3 mt-lg-0">
                <a href="kategori-cuti.html" class="btn text-white me-2 bg-primary">Kategori Cuti</a>
            </div>
        </div>
    </div>
    <!-- End Title -->

    <div class="row align-items-center p-0">
    
    <!-- Start Information Column -->

    <div class="col-md-12 col-lg-3 col-xlg-3">
        <div class="card border-end card-hover bg-primary overflow-hidden my-3 my-sm-2">
            <div class="card-body">
                <div class="d-flex text-white">
                    <div>
                        <img src="{{asset('../../assets/images/pending-icon.svg')}}" class="rounded-circle m-n5" width="150">   
                    </div>
                    <div class="ms-auto">
                        <h6 class="font-weight-normal text-truncate">Total Pengajuan</h6>
                        <div class="d-flex align-items-center">
                            <h2 class="text-white font-weight-medium">236</h2>
                            <p class="text-white font-weight-medium ms-2 mb-2">rec</p>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>

    <div class="col-md-12 col-lg-3 col-xlg-3">
        <div class="card border-end card-hover bg-success overflow-hidden my-3 my-sm-2">
            <div class="card-body">
                <div class="d-flex text-white">
                    <div>
                        <img src="{{asset('../../assets/images/success-box.svg')}}" class="rounded-circle m-n5" width="150">   
                    </div>
                    <div class="ms-auto">
                        <h6 class="font-weight-normal text-truncate">Pengajuan Disetujui</h6>
                        <div class="d-flex align-items-center">
                            <h2 class="text-white font-weight-medium">236</h2>
                            <p class="text-white font-weight-medium ms-2 mb-2">rec</p>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>


    <div class="col-md-12 col-lg-3 col-xlg-3">
        <div class="card border-end card-hover bg-danger overflow-hidden my-3 my-sm-2">
            <div class="card-body">
                <div class="d-flex text-white">
                    <div>
                        <img src="{{asset('../../assets/images/ignore-icon.svg')}}" class="rounded-circle m-n5" width="150">   
                    </div>
                    <div class="ms-auto">
                        <h6 class="font-weight-normal text-truncate">Pengajuan Ditolak</h6>
                        <div class="d-flex align-items-center">
                            <h2 class="text-white font-weight-medium">236</h2>
                            <p class="text-white font-weight-medium ms-2 mb-2">rec</p>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div> 

    <!-- <div class="col-md-6 col-lg-3 col-xlg-3">
        <a href="kategori-cuti.html"><button type="button" class="btn btn-lg btn-primary rounded-4 px-3 w-100 my-sm-2">Kategori Cuti</button></a>
    </div>  -->
    <!-- End Information Column -->




    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="col-lg-12 text-black">
                        <h3>Daftar Pengajuan Cuti</h3>
                    </div>
                    <div class="table-responsive">
                        <table id="multi_col_order"
                            class="table border table-striped table-bordered text-nowrap" style="width:100%">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nama Karyawan</th>
                                    <th>Posisi</th>
                                    <th>Tanggal Pengajuan</th>
                                    <th>Tanggal Awal</th>
                                    <th>Tanggal Akhir</th>
                                    <th>Detail</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>CT001</td>
                                    <td>Xibaba</td>
                                    <td>House Keeping</td>
                                    <td>28-10-2023</td>
                                    <td>29-10-2023</td>
                                    <td>30-10-2023</td>
                                    <td>
                                        <button type="button" class=" btn border-0" data-bs-toggle="modal" data-bs-target="#detail">
                                            <img src="{{asset('../../assets/images/detail-icon.svg')}}" alt="" srcset="">
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>CT002</td>
                                    <td>Xiboba</td>
                                    <td>Fasecade Cleaner</td>
                                    <td>28-10-2023</td>
                                    <td>29-10-2023</td>
                                    <td>30-10-2023</td>
                                    <td>
                                        <button type="button" class="btn border-0" data-bs-toggle="modal" data-bs-target="#detail">
                                            <img src="{{asset('../../assets/images/detail-icon.svg')}}" alt="" srcset="">
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

@endsection