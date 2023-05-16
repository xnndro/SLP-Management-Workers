@extends('supervisor.layouts.master')
@section('content')

    <!--  Start Modal -->
    <div class="modal" id="edit" tabindex="-1" role="dialog"
    aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md rounded-5">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="row align-items-center d-flex" style="width:80vh">
                        <div class="col-12 text-center">
                            <h4 class="modal-title text-black" id="myLargeModalLabel">Ubah Kategori Cuti</h4>
                        </div>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="">
                        <div class="mb-3 row">
                            <label for="idCuti" class="col-sm-4 col-form-label">Kategori Cuti</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control disable" id="name" value="Cuti Umum">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="tanggalPengajuan" class="col-sm-4 col-form-label">Keterangan</label>
                            <div class="col-sm-8">
                            <input type="text" class="form-control" id="name" value="Diajukan oleh semua karyawa">
                            </div>
                        </div>
                        <div class="mb-4 row">
                            <label for="Keterangan" class="col-sm-4 col-form-label">Pesan</label>
                            <div class="col-sm-8">
                            <textarea class="form-control" rows="7" id="keterangan" disabled>Saya butuh healing pak</textarea>
                            </div>
                        </div>

                        <!-- button -->
                        <div class="d-grid gap-2 d-md-flex justify-content-md-center">
                            <button type="submit" class="btn btn-primary" style="width:25vh">Simpan Perubahan</button>
                            <button type="submit" class="btn btn-danger" style="width:25vh">Batalkan Perubahan</button>
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
            <h2 class="text-black fw-500">Kategori Cuti Kerja</h2>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <h4>Karyawan SLP</h4>
        </div>
    </div>
    <!-- End Title -->
    <div class="row align-items-center p-0">
      
        <!-- Start Information Column -->
        <div class="row d-flex align-items-center">
            <!-- Start Cuti Umum -->
            <div class="col-lg-5 col-sm-9">
                <div class="card text-end d-flex">
                    <div class="card-header bg-primary" style="height:auto">
                        <div class="row">
                            <div class="col-7 px-0">
                                <div class="text-start">
                                    <h2 class="text-white ms-2 mt-5 mb-0 font-weight-medium">Cuti Umum</h2>
                                    <div class="text-white font-weight-normal fs-6 mb-4 ms-2">Diajukan oleh semua karyawan</div>
                                </div>
                            </div>
                            <div class="col-5">
                                <div class="text-end">
                                    <img src="../../assets/images/cuti-umum-icon.svg" class="mx-n5"  width="180"> 
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body text-start">
                        <blockquote class="blockquote mb-0">
                            <div class="fs-5">Cuti umum merupakan cuti yang dapat diajukan oleh semua karyawan. Durasi cuti maksimal dalam suatu periode adalah kuota cuti tahunan karyawan. Cuti harus diajukan minimal 2 hari sebelum tanggal mulai cuti. Contoh penggunaan cuti umum : mengurus keperluan perjalanan luar negri di kedutaan.</div>
                        </blockquote>
                        <div class="text-end">
                            <button class="btn bg-primary rounded-circle mt-2" data-bs-toggle="modal" data-bs-target="#edit">
                                <img src="../../assets/images/edit-icon.svg" class=""alt="">
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Cuti Umum -->

            <!-- Start Cuti Hamil -->
            <div class="col-lg-5 col-sm-9">
                <div class="card text-end d-flex">
                    <div class="card-header bg-danger" style="height:auto;">
                        <div class="row">
                            <div class="col-7 px-0">
                                <div class="text-start">
                                    <h2 class="text-white ms-2 mt-5 mb-0 font-weight-medium">Cuti Melahirkan</h2>
                                    <div class="text-white font-weight-normal fs-6 mb-4 ms-2">Diajukan oleh karyawan hamil</div>
                                </div>
                            </div>
                            <div class="col-5">
                                <div class="text-end">
                                    <img src="../../assets/images/kehamilan-icon.svg" class="me-n1"  width="220"> 
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body text-start">
                        <blockquote class="blockquote mb-0">
                            <div class="fs-5">Cuti umum merupakan cuti yang dapat diajukan oleh semua karyawan. Durasi cuti maksimal dalam suatu periode adalah kuota cuti tahunan karyawan. Cuti harus diajukan minimal 2 hari sebelum tanggal mulai cuti. Contoh penggunaan cuti umum : mengurus keperluan perjalanan luar negri di kedutaan.</div>
                        </blockquote>
                        <div class="text-end">
                            <button class="btn bg-danger rounded-circle mt-2" data-bs-toggle="modal" data-bs-target="#edit">
                                <img src="../../assets/images/edit-icon.svg" class=""alt="">
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Cuti Hamil -->

            <!-- Start Cuti Kesehatan -->
            <div class="col-lg-5 col-sm-9">
                <div class="card text-end d-flex">
                    <div class="card-header bg-success" style="height:auto;">
                        <div class="row">
                            <div class="col-7 px-0">
                                <div class="text-start">
                                    <h2 class="text-white ms-2 mt-5 mb-0 font-weight-medium">Cuti Kesehatan</h2>
                                    <div class="text-white font-weight-normal fs-6 mb-4 ms-2">Diajukan oleh semua karyawan</div>
                                </div>
                            </div>
                            <div class="col-5">
                                <div class="text-end">
                                    <img src="../../assets/images/kesehatan icon.svg" class="mx-n5 mt-3"  width="180"> 
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body text-start">
                        <blockquote class="blockquote mb-0">
                            <div class="fs-5">Cuti umum merupakan cuti yang dapat diajukan oleh semua karyawan. Durasi cuti maksimal dalam suatu periode adalah kuota cuti tahunan karyawan. Cuti harus diajukan minimal 2 hari sebelum tanggal mulai cuti. Contoh penggunaan cuti umum : mengurus keperluan perjalanan luar negri di kedutaan.</div>
                        </blockquote>
                        <div class="text-end">
                            <button class="btn bg-success rounded-circle mt-2" data-bs-toggle="modal" data-bs-target="#edit">
                                <img src="../../assets/images/edit-icon.svg" class=""alt="">
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Cuti Kesehatan -->

            <!-- Start Cuti Kedukaan -->
            <div class="col-lg-5 col-sm-9">
                <div class="card text-end d-flex">
                    <div class="card-header bg-warning" style="height:auto;">
                        <div class="row">
                            <div class="col-7 px-0">
                                <div class="text-start">
                                    <h2 class="text-white ms-2 mt-5 mb-0 font-weight-medium">Cuti Kedukaan</h2>
                                    <div class="text-white font-weight-normal fs-6 mb-4 ms-2">Diajukan oleh semua karyawan</div>
                                </div>
                            </div>
                            <div class="col-5">
                                <div class="text-end">
                                    <img src="../../assets/images/kedukaan-icon.png" class="mx-n5"  width="150"> 
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body text-start">
                        <blockquote class="blockquote mb-0">
                            <div class="fs-5">Cuti umum merupakan cuti yang dapat diajukan oleh semua karyawan. Durasi cuti maksimal dalam suatu periode adalah kuota cuti tahunan karyawan. Cuti harus diajukan minimal 2 hari sebelum tanggal mulai cuti. Contoh penggunaan cuti umum : mengurus keperluan perjalanan luar negri di kedutaan.</div>
                        </blockquote>
                        <div class="text-end">
                            <button class="btn bg-warning rounded-circle mt-2" data-bs-toggle="modal" data-bs-target="#edit">
                                <img src="../../assets/images/edit-icon.svg" class=""alt="">
                            </button>
                        </div>
                    </div>
                </div>
            </div>   
        </div>
        <!-- End Information Column -->
    </div>
    
        

@endsection