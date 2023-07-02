@extends('workers.layouts.master')

@section('content')
@if(count($tasks) == 0 && count($task_submission) == 0)
<div class="row">    
    <div class="col-lg-12 mt-3">
        <div class="card">
            <div class="d-flex justify-content-center align-items-center flex-wrap mb-5">
                <div class="text-center">
                    <lottie-player src="https://assets10.lottiefiles.com/packages/lf20_vyL7gxqRAH.json"  background="transparent"  speed="1"  style="width: 300px; height: 300px;"  loop  autoplay></lottie-player>
                    <h5 class="mt-n5">Belum ada tugas yang ditambahkan ke kamu</h5>
                </div>
            </div>
        </div>
    </div>
</div>
@elseif(count($tasks) == 0 && count($task_submission) != 0)
<div class="row">    
    <div class="col-lg-12 mt-3">
        <div class="card">
            <div class="d-flex justify-content-center align-items-center flex-wrap mb-5">
                <div class="text-center">
                    <lottie-player src="https://assets10.lottiefiles.com/packages/lf20_vyL7gxqRAH.json"  background="transparent"  speed="1"  style="width: 300px; height: 300px;"  loop  autoplay></lottie-player>
                    <h5 class="mt-n5">Belum ada tugas yang ditambahkan ke kamu</h5>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <h3 class="mb-3">Riwayat Bukti Pekerjaan</h3>
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="multi_col_order"
                        class="table border table-striped table-bordered text-nowrap" style="width:100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tanggal</th>
                                <th>Status Tugas</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $no = 1; @endphp
                            @foreach($task_submission as $ts)
                            <tr>
                                <td>{{$no}}</td>
                                @php $no++; @endphp
                                <td>{{
                                    date('d F Y', strtotime($ts->task_management->work_date))
                                    }}</td>
                                <td>{{
                                    $ts->task_status
                                    }}</td>
                                <td>                                                                       
                                    <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#komentar{{$ts->id}}">Lihat Komentar</button>
                                </td>
                            </tr>

                             <!-- Komentar -->
                            <div class="modal fade" id="komentar{{$ts->id}}" tabindex="-1" role="dialog" aria-labelledby="scrollableModalTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-scrollable" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="scrollableModalTitle">Komentar</h5>
                                        </div>
                                        <div class="modal-body">
                                            <p>
                                                    {{$ts->task_comment}}
                                            </p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                                Close
                                            </button>
                                        </div>
                                    </div><!-- /.modal-content -->
                                </div><!-- /.modal-dialog -->
                            </div><!-- /.modal -->
                            <!-- End Komentar -->
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@elseif(count($tasks) != 0 && count($task_submission) == 0)
<!-- Panduan -->
<div class="modal fade" id="scrollable-modal" tabindex="-1" role="dialog" aria-labelledby="scrollableModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="scrollableModalTitle">{{$tasks[0]->task_category->panduan->panduan_title}}</h5>
            </div>
            <div class="modal-body">
                <p>
                       {{$tasks[0]->task_category->panduan->panduan_content}}
                </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                    Close
                </button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- End Panduan -->


<div class="modal fade" id="bukti" tabindex="-1" role="dialog"
aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myLargeModalLabel">Unggah Bukti Kerja</h4>
            </div>
            <div class="modal-body">
                <form action="{{route('tasksUpload', $tasks[0]->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <input class="form-control" type="file" id="formFile" name="task_image">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </form>
            </div>
        </div><!-- /.modal-content -->
        <!-- close button -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h3 class="card-title">Pekerjaan Hari ini</h3>
                <p class="card-text">{{$tasks[0]->task_category->task_category_name .' di ' . $tasks[0]->place->place_name}}</p>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                        data-bs-target="#scrollable-modal">Lihat Panduan</button>
                <button type="button" class="btn btn-success" data-bs-toggle="modal"
                        data-bs-target="#bukti">Unggah Bukti Pekerjaan</button>
            </div>
        </div>
    </div>
</div>

<div class="row">    
    <div class="col-lg-12 mt-3">
        <div class="card">
            <div class="d-flex justify-content-center align-items-center flex-wrap mb-5">
                <div class="text-center">
                    <lottie-player src="https://assets10.lottiefiles.com/packages/lf20_vyL7gxqRAH.json"  background="transparent"  speed="1"  style="width: 300px; height: 300px;"  loop  autoplay></lottie-player>
                    <h5 class="mt-n5">Belum ada tugas yang ditambahkan ke kamu</h5>
                </div>
            </div>
        </div>
    </div>
</div>

@else
<div class="modal fade" id="scrollable-modal" tabindex="-1" role="dialog" aria-labelledby="scrollableModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="scrollableModalTitle">{{$tasks[0]->task_category->panduan->panduan_title}}</h5>
            </div>
            <div class="modal-body">
                <p>
                       {{$tasks[0]->task_category->panduan->panduan_content}}
                </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                    Close
                </button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- End Panduan -->


<div class="modal fade" id="bukti" tabindex="-1" role="dialog"
aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myLargeModalLabel">Unggah Bukti Kerja</h4>
            </div>
            <div class="modal-body">
                <form action="{{route('tasksUpload', $tasks[0]->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <input class="form-control" type="file" id="formFile" name="task_image">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </form>
            </div>
        </div><!-- /.modal-content -->
        <!-- close button -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h3 class="card-title">Pekerjaan Hari ini</h3>
                <p class="card-text">{{$tasks[0]->task_category->task_category_name .' di ' . $tasks[0]->place->place_name}}</p>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                        data-bs-target="#scrollable-modal">Lihat Panduan</button>
                <button type="button" class="btn btn-success" data-bs-toggle="modal"
                        data-bs-target="#bukti">Unggah Bukti Pekerjaan</button>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <h3 class="mb-3">Riwayat Bukti Pekerjaan</h3>
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="multi_col_order"
                        class="table border table-striped table-bordered text-nowrap" style="width:100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tanggal</th>
                                <th>Status Tugas</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $no = 1; @endphp
                            @foreach($task_submission as $ts)
                            <tr>
                                <td>{{$no}}</td>
                                @php $no++; @endphp
                                <td>{{
                                    date('d F Y', strtotime($ts->task_management->work_date))
                                    }}</td>
                                <td>{{
                                    $ts->task_status
                                    }}</td>
                                <td>                                                                       
                                    <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#komentar{{$ts->id}}">Lihat Komentar</button>
                                </td>
                            </tr>

                             <!-- Komentar -->
                            <div class="modal fade" id="komentar{{$ts->id}}" tabindex="-1" role="dialog" aria-labelledby="scrollableModalTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-scrollable" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="scrollableModalTitle">Komentar</h5>
                                        </div>
                                        <div class="modal-body">
                                            <p>
                                                    {{$ts->task_comment}}
                                            </p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                                Close
                                            </button>
                                        </div>
                                    </div><!-- /.modal-content -->
                                </div><!-- /.modal-dialog -->
                            </div><!-- /.modal -->
                            <!-- End Komentar -->
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