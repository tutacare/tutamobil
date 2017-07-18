@extends('layouts.app-dash-lte')

@section('meta')
<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('styles')
<link rel="stylesheet" href="{!! asset('template/plugins/datatables/dataTables.bootstrap.css') !!}">
@endsection

@section('scripts')
<script src="{!! asset('template/plugins/datatables/jquery.dataTables.min.js') !!}"></script>
<script src="{!! asset('template/plugins/datatables/dataTables.bootstrap.min.js') !!}"></script>
<script src="{!! asset('mytuta/js/slot-mobil-baru/create.user.slot.mobil.baru.js') !!}"></script>

<script>
  //hanya angka
  $("#harga").keydown(function (e) {
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

@section('content-header', 'Tambah Slot Mobil Baru')

@section('breadcump')
<li>Dashboard</li>
<li>Slot</li>
<li>Mobil Baru</li>
<li class="active">Menambah Slot Mobil Baru</li>
@endsection

@section('content')
@include('layouts.assets.message')


<!-- Data Slot MOBIL BARU SPEC -->
<div class="box box-primary">
  <div class="box-header with-border">
    <h3 class="box-title">Slot Mobil Baru</h3>
    <div class="box-tools pull-right">
      <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
      <i class="fa fa-minus"></i></button>
    </div>
  </div>
  <div class="box-body">
    <div class="row">


      <div class="col-xs-6">
        {!! Form::open(array('route' => 'dashboard.pengguna.slot.mobil-baru.store', 'method' => 'POST')) !!}
        <div class="form-group required {{ $errors->has('city_id') ? ' has-error' : '' }}">
            {!! Form::label('city_id', 'Kota') !!} <strong class="text-danger"> *</strong>
            {!! Form::select('city_id', $city, old('city_id'), array('class' => 'form-control', 'id' => 'city', 'required' => 'required')) !!}
            @if ($errors->has('city_id'))
                <span class="help-block">
                    <strong>{{ $errors->first('city_id') }}</strong>
                </span>
            @endif
        </div>

        <div class="form-group required {{ $errors->has('merek') ? ' has-error' : '' }}">
            {!! Form::label('merek', 'Merek') !!} <strong class="text-danger"> *</strong>
            <select name="merek" class="form-control" id="merek" required>
              <option value="">--Pilih Merek--</option>
            </select>
            @if ($errors->has('merek'))
                <span class="help-block">
                    <strong>{{ $errors->first('merek') }}</strong>
                </span>
            @endif
        </div>



</div>
<div class="col-xs-6">
  <div class="form-group required {{ $errors->has('durasi') ? ' has-error' : '' }}">
      {!! Form::label('durasi', 'Durasi') !!} <strong class="text-danger"> *</strong>
  <select class="form-control" name="durasi" id="durasi" required>
<option value="">---Pilih Waktu---</option> <!-- not selected / blank option -->
<option value="1">1 Bulan</option> <!-- interpolation -->
<option value="2">2 Bulan</option>
<option value="3">3 Bulan</option>
<option value="4">4 Bulan</option>
<option value="5">5 Bulan</option>
<option value="6">6 Bulan</option>
<option value="7">7 Bulan</option>
<option value="8">8 Bulan</option>
<option value="9">9 Bulan</option>
<option value="10">10 Bulan</option>
<option value="11">11 Bulan</option>
<option value="12">12 Bulan</option>
</select>
@if ($errors->has('durasi'))
<span class="help-block">
  <strong>{{ $errors->first('durasi') }}</strong>
</span>
@endif
</div>

{{ Form::tutaAddon('total_harga', null, 'Rp.', null, null, ['disabled', 'id' => 'total-harga']) }}
      </div>
  </div>
<div class="message-respon"></div>
  <!-- /.box-body -->
</div>
</div>
<!-- /. data slot MOBIL BARU SPEC END -->


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
        {!! Form::submit('Order', array('class' => 'btn btn-primary')) !!}
        <a class="btn btn-small btn-warning" href="{{ URL::to('dashboard/mobil-baru') }}">Batal</a>
        {!! Form::close() !!}
      </div>
    </div>
  </div>
  <!-- /.box-body -->
</div>
</div>
<!-- /.AKSI END -->

@endsection
