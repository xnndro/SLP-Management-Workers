@extends('workers.layouts.master')

@section('content')
<!-- Modal for image preview -->
<div class="modal fade" id="image-preview" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myLargeModalLabel">Bukti Penanganan Keluhan : {{$asg->complain->complain_title}}</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
            </div>
            <div class="modal-body d-flex justify-content-center" style="min-height: 565px">
                <img src="" id="preview" alt="" style="height:auto; width: 795px">
                <div class="d-flex flex-column align-items-center justify-content-center" id="previewText">
                    <i class="fas fa-image my-3" style="font-size: 50px;"></i>
                    <h4 class="modal-title">Belum ada gambar diunggah</h4>
                </div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div class="page-breadcrumb mt-n5 ms-n4 mb-3">
    <div class="row">
        <div class="col-7 align-self-center">
            <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">
                Unggah Penanganan Keluhan
            </h4>
            <div class="d-flex align-items-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb m-0 p-0">
                        <!-- <li class="breadcrumb-item"><a href="index.html" class="text-muted">Apps</a></li> -->
                        <li class="breadcrumb-item text-muted active" aria-current="page">
                            <a href="{{route('keluhanPenanganan')}}">
                                Daftar Penanganan Keluhan
                            </a> 
                        </li>
                        <li class="breadcrumb-item text-muted active" aria-current="page">Unggah Penanganan Keluhan</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-8">
        <div class="card p-3">
            <div class="card-body d-flex flex-column">
                <form class="row gy-4" method="POST" action="{{route('keluhanPenangananStore',$asg->id)}}" enctype="multipart/form-data">
                    @csrf
                    <div class="col-sm-12 col-md-12 col-lg-12 d-flex align-items-start">
                        <div class="row d-flex col-12">
                            <div class="col-sm-12 col-md-12 col-lg-4">
                                <h5 class="card-title">Judul Keluhan</h4>
                            </div>
                            <div class="d-none d-lg-block col-lg-1">
                                <h5 class="card-title">:</h4>
                            </div>
                            <div class="col-sm-12 col-md-12 col-lg-7">
                                <a class="fw-bold" href="{{route('keluhanPenangananShow', $asg->id)}}">{{$asg->complain->complain_title}}</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-12 col-md-12 col-lg-12 d-flex align-items-start">
                        <div class="row d-flex col-12">
                            <div class="col-sm-12 col-md-12 col-lg-4">
                                <h5 class="card-title text-dark fw-medium">Urgensi</h4>
                            </div>
                            <div class="d-none d-lg-block col-lg-1">
                                <h5 class="card-title">:</h4>
                            </div>
                            <div class="col-sm-12 col-md-12 col-lg-7">
                                @if($asg->complain->complain_urgency == 2)
                                    <img class="complain-icon" src="{{asset('../../assets/images/keluhan-penting.svg')}}" width="20" alt="">
                                @elseif ($asg->complain->complain_urgency == 3)
                                    <img class="complain-icon" src="{{asset('../../assets/images/keluhan-genting.svg')}}" width="20" alt="">
                                @endif
                                {{$asg->complain->urgency->name}}
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-12 col-md-12 col-lg-12 d-flex align-items-start">
                        <div class="row d-flex col-12">
                            <div class="col-sm-6 col-md-6 col-lg-4">
                                <h5 class="card-title">Catatan Penugasan</h4>
                            </div>
                            <div class="d-none d-lg-block col-lg-1">
                                <h5 class="card-title">:</h4>
                            </div>
                            <div class="col-sm-12 col-md-12 col-lg-12 my-2">
                                <div class="form-group">
                                    <textarea class="form-control" id="placeholder"
                                        cols="30" rows="10"
                                        disabled>{{$asg->assign_description}}</textarea>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="col-sm-12 col-md-12 col-lg-12 d-flex align-items-start">
                        <div class="row d-flex col-12">
                            <div class="col-sm-6 col-md-6 col-lg-5">
                                <h5 class="card-title">Catatan Penanganan</h4>
                            </div>
                            <div class="d-none d-lg-block col-lg-1">
                                <h5 class="card-title">:</h4>
                            </div>
                            <div class="col-sm-12 col-md-12 col-lg-12 my-2">
                                <div class="form-group">
                                    <textarea name="catatan_penanganan" class="form-control @error('catatan_penanganan') is-invalid @enderror" id="placeholder"
                                        placeholder="Masukkan catatan penanganan" cols="30" rows="10"></textarea>
                                    @error('catatan_penanganan')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="col-sm-12 col-md-12 col-lg-12 d-flex align-items-start">
                        <div class="row d-flex col-12">
                            <div class="col-sm-6 col-md-6 col-lg-6">
                                <h5 class="card-title">Unggah Bukti Penanganan</h4>
                            </div>
                            <div class="d-none d-lg-block col-lg-1">
                                <h5 class="card-title">:</h4>
                            </div>
                            <div class="col-sm-12 col-md-12 col-lg-12 my-2">
                                <div class="input-group flex-nowrap">
                                    <div class="custom-file w-100">
                                        <input onchange="previewImage(event)" class="form-control @error('bukti_penanganan') is-invalid @enderror" value="{{  old('formFile') }}" type="file" id="formFile" name="bukti_penanganan">
                                    </div>
                                    <button class="btn btn-outline-secondary" data-bs-toggle="modal"
                                        data-bs-target="#image-preview" type="button">
                                        Lihat
                                    </button>
                                </div>
                                @error('bukti_penanganan')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                        </div>
                    </div>

                    <div class="col-sm-12 col-md-12 col-lg-12 d-flex align-items-stretch mt-5">
                        <div class="row d-flex col-12 d-flex justify-content-between align-items-start">
                            <div class="col-6">
                                <a href="{{route('keluhanPenanganan')}}"
                                    class="btn waves-effect waves-light btn-outline-primary w-75">Kembali</a>
                            </div>
                            <div class="col-6 d-flex justify-content-end">
                                <input type="submit"
                                    class="btn waves-effect waves-light btn-primary w-75" value="Kirim">
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-12 col-md-12 col-lg-12 d-flex align-items-start mt-5 mb-n4">
                        <img style="width: 250px;" src="{{asset('../../assets/images/sapu-form.png')}}" alt="">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@push('after-script')
<script>
    function previewImage(event) {
        var input = event.target;
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                var preview = document.getElementById("preview");
                preview.setAttribute("src", e.target.result);
                preview.style.display = "block";
                
                var previewText = document.getElementById("previewText");
                if (previewText.classList.contains("d-flex")) {
                    previewText.classList.remove("d-flex");
                }
                if (!previewText.classList.contains("d-none")) {
                    previewText.classList.add("d-none");
                }
            }
            reader.readAsDataURL(input.files[0]);
        } else {
            var preview = document.getElementById("preview");
            preview.style.display = "none";
            
            var previewText = document.getElementById("previewText");
            if (previewText.classList.contains("d-none")) {
                previewText.classList.remove("d-none");
            }
            if (!previewText.classList.contains("d-flex")) {
                previewText.classList.add("d-flex");
            }
        }
    }
  </script>
@endpush


@endsection
