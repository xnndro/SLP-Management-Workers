@extends('supervisor.layouts.master')

@section('content')
<div class="row">
    <div class="align-self-center">
        <div class="d-flex justify-content-between mb-3">
            <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Inventaris</h4>
            <a href="{{ route('createInventaris') }}" type="button"style="border-radius: 10px; padding:13px;" class="btn btn-success"><h6 class="mb-0">Tambah Inventaris</h6></a>
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
                            <h2 class="text-white font-weight-medium">236</h2>
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
                            <h2 class="text-white font-weight-medium">236</h2>
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
                            <h2 class="text-white font-weight-medium">236</h2>
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
                            <h2 class="text-white font-weight-medium">236</h2>
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
                            <tr>
                                <td><img src="../../assets/images/product/p1.jpg" alt="Gambar" width="200" height="200"></td>
                                <td>System Architect</td>
                                <td>Edinburgh</td>
                                <td>61</td>
                                <td>
                                    <a href="{{ route('editInventaris') }}" type="button" style="background-color: transparent; color: #22ca80;" class="btn-circle-lg"><i class="fa fa-edit"></i></a>
                                    <a href="" type="submit" style="background-color: transparent; color: #ff4f70;" data-confirm-delete="true" class="btn-circle-lg"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                            
                            <tr>
                                <td><img src="../../assets/images/product/p2.jpg" alt="Gambar" width="200" height="200"></td>
                                <td>Accountant</td>
                                <td>Tokyo</td>
                                <td>63</td>
                                <td>
                                    <a href="{{ route('editInventaris') }}" type="button" style="background-color: transparent; color: #22ca80;" class="btn-circle-lg"><i class="fa fa-edit"></i></a>
                                    <a href="" type="submit" style="background-color: transparent; color: #ff4f70;" data-confirm-delete="true" class="btn-circle-lg"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                            <tr>
                                <td><img src="../../assets/images/product/p3.jpg" alt="Gambar" width="200" height="200"></td>
                                <td>Junior Technical Author</td>
                                <td>San Francisco</td>
                                <td>66</td>
                                <td>
                                    <a href="{{ route('editInventaris') }}" type="button" style="background-color: transparent; color: #22ca80;" class="btn-circle-lg"><i class="fa fa-edit"></i></a>
                                    <a href="" type="submit" style="background-color: transparent; color: #ff4f70;" data-confirm-delete="true" class="btn-circle-lg"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
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
