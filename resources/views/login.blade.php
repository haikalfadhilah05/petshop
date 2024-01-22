<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Petshop Lontar | Log in</title>    
    
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{url('plugins/fontawesome-free/css/all.min.css')}}">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="{{url('plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{url('dist/css/adminlte.min.css')}}">
</head>
<style>
    /* CSS untuk mengatur gambar ke tengah halaman */
    .center-image {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 30; /* Mengisi tinggi layar sepenuhnya */
    }
    .center-image img {
        max-width: 50%; /* Ukuran gambar sedang (50% lebar) */
        height: auto; /* Biarkan tinggi mengikuti lebar asli */
    }
    .card-pink{
      color: rgb(247, 160, 175)
    }
</style>
<body class="hold-transition login-page dark-mode">
<div class="login-box dark-mode">
  <!-- /.login-logo -->
    <div class="card card-outline card-light elevation-5">
    <div class="card-header text-center">
        <a href="#" class="h1"><b>PetShop</b>Lontar</a>
    </div>
    <div class="center-image">
        <img src="../../dist/img/PetshopLontarLOGO.png" alt="Petshop Logo" class="brand-image img-30 img-circle elevation-3" style="opacity: .8">
    </div>
    <div class="card-body">
        <p class="login-box-msg">Log in to start your session</p>

    @if(session('success'))
    <p class="alert alert-success">{{ session('success') }}</p>
    @endif
    @if($errors->any())
    @foreach($errors->all() as $err)
    <p class="alert alert-danger">{{ $err }}</p>
    @endforeach
    @endif

    <form action="{{ route('login.action') }}" method="post">
        @csrf
        <div class="input-group mb-3">
        <input name="username" value="{{ old('username') }}" type="username" class="form-control" placeholder="Username">
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-user"></span>
                </div>
            </div>
        </div>
        <div class="input-group mb-3">
        <input name="password" type="password" class="form-control" placeholder="Password">
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-lock"></span>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-8">
            
            </div>
            <!-- /.col -->
            <div class="col-4">
                <button type="submit" class="btn btn-primary btn-block shadow">Log in</button>
            </div>
            <!-- /.col -->
        </div>
    </form>
        <!-- /.social-auth-links -->
        {{-- <p class="mb-0">
            <a href="{{url('register')}}" class="text-center">Register a new membership</a>
        </p> --}}
    </div>
    <!-- /.card-body -->
</div>
  <!-- /.card -->
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="{{url('plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{url('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{url('dist/js/adminlte.min.js')}}"></script>
</body>
</html>