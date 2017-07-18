<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <ul class="sidebar-menu">
      <li>
        <a href="/dashboard">
          <i class="fa fa-dashboard"></i> <span>Dashboard</span>
        </a>
      </li>
      @if(Auth::user()->hasRole('user'))

      <li id="master-mobil-baru" class="treeview">
        <a href="#">
          <i class="fa fa-book"></i>
          <span>Mobil Baru</span>
          <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
          <li id="usr-slot"><a href="/dashboard/pengguna/slot/mobil-baru"><i class="fa fa-circle-o"></i> Order Slot Mobil Baru</a></li>
          <li id="usr-new"><a href="/dashboard/pengguna/mobil-baru"><i class="fa fa-circle-o"></i> Data Mobil Baru</a></li>
        </ul>
      </li>

      <li>
        <a href="/dashboard/pengguna/mobil-bekas">
          <i class="fa fa-book"></i> <span>Mobil Bekas</span>
        </a>
      </li>

      <li id="usr-keuangan" class="treeview">
        <a href="#">
          <i class="fa fa-book"></i>
          <span>Keuangan</span>
          <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
          <li id="usr-deposit"><a href="/dashboard/pengguna/deposit/local-bank"><i class="fa fa-circle-o"></i> Deposit</a></li>
          <li id="usr-riwayat-deposit"><a href="/dashboard/pengguna/riwayat/deposit"><i class="fa fa-circle-o"></i> Riwayat Deposit</a></li>
          <li id="usr-buku-kas"><a href="/dashboard/pengguna/cash-book"><i class="fa fa-circle-o"></i> Buku Kas</a></li>
        </ul>
      </li>

      <li>
        <a href="/dashboard/pengguna/req-admin">
          <i class="fa fa-book"></i> <span>Request to Admin</span>
        </a>
      </li>

      @endif
      @if(Auth::user()->hasRole('admin'))
      <li id="menu-master" class="treeview">
        <a href="#">
          <i class="fa fa-book"></i>
          <span>Master</span>
          <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
          <li id="menu-kota"><a href="/dashboard/kota"><i class="fa fa-circle-o"></i> Kota</a></li>
          <li id="menu-merek"><a href="/dashboard/merek"><i class="fa fa-circle-o"></i> Merek</a></li>
          <li id="menu-model"><a href="/dashboard/model"><i class="fa fa-circle-o"></i> Model</a></li>
          <li id="menu-tipe"><a href="/dashboard/tipe"><i class="fa fa-circle-o"></i> Tipe</a></li>
        </ul>
      </li>
      <li>
        <a href="/dashboard/mobil-baru">
          <i class="fa fa-th"></i> <span>Mobil Baru</span>
          <small class="label pull-right bg-green">{{TutaComp::mobilBaruCount()}}</small>
        </a>
      </li>

      <li id="menu-slot" class="treeview">
        <a href="#">
          <i class="fa fa-rocket"></i> <span>Slot</span>
          <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
          <li id="menu-mobil-baru"><a href="/dashboard/slot/mobil-baru"><i class="fa fa-car"></i> Mobil Baru</a></li>
          <li id="menu-mobil-bekas"><a href="/dashboard/slot/mobil-bekas"><i class="fa fa-cab"></i> Mobil Bekas</a></li>
        </ul>
      </li>

      <li id="menu-berita" class="treeview">
        <a href="#">
          <i class="fa fa-newspaper-o"></i> <span>Berita</span>
          <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
          <li id="menu-category"><a href="/dashboard/category"><i class="fa fa-circle-o"></i> Kategori</a></li>
          <li id="menu-post"><a href="/dashboard/post"><i class="fa fa-circle-o"></i> Posting</a></li>
        </ul>
      </li>

      <li>
        <a href="/dashboard/users">
          <i class="fa fa-users"></i> <span>Pengguna</span>
          <small class="label pull-right bg-yellow">{{TutaComp::penggunaCount()}}</small>
        </a>
      </li>

      <li id="menu-keuangan" class="treeview">
        <a href="#">
          <i class="fa fa-money"></i> <span>Keuangan</span>
          <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
          <li id="menu-deposit"><a href="/dashboard/deposit-pengguna"><i class="fa fa-circle-o"></i> Deposit Pengguna</a></li>
        </ul>
      </li>

      <li>
        <a href="/dashboard/myrequest">
          <i class="fa fa-book"></i> <span>Permintaan Pengguna</span>
        </a>
      </li>

      <li id="menu-pengaturan" class="treeview">
        <a href="#">
          <i class="fa fa-cogs"></i> <span>Pengaturan</span>
          <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
          <li id="menu-sosialmedia"><a href="/dashboard/sosmed"><i class="fa fa-circle-o"></i> Sosial Media</a></li>
          <li id="menu-hargaslot"><a href="/dashboard/harga-slot"><i class="fa fa-circle-o"></i> Harga Slot</a></li>
          <li id="menu-bank"><a href="/dashboard/bank"><i class="fa fa-circle-o"></i> Daftar Bank</a></li>
          <li id="menu-rekening"><a href="/dashboard/rekening-tujuan"><i class="fa fa-circle-o"></i> Rekening Tujuan</a></li>
        </ul>
      </li>
      @endif
    </ul>
  </section>
  <!-- /.sidebar -->
</aside>
