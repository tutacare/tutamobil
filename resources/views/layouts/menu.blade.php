<!-- Start Site Header -->
<div class="site-header-wrapper">

      <header class="site-header">
      @include('widgets.ads1')
          <div class="container sp-cont">
              <div class="site-logo">
                  <h1><a href="/"><img src="/images/logo-mobilokal.png" alt="Logo"></a></h1>
                  <span class="site-tagline">Temukan Mobil Impian,<br>semakin mudah!</span>
              </div>
              <div class="header-right">
                  <div class="topnav dd-menu">
                      <ul class="top-navigation sf-menu">
                          <li><a class="btn btn-danger" style="color:#FFFFFF;" href="/dashboard/pengguna/mobil-bekas/create">Jual Mobil Bekas</a></li>
                          @if(Auth::guest())
                          <li><a href="/register">Daftar</a> -</li>
                          <li><a href="/login">Login</a></li>
                          @else
                          <li><a class="btn btn-info" style="color:#FFFFFF;" href="/dashboard">Dashboard</a></li>
                          <li><a href="/logout">Logout</a></li>
                          @endif
                      </ul>
                  </div>
              </div>
          </div>
      </header>
      <!-- End Site Header -->
      <div class="navbar">
          <div class="container sp-cont">
              <div class="search-function">

                  <span><i class="fa fa-phone"></i> Hub. <strong>0821 1395 5757</strong></span>
              </div>

              <!-- Main Navigation -->
              <nav class="main-navigation dd-menu toggle-menu" role="navigation">
                  <ul class="sf-menu">
                      <li><a href="/">Beranda</a></li>
                      <li><a href="/mobil-baru">Mobil Baru</a></li>
                      <li><a href="/perbandingan">Perbandingan</a></li>
                      <li><a href="/simulasi-kredit">Simulasi Kredit</a></li>
                      <li><a href="/news">Berita</a></li>

                  </ul>
              </nav>

          </div>
      </div>
  </div>
