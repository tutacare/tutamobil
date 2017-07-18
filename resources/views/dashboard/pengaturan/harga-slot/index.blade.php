@extends('layouts.app-dash-lte')

@section('scripts')
<script type="text/javascript">
$(document).ready(function() {
    //menu active
    $('#menu-pengaturan').addClass("active");
    $('#menu-hargaslot').addClass("active");
});
</script>
<script>
  //hanya angka
  $("#harga_slot").keydown(function (e) {
        // Allow: backspace, delete, tab, escape, enter
        // http://keycode.info/
        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110]) !== -1 ||
             // Allow: Ctrl+A, Command+A
            (e.keyCode == 65 && ( e.ctrlKey === true || e.metaKey === true ) ) ||
             // Allow: home, end, left, right, down, up
            (e.keyCode >= 35 && e.keyCode <= 40)) {
                 // let it happen, don't do anything
                 return;
        }
        // Ensure that it is a number and stop the keypress
        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
            e.preventDefault();
        }
    });
    //end hanya angka

  </script>
@endsection

@section('content-header', 'Harga Slot')
@section('content-header-small', 'Pengaturan')

@section('breadcump')
<li>Dashboard</li>
<li>Pengaturan</li>
<li class="active">Harga Slot</li>
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
    <h3 class="box-title">Pengaturan Harga Slot</h3>
    <div class="box-tools pull-right">
      <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
      <i class="fa fa-minus"></i></button>
    </div>
  </div>
  <div class="box-body">
    <div class="row">
      {!! Form::model($harga_slot, array('route' => array('dashboard.harga-slot.update', $harga_slot->id), 'method' => 'PUT')) !!}
      <div class="col-xs-3">
      {{ Form::tutaAddon('harga_slot', null, 'Rp.', '/ Bulan') }}
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
