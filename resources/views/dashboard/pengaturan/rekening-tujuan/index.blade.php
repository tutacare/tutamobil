@extends('layouts.app-dash-lte')

@section('styles')
<link rel="stylesheet" href="/template/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
@endsection

@section('scripts')
<script type="text/javascript">
$(document).ready(function() {
    //menu active
    $('#menu-pengaturan').addClass("active");
    $('#menu-rekening').addClass("active");
    $(".rekening-tujuan").wysihtml5();
});
</script>
<script src="/template/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
@endsection

@section('content-header', 'Rekening Tujuan')
@section('content-header-small', 'Pengaturan')

@section('breadcump')
<li>Dashboard</li>
<li>Pengaturan</li>
<li class="active">Rekening Tujuan</li>
@endsection

@section('content')
@include('layouts.assets.message')

<!-- Pengaturan Sosial Media -->
<div class="box box-primary">
  <div class="box-header with-border">
    <h3 class="box-title">Pengaturan Rekening Tujuan <small>Masukan Info Bank Anda</small></h3>
    <span></span>
    <div class="box-tools pull-right">
      <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
      <i class="fa fa-minus"></i></button>
    </div>
  </div>
  <div class="box-body">
    <div class="row">
      {!! Form::model($rekening_tujuan, array('route' => array('dashboard.rekening-tujuan.update', $rekening_tujuan->id), 'method' => 'PUT')) !!}
      <div class="col-xs-12">
      {{ Form::tutaArea('rekening_tujuan', null, '*', ['required', 'rows' => '5', 'class' => 'form-control rekening-tujuan']) }}
      </div>
    </div>

  <!-- /.box-body -->
</div>
</div>
<!-- /.pengaturan sosial media END -->


<!-- AKSI -->
<div class="box box-primary">
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
        {!! Form::submit('Simpan', array('class' => 'btn btn-primary')) !!}
        {!! Form::close() !!}
      </div>
    </div>
  </div>
  <!-- /.box-body -->
</div>
</div>
<!-- /.AKSI END -->

@endsection
