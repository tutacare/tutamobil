@extends('layouts.app')

@section('title_share')
{{$mobil_bekas->title}}
@endsection

@section('title')
{{$mobil_bekas->title}}
@endsection
@section('description')
{{ str_limit(strip_tags($mobil_bekas->description), 255) }}
@endsection
@section('author')
{{$mobil_bekas->user->name}}
@endsection
@section('image_source')
<link rel="image_src" href="{{ url('/img/mobil-bekas/' . $mobil_bekas->foto1) }}" />
@endsection

@section('meta_facebook')
<meta property="og:url" content="{{Request::url()}}" />
<meta property="og:type" content="website" />
<meta property="og:title" content="{{$mobil_bekas->title}}" />
<meta property="og:description" content="{{ str_limit(strip_tags($mobil_bekas->description), 255) }}" />
<meta property="og:image" content="{{ url('/img/mobil-bekas/' . $mobil_bekas->foto1) }}" />
@endsection

@section('meta_twitter_card')
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:site" content="@tutanews">
<meta name="twitter:creator" content="@tutacare">
<meta name="twitter:title" content="{{$mobil_bekas->title}}">
<meta name="twitter:description" content="{{ str_limit(strip_tags($mobil_bekas->description), 255) }}">
<meta name="twitter:image" content="{{ url('/img/mobil-bekas/' . $mobil_bekas->foto1) }}">
@endsection

@section('scripts')
<script src="{!! asset('mytuta/js/select.spec.js') !!}"></script>
@endsection

@section('content')
<!-- Start Page header -->
    <div class="page-header parallax" style="background-image:url(/images/assets/spec-detail.jpg);">
    	<div class="container">
        	<h1 class="page-title">Spesifikasi Mobil Bekas</h1>
       	</div>
    </div>
    <!-- Utiity Bar -->
    <div class="utility-bar">
    	<div class="container">
        	<div class="row">
            	<div class="col-md-8 col-sm-6 col-xs-8">
                    <ol class="breadcrumb">
                        <li><a href="/">Beranda</a></li>
                        <li class="active">Spesifikasi Mobil Bekas</li>
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
           <!-- Vehicle Details -->
             <article class="single-vehicle-details">
                 <div class="single-vehicle-title">
                     <span class="badge-premium-listing">Mobil Bekas</span>
                     <h2 class="post-title">{{$mobil_bekas->title}} </h2>
                 </div>
                 <div class="single-listing-actions">
                     <div class="btn-group pull-right" role="group">
                         <a href="#" class="btn btn-default" title="Download Manual"><i class="fa fa-phone"></i> <span>Penjual: {{$mobil_bekas->user->phone}}</span></a>
                     </div>
                     <div class="btn btn-info price">Rp. {{number_format($mobil_bekas->product_price, 0 , ',', '.')}} @if ($mobil_bekas->nego == 1) Nego @endif</div>
                 </div>
                 <div class="row">
                     <div class="col-md-8">
                         <div class="single-listing-images">
                             <div class="featured-image format-image">
                                 <a href="/img/mobil-bekas/{{$mobil_bekas->foto1}}" data-rel="prettyPhoto[gallery]" class="media-box"><img src="/img/mobil-bekas/{{$mobil_bekas->foto1}}" alt=""></a>
                             </div>
                             <div class="additional-images">
                                     <ul class="owl-carousel" data-columns="4" data-pagination="no" data-arrows="yes" data-single-item="no" data-items-desktop="4" data-items-desktop-small="4" data-items-tablet="3" data-items-mobile="3">
                                        @if($mobil_bekas->foto2)
                                          <li class="item format-image"> <a href="/img/mobil-bekas/{{$mobil_bekas->foto2}}" data-rel="prettyPhoto[gallery]" class="media-box"><img src="/img/mobil-bekas/{{$mobil_bekas->foto2}}" alt=""></a></li>
                                        @endif
                                        @if($mobil_bekas->foto3)
                                          <li class="item format-image"> <a href="/img/mobil-bekas/{{$mobil_bekas->foto3}}" data-rel="prettyPhoto[gallery]" class="media-box"><img src="/img/mobil-bekas/{{$mobil_bekas->foto3}}" alt=""></a></li>
                                        @endif
                                        @if($mobil_bekas->foto4)
                                          <li class="item format-image"> <a href="/img/mobil-bekas/{{$mobil_bekas->foto4}}" data-rel="prettyPhoto[gallery]" class="media-box"><img src="/img/mobil-bekas/{{$mobil_bekas->foto4}}" alt=""></a></li>
                                        @endif
                                        @if($mobil_bekas->foto5)
                                          <li class="item format-image"> <a href="/img/mobil-bekas/{{$mobil_bekas->foto5}}" data-rel="prettyPhoto[gallery]" class="media-box"><img src="/img/mobil-bekas/{{$mobil_bekas->foto5}}" alt=""></a></li>
                                        @endif
                                     </ul>
                             </div>
                         </div>
                         <!--  -->
                         <div class="spacer-50"></div>


                            <div class="tabs vehicle-details-tabs">
                                <ul class="nav nav-tabs">
                                    <li class="active"> <a data-toggle="tab" href="#vehicle-overview">Keterangan</a></li>
                                </ul>
                                <div class="tab-content">
                                    <div id="vehicle-overview" class="tab-pane fade in active">
                                        <p>{!! $mobil_bekas->description !!}</p>
                                    </div>

                                </div>
                    		</div>
                        <div class="spacer-50"></div>

                         <div align="right">
                         @include('widgets.somacro')
                         </div>
                     </div>
                     <div class="col-md-4">
                         <div class="sidebar-widget widget">
                             <ul class="list-group">
                                 <li class="list-group-item"> <span class="badge">Merek</span> {{$mobil_bekas->merek->merek}}</li>
                                 <li class="list-group-item"> <span class="badge">Model</span> {{$mobil_bekas->design->design}}</li>
                                 <li class="list-group-item"> <span class="badge">Tahun</span> {{$mobil_bekas->tahun}}</li>
                                 <li class="list-group-item"> <span class="badge">Transmisi</span> {{$mobil_bekas->transmisi}}</li>

                               </ul>
                         </div>

                         <!-- call -->
                         <div class="sidebar-widget widget seller-contact-widget">
                             <div class="vehicle-enquiry-foot">
                                 <span class="vehicle-enquiry-foot-ico"><i class="fa fa-phone"></i></span>
                                 <strong>{{$mobil_bekas->user->phone}}</strong>Hubungi Penjual<br />
                                 <center>
                                   <img src="{{TutaComp::getImage($mobil_bekas->user->foto)}}" class="img-thumbnail" alt="{{$mobil_bekas->user->name}}" width="150px">
                                   <br />
                                   {{$mobil_bekas->user->name}}
                                 </center>
                             </div>
                         </div>
                         <!-- end call -->
                         <!-- situs -->

                         <!-- end situs -->
                         <!-- select car -->


                                                  <!-- end select car -->
                     </div>
                 </div>
               <div class="spacer-50"></div>

             </article>
             <div class="clearfix"></div>
         </div>
     </div>
 </div>
 <!-- End Body Content -->
@endsection
