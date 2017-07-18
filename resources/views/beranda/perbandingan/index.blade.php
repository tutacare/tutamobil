@extends('layouts.app')

@section('scripts')
<script src="{!! asset('mytuta/js/compare.form1.js') !!}"></script>
<script src="{!! asset('mytuta/js/compare.form2.js') !!}"></script>
@endsection

@section('content')
<!-- Start Page header -->
    @include('layouts.bg-page-header')
    	<div class="container">
        	<h1 class="page-title">Perbandingan Mobil</h1>
       	</div>
    </div>
    <!-- Utiity Bar -->
    <div class="utility-bar">
    	<div class="container">
        	<div class="row">
            	<div class="col-md-8 col-sm-6 col-xs-8">
                    <ol class="breadcrumb">
                        <li><a href="/">Beranda</a></li>
                        <li class="active">Perbandingan Mobil</li>
                    </ol>
            	</div>
                @include('widgets.sosmed-top')
            </div>
      	</div>
    </div>
    <!-- Start Body Content -->
  	<div class="main" role="main">
    	<div id="content" class="content full">
      		<div class="container">
            	<div class="row">
                {!! Form::open(array('url' => 'perbandingan', 'method' => 'post')) !!}
                	<div class="col-md-6">
                    <h1>Mobil 1</h1>
                    	<p>@include('widgets.perbandingan-form1')</p>
                    </div>
                    <div class="col-md-6">
                      <h1>Mobil 2</h1>
                    	<p>@include('widgets.perbandingan-form2')</p>
                    </div>
                    <button type="submit" class="btn btn-danger pull-right">Bandingkan</button>
                    </form>
                </div>


      	</div>
 	</div>
    <!-- End Body Content -->

@endsection
