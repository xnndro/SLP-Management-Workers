@extends('supervisor.layouts.master')

@section('content')

<div class="row">
    <div class="col-lg-12">
        <h3>Bukti Laporan Kerja</h3>
    </div>
</div>
<div class="row">
    <div class="col-md-6 col-lg-3 col-xlg-3">
        <div class="card border-end card-hover bg-success overflow-hidden">
            <div class="card-body">
                <div class="d-flex text-white">
                    <div>
                        <img src="{{asset('../../assets/images/success-box.svg')}}" class="rounded-circle m-n5" width="150">   
                    </div>
                    <div class="ms-auto">
                        <h6 class="font-weight-normal text-truncate">Laporan Disetujui</h6>
                        <div class="d-flex align-items-center">
                            <h2 class="text-white font-weight-medium">{{$total_submission['commented'] ?? '0'}}</h2>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
   
    <div class="col-md-6 col-lg-3 col-xlg-3">
        <div class="card border-end card-hover bg-primary overflow-hidden">
            <div class="card-body">
                <div class="d-flex text-white">
                    <div>
                        <img src="{{asset('../../assets/images/pending-icon.svg')}}" class="rounded-circle m-n5" width="150">   
                    </div>
                    <div class="ms-auto">
                        <h6 class="font-weight-normal text-truncate">Laporan Pending</h6>
                        <div class="d-flex align-items-center">
                            <h2 class="text-white font-weight-medium">{{$total_submission['submitted'] ?? '0'}}</h2>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
   
    <div class="col-md-6 col-lg-3 col-xlg-3">
        <div class="card border-end card-hover bg-danger overflow-hidden">
            <div class="card-body">
                <div class="d-flex text-white">
                    <div>
                        <img src="{{asset('../../assets/images/write-icon.svg')}}" class="rounded-circle m-n5" width="150">   
                    </div>
                    <div class="ms-auto">
                        <h6 class="font-weight-normal text-truncate">Laporan Ditolak</h6>
                        <div class="d-flex align-items-center">
                            <h2 class="text-white font-weight-medium">{{$total_submission['rejected'] ?? '0'}}</h2>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
   

</div>
@if(count($submission) == 0)
 <!-- If there is no schedulle added -->
 <div class="row">    
    <div class="col-lg-12 mt-3">
        <div class="card">
            <div class="d-flex justify-content-center align-items-center flex-wrap mb-5">
                <div class="text-center">
                    <lottie-player src="https://assets2.lottiefiles.com/packages/lf20_hSevJIQ2Wm.json"  background="transparent"  speed="1"  style="width: 300px; height: 300px;"  loop  autoplay></lottie-player>
                    <h5 class="mt-n2">Belum ada laporan yang diunggah oleh pekerja</h5>
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
                <div class="table-responsive">
                    <table id="multi_col_order"
                        class="table border table-striped table-bordered text-nowrap" style="width:100%">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nama</th>
                                <th>Tugas</th>
                                <th>Tanggal</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $no = 1; @endphp
                            @foreach($submission as $s)
                                <tr>
                                    <td>{{$no}}</td>
                                    @php $no++; @endphp
                                    <td>{{$s->task_management->user->name}}</td>
                                    <td>{{$s->task_management->task_category->task_category_name . ' di ' . $s->task_management->place->place_name}}</td>
                                    <td>{{$s->task_management->work_date}}</td>
                                    <td>
                                        <button type="button" class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#bukti{{$s->id}}">Bukti</button>
                                        <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#acc{{$s->id}}">Setujui</button>
                                        <button type="submit" class="btn btn-sm btn-danger" data-confirm-delete="true">Tolak</button>
                                    </td>
                                </tr>

                                <!--  Modal content for the above example -->
                                <div class="modal fade" id="bukti{{$s->id}}" tabindex="-1" role="dialog"
                                aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="myLargeModalLabel">Bukti Kerja</h4>
                                            </div>
                                            <div class="modal-body">
                                                <img src="{{asset('../../../'.$s->task_report)}}" class="img-fluid" alt="...">
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            </div>
                                        </div><!-- /.modal-content -->
                                        <!-- close button -->
                                    </div><!-- /.modal-dialog -->
                                </div><!-- /.modal -->

                                <div class="modal fade" id="acc{{$s->id}}" tabindex="-1" role="dialog"
                                aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="myLargeModalLabel">Tambahkan Komentar</h4>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{route('tasksComment', $s->id)}}" method="POST">
                                                    @csrf
                                                    <div class="mb-3">
                                                    <label for="exampleInputEmail1" class="form-label">Komentar</label>
                                                    <textarea type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="comment"></textarea>
                                                    </div>
                                                    <button type="submit" class="btn btn-primary">Submit</button>
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                </form>
                                            </div>
                                        </div><!-- /.modal-content -->
                                        <!-- close button -->
                                    </div><!-- /.modal-dialog -->
                                </div><!-- /.modal -->
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