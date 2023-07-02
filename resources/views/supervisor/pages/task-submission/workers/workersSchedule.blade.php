@extends('supervisor.layouts.master')

@section('content')
@if(count($events) != 0)
    <div class="row">
        <div class="col-lg-12">
            <h4 class="card-title">Jadwal Kerja</h4>
            <div class="card">
                <div class="">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card-body b-l calender-sidebar">
                                <div class="col-lg-12" id="calendar"></div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

@else
<!-- If there is no schedule added -->
    <div class="row">
        <div class="col-lg-12 mt-3">
            <div class="card">
                <div class="d-flex justify-content-center align-items-center flex-wrap mb-5">
                    <div class="text-center">
                        <lottie-player src="https://assets10.lottiefiles.com/packages/lf20_vyL7gxqRAH.json"
                            background="transparent" speed="1" style="width: 300px; height: 300px;" loop autoplay>
                        </lottie-player>
                        <h5 class="mt-n5">Belum ada jadwal yang ditujukan kepada {{$name->name}}</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif
@endsection

@push('after-script')
{{--
<link href="https://unpkg.com/@fullcalendar/core@6.18.0/main.css" rel="stylesheet"> --}}
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@fullcalendar/core@6.1.8/index.global.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@fullcalendar/daygrid@6.1.8/index.global.min.js"></script>

<script>
    
    document.addEventListener('DOMContentLoaded', function () {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth',
            events: {!! json_encode($events) !!}
        });
        calendar.render();
    });
</script>
@endpush