@extends($values)

@section('content')
<div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col col-lg-6 mb-4 mb-lg-0">
        <div class="card mb-3" style="border-radius: .5rem;">
          <div class="row g-0">
            <div class="col-md-4 gradient-custom text-center text-white"
              style="border-top-left-radius: .5rem; border-bottom-left-radius: .5rem;">
              <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava1-bg.webp"
                alt="Avatar" class="img-fluid my-4" style="width: 80px;" />
              <h5 class="text-black">{{$data->name}}</h5>
              <p class="text-black">{{$data->roles->role_name}}</p>
              <a href="{{route('profileEdit')}}" class="btn btn-sm btn-warning">Edit</a>
            </div>
            <div class="col-md-8">
              <div class="card-body p-4">
                <h6>Information</h6>
                <hr class="mt-0 mb-4">
                <div class="col-12 mb-3">
                  <h6>Email</h6>
                  <p class="text-muted">{{$data->email}}</p>
                </div>
                <div class="col-12 mb-3">
                  <h6>NIK</h6>
                  <p class="text-muted">{{$data->user_nik}}</p>
                </div>
                <div class="col-12 mb-3">
                  <h6>Join date</h6>
                  <p class="text-muted">{{
                    date_format(date_create($data->created_at), 'd F Y')
                    }}</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection