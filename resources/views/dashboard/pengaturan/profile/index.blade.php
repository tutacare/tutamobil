@extends('layouts.app-dash-lte')

@section('content-header', 'Profile')
@section('content-header-small', 'Pengaturan')

@section('breadcump')
<li>Dashboard</li>
<li>Pengaturan</li>
<li class="active">Profile</li>
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
@if (count($errors) > 0)
  <div class="alert alert-danger">
    <ul>
    @foreach ($errors->all() as $error)
      <li>{{ $error }}</li>
    @endforeach
    </ul>
  </div>
@endif

<!-- profile -->
<div class="box box-primary">
  <div class="box-header with-border">
    <h3 class="box-title">Profile</h3>
    <div class="box-tools pull-right">
      <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
      <i class="fa fa-minus"></i></button>
    </div>
  </div>
  <div class="box-body">
    <div class="row">
      {!! Form::model($profile, array('route' => array('dashboard.profile.update', $profile->id), 'method' => 'PUT', 'files' => true)) !!}
      <div class="col-xs-12">
      {{ Form::tutaText('name', null, '*', ['required' => 'required']) }}
      {{ Form::tutaEmail('email', null, '*', ['required' => 'required']) }}
      {{ Form::tutaText('username', null, '*', ['required' => 'required']) }}
      {{ Form::tutaArea('address', null, null , ['rows' => 3], 'Alamat') }}
      {{ Form::tutaText('phone', null, '*', ['required' => 'required']) }}
      {{ Form::tutaText('website', null, null, ['placeholder' => 'mobilokal.com']) }}
      <div class="form-group">
          <label class="control-label">Foto</label>
          <p><img src="{{TutaComp::getImage($profile->foto)}}" class="user-image" alt="User Image" width="100px"></p>
          {!! Form::file('foto', old('foto'), array('class' => 'form-control')) !!}
      </div>
      </div>
    </div>
  <!-- /.box-body -->
</div>
</div>
<!-- /. profile END -->

<!-- password -->
<div class="box box-primary">
  <div class="box-header with-border">
    <h3 class="box-title">Password</h3>
    <div class="box-tools pull-right">
      <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
      <i class="fa fa-minus"></i></button>
    </div>
  </div>
  <div class="box-body">
    <div class="row">

      <div class="col-xs-12 form-horizontal">
        <div class="form-group">
            <label class="col-sm-2 control-label">Password Baru</label>

            <div class="col-sm-10">
                <input type="password" class="form-control" name="password" placeholder="Password Baru" />
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-2 control-label">Confirm Password</label>

            <div class="col-sm-10">
                <input type="password" class="form-control" name="password_confirmation" placeholder="Ulangi Password Baru" />
            </div>
        </div>
      </div>
    </div>
  <!-- /.box-body -->
</div>
</div>
<!-- password end -->


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
