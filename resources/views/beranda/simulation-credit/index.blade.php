@extends('layouts.app')

@section('scripts')
<script src="{!! asset('mytuta/js/select.spec.js') !!}"></script>
@endsection

@section('content')
<!-- Start Page header -->
    @include('layouts.bg-page-header')
    	<div class="container">
        	<h1 class="page-title">Simulasi Kredit</h1>
       	</div>
    </div>
    <!-- Utiity Bar -->
    <div class="utility-bar">
    	<div class="container">
        	<div class="row">
            	<div class="col-md-8 col-sm-6 col-xs-8">
                    <ol class="breadcrumb">
                        <li><a href="/">Beranda</a></li>
                        <li class="active">Simulasi Kredit</li>
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

                	<div class="col-md-8">
                    <h2>Pilih mobil untuk melihat detail perincian kredit</h2>
                    	<p>@include('widgets.select-car-credit')</p>
                    </div>
                    <div class="col-md-4">
                      .
                    </div>

                </div>


      	</div>
 	</div>
    <!-- End Body Content -->

@endsection
