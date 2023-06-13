@extends('supervisor.layouts.master')

@section('content')
<div class="row">
    <div class="col-sm-12 col-md-6">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Unggah Jadwal</h4>
                <form class="mt-4" action="{{route('scheduleUpload')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="input-group flex-nowrap">
                        <div class="custom-file w-100">
                             <input class="form-control" type="file" id="formFile" name="formFile">
                        </div>
                        <button class="btn btn-outline-primary" type="submit">
                            Unggah
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="editJadwal" tabindex="-1" aria-labelledby="editJadwalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="editJadwalLabel">Edit Jadwal</h1>
            </div>
            <form class="mt-4" action="" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="input-group flex-nowrap">
                        <div class="custom-file w-100">
                            <input class="form-control" type="file" id="formFile" name="formFile">
                        </div>
                    </div>
                </div>  
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button class="btn btn-primary" type="submit">
                        Edit Jadwal
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>


@if(count($form) == 0)
    <div class="row">    
        <div class="col-lg-12 mt-3">
            <div class="card">
                <div class="d-flex justify-content-center align-items-center flex-wrap mb-5">
                    <div class="text-center">
                        <lottie-player src="https://assets10.lottiefiles.com/packages/lf20_vyL7gxqRAH.json"  background="transparent"  speed="1"  style="width: 300px; height: 300px;"  loop  autoplay></lottie-player>
                        <h5 class="mt-n5">Belum ada jadwal yang ditambahkan</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
@else
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Riwayat</h4>
                    <div class="table-responsive">
                        <table id="multi_col_order"
                            class="table border table-striped table-bordered text-nowrap" style="width:100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Bulan</th>
                                    <th>Terakhir Diubah</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $i = 1; @endphp
                                @foreach($form as $f)
                                    <tr>
                                        <td>{{$i}}</td>
                                        @php $i++; @endphp
                                        <td>{{$f->form_month}}</td>
                                        <td>{{$f->updated_at}}</td>
                                        <td>
                                            {{-- <a href="javascript:void(0)" class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#editJadwal" id="modal{{$f->id}}">Edit</a> --}}
                                            {{-- check if the date name is same with name file, so can edit, if not, so cannot edit --}}
                                            @php $date = date('F'); 
                                                if($date == $f->form_month)
                                                    // echo '<a href="javascript:void(0)" class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#editJadwal">Edit</a>';
                                                    // a button with passing id to modal
                                                    echo '<button type="button" class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#editJadwal" id="modal'.$f->id.'">Edit</button>';
                                                else
                                                    echo '<a href="javascript:void(0)" class="btn btn-sm btn-warning disabled" data-bs-toggle="modal" data-bs-target="#editJadwal">Edit</a>';
                                            @endphp
                                            <a href="{{route('scheduleDelete', $f->id)}}" class="btn btn-sm btn-danger" data-confirm-delete="true">Delete</a>
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
@endif
@endsection

@push('after-script')
{{-- modal edit with take the id --}}
<script>
    $(document).ready(function() {
        @foreach($form as $f)
            $('#modal{{$f->id}}').click(function() {
                $('#editJadwal form').attr('action', '{{route('scheduleEdit', $f->id)}}');
            });
        @endforeach
    });
</script>
@endpush