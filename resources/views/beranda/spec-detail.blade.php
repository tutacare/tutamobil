@extends('layouts.app')

@section('styles')
<link rel="stylesheet" type="text/css" href="/bower_components/sweetalert/dist/sweetalert.css">
@endsection

@section('title_share')
{{$mobil_baru->merek->merek}} {{$mobil_baru->design->design}} {{$mobil_baru->tipe->tipe}} - {{$spec->city->city}}
@endsection

@section('title')
{{$mobil_baru->merek->merek}} {{$mobil_baru->design->design}} {{$mobil_baru->tipe->tipe}} - {{$spec->city->city}}
@endsection
@section('description')
Pilih mobil idaman, apply sekarang juga. Hub Marketing {{$mobil_baru->merek->merek}} {{$spec->city->city}} : {{$spec->user->name}} HP: {{$spec->user->phone}}
@endsection
@section('author')
{{$spec->user->name}}
@endsection
@section('image_source')
<link rel="image_src" href="{{ url('/img/mobil-baru/' . $mobil_baru->foto) }}" />
@endsection

@section('meta_facebook')
<meta property="og:url" content="{{Request::url()}}" />
<meta property="og:type" content="website" />
<meta property="og:title" content="{{$mobil_baru->merek->merek}} {{$mobil_baru->design->design}} {{$mobil_baru->tipe->tipe}} - {{$spec->city->city}}" />
<meta property="og:description" content="Pilih mobil idaman, apply sekarang juga. Hub Marketing {{$mobil_baru->merek->merek}} {{$spec->city->city}} : {{$spec->user->name}} HP: {{$spec->user->phone}}" />
<meta property="og:image" content="{{ url('/img/mobil-baru/' . $mobil_baru->foto) }}" />
@endsection

@section('meta_twitter_card')
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:site" content="@tutanews">
<meta name="twitter:creator" content="@tutacare">
<meta name="twitter:title" content="{{$mobil_baru->merek->merek}} {{$mobil_baru->design->design}} {{$mobil_baru->tipe->tipe}} - {{$spec->city->city}}">
<meta name="twitter:description" content="Pilih mobil idaman, apply sekarang juga. Hub Marketing {{$mobil_baru->merek->merek}} {{$spec->city->city}} : {{$spec->user->name}} HP: {{$spec->user->phone}}">
<meta name="twitter:image" content="{{ url('/img/mobil-baru/' . $mobil_baru->foto) }}">
@endsection

@section('scripts')
<script src="{!! asset('mytuta/js/select.spec.js') !!}"></script>
<script src="/bower_components/sweetalert/dist/sweetalert.min.js"></script>
<script src="/mytuta/js/credit-simulation.js"></script>
<script>

</script>
@endsection

@section('content')
<!-- Start Page header -->
    <div class="page-header parallax" style="background-image:url(/images/assets/spec-detail.jpg);">
    	<div class="container">
        	<h1 class="page-title">Spesifikasi Mobil Baru</h1>
       	</div>
    </div>
    <!-- Utiity Bar -->
    <div class="utility-bar">
    	<div class="container">
        	<div class="row">
            	<div class="col-md-8 col-sm-6 col-xs-8">
                    <ol class="breadcrumb">
                        <li><a href="/">Beranda</a></li>
                        <li class="active">Spesifikasi Mobil Baru</li>
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
                     <span class="badge-premium-listing">{{$mobil_baru->merek->merek}} | {{$spec->city->city}}</span>
                     <h2 class="post-title">{{$mobil_baru->merek->merek}} {{$mobil_baru->design->design}} {{$mobil_baru->tipe->tipe}}</h2>
                 </div>
                 <div class="single-listing-actions">
                     <div class="btn-group pull-right" role="group">
                         <a href="#" class="btn btn-default" title="Download Manual"><i class="fa fa-book"></i> <span>Download Brosur</span></a>
                     </div>
                     <div class="btn btn-info price">Rp. {{number_format((isset($price->harga) ? $price->harga : 0), 0 , ',', '.')}} / {{$spec->city->city}}</div>
                 </div>
                 <div class="row">
                     <div class="col-md-8">
                         <div class="single-listing-images">
                             <div class="featured-image format-image">
                                 <a href="/img/mobil-baru/{{$mobil_baru->foto}}" data-rel="prettyPhoto[gallery]" class="media-box"><img src="/img/mobil-baru/{{$mobil_baru->foto}}" alt=""></a>
                             </div>
                             <div class="additional-images">
                                     <ul class="owl-carousel" data-columns="4" data-pagination="no" data-arrows="yes" data-single-item="no" data-items-desktop="4" data-items-desktop-small="4" data-items-tablet="3" data-items-mobile="3">
                                         @foreach($gallery as $value)
                                         <li class="item format-image"> <a href="/img/gallery/{{$value->gallery}}" data-rel="prettyPhoto[gallery]" class="media-box"><img src="/img/gallery/{{$value->gallery}}" alt=""></a></li>
                                         @endforeach
                                     </ul>
                             </div>
                         </div>
                         <!--  -->
                         <div class="spacer-50"></div>

                         @include('widgets.interior-exterior-detail')
                         <div class="spacer-50"></div>
                         @include('widgets.keamanan-kelengkapan-detail')
                         @if(isset($price->harga))
                         <div class="spacer-50"></div>
                         @include('widgets.simulasi-kredit')
                         @endif
                         <div class="spacer-50"></div>
                         <div align="right">
                         @include('widgets.somacro')
                         </div>
                     </div>
                     <div class="col-md-4">
                         <div class="sidebar-widget widget">
                             <ul class="list-group">
                                 <li class="list-group-item"> <span class="badge">Merek</span> {{$mobil_baru->merek->merek}}</li>
                                 <li class="list-group-item"> <span class="badge">Model</span> {{$mobil_baru->design->design}}</li>
                                 <li class="list-group-item"> <span class="badge">Tipe</span> {{$mobil_baru->tipe->tipe}}</li>
                                 <li class="list-group-item"> <span class="badge">Negara Pembuat</span> {{$mobil_baru->negara_pembuat}}</li>

                               </ul>
                         </div>
                         @include('widgets.tab-newcar-detail')
                         <!-- call -->
                         <div class="sidebar-widget widget seller-contact-widget">
                             <div class="vehicle-enquiry-foot">
                                 <span class="vehicle-enquiry-foot-ico"><i class="fa fa-phone"></i></span>
                                 <strong>{{$spec->user->phone}}</strong>Hubungi Marketing<br />
                                 <center>
                                   <img src="{{TutaComp::getImage($spec->user->foto)}}" class="img-thumbnail" alt="{{$spec->user->name}}" width="250px">
                                   <br />
                                   <strong>{{$spec->user->name}}</strong>
                                   Marketing {{$mobil_baru->merek->merek}} {{$spec->city->city}}
                                 </center>
                             </div>
                         </div>
                         <!-- end call -->
                         <!-- situs -->
                         @if($spec->user->website)
                         <div class="sidebar-widget widget seller-contact-widget">
                             <div class="vehicle-enquiry-foot">
                                 <span class="vehicle-enquiry-foot-ico"><i class="fa fa-globe"></i></span>
                                 <strong>{{$spec->user->website}}</strong>Situs
                             </div>
                         </div>
                         @endif
                         <!-- end situs -->
                         <!-- select car -->

                           <div class="sidebar-widget widget seller-contact-widget">
                             <h4>Pilih Spesifikasi lain:</h4>
                             @include('widgets.select-car')
                           </div>
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
