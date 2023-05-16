<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>
<body style="background-color: #31CFD2;">
    <!-- Page Container -->
    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div class="position-absolute top-0 end-0 z-n1">
            <img src="../assets/images/login-decoration.png" class="img-fluid">
        </div>
        <!-- Login Container -->
        <div class="row border rounded-5 bg-white shadow" style="width:120vh">
            <!-- Left Side -->
            <div class="col-md-6 d-flex justify-content-center align-items-center flex-column px-5">
                <div class="header-text mt-5 text-center">
                    <h2>Stavy Login</h2>
                    <p>Pastikan Username dan Password Anda Benar</p>
                </div>
                <div class="featured-image mb-5">
                    <img src="../assets/images/login-ilus.png" class="img-fluid">
                </div>
            </div> 
            
            <!-- Right Side -->
            <div class="col-md-6 border border-end-0 border-top-0 border-bottom-0 d-flex justify-content-center align-items-center flex-column px-5">
                <div class="featured-image mt-2 mb-2">
                    <img src="../assets/images/logo-stavy.png" class="img-fluid">
                </div>
                <form method="POST" class="m-0 p-0" action="{{route('login')}}">
                @csrf
                    <div class="form-group text-start w-100 mb-3">
                        <label for="email">Email</label>
                        <input type="email" id = "email" class="form-control form-control-lg bg-light fs-6 @error('email') is-invalid @enderror" placeholder="Email address" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                        @error('field')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group w-100 mb-4">
                        <label for="password">Password</label>
                        <input type="password" class="form-control form-control-lg bg-light fs-6 @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <button class="w-100 btn btn-lg btn-primary mb-4" type="submit">Login</button>
                </form>
            </div>
        </div>

        <div class="position-absolute bottom-0 start-0 z-n1">
            <img src="../assets/images/login-decoration.png" class="img-fluid" style="transform: rotate(180deg);">
        </div>      
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>