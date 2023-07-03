@extends('supervisor.layouts.master')
@section('content')
<!--  Start Modal -->
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
            <a href="{{route('kategoriCuti')}}" class="btn text-white me-2 bg-primary">Kategori Cuti</a>
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
                        <img src="{{asset('../../assets/images/pending-icon.svg')}}" class="rounded-circle m-n5"
                            width="150">
                    </div>
                    <div class="ms-auto">
                        <h6 class="font-weight-normal text-truncate">Total Pengajuan</h6>
                        <div class="d-flex align-items-center">
                            <h2 class="text-white font-weight-medium">{{$total}}</h2>
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
                        <img src="{{asset('../../assets/images/success-box.svg')}}" class="rounded-circle m-n5"
                            width="150">
                    </div>
                    <div class="ms-auto">
                        <h6 class="font-weight-normal text-truncate">Pengajuan Disetujui</h6>
                        <div class="d-flex align-items-center">
                            <h2 class="text-white font-weight-medium">{{$setuju}}</h2>
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
                        <img src="{{asset('../../assets/images/ignore-icon.svg')}}" class="rounded-circle m-n5"
                            width="150">
                    </div>
                    <div class="ms-auto">
                        <h6 class="font-weight-normal text-truncate">Pengajuan Ditolak</h6>
                        <div class="d-flex align-items-center">
                            <h2 class="text-white font-weight-medium">{{$tolak}}</h2>
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

@if (count($data) > 0 )
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
                            @foreach ($data as $request)
                                <tr>
                                    <td>CT00{{$request->id}}</td>
                                    <td>{{$request->user->name}}</td>
                                    <td>{{$request->user->user_role}}</td>
                                    <td>{{$request->created_at->format('Y-m-d')}}</td>
                                    <td>{{$request->start_date}}</td>
                                    <td>{{$request->end_date}}</td>
                                    <td>
                                        {{-- <div class="actions">
                                            <a href="{{ route('lihat_detail', $request->id) }}" id="suspendd"
                                                data-toggle="modal" data-target="#detail{{ $request->id }}"
                                                class="btn btn-sm bg-danger-light">Lihat</a>
                                        </div> --}}
                                        <button type="button" class=" btn border-0" data-bs-toggle="modal"
                                            data-bs-target="#detail{{$request->id}}">
                                            <img src="{{asset('../../assets/images/detail-icon.svg')}}" alt="" srcset="">
                                        </button>
                                    </td>
                                </tr>

                            {{-- Start Modal --}}
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
                                                    <label for="fullName" class="col-sm-4 col-form-label">Nama
                                                        Lengkap</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control" id="fullName"
                                                            value="{{$request->user->name}}" disabled>
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label for="jobPosition"
                                                        class="col-sm-4 col-form-label">Posisi</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control" id="jobPosition"
                                                            value="{{$request->user->role_id}}" disabled>
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
                                            <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
                                                <a href="{{route('persetujuan', $request->id)}}">
                                                    <button type="submit" class="btn btn-primary" style="width:20vh" value="acc">Setuju</button>
                                                </a>
                                                <a href="{{route('penolakan', $request->id)}}">
                                                    <button type="submit" class="btn btn-danger" style="width:20vh" value="ignore">Tolak</button>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- End Modal --}}
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
                    <lottie-player src="https://assets9.lottiefiles.com/packages/lf20_khtt8ejx.json"
                        background="transparent" speed="1" style="width: 300px; height: 300px;" loop autoplay>
                    </lottie-player>
                    <h5 class="mt-n2">Tidak Ada Pengajuan Cuti Pekerja</h5>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Record -->
@endif
@endsection