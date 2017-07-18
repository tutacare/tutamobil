@extends('layouts.app-dash-lte')

@section('scripts')
<script type="text/javascript">
$(document).ready(function() {
    //menu active
    $('#menu-pengaturan').addClass("active");
    $('#menu-sosialmedia').addClass("active");
});
</script>
@endsection

@section('content-header', 'Sosial Media')
@section('content-header-small', 'Pengaturan')

@section('breadcump')
<li>Dashboard</li>
<li>Pengaturan</li>
<li class="active">Sosial Media</li>
@endsection

@section('content')
@if (Session::has('message'))
<div class="row">
<div class="col-md-12">
  <div class="alert {{ Session::get('alert-class', 'alert-success') }} alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    {{ Session::get('message') }}
  </div>
</div></div>
@endif

<!-- Pengaturan Sosial Media -->
<div class="box box-primary">
  <div class="box-header with-border">
    <h3 class="box-title">Pengaturan Sosial Media</h3>
    <div class="box-tools pull-right">
      <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
      <i class="fa fa-minus"></i></button>
    </div>
  </div>
  <div class="box-body">
    <div class="row">
      {!! Form::model($sosmed, array('route' => array('dashboard.sosmed.update', $sosmed->id), 'method' => 'PUT')) !!}
      <div class="col-xs-12">
      {{ Form::tutaText('facebook', null) }}
      {{ Form::tutaText('twitter', null) }}
      {{ Form::tutaText('google', null) }}
      {{ Form::tutaText('linkedin', null) }}
      {{ Form::tutaText('youtube', null) }}
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
