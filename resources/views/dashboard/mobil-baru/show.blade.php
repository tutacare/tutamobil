@extends('layouts.app-dash-lte')

@section('content-header', 'Spesifikasi Mobil Baru')

@section('breadcump')
<li>Dashboard</li>
<li>Mobil Baru</li>
<li class="active">Spesifikasi Mobil Baru</li>
@endsection

@section('content')

<!-- MOBIL BARU SPEC -->
<div class="box box-success">
  <div class="box-header with-border">
    <h3 class="box-title">Spesifikasi Mobil Baru</h3>
    <div class="box-tools pull-right">
      <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
      <i class="fa fa-minus"></i></button>
    </div>
  </div>
  <div class="box-body">
    <div class="row">
      <div class="col-xs-6">
        <table class="table table-condensed">
        <tr><td>Merek</td><td>:</td><td>{{$mobil_baru->merek->merek}}</td></tr>
        <tr><td>Model</td><td>:</td><td>{{$mobil_baru->design->design}}</td></tr>
        <tr><td>Tipe</td><td>:</td><td>{{$mobil_baru->tipe->tipe}}</td></tr>
      </table>
    </div>
    <div class="col-xs-6">
      <table class="table table-condensed">
      <tr><td>Negara Pembuat</td><td>:</td><td>{{$mobil_baru->negara_pembuat}}</td></tr>
      <tr><td>Foto</td><td>:</td><td><img src="/img/mobil-baru/{{$mobil_baru->foto}}" class="img-responsive" width="256px"></td></tr>
    </table>
  </div>
  </div>
  <h4>Dimensi</h4>
  <div class="row">
        <div class="col-xs-6">
          <table class="table table-condensed">
          <tr><td>Panjang</td><td>:</td><td>{{$dimensi->panjang}}</td></tr>
          <tr><td>Lebar</td><td>:</td><td>{{$dimensi->lebar}}</td></tr>
          <tr><td>Tinggi</td><td>:</td><td>{{$dimensi->tinggi}}</td></tr>
          <tr><td>Jarak Sumbu Roda</td><td>:</td><td>{{$dimensi->jarak_sumbu_roda}}</td></tr>
          </table>
        </div>
        <div class="col-xs-6">
          <table class="table table-condensed">
          <tr><td>Jarak Pijak Depan</td><td>:</td><td>{{$dimensi->jarak_pijak_depan}}</td></tr>
          <tr><td>Jarak Terendah Ke Tanah</td><td>:</td><td>{{$dimensi->jarak_terendah_ke_tanah}}</td></tr>
          <tr><td>Radius Putar</td><td>:</td><td>{{$dimensi->radius_putar}}</td></tr>
          <tr><td>Berat Kosong</td><td>:</td><td>{{$dimensi->berat_kosong}}</td></tr>
          </table>
        </div>
  </div>

  <h4>Mesin</h4>
  <div class="row">
        <div class="col-xs-6">
          <table class="table table-condensed">
          <tr><td>Jenis Mesin</td><td>:</td><td>{{$mesin->jenis_mesin}}</td></tr>
          <tr><td>Kapasitas Silinder</td><td>:</td><td>{{$mesin->kapasitas_silinder}}</td></tr>
          <tr><td>Daya Maksimum</td><td>:</td><td>{{$mesin->daya_maksimum}}</td></tr>
          <tr><td>Torsi Maksimum</td><td>:</td><td>{{$mesin->torsi_maksimum}}</td></tr>
          </table>
        </div>
        <div class="col-xs-6">
          <table class="table table-condensed">
          <tr><td>Perbandingan Kompresi</td><td>:</td><td>{{$mesin->perbandingan_kompresi}}</td></tr>
          <tr><td>Sistem Pembakaran</td><td>:</td><td>{{$mesin->sistem_pembakaran}}</td></tr>
          <tr><td>Bahan Bakar</td><td>:</td><td>{{$mesin->bahan_bakar}}</td></tr>
          <tr><td>Kapasitas Bahan Bakar</td><td>:</td><td>{{$mesin->kapasitas_bahan_bakar}}</td></tr>
          </table>
        </div>
  </div>

  <h4>Transmisi</h4>
  <div class="row">
        <div class="col-xs-6">
          <table class="table table-condensed">
          <tr><td>Kopling</td><td>:</td><td>{{$transmisi->kopling}}</td></tr>
          <tr><td>Tipe Transmisi</td><td>:</td><td>{{$transmisi->tipe_transmisi}}</td></tr>
          </table>
        </div>
        <div class="col-xs-6">
          <table class="table table-condensed">
          <tr><td>Sistem Kemudi</td><td>:</td><td>{{$transmisi->sistem_kemudi}}</td></tr>
          </table>
        </div>
  </div>

  <h4>Kaki</h4>
  <div class="row">
        <div class="col-xs-6">
          <table class="table table-condensed">
          <tr><td>Tipe Rangka</td><td>:</td><td>{{$kaki->tipe_rangka}}</td></tr>
          <tr><td>Suspensi Depan</td><td>:</td><td>{{$kaki->suspensi_depan}}</td></tr>
          <tr><td>Suspensi Belakang</td><td>:</td><td>{{$kaki->suspensi_belakang}}</td></tr>
          <tr><td>Rem Depan</td><td>:</td><td>{{$kaki->rem_depan}}</td></tr>
          </table>
        </div>
        <div class="col-xs-6">
          <table class="table table-condensed">
          <tr><td>Rem Belakang</td><td>:</td><td>{{$kaki->rem_belakang}}</td></tr>
          <tr><td>Velg</td><td>:</td><td>{{$kaki->velg}}</td></tr>
          <tr><td>Ukuran Ban</td><td>:</td><td>{{$kaki->ukuran_ban}}</td></tr>
          </table>
        </div>
  </div>

  <!-- /.box-body -->
</div>
</div>
<!-- /.MOBIL BARU SPEC END -->


<!-- AKSI -->
<div class="box box-success">
  <div class="box-header with-border">
    <h3 class="box-title">Aksi</h3>
    <div class="box-tools pull-right">
      <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
      <i class="fa fa-minus"></i></button>
    </div>
  </div>
  <div class="box-body">

  <div class="row">
    <div class="col-xs-12">
      <div class="form-group pull-right">
        <a class="btn btn-small btn-warning" href="{{ URL::to('dashboard/mobil-baru') }}">Kembali</a>

      </div>
    </div>
  </div>
  <!-- /.box-body -->
</div>
</div>
<!-- /.AKSI END -->

@endsection
