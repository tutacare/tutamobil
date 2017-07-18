@extends('layouts.app')

@section('title', 'Pendaftaran Di Mobilokal')

@section('scripts')
<script src="https://www.google.com/recaptcha/api.js?hl=id" async defer></script>
@endsection

@section('content')
<!-- Start Body Content -->
    <div class="main" role="main">
      <div id="content" class="content full">
          <div class="container">
              <div class="row">
                  <div class="col-md-8">
                        <h2>Pendaftaran Di Mobilokal</h2>
                        <p>Anda Marketing mobil? dan ingin sebuah media promosi online melalui internet? Gabung disini di MOBILOKAL!!!
<br />
<em>MOBILOKAL adalah sebuah media promosi yang tepat untuk Anda para marketing mobil baru maupun mobil bekas.</em></p>
                        <div class="spacer-20"></div>
                        <div class="icon-box ibox-rounded ibox-light ibox-effect">
                            <div class="ibox-icon">
                                <i class="fa fa-shopping-cart"></i>
                            </div>
                            <h3>1 Marketing per merk per kota.</h3>
                            <p>Anda dapat memilih 1 Merk dan 1 Kota.</p>
                        </div>
                        <div class="spacer-20"></div>
                        <div class="icon-box ibox-rounded ibox-light ibox-effect">
                            <div class="ibox-icon">
                                <i class="fa fa-list-alt"></i>
                            </div>
                            <h3>Full Akses</h3>
                            <p>full akses yang mudah digunakan dan dikelola untuk edit data</p>
                        </div>
                        <div class="spacer-20"></div>
                        <div class="icon-box ibox-rounded ibox-light ibox-effect">
                            <div class="ibox-icon">
                                <i class="fa fa-cogs"></i>
                            </div>
                            <h3>Biaya, Pembayaran & Masa Tayang</h3>
                            <p>Biaya yang Anda perlukan untuk 1 bulan hanya Rp. 50.000</p>
                        </div>
                        <div class="spacer-20"></div>
Gratis masa percobaan selama 1 bulan (30 hari) pertama
<br />
berikutnya untuk memperpanjang masa tayang dikenai biaya.
<ul>
<li>Biaya perpanjang masa tayang : per 3 bulan (90 hari) Rp 150.000,-</li>
<li>Pembayaran via transfer rekening, kontak Admin untuk megetahui nomor rekening tujuan.</li>
<li>Setelah melakukan pembayaran silahkan konfirmasi ke Admin.</li>
<li>Data yang sudah melewati batas masa tayang dan tidak diperpanjang akan dihapus oleh sistem dan halaman dapat dipakai oleh sales lain.</li>
<li>Gratis untuk semua penjualan mobil bekas</li>
</ul>
                       <hr class="fw">

                       
                        <div class="spacer-40"></div>

                    </div>
                    <div class="col-md-4">
                      <section class="signup-form sm-margint">

                              <!-- Regular Signup -->
                                <div class="regular-signup">
                              <h3>Buat Akun</h3>
                                    
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
        <div class="g-recaptcha" style="transform:scale(0.97);-webkit-transform:scale(0.97);transform-origin:0 0;-webkit-transform-origin:0 0;" data-sitekey="{{Config::get('recaptcha.recaptcha_site_key')}}"></div>
      </div>

                                    <div class="clearfix spacer-20"></div>
                                    <label class="checkbox-inline"><input type="checkbox">Dengan mendaftar berarti, Saya telah menyetujui <a href="#">terms &amp; conditions</a> dan <a href="#">privacy policy</a></label>
                                    <div class="spacer-20"></div>
                                    <button type="submit" class="btn btn-primary btn-lg btn-block">Mendaftar</button>
                                    </form>
                                </div>
                                <!-- Social Signup -->
                                <div class="social-signup">
                                  <span class="or-break">atau</span>
                          <a href="/auth/facebook" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Mendaftar menggunakan Facebook</a>
                                </div>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Body Content -->
@endsection
