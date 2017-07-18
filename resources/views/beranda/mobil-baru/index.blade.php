@extends('layouts.app')

@section('scripts')
<script src="{!! asset('mytuta/js/select.spec.js') !!}"></script>
@endsection

@section('content')
<!-- Start Page header -->
    @include('layouts.bg-page-header')
    	<div class="container">
        	<h1 class="page-title">Mobil Baru</h1>
       	</div>
    </div>
    <!-- Utiity Bar -->
    <div class="utility-bar">
    	<div class="container">
        	<div class="row">
            	<div class="col-md-8 col-sm-6 col-xs-8">
                    <ol class="breadcrumb">
                        <li><a href="/">Beranda</a></li>
                        <li class="active">Mobil Baru</li>
                    </ol>
            	</div>
                @include('widgets.sosmed-top')
            </div>
      	</div>
    </div>
    <!-- Actions bar -->
    <div class="actions-bar tsticky">
     	<div class="container">
        	<div class="row">
            	<div class="col-md-3 col-sm-3 search-actions">

                </div>
                <div class="col-md-9 col-sm-9">
                    <!-- <div class="btn-group pull-right results-sorter">
                        <button type="button" class="btn btn-default listing-sort-btn">Sort by</button>
                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                          <span class="caret"></span>
                          <span class="sr-only">Toggle Dropdown</span>
                        </button>
                        <ul class="dropdown-menu">
                          	<li><a href="#">Price (High to Low)</a></li>
                          	<li><a href="#">Price (Low to High)</a></li>
                          	<li><a href="#">Mileage (Low to High)</a></li>
                          	<li><a href="#">Mileage (High to Low)</a></li>
                        </ul>
                  	</div> -->

                    <div class="toggle-view view-count-choice pull-right">
                        <label>Show</label>
                        <div class="btn-group">
                            <a href="#" class="btn btn-default">10</a>
                            <a href="#" class="btn btn-default active">20</a>
                            <a href="#" class="btn btn-default">50</a>
                        </div>
                    </div>

                    <div class="toggle-view view-format-choice pull-right">
                        <label>View</label>
                        <div class="btn-group">
                            <a href="#" class="btn btn-default active" id="results-list-view"><i class="fa fa-th-list"></i></a>
                            <a href="#" class="btn btn-default" id="results-grid-view"><i class="fa fa-th"></i></a>
                        </div>
                    </div>
                    <!-- Small Screens Filters Toggle Button -->
                    <button class="btn btn-default visible-xs" id="Show-Filters">Search Filters</button>
                </div>
            </div>
      	</div>
    </div>
    <!-- Start Body Content -->
  	<div class="main" role="main">
    	<div id="content" class="content full">
        	<div class="container">
            	<div class="row">

                    <!-- Search Filters -->
                    <div class="col-md-3 search-filters" id="Search-Filters">

                    	<div class="tbsticky filters-sidebar">
                        @include('widgets.select-car')
                        </div>
                    </div>

                    <!-- Listing Results -->
                    <div class="col-md-9 results-container">
                        <div class="results-container-in">
                        	<div class="waiting" style="display:none;">
                            	<div class="spinner">
                                  	<div class="rect1"></div>
                                  	<div class="rect2"></div>
                                  	<div class="rect3"></div>
                                  	<div class="rect4"></div>
                                  	<div class="rect5"></div>
                                </div>
                            </div>
                        	<div id="results-holder" class="results-list-view">
                            @foreach($newcar as $value)
                            	<!-- Result Item -->
                            	<div class="result-item format-standard">
                                	<div class="result-item-image">
                                		<a href="/mobil-baru/{{$value->city_slug}}/{{$value->slug}}" class="media-box"><img src="/img/mobil-baru/{{$value->foto}}" alt=""></a>
                                        <span class="label label-default vehicle-age">{{$value->merek}}</span>
                                        <span class="label label-success premium-listing">{{$value->city}}</span>
                                        <div class="result-item-view-buttons">
                                        	<!-- <a href="https://www.youtube.com/watch?v=P5mvnA4BV7Y" data-rel="prettyPhoto"><i class="fa fa-play"></i> View video</a> -->
                                        	<a href="/mobil-baru/{{$value->city_slug}}/{{$value->slug}}"><i class="fa fa-plus"></i> Lihat Detail</a>
                                        </div>
                                    </div>
                                	<div class="result-item-in">
                                     	<h4 class="result-item-title"><a href="/mobil-baru/{{$value->city_slug}}/{{$value->slug}}">{{$value->design}} {{$value->tipe}}</a></h4>
                                		<div class="result-item-cont">
                                            <div class="result-item-block col1">
                                                <p>{{$value->merek}} {{$value->design}} {{$value->tipe}} {{$value->city}} Pilih mobil idaman, apply sekarang juga. Hub Marketing {{$value->merek}} {{$value->city}} : {{$value->name}} HP: {{$value->phone}}</p>
                                            </div>
                                            <div class="result-item-block col2">
                                                <div class="result-item-pricing">
                                                    <div class="price">Rp. {{number_format($value->harga, 0 , ',', '.')}}</div>
                                                </div>
                                                <!-- <div class="result-item-action-buttons">
                                                    <a href="#" class="btn btn-default btn-sm"><i class="fa fa-star-o"></i> Save</a>
                                                    <a href="vehicle-details.html" class="btn btn-default btn-sm">Enquire</a><br>
                                                    <a href="#" class="distance-calc"><i class="fa fa-map-marker"></i> Distance from me?</a>
                                                </div> -->
                                            </div>
                                       	</div>
                                        <!-- <div class="result-item-features">
                                            <ul class="inline">
                                                <li>4 door SUV</li>
                                                <li>6 cyl, 3.0 L Petrol</li>
                                                <li>6 speed Automatic</li>
                                                <li>4x4 Wheel Drive</li>
                                                <li>Listed by Individual</li>
                                            </ul>
                                        </div> -->
                                    </div>
                                </div>
                                @endforeach

                            </div>
                        </div>
                    </div>
               	</div>
            </div>
        </div>
   	</div>
    <!-- End Body Content -->

@endsection
