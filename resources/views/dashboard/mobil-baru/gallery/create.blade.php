@extends('layouts.iframe-app')

@section('content')
<h3>Tambah Gallery</h3>
{!! Html::ul($errors->all()) !!}

@if (Session::has('message'))
<div class="col-md-12">
	<div class="alert alert-info alert-dismissible" role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		{{ Session::get('message') }}
	</div>
</div>
@endif

{!! Form::open(array('url'=>'dashboard/mobil-baru/gallery/store','method'=>'POST', 'files'=>true)) !!}

<div class="row">

	<div class="col-md-12">

		<div class="form-group">
		{!! Form::label('gallery', 'Gallery') !!}

    {!! Form::file('images[]', array('multiple'=>true, 'class' => 'form-control')) !!}
		</div>

	</div>

</div>
{!! Form::submit('Submit', array('class' => 'btn btn-primary')) !!}
<a class="btn btn-small btn-warning" href="{{ URL::to('dashboard/mobil-baru/gallery') }}">Batal</a>
{!! Form::close() !!}
@endsection
