@extends('layouts.app-dash-lte')

@section('styles')
<link rel="stylesheet" href="{!! asset('template/plugins/datatables/dataTables.bootstrap.css') !!}">
@endsection

@section('scripts')
<script src="{!! asset('template/plugins/datatables/jquery.dataTables.min.js') !!}"></script>
<script src="{!! asset('template/plugins/datatables/dataTables.bootstrap.min.js') !!}"></script>
<script type="text/javascript">
$(document).ready(function() {
    $('#cdata').DataTable();
    //menu active
    $('#menu-slot').addClass("active");
    $('#menu-mobil-bekas').addClass("active");
});
</script>
@endsection

@section('content-header', 'Audit Slot Mobil Bekas')

@section('breadcump')
<li>Dashboard</li>
<li>Slot</li>
<li>Mobil Bekas</li>
<li class="active">Audit Slot Mobil Bekas</li>
@endsection

@section('content')
@include('layouts.assets.message')

<!-- Data Slot MOBIL BARU SPEC -->
<div class="box box-primary">
  <div class="box-header with-border">
    <h3 class="box-title">Slot Mobil Bekas</h3>
    <div class="box-tools pull-right">
      <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
      <i class="fa fa-minus"></i></button>
    </div>
  </div>
  <div class="box-body">
    <div class="row">

{!! Form::model($mobil_bekas, array('route' => array('dashboard.slot.mobil-bekas.update', $mobil_bekas->id), 'method' => 'PUT')) !!}
      <div class="col-xs-12">

{{ Form::tutaText('title', old('title')) }}
{{ Form::tutaArea('description', old('description')) }}
{!! Form::select('status', array('publish' => 'Publish', 'mod' => 'Proses Moderasi', 'tolak' => 'Ditolak'), $mobil_bekas->status, array('class' => 'form-control')) !!}
</div>

  </div>

  <!-- /.box-body -->
</div>
</div>
<!-- /. data slot MOBIL Bekas END -->


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
        <a class="btn btn-small btn-warning" href="{{ URL::to('dashboard/slot/mobil-bekas') }}">Batal</a>
        {!! Form::close() !!}
      </div>
    </div>
  </div>
  <!-- /.box-body -->
</div>
</div>
<!-- /.AKSI END -->

@endsection
