@extends('supervisor.layouts.master')

@section('content')
<div class="row col-md-12">
    <div class="col-lg-12">
        <div class="card" style="box-shadow: 0 1px 1px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
            <div class="card-body col-lg-12 px-5 py-5">
                <div class="row d-flex justify-content-between">
                    <div class="row col-lg-6">
                        <div class="col-12 align-self-center">
                            <h4 class="page-title font-weight-medium mb-1" style="color: #0F98D6;">{{ $panduan->panduan_title }}</h4>
                            <!-- PATH -->
                            <div class="d-flex align-items-center" >
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb m-0 p-0" style="background-color: transparent;">
                                        <li class="breadcrumb-item"><a style="color: #5F76E8;" href="{{ route('supervisorPanduan') }}">Panduan</a></li>
                                        <li class="breadcrumb-item text-muted active" aria-current="page">{{ $panduan->panduan_title }}</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                    
                    {{-- Button Edit --}}
                    <a href="{{ route('editPanduan', ['id'=>$panduan->id]) }}" type="button" style="background-color: transparent; color: #5F76E8; border: 0px;" class="btn-circle-lg"><i class="fa fa-edit"></i></a>
                </div>
                <h6 class="font-weight-medium mt-3" style="color: #2A3547;">Hal yang harus diperhatikan:</h6>
                <ol>
                    <h6>{{ $panduan->panduan_content }} </h6>
                </ol>
            </div>
            <div style="float: inline-end;">
                <img style="float: right; width: 250px;" src="{{asset('../../assets/images/sapu-form.png')}}" alt="">
            </div>
        </div>
    </div>
 </div>
 @endsection