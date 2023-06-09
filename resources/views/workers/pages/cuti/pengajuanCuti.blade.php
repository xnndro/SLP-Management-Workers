@extends('workers.layouts.master')
@section('content')

<div class="modal fade" id="formpengajuancuti" name="formpengajuancuti" tabindex="-1" role="dialog"
    data-bs-backdrop="static" aria-labelledby="myLargeModalLabel" aria-hidden="true">
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
                            <input type="text" class="form-control @error('Nama_lengkap') is-invalid @enderror"
                                id="Nama_lengkap" value="{{Auth::user()->name}}" name="Nama_lengkap"
                                placeholder="Nama Lengkap" readonly>
                                
                            @error('Nama_lengkap')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="jobPosition" class="col-sm-4 col-form-label">Posisi</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control @error('posisi') is-invalid @enderror" id="posisi"
                                placeholder="Posisi Pekerjaan" name="posisi" value="{{Auth::user()->roles->role_name}}" readonly>
                            @error('posisi')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="{{route('kategoriCuti')}}" class="col-sm-4 col-form-label">Kategori Cuti</label>
                        <div class="col-sm-8">
                            <select name="category" class="form-select w-100 @error('category') is-invalid @enderror"
                                id="category">
                                <option value="pilih">Pilih Kategori</option>
                                <option value="Cuti Umum" {{ old('category')=='Cuti Umum' ? 'selected' : '' }}>Cuti Umum
                                </option>
                                <option value="Cuti Menyusui & Melahirkan" {{
                                    old('category')=='Cuti Menyusui & Melahirkan' ? 'selected' : '' }}>Cuti Menyusui &
                                    Melahirkan</option>
                                <option value="Cuti Masalah Kesehatan" {{ old('category')=='Cuti Masalah Kesehatan'
                                    ? 'selected' : '' }}>Cuti Masalah Kesehatan</option>
                                <option value="Cuti Kedukaan" {{ old('category')=='Cuti Kedukaan' ? 'selected' : '' }}>
                                    Cuti Kedukaan</option>
                            </select>
                            @error('category')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="tanggalMulai" class="col-sm-4 col-form-label">Tanggal Mulai Cuti</label>
                        <div class="col-sm-8">
                            <input type="date" class="form-control @error('tanggalMulai') is-invalid @enderror"
                                id="tanggalMulai" name="tanggalMulai" onchange="setmin()"
                                value="{{old('tanggalMulai')}}">
                            @error('tanggalMulai')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="tanggalAkhir" class="col-sm-4 col-form-label">Tanggal Akhir Cuti</label>
                        <div class="col-sm-8">
                            <input type="date" class="form-control @error('tanggalAkhir') is-invalid @enderror"
                                id="tanggalAkhir" name="tanggalAkhir" value="{{old('tanggalAkhir')}}">
                            @error('tanggalAkhir')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-4 row">
                        <label for="pesanCuti" class="col-sm-4 col-form-label">Pesan</label>
                        <div class="col-sm-8">
                            <textarea class="form-control @error('pesan') is-invalid @enderror" rows="7" id="pesanCuti"
                                name="pesan" value="{{old('pesan')}}"></textarea>
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
            <a href="" class="btn text-white me-2 bg-dark" data-bs-toggle="modal"
                data-bs-target="#formpengajuancuti">Pengajuan Cuti</a>
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
                        <img src="{{asset('../../assets/images/pending-icon.svg')}}" class="rounded-circle m-n5"
                            width="150">
                    </div>
                    <div class="ms-auto">
                        <h6 class="font-weight-normal text-truncate">Sisa Cuti Kerja</h6>
                        <div class="d-flex align-items-center">
                            <h2 class="text-white font-weight-medium">{{20 - $setuju }}</h2>
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
                        <img src="{{asset('../../assets/images/write-icon.svg')}}" class="rounded-circle m-n5"
                            width="140">
                    </div>
                    <div class="ms-auto">
                        <h6 class="font-weight-normal text-truncate">Proses Pengajuan</h6>
                        <div class="d-flex align-items-center">
                            <h2 class="text-white font-weight-medium">{{$proses}}</h2>
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
                        <img src="{{asset('../../assets/images/success-box.svg')}}" class="rounded-circle m-n5"
                            width="140">
                    </div>
                    <div class="ms-auto">
                        <h6 class="font-weight-normal text-truncate">Pengajuan Disetujui</h6>
                        <div class="d-flex align-items-center">
                            <h2 class="text-white font-weight-medium">{{$setuju}}</h2>
                            <p class="text-white font-weight-medium ms-2 mb-1">rec</p>
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

@if (is_countable($request) && count($request) > 0)
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="col-lg-12 text-black">
                    <h3>Daftar Pengajuan Cuti</h3>
                </div>
                <div class="table-responsive">
                    <table id="multi_col_order" class="table border table-striped table-bordered text-nowrap"
                        style="width:100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kategori Cuti</th>
                                <th>Tanggal Pengajuan</th>
                                <th>Tanggal Mulai</th>
                                <th>Tanggal Akhir</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $i=1 @endphp
                            @foreach($request as $request)
                            <tr>
                                <td>{{$i}}</td>
                                @php $i++ @endphp
                                <td>{{$request->category->name}}</td>
                                <td>{{$request->created_at->format('Y-m-d')}}</td>
                                <td>{{$request->start_date}}</td>
                                <td>{{$request->end_date}}</td>
                                <td>
                                    <button type="button" class=" btn border-0" data-bs-toggle="modal"
                                            data-bs-target="#detail{{$request->id}}">
                                            <img src="{{asset('../../assets/images/detail-icon.svg')}}" alt="" srcset="">
                                    </button>
                                </td>
                            </tr>

                            <div class="modal fade" id="detail{{$request->id}}" value="{{$request->id}}" tabindex="-1"
                                role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-md rounded-5">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <div class="row align-items-center" style="width:80vh">
                                                <h4 class="modal-title text-black" id="myLargeModalLabel">Pengajuan Cuti
                                                    Kerja</h4>
                                            </div>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="POST" action="{{ route('persetujuan', $request->id) }}">
                                                @csrf
                                                @method('PUT')
                                                <div class="mb-3 row text-center">
                                                    @if ($request->status == "1")
                                                        <h4 class="text-white bg-primary py-2">Dalam Proses</h2>
                                                    @elseif($request->status == "2")
                                                        <h4 class="text-white bg-success py-2">Disetujui</h2>
                                                    @else
                                                        <h4 class="text-white bg-danger py-2">Ditolak</h2>
                                                    @endif
                                                </div>
                                                <div class="mb-3 row">
                                                    <label for="idCuti" class="col-sm-4 col-form-label">ID</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control disable" id="idCuti"
                                                            value="CT00{{$request->id}}" placeholder="Nama Lengkap"
                                                            disabled>
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label for="tanggalPengajuan"
                                                        class="col-sm-4 col-form-label">Pengajuan</label>
                                                    <div class="col-sm-8">
                                                        <input type="date" class="form-control" id="idCuti"
                                                            value="{{$request->created_at->format('Y-m-d')}}" disabled>
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label for="kategoriCuti" class="col-sm-4 col-form-label">Kategori
                                                        Cuti</label>
                                                    <div class="col-sm-8">
                                                        <select name="" class="form-select w-100" id="kategoriCuti"
                                                            disabled>
                                                            <option value="pilih">Pilih Kategori</option>
                                                            <option value="cuti_umum" {{ $request->category->name == 'Cuti Umum' ? 'selected' : '' }}>Cuti Umum</option>
                                                            <option value="cuti_menyusui_melahirkan" {{ $request->category->name == 'Cuti Menyusui & Melahirkan' ? 'selected' : '' }} >Cuti Menyusui & Melahirkan</option>
                                                            <option value="cuti_kesehatan" {{ $request->category->name == 'Cuti Masalah Kesehatan' ? 'selected' : '' }} >Cuti Masalah Kesehatan</option>
                                                            <option value="cuti_kedukaan" {{ $request->category->name == 'Cuti Kedukaan' ? 'selected' : '' }} >Cuti Kedukaan</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label for="tanggalMulai" class="col-sm-4 col-form-label">Tanggal
                                                        Mulai Cuti</label>
                                                    <div class="col-sm-8">
                                                        <input type="date" class="form-control" id="tanggalMulai"
                                                            value="{{$request->start_date}}" disabled>
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label for="tanggalAkhir" class="col-sm-4 col-form-label">Tanggal
                                                        Akhir Cuti</label>
                                                    <div class="col-sm-8">
                                                        <input type="date" class="form-control" id="tanggalAkhir"
                                                            value="{{$request->end_date}}" disabled>
                                                    </div>
                                                </div>
                                                <div class="mb-4 row">
                                                    <label for="pesanCuti" class="col-sm-4 col-form-label">Pesan</label>
                                                    <div class="col-sm-8">
                                                        <textarea class="form-control" rows="7" id="pesanCuti"
                                                            disabled>{{$request->message}}</textarea>
                                                    </div>
                                                </div>

                                                <!-- button -->
                                            </form>
                                            @if($request->status == '1')    
                                                <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
                                                    <a href="{{route('deletePengajuan', $request->id)}}">
                                                        <button type="submit" class="btn btn-danger" style="width:20vh" value="delete">Batalkan</button>
                                                    </a>
                                                    <div class="d-grid gap-2 d-md-flex justify-content-md-center">
                                                        <button type="button" class="btn btn-primary px-5" data-bs-dismiss="modal">Tutup</button>
                                                    </div>
                                                </div>
                                            @else
                                                <div class="d-grid gap-2 d-md-flex justify-content-md-center">
                                                    <button type="button" class="btn btn-primary px-5" data-bs-dismiss="modal">Tutup</button>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
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
                    <lottie-player src="https://assets2.lottiefiles.com/private_files/lf30_kj1b8w1w.json"
                        background="transparent" speed="1" style="width: 300px; height: 300px;" loop autoplay>
                    </lottie-player>
                    <h5 class="mt-n2">Tidak Ada Pengajuan Cuti</h5>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Record -->
@endif
@endsection

@push('after-script')
<script>
    @if (count($errors) > 0)
    $(window).on('load', function() {
        $('#formpengajuancuti').modal('show');
    });
    @else
    $(window).on('load', function() {
        $('#formpengajuancuti').modal('hide');
    });
    @endif
</script>
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
</script>

@endpush