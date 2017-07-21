@extends('layouts.app-auth')

@section('title', 'LOGIN')

@section('content')
<body class="hold-transition login-page">
@include('widgets.ads1')
<div class="login-box">

  <div class="login-logo">
    <a href="/"><b>TUTA</b>MOBIL</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Login untuk masuk</p>
    @if (Session::has('message'))
      <p class="alert {{ Session::get('alert-class', 'alert-success') }}">{{ Session::get('message') }}
          @if (Session::has('email'))
          {!! Form::open(array('url' => 'send/confirmation-code')) !!}
              {!! Form::hidden('email', Session::get('email')) !!}
              Jika email <strong>{{Session::get('email')}}</strong> anda belum menerima email konfirmasi klik: <button class="btn btn-success" type="submit">Kirim Kode Konfirmasi</button>
              <hr />
          {!! Form::close() !!}
          @endif
      </p>
    @endif
    <form role="form" method="POST" action="{{ url('/login') }}">
      {!! csrf_field() !!}
      <div class="form-group has-feedback">
        <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Email">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" name="password" class="form-control" placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
            <label>
              <input type="checkbox" name="remember"> Ingat Saya
            </label>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">
              <i class="fa fa-btn fa-sign-in"></i> Login
          </button>
        </div>
        <!-- /.col -->
      </div>
    </form>
    <!-- /.social-auth-links -->
    <a href="{{ url('/password/reset') }}">Lupa Password?</a>
    <br />
    <p class="text-center">--- ATAU ----</p>
    <div class="social-auth-links text-center">
          <a href="/auth/facebook" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Login menggunakan Facebook</a>
      </div>
    <div class="row">
      <div class="col-xs-8">
        <a href="{{ url('/') }}">&larr; Kembali ke Beranda</a>
      </div>
      <div class="col-xs-4">
        <a href="{{ url('/register') }}">Mendaftar?</a>
      </div>
    </div>

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

@endsection
