@extends('layouts.app-dash-lte')

@section('styles')
<link rel="stylesheet" href="{!! asset('template/plugins/datatables/dataTables.bootstrap.css') !!}">
@endsection

@section('scripts')
<script src="{!! asset('template/plugins/datatables/jquery.dataTables.min.js') !!}"></script>
<script src="{!! asset('template/plugins/datatables/dataTables.bootstrap.min.js') !!}"></script>
<script src="{!! asset('mytuta/js/slot-mobil-baru/create.slot.mobil.baru.js') !!}"></script>
<script type="text/javascript">
$(document).ready(function() {
    $('#cdata').DataTable();
    //menu active
    $('#menu-slot').addClass("active");
    $('#menu-mobil-baru').addClass("active");
});
</script>
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
<li class="active">Ganti Slot Mobil Baru</li>
@endsection

@section('content')
@include('layouts.assets.message')
<!-- pengguna slot mobil baru -->
<div class="box box-primary">
  <div class="box-header with-border">
    <h3 class="box-title">Pengguna</h3>
    <div class="box-tools pull-right">
      <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
      <i class="fa fa-minus"></i></button>
    </div>
  </div>
  <div class="box-body">
    <div class="row">

      {!! Form::model($slotmobilbaru, array('route' => array('dashboard.slot.mobil-baru.update', $slotmobilbaru->id), 'method' => 'PUT')) !!}
      <input type="hidden" name="user_id" id="id" />

      <div class="col-xs-6">
      <label class="control-label">Nama</label>
        <div class="input-group">
          <input name="name" value="{{old('name')}}" autocomplete="off" type="text" id="name" class="form-control readonly" required>
          <span class="input-group-btn">
              <button type="button" id="btn-add-user" class="btn btn-info btn-flat"><i class="fa fa-plus"></i></button>
            </span>
          </div>
      </div>
<div class="col-xs-6">

  <div class="row">
    <div class="col-xs-6">
      {{ Form::tutaText('email', old('email'), null, ['id' => 'email', 'disabled']) }}
    </div>
    <div class="col-xs-6">
      {{ Form::tutaText('username', old('username'), null, ['id' => 'username', 'disabled']) }}
    </div>
  </div>

</div>
  </div>

  <!-- /.box-body -->
</div>
</div>
<!-- /Pengguna slot mobil baru END -->



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
        <div class="form-group required {{ $errors->has('city_id') ? ' has-error' : '' }}">
            {!! Form::label('city_id', $slotmobilbaru->city_id) !!}

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
        <div class="form-group required {{ $errors->has('design') ? ' has-error' : '' }}">
            {!! Form::label('design', 'Model') !!} <strong class="text-danger"> *</strong>
            <select name="design" id="design" class="form-control" required>
               <option>--Pilih Model--</option>
             </select>
            @if ($errors->has('design'))
                <span class="help-block">
                    <strong>{{ $errors->first('design') }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group required {{ $errors->has('tipe_id') ? ' has-error' : '' }}">
            {!! Form::label('tipe', 'Tipe') !!} <strong class="text-danger"> *</strong>
            <select name="tipe" id="tipe" class="form-control" required>
               <option>--Pilih Tipe--</option>
             </select>
            @if ($errors->has('tipe_id'))
                <span class="help-block">
                    <strong>{{ $errors->first('tipe_id') }}</strong>
                </span>
            @endif
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
        {!! Form::submit('Simpan', array('class' => 'btn btn-primary')) !!}
        <a class="btn btn-small btn-warning" href="{{ URL::to('dashboard/mobil-baru') }}">Batal</a>
        {!! Form::close() !!}
      </div>
    </div>
  </div>
  <!-- /.box-body -->
</div>
</div>
<!-- /.AKSI END -->
<!-- Modal keamanan_kelengkapan -->
<div id="myModal" class="modal fade" role="dialog" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
        <h4 class="modal-title" id="myModalLabel">Daftar Pengguna</h4>
      </div>
      <div class="modal-body">
      <!-- isi -->
      <table id="cdata" class="table table-bordered table-striped">
  			<thead>
  				<tr>
  					<th>NO#</th>
  					<th>Nama</th>
            <th>Email</th>
            <th>username</th>
            <th>Phone</th>
            <th>Kota</th>
            <th>Peranan</th>
  					<th>Aksi</th>
  				</tr>
  			</thead>
  			<tbody>
  				@foreach($users as $key => $value)
  				<tr>
  					<td>{{ $key+1 }}</td>
  					<td>{{ $value->name }}</td>
            <td>{{ $value->email }}</td>
            <td>{{ $value->username }}</td>
            <td>{{ $value->phone }}</td>
            <td>{{ $value->city->city }}</td>
            <td>{{ $value->role == 'admin' ? 'Administrator' : 'Pengguna' }}</td>
            <td>
              <input type="hidden" value="{{$value->name}}" id="user-name">
              <input type="hidden" value="{{$value->email}}" id="user-email">
              <input type="hidden" value="{{$value->username}}" id="user-username">
  			      <button title="Ambil" class="btn btn-xs btn-info btn-get-user" value="{{$value->id}}" data-user='["{{$value->name}}","{{$value->email}}","{{$value->username}}"]' type="button"><span class="glyphicon glyphicon-share" aria-hidden="true"></span> Ambil</button>
  					</td>
  				</tr>

  				@endforeach
  			</tbody>
  		</table>
      <!-- end is -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
<!-- Modal keamanan_kelengkapan end-->
@endsection
