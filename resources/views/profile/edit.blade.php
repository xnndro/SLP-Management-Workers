@extends($values)

@section('content')

<div class="row">
  <div class="col-lg-12">
      <h3 class="mb-3">Ubah Profile</h3>
      <div class="card">
          <div class="card-body">
              <form action="{{route('profileUpdate')}}" method="POST">
                  @csrf
                  @method('PUT')
                  <div class="mb-3 row">
                      <label for="staticEmail" class="col-sm-2 col-form-label">Nama</label>
                      <div class="col-sm-10">
                      <input type="text" class="form-control" id="staticEmail" value="{{$data->name}}" name="name">
                      </div>
                  </div>
                  
                  <div class="mb-3 row">
                      <label for="staticEmail" class="col-sm-2 col-form-label">Email</label>
                      <div class="col-sm-10">
                      <input type="text" class="form-control" id="staticEmail" value="{{$data->email}}" name="email">
                      </div>
                  </div>
                  <div class="mb-3 row">
                      <label for="staticEmail" class="col-sm-2 col-form-label">NIK</label>
                      <div class="col-sm-10">
                      <input type="text" class="form-control" id="staticEmail" value="{{$data->user_nik}}" name="nik">
                      </div>
                  </div>

                  <!-- 2 button in div and that div is on right side -->
                  <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                      <button type="submit" class="btn btn-primary">Ubah</button>
                      <a href="{{route('profile')}}" class="btn btn-dark">Batalkan</a>
                  </div>
              </form>
          </div>
      </div>
  </div>
</div>
@endsection