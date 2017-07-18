@extends('layouts.app-dash-lte')

@section('content-header', 'Permintaan Pengguna')

@section('breadcump')
<li>Dashboard</li>
<li>Permintaan Pengguna</li>
<li class="active">Detail</li>
@endsection

@section('content')

<!-- Permintaan show -->
<div class="box box-success">
  <div class="box-header with-border">
    <h3 class="box-title">Permintaan Pengguna</h3>
    <div class="box-tools pull-right">
      <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
      <i class="fa fa-minus"></i></button>
    </div>
  </div>
  <div class="box-body">
    <div class="row">
      <div class="col-xs-6">
        <table class="table table-condensed">
        <tr><td>Judul</td><td>:</td><td>{{$req_admin->title}}</td></tr>
        <tr><td>Pesan</td><td>:</td><td>{{$req_admin->request}}</td></tr>
        <tr><td>Pengguna</td><td>:</td><td>{{$req_admin->user->name}}</td></tr>
      </table>
    </div>
    <div class="col-xs-6">
      @if($req_admin->berkas)
      <table class="table table-condensed">
      <tr><td>File</td><td>:</td><td>{{$req_admin->berkas}}</td></tr>
    </table>
    @endif
  </div>
  </div>

  <!-- /.box-body -->
</div>
</div>
<!-- /.permintaan show END -->


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
        <a class="btn btn-small btn-warning" href="{{ URL::to('dashboard/myrequest') }}">Kembali</a>

      </div>
    </div>
  </div>
  <!-- /.box-body -->
</div>
</div>
<!-- /.AKSI END -->

@endsection
