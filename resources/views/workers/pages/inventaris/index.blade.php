@extends('workers.layouts.master')

@section('content')

<div class="row">
    <div class="align-self-center">
        <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Inventaris</h4>
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
                                <th style="border-radius: 0px 10px 10px 0px;">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><img src="../../assets/images/product/p1.jpg" alt="Gambar" width="200" height="200"></td>
                                <td>System Architect</td>
                                <td>Edinburgh</td>
                                <td>61</td>
                            </tr>
                            <tr>
                                <td><img src="../../assets/images/product/p2.jpg" alt="Gambar" width="200" height="200"></td>
                                <td>Accountant</td>
                                <td>Tokyo</td>
                                <td>63</td>
                            </tr>
                            <tr>
                                <td><img src="../../assets/images/product/p3.jpg" alt="Gambar" width="200" height="200"></td>
                                <td>Junior Technical Author</td>
                                <td>San Francisco</td>
                                <td>66</td>
                            </tr>
                            <tr>
                                <td><img src="../../assets/images/product/p4.jpg" alt="Gambar" width="200" height="200"></td>
                                <td>Senior Javascript Developer</td>
                                <td>Edinburgh</td>
                                <td>22</td>
                            </tr>
                            <tr>
                                <td><img src="../../assets/images/product/p4.jpg" alt="Gambar" width="200" height="200"></td>
                                <td>Accountant</td>
                                <td>Tokyo</td>
                                <td>33</td>
                            </tr>
                            <tr>
                                <td><img src="../../assets/images/product/p4.jpg" alt="Gambar" width="200" height="200"></td>
                                <td>Integration Specialist</td>
                                <td>New York</td>
                                <td>61</td>
                            </tr>
                            <tr>
                                <td><img src="../../assets/images/product/p4.jpg" alt="Gambar" width="200" height="200"></td>
                                <td>Sales Assistant</td>
                                <td>San Francisco</td>
                                <td>59</td>
                            </tr>
                            <tr>
                                <td><img src="../../assets/images/product/p4.jpg" alt="Gambar" width="200" height="200"></td>
                                <td>Integration Specialist</td>
                                <td>Tokyo</td>
                                <td>55</td>
                            </tr>
                            <tr>
                                <td><img src="../../assets/images/product/p4.jpg" alt="Gambar" width="200" height="200"></td>
                                <td>Javascript Developer</td>
                                <td>San Francisco</td>
                                <td>39</td>
                            </tr>
                            <tr>
                                <td><img src="../../assets/images/product/p4.jpg" alt="Gambar" width="200" height="200"></td>
                                <td>Software Engineer</td>
                                <td>Edinburgh</td>
                                <td>23</td>
                            </tr>
                            <tr>
                                <td><img src="../../assets/images/product/p4.jpg" alt="Gambar" width="200" height="200"></td>
                                <td>Office Manager</td>
                                <td>London</td>
                                <td>30</td>
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