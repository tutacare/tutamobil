@extends('layouts.app-auth')

@section('title', 'REGISTER')

@section('scripts')
<script src="https://www.google.com/recaptcha/api.js?hl=id" async defer></script>
@endsection

@section('content')
<body class="hold-transition register-page">
<div class="login-box">
  <div class="login-logo">
    <a href="/"><b>MOBILOKAL</b>.COM</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">

    <div class="social-auth-links text-center">
          <a href="/auth/facebook" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Mendaftar menggunakan Facebook</a>
      </div>
<p class="text-center">--- ATAU ----</p>
    <p class="login-box-msg">Isi Formulir Untuk Mendaftar</p>
    @if (Session::has('message'))
      <p class="alert {{ Session::get('alert-class', 'alert-success') }}">{{ Session::get('message') }}</p>
    @endif
    @if (count($errors) > 0)
      <div class="alert alert-danger">
        <ul>
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
        </ul>
      </div>
    @endif
    <form role="form" method="POST" action="{{ url('/register') }}">
        {!! csrf_field() !!}
      <div class="form-group has-feedback">
        <input type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Nama Lengkap">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Email">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="text" class="form-control" name="username" value="{{ old('username') }}" placeholder="Username">
        <span class="glyphicon glyphicon-blackboard form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="text" class="form-control" name="phone" value="{{ old('phone') }}" placeholder="Phone">
        <span class="glyphicon glyphicon-earphone form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" name="password" class="form-control" placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" name="password_confirmation" placeholder="Ketik Ulang Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <div class="g-recaptcha" style="transform:scale(1.06);-webkit-transform:scale(1.06);transform-origin:0 0;-webkit-transform-origin:0 0;" data-sitekey="{{Config::get('recaptcha.recaptcha_site_key')}}"></div>
      </div>


      <div class="row">
        <div class="col-xs-7">
          <div class="checkbox icheck">
            <label>
              <input type="checkbox"> Saya setuju <a href="#">Aturan</a>
            </label>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-5">
          <button type="submit" class="btn btn-primary btn-block btn-flat">
              <i class="fa fa-btn fa-user"></i> Mendaftar
          </button>
        </div>
        <!-- /.col -->
      </div>
    </form>
    <!-- /.social-auth-links -->
<br />
    <div class="row">
      <div class="col-xs-7">
        <a href="{{ url('/') }}">&larr; Kembali ke Beranda</a>
      </div>
      <div class="col-xs-5">
        <a href="{{ url('/login') }}">Sudah Punya Akun?</a>
      </div>
    </div>

  </div>

  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->
@endsection
