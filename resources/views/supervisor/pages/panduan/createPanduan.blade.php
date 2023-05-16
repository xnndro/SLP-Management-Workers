@extends('supervisor.layouts.master')

@section('content')
<div class="page-breadcrumb mb-4">
    <div class="row">
        <div class="col-12 align-self-center">
            <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Tambah Panduan</h4>
            <!-- PATH -->
            <div class="d-flex align-items-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb m-0 p-0">
                        <li class="breadcrumb-item"><a style="color: #5F76E8;" href="{{ route('supervisorPanduan') }}">Panduan</a></li>
                        <li class="breadcrumb-item text-muted active" aria-current="page">Tambah Panduan</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<div class="row col-md-12">
    <div class="col-lg-12 d-flex align-items-center justify-content-center">
        <div class="card" style="box-shadow: 0 1px 1px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
            <div class="card-body col-lg-12">
                <form action="">
                    <div class="mb-3 row justify-content-between">
                        <label class="col-sm-4 col-form-label" style="color: #5F76E8;">Judul Panduan</label>
                        <div class="col-sm-8">
                        <input type="text" class="form-control" id="input" placeholder="Nama inventaris">
                        </div>
                    </div>
                    <div class="mb-3 row justify-content-between">
                        <label class="col-sm-5 col-form-label" style="color: #5F76E8;">Posisi</label>
                        <div class="col-sm-5">
                            <select id="select" class="custom-select form-control bg-white custom-radius custom-shadow border-0">
                            <option value="1">Housekeeping</option>
                            <option value="2">Technician</option>
                            <option value="3">Facade Cleaner</option>
                            <option value="4">Gardener</option>
                            </optgroup>
                        </select>
                        </div>
                    </div>  
                    <div class="mb-3 row">
                        <label for="textarea" class="col-sm-7 col-form-label" style="color: #5F76E8;">Hal yang perlu diperhatikan</label>
                        <div class="form-group">
                            <textarea class="form-control" rows="4" type="text" id="input" placeholder="Hal yang perlu diperhatikan..."></textarea>
                        </div>
                    </div>          

                    <!-- 2 button in div and that div is on right side -->
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <a href="{{ route('supervisorPanduan') }}" type="submit" style="border-radius: 14px;" class="px-3 btn btn-primary">Tambahkan</a>
                        <a href="{{ route('supervisorPanduan') }}" type="submit" style="border-radius: 14px;" class="px-3 btn btn-dark">Batalkan</a>
                    </div>
                </form>
            </div>
            <img style="width: 250px;" src="../../assets/images/sapu-form.png" alt="">
        </div>
    </div>
 </div>
 @endsection