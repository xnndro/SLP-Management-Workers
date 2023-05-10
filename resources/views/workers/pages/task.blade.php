@extends('workers.layouts.master')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <h4 class="card-title">Unggah Jadwal</h4>
        <div class="card">
            <div class="">
                <div class="row">
                    <div class="col-lg-3 border-end pr-0">
                        <div class="card-body border-bottom">
                            <h4 class="card-title mt-2">Drag & Drop Event</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div id="calendar-events" class="">
                                        <div class="calendar-events mb-3" data-class="bg-info"><i
                                                class="fa fa-circle text-info me-2"></i>Event One</div>
                                        <div class="calendar-events mb-3" data-class="bg-success"><i
                                                class="fa fa-circle text-success me-2"></i> Event Two
                                        </div>
                                        <div class="calendar-events mb-3" data-class="bg-danger"><i
                                                class="fa fa-circle text-danger me-2"></i>Event Three
                                        </div>
                                        <div class="calendar-events mb-3" data-class="bg-warning"><i
                                                class="fa fa-circle text-warning me-2"></i>Event Four
                                        </div>
                                    </div>
                                    <!-- checkbox -->
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input"
                                            id="drop-remove">
                                        <label class="custom-control-label" for="drop-remove">Remove
                                            after drop</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-9">
                        <div class="card-body b-l calender-sidebar">
                            <div id="calendar"></div>
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
                            <lottie-player src="https://assets10.lottiefiles.com/packages/lf20_vyL7gxqRAH.json"  background="transparent"  speed="1"  style="width: 300px; height: 300px;"  loop  autoplay></lottie-player>
                            <h5 class="mt-n5">Belum ada jadwal yang ditujukan kepada kamu</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection