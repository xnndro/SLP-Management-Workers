@extends('workers.layouts.master')

@section('content')
<div class="row">
    <div class="align-self-center">
        <div class="d-flex justify-content-between mb-3">
            <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Inventaris</h4>
        </div>
    </div>
</div>

@if($inventories->isNotEmpty())
    <!-- Table -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive" style="overflow-x: hidden;"> 
                        <table id="zero_config" class="table table-hover">
                            <thead style="background-color: #5F76E8; border-radius: 25px; color: aliceblue;">
                                <tr>
                                    <th style="border-radius: 10px 0px 0px 10px;">Gambar</th>
                                    <th>Nama</th>
                                    <th>Deskripsi</th>
                                    <th class="text-center">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($inventories as $inventory)
                                    <tr>
                                        <td><img src="
                                            {{ $inventory->inventaris_image }}
                                            " alt="Gambar" width="200" height="200"></td>
                                        <td> {{ $inventory->inventaris_name }}</td>
                                        <td> {{ $inventory->inventaris_description }}</td>
                                        <td class="text-center">{{ $inventory->inventaris_total }}</td>
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
  <!-- If there is no inventaris -->
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
@endif
    

@endsection
