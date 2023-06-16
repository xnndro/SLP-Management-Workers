@extends('workers.layouts.master')

@section('content')
<div class="row">
    <div class="align-self-center">
        <div class="d-flex justify-content-between mb-3">
            <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Inventaris</h4>
        </div>
    </div>
</div>

<div class="row mt-3">
    <div class="col-md-6 col-lg-3 col-xlg-3">
        <div class="card border-end card-hover overflow-hidden my-3 my-sm-2" style="background-color: rgb(11, 128, 128);">
            <div class="card-body">
                <div class="d-flex text-white">
                    <div>
                        <img src="../../assets/images/housekeeping.png" style="opacity: 50%;" class="m-n4" width="90">   
                    </div>
                    <div class="ms-auto">
                        <h6 class="font-weight-normal text-truncate">Housekeeping</h6>
                        <div class="d-flex align-items-center">
                            <h2 class="text-white font-weight-medium">{{ $housekeeping_count }}</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-6 col-lg-3 col-xlg-3">
        <div class="card border-end card-hover overflow-hidden my-3 my-sm-2" style="background-color: rgb(14, 157, 157);">
            <div class="card-body">
                <div class="d-flex text-white">
                    <div>
                        <img src="../../assets/images/technician.png" style="opacity: 50%;" class="m-n4" width="90">   
                    </div>
                    <div class="ms-auto">
                        <h6 class="font-weight-normal text-truncate">Technician</h6>
                        <div class="d-flex align-items-center">
                            <h2 class="text-white font-weight-medium">{{ $technician_count }}</h2>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>

    <div class="col-md-6 col-lg-3 col-xlg-3">
        <div class="card border-end card-hover overflow-hidden my-3 my-sm-2" style="background-color: rgb(17, 191, 191);">
            <div class="card-body">
                <div class="d-flex text-white">
                    <div>
                        <img src="../../assets/images/facadeCleaner.png" style="opacity: 50%;" class="m-n4"width="90">   
                    </div>
                    <div class="ms-auto">
                        <h6 class="font-weight-normal text-truncate">Facade Cleaner</h6>
                        <div class="d-flex align-items-center">
                            <h2 class="text-white font-weight-medium">{{ $facade_cleaner_count }}</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-md-6 col-lg-3 col-xlg-3">
        <div class="card border-end card-hover overflow-hidden my-3 my-sm-2" style="background-color: rgb(20, 216, 216);">
            <div class="card-body">
                <div class="d-flex text-white">
                    <div class="align-items-center">
                        <img src="../../assets/images/gardener.png" style="opacity: 50%;" class="m-n4" width="90">   
                    </div>
                    <div class="ms-auto">
                        <h6 class="font-weight-normal text-truncate">Gardener</h6>
                        <div class="d-flex align-items-center">
                            <h2 class="text-white font-weight-medium">{{ $gardener_count }}</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- basic table -->
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="zero_config" class="table table-hover">
                        <thead style="background-color: #5F76E8; border-radius: 25px; color: aliceblue;">
                            <tr>
                                <th style="border-radius: 10px 0px 0px 10px;">Gambar</th>
                                <th>Nama</th>
                                <th>Deskripsi</th>
                                <th>Total</th>
                                <th style="border-radius: 0px 10px 10px 0px;">Ubah</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($inventories as $inventory)
                                <tr>
                                    <td><img src="{{ $inventory->inventaris_image }}" alt="Gambar" width="200" height="200"></td>
                                    <td>{{ $inventory->inventaris_name }}</td>
                                    <td>{{ $inventory->inventaris_description }}</td>
                                    <td>{{ $inventory->inventaris_total }}</td>
                                    <td>
                                        <a href="{{ route('editInventaris') }}" type="button" style="background-color: transparent; color: #22ca80;" class="btn-circle-lg"><i class="fa fa-edit"></i></a>
                                        <a href="" type="submit" style="background-color: transparent; color: #ff4f70;" data-confirm-delete="true" class="btn-circle-lg"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- If there is no schedulle added -->
<div class="row">    
    <div class="col-lg-12 mt-3">
        <div class="card">
            <div class="d-flex justify-content-center align-items-center flex-wrap mb-5">
                <div class="text-center">
                    <lottie-player src="https://assets3.lottiefiles.com/packages/lf20_7ifso9nc.json"  background="transparent"  speed="1"  style="width: 300px; height: 300px;"  loop  autoplay></lottie-player>
                    <h5 class="mt-n2">Belum ada inventaris yang ditambahkan</h5>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
