<!DOCTYPE HTML>
<html>
<head>
<!-- Basic Page Needs
  ================================================== -->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="robots" content="nofollow" />
<title>@yield('title', 'MOBILOKAL - Temukan mobil impian, semakin mudah!')</title>
<meta name="description" content="@yield('description', 'PILIH MOBIL IDAMAN
APPLY SEKARANG JUGA. Mobilokal, Portal terkemuka di Indonesia mempermudah dan mempercepat Pembelian dan Penjualan Mobil baik mobil baru maupun mobil bekas')">
<meta name="author" content="@yield('author', 'MOBILOKAL')">
<meta name="Copyright" content="Irfan Emge" />
<meta property="fb:app_id" content="1109258302450623">
@yield('meta')
@yield('meta_facebook')
@yield('meta_twitter_card')
@section('image_source')<link rel="image_src" href="{{url('/images/logo-master.png')}}" />@show
<!-- Mobile Specific Metas
  ================================================== -->
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0">
<!-- CSS
  ================================================== -->
<link rel="shortcut icon" href="{{ asset('/favicon.ico') }}" type="image/x-icon" />
<link href="/css/bootstrap.css" rel="stylesheet" type="text/css">
<link href="/css/bootstrap-theme.css" rel="stylesheet" type="text/css">
<link href="/css/style.css" rel="stylesheet" type="text/css">
<link href="/vendor/prettyphoto/css/prettyPhoto.css" rel="stylesheet" type="text/css">
<link href="/vendor/owl-carousel/css/owl.carousel.css" rel="stylesheet" type="text/css">
<link href="/vendor/owl-carousel/css/owl.theme.css" rel="stylesheet" type="text/css">
<!--[if lte IE 9]><link rel="stylesheet" type="text/css" href="css/ie.css" media="screen" /><![endif]-->
<!-- Color Style -->
<link href="/colors/color1.css" rel="stylesheet" type="text/css">
@yield('styles')
<!-- SCRIPTS
  ================================================== -->
<script src="/js/modernizr.js"></script><!-- Modernizr -->
</head>
@yield('body', '<body class="home">')
<!--[if lt IE 7]>
	<p class="chromeframe">You are using an outdated browser. <a href="http://browsehappy.com/">Upgrade your browser today</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to better experience this site.</p>
<![endif]-->
<div class="body">
  @include('layouts.menu')

    @yield('content')

    <!-- Start site footer -->
    <footer class="site-footer">
        <div class="site-footer-top">
          <div class="container">
                <div class="row">
                  @include('widgets.footer-one')
                  <div class="col-md-4 col-sm-6 footer_widget widget widget_custom_menu widget_links">
                      <h4 class="widgettitle">Hubungi Kami</h4>
                        <ul>
                          <li><i class="fa fa-phone"></i>&nbsp;&nbsp;&nbsp;0821 1395 5757</li>
                          <li><i class="fa fa-envelope-o"></i>&nbsp;&nbsp;info@mobilokal.com</li>
                          <li><i class="fa fa-map-marker"></i>&nbsp;&nbsp;&nbsp;JL. Untung Suropati</li>
                          <li><i class="fa fa-map-marker"></i>&nbsp;&nbsp;&nbsp;Samarinda - Kalimantan Timur</li>
                          <li><i class="fa fa-map-marker"></i>&nbsp;&nbsp;&nbsp;Indonesia</li>
                        </ul>
                    </div>
                  <div class="col-md-4 col-sm-6 footer_widget widget text_widget">
                      <h4 class="widgettitle">Tentang Mobilokal</h4>
                        <p>PILIH MOBIL IDAMAN
APPLY SEKARANG JUGA.
Mobilokal, Portal terkemuka di Indonesia mempermudah dan mempercepat Pembelian dan Penjualan Mobil baik mobil baru maupun mobil bekas.</p>
                    </div>
                </div>
            </div>
      </div>
        <div class="site-footer-bottom">
          <div class="container">
                <div class="row">
                  <div class="col-md-6 col-sm-6 copyrights-left">
                      <p>&copy; 2016 MOBILOKAL - V{{Config::get('version.version')}}</p>
                    </div>
                    <div class="col-md-6 col-sm-6 copyrights-right">
                        @include('widgets.sosmed-bottom')
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- End site footer -->
    <a id="back-to-top"><i class="fa fa-angle-double-up"></i></a>
    </div>
    @include('layouts.modal-login')
    <script src="/js/jquery-2.0.0.min.js"></script> <!-- Jquery Library Call -->
    <script src="/vendor/prettyphoto/js/prettyphoto.js"></script> <!-- PrettyPhoto Plugin -->
    <script src="/js/ui-plugins.js"></script> <!-- UI Plugins -->
    <script src="/js/helper-plugins.js"></script> <!-- Helper Plugins -->
    <script src="/vendor/owl-carousel/js/owl.carousel.min.js"></script> <!-- Owl Carousel -->
    <script src="/vendor/password-checker.js"></script> <!-- Password Checker -->
    <script src="/js/bootstrap.js"></script> <!-- UI -->
    <script src="/js/init.js"></script> <!-- All Scripts -->
    <script src="/vendor/flexslider/js/jquery.flexslider.js"></script> <!-- FlexSlider -->
    <!-- <script src="http://maps.googleapis.com/maps/api/js?sensor=false"></script> -->
    @yield('scripts')
    </body>
    </html>
