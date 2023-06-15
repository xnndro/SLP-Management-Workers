@extends('workers.layouts.master')
@section('content')
    <!--  Start Modal -->
    @if (count($errors) > 0)
        {{-- <h1>{{old('pesan')}}</h1> --}}
        <script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>
    @endif

    <div class="modal fade" id="formpengajuancuti" name="formpengajuancuti" tabindex="-1" role="dialog"
    data-bs-backdrop="static"
    aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md rounded-5">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="row align-items-center d-flex" style="width:80vh">
                        <div class="col-12 text-center">
                            <h4 class="modal-title text-black" id="myLargeModalLabel">Formulir Pengajuan Cuti Kerja</h4>
                        </div>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{route('createCuti')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3 row">
                            <label for="fullName" class="col-sm-4 col-form-label">Nama Lengkap</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control @error('Nama lengkap') is-invalid @enderror" id="Nama lengkap" value="{{old('Nama_lengkap')}}" name="Nama lengkap" placeholder="Nama Lengkap">
                                @error('Nama lengkap')
                                    <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="jobPosition" class="col-sm-4 col-form-label">Posisi</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control @error('posisi') is-invalid @enderror" id="posisi" placeholder="Posisi Pekerjaan" name="posisi" value="{{old('posisi')}}">
                                @error('posisi')
                                    <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="{{route('kategoriCuti')}}" class="col-sm-4 col-form-label">Kategori Cuti</label>
                            <div class="col-sm-8">
                                <select name="category" class="form-select w-100 @error('category') is-invalid @enderror" id="kategoriCuti">
                                    <option value="pilih">Pilih Kategori</option>
                                    <option value="Cuti Umum" {{ old('category') == 'Cuti Umum' ? 'selected' : '' }}>Cuti Umum</option>
                                    <option value="Cuti Menyusui & Melahirkan" {{ old('category') == 'Cuti Menyusui & Melahirkan' ? 'selected' : '' }}>Cuti Menyusui & Melahirkan</option>
                                    <option value="Cuti Masalah Kesehatan" {{ old('category') == 'Cuti Masalah Kesehatan' ? 'selected' : '' }}>Cuti Masalah Kesehatan</option>
                                    <option value="Cuti Kedukaan" {{ old('category') == 'Cuti Kedukaan' ? 'selected' : '' }}>Cuti Kedukaan</option>
                                </select>
                                @error('category')
                                    <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="tanggalMulai" class="col-sm-4 col-form-label">Tanggal Mulai Cuti</label>
                            <div class="col-sm-8">
                                <input type="date" class="form-control @error('tanggalMulai') is-invalid @enderror" id="tanggalMulai" name="tanggalMulai" onchange="setmin()"
                                value="{{old('tanggalMulai')}}">
                                @error('tanggalMulai')
                                    <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="tanggalAkhir" class="col-sm-4 col-form-label">Tanggal Akhir Cuti</label>
                            <div class="col-sm-8">
                                <input type="date" class="form-control @error('tanggalAkhir') is-invalid @enderror" id="tanggalAkhir" name="tanggalAkhir"
                                value="{{old('tanggalAkhir')}}">
                                @error('tanggalAkhir')
                                    <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-4 row">
                            <label for="pesanCuti" class="col-sm-4 col-form-label">Pesan</label>
                            <div class="col-sm-8">
                                <textarea class="form-control @error('pesan') is-invalid @enderror" rows="7" id="pesanCuti" name="pesan"
                                value="{{old('pesan')}}"></textarea>
                                @error('pesan')
                                    <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- button -->
                        <div class="d-grid gap-2 d-md-flex justify-content-md-center">
                            <button type="submit" class="btn btn-primary mb-2 px-5">Ajukan</button>
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
        <div class="col-6">
            <div class="text-end">
                <a href="kategoriCuti" class="btn text-white me-2 bg-primary mb-2 mb-md-0">Kategori Cuti</a>
                <a href="" class="btn text-white me-2 bg-dark" data-bs-toggle="modal" data-bs-target="#formpengajuancuti">Pengajuan Cuti</a>
            </div>
        </div>
    </div>
    <!-- End Title -->

    <div class="row align-items-center p-0">
      
    <!-- Start Information Column -->

    <div class="col-md-6 col-lg-3 col-xlg-3">
        <div class="card border-end card-hover bg-primary overflow-hidden my-3 my-sm-2">
            <div class="card-body">
                <div class="d-flex text-white">
                    <div>
                        <img src="{{asset('../../assets/images/pending-icon.svg')}}" class="rounded-circle m-n5" width="150">   
                    </div>
                    <div class="ms-auto">
                        <h6 class="font-weight-normal text-truncate">Sisa Cuti Kerja</h6>
                        <div class="d-flex align-items-center">
                            <h2 class="text-white font-weight-medium">236</h2>
                            <p class="text-white font-weight-medium ms-2 mb-2">Hari</p>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>

    <div class="col-md-6 col-lg-3 col-xlg-3">
        <div class="card border-end card-hover bg-danger overflow-hidden my-3 my-sm-2">
            <div class="card-body">
                <div class="d-flex text-white">
                    <div>
                        <img src="{{asset('../../assets/images/write-icon.svg')}}" class="rounded-circle m-n5" width="150">   
                    </div>
                    <div class="ms-auto">
                        <h6 class="font-weight-normal text-truncate">Proses Pengajuan</h6>
                        <div class="d-flex align-items-center">
                            <h2 class="text-white font-weight-medium">236</h2>
                            <p class="text-white font-weight-medium ms-2 mb-2">rec</p>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
   
   
    <div class="col-md-6 col-lg-3 col-xlg-3">
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

    <!-- <div class="col-md-6 col-lg-3 col-xlg-3">
            <a href="kategori-cuti.html"><button type="button" class="btn btn-lg btn-primary rounded-4 px-3 w-100 my-3 my-sm-2">Kategori Cuti</button></a>
            <button type="button" class="btn btn-lg btn-primary rounded-4 px-3 w-100 my-3 my-sm-2" data-bs-toggle="modal" data-bs-target="#formpengajuancuti">Pengajuan Cuti</button>
    </div>  -->
    <!-- End Information Column -->

   


    </div>

    @if (count($requests) > 0) 
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
                                        <th>Kategori Cuti</th>
                                        <th>Tanggal Pengajuan</th> 
                                        <th>Tanggal Mulai</th>
                                        <th>Tanggal Akhir</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($requests as $request)  
                                        @if ($request->status == "1")
                                        {{ $status = "Dalam Proses"}}
                                        @elseif($request->status == "2")
                                            {{$status = "Disetujui"}}
                                        @else
                                            {{$status = "Ditolak"}}
                                        @endif  
                                        <tr>
                                            <td>CT00{{$request->id}}</td>
                                            <td>{{$request->category->name}}</td>
                                            <td>{{$request->created_at->format('Y-m-d')}}</td>
                                            <td>{{$request->start_date}}</td>
                                            <td>{{$request->end_date}}</td>
                                            <td>{{$status}}</td>
                                        </tr>
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
                        <lottie-player src="https://assets2.lottiefiles.com/private_files/lf30_kj1b8w1w.json"  background="transparent"  speed="1"  style="width: 300px; height: 300px;"  loop  autoplay></lottie-player>
                        <h5 class="mt-n2">Tidak Ada Pengajuan Cuti</h5>
                    </div>
                </div>
            </div>
        </div>
        </div>
        <!-- End Record -->
    @endif


    <script>
        // Script untuk tanggal minimum 
        var now = new Date();
        var next = new Date(now);
        next.setDate(next.getDate() + 1);
        var day = next.getDate();
        var month = next.getMonth() + 1;
        var year = next.getFullYear();
        if (day < 10) {
            day = '0' + day;
        }
        if (month < 10) {
            month = '0' + month;
        }
        var minDate = year + '-' + month + '-' + day;
        document.getElementById("tanggalMulai").min = minDate;

        function setmin() {
            var date1 = document.getElementById("tanggalMulai");
            var date2 = document.getElementById("tanggalAkhir");
            date2.min = date1.value;
        }

        $(window).on('load', function() {
            $('#formpengajuancuti').modal('show');
        });
        
    </script>
@endsection