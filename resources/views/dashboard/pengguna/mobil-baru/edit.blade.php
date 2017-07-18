@extends('layouts.app-dash-lte')

@section('scripts')
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

@section('content-header', 'Edit Mobil Baru')

@section('breadcump')
<li>Dashboard</li>
<li>Mobil Baru</li>
<li class="active">Mengganti Mobil Baru</li>
@endsection

@section('content')

<!-- MOBIL BARU SPEC -->
<div class="box box-primary">
  <div class="box-header with-border">
    <h3 class="box-title">Ganti Spesifikasi Mobil Baru</h3>
    <div class="box-tools pull-right">
      <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
      <i class="fa fa-minus"></i></button>
    </div>
  </div>
  <div class="box-body">
    <div class="row">
      {!! Form::model($mobil_baru, array('route' => array('dashboard.pengguna.mobil-baru.update', $mobil_baru->id), 'method' => 'PUT')) !!}
      <input type="hidden" name="cityid" value="{{$mobil_baru->cityid}}">
      <div class="col-xs-6">
        <div class="form-group">
          <label>Kota</label>
          {!! Form::text('city', null, ['class' => 'form-control', 'disabled'])!!}
        </div>
        <div class="form-group">
          <label>Merek</label>
          {!! Form::text('merek', null, ['class' => 'form-control', 'disabled'])!!}
        </div>
        <div class="form-group">
          <label>Design</label>
          {!! Form::text('design', null, ['class' => 'form-control', 'disabled'])!!}
        </div>
        <div class="form-group">
          <label>Tipe</label>
          {!! Form::text('tipe', null, ['class' => 'form-control', 'disabled'])!!}
        </div>
</div>
<div class="col-xs-6">
        <div class="form-group">
          {!! Form::label('harga', 'Harga') !!} <strong class="text-danger"> *</strong>
            <div class="input-group">
            <div class="input-group-addon">Rp.</div>
            <input type="text" name="harga" class="form-control" id="harga" autocomplete="off" placeholder="Harga, masukan hanya angka saja" required>
          </div>
        </div>
        {{ Form::tutaText('download_brosur', old('download_brosur'), null, [], 'Link Download Brosur') }}
      </div>
  </div>

  <!-- /.box-body -->
</div>
</div>
<!-- /.MOBIL BARU SPEC END -->

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
        <a class="btn btn-small btn-warning" href="{{ URL::to('dashboard/pengguna/mobil-baru') }}">Batal</a>
        {!! Form::close() !!}
      </div>
    </div>
  </div>
  <!-- /.box-body -->
</div>
</div>
<!-- /.AKSI END -->

@endsection
