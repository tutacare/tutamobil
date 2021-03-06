@extends('layouts.iframe-app')

@section('content')
<h3>Ganti Keamanan</h3>
{!! Html::ul($errors->all()) !!}

@if (Session::has('message'))
<div class="col-md-12">
	<div class="alert alert-info alert-dismissible" role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		{{ Session::get('message') }}
	</div>
</div>
@endif

{!! Form::model($keamanan, array('url' => array('dashboard/mobil-baru/keamanan/update', $keamanan->id), 'method' => 'PUT', 'files'=>true)) !!}

<div class="row">

	<div class="col-md-12">

		<div class="form-group">
      <img src="/img/keamanan/{{$keamanan->keamanan_kelengkapan}}" class="img-responsive" width="100px">
      {!! Form::label('keamanan', 'Keamanan Kelengkapan') !!}
      {!! Form::file('image', array('class' => 'form-control')) !!}
		</div>

	</div>


</div>
{!! Form::submit('Submit', array('class' => 'btn btn-primary')) !!}
<a class="btn btn-small btn-warning" href="{{ URL::to('dashboard/mobil-baru/keamanan') }}">Batal</a>
{!! Form::close() !!}
@endsection
