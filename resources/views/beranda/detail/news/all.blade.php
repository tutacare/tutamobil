@extends('layouts.app')

@section('scripts')
 <script id="dsq-count-scr" src="//mobilokal.disqus.com/count.js" async></script>
@endsection

@section('content')
<!-- Start Page header -->
    <div class="page-header parallax" style="background-image:url(/images/assets/spec-detail.jpg);">
    	<div class="container">
        	<h1 class="page-title">Berita</h1>
       	</div>
    </div>
    <!-- Utiity Bar -->
    <div class="utility-bar">
    	<div class="container">
        	<div class="row">
            	<div class="col-md-8 col-sm-6 col-xs-8">
                    <ol class="breadcrumb">
                        <li><a href="/">Beranda</a></li>
                        <li class="active">Berita</li>
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
                	<div class="col-md-9 posts-archive">
                    @foreach($news as $value)
                  		<article class="post format-standard">
                    		<div class="row">
                      			<div class="col-md-4 col-sm-4"> <a href="/news/{{$value->post_slug}}"><img src="/img/post/{{$value->post_foto}}" alt="" class="img-thumbnail"></a> </div>
                      			<div class="col-md-8 col-sm-8">
                                    <div class="post-actions">
                                        <div class="post-date">{{ date('d F Y', strtotime($value->created_at))}}</div>
                                        <div class="comment-count"><i class="icon-dialogue-text"></i> <span class="disqus-comment-count" data-disqus-url="{{url()->full()}}/{{$value->post_slug}}"></span></div>
                                    </div>
                        			<h3 class="post-title"><a href="/news/{{$value->post_slug}}">{{ $value->post_title }}</a></h3>
                        			<p>{!! str_limit(strip_tags($value->post_content), 300) !!} <a href="/news/{{$value->post_slug}}" class="continue-reading">Selengkapnya <i class="fa fa-long-arrow-right"></i></a></p>
                                   	<div class="post-meta">Posted in: <a href="#">{{$value->category->category}}</a></div>
                      			</div>
                    		</div>
                  		</article>
                      @endforeach


                        <ul class="pagination">
                            <li><a href="#"><i class="fa fa-chevron-left"></i></a></li>
                            <li class="active"><a href="#">1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">4</a></li>
                            <li><a href="#">5</a></li>
                            <li><a href="#"><i class="fa fa-chevron-right"></i></a></li>
                        </ul>
                    </div>
                    <!-- Start Sidebar -->
                    <div class="col-md-3 sidebar">
                        <div class="widget sidebar-widget search-form-widget">
                          <form method="GET" action="{{ url('/news/search/key') }}">
                            <div class="input-group input-group-lg">
                                <input type="text" class="form-control" name="q" value="{{$query_search or ''}}" placeholder="Cari Berita..." required />
                                <span class="input-group-btn">
                                    <button class="btn btn-default" type="submit"><i class="fa fa-search fa-lg"></i></button>
                                </span>
                            </div>
                          </form>
                        </div>
                        @include('widgets.kategori-berita')

                    </div>
              	</div>
            </div>
        </div>
   	</div>
    <!-- End Body Content -->
@endsection
