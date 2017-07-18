@extends('layouts.app')

@section('title_share')
{{$news->post_title}} by {{ $news->user->name }}
@endsection

@section('title')
{{$news->post_title}}
@endsection
@section('description')
{{ str_limit(strip_tags($news->post_content), 255) }}
@endsection
@section('author')
{{ $news->user->name }}
@endsection
@section('image_source')
<link rel="image_src" href="{{ url('/img/post/'.$news->post_foto) }}" />
@endsection

@section('meta_facebook')
<meta property="og:url" content="{{Request::url()}}" />
<meta property="og:type" content="website" />
<meta property="og:title" content="{{ $news->post_title }}" />
<meta property="og:description" content="{{ str_limit(strip_tags($news->post_content), 255) }}" />
<meta property="og:image" content="{{ url('/img/post/'.$news->post_foto) }}" />
@endsection

@section('meta_twitter_card')
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:site" content="@tutanews">
<meta name="twitter:creator" content="@tutacare">
<meta name="twitter:title" content="{{ $news->post_title }}">
<meta name="twitter:description" content="{{ str_limit(strip_tags($news->post_content), 255) }}">
<meta name="twitter:image" content="{{ url('/img/post/'.$news->post_foto) }}">
@endsection

@section('scripts')
<script>
    /**
     *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
     *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables
     */
/*
    var disqus_config = function () {
        this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
        this.page.identifier = {{$news->post_slug}}; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
    };
*/
    (function() {  // DON'T EDIT BELOW THIS LINE
        var d = document, s = d.createElement('script');

        s.src = '//mobilokal.disqus.com/embed.js';

        s.setAttribute('data-timestamp', +new Date());
        (d.head || d.body).appendChild(s);
    })();
</script>
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
                        <li><a href="/news">Berita</a></li>
                        <li class="active">{{ $news->post_title }}</li>
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
          			<div class="col-md-9 single-post">
            			<header class="single-post-header clearfix">
                            <div class="post-actions">
                                <div class="post-date">{{ date('d F Y', strtotime($news->created_at))}}</div>
                                <div class="comment-count"><i class="icon-dialogue-text"></i> <span class="disqus-comment-count" data-disqus-url="{{url()->current()}}">0</span></div>
                            </div>
              				<h2 class="post-title">{{ $news->post_title }}</h2>
            			</header>
            			<article class="post-content">
              				<div class="featured-image"> <img src="/img/post/{{$news->post_foto}}" alt=""> </div>
              				<p>{!! $news->post_content !!}</p>
              				<div class="post-meta"> <i class="fa fa-tags"></i> <a href="#">Financial</a>, <a href="#">Advice</a>, <a href="#">Recommendations</a>, <a href="#">Trials</a>, <a href="#">Car</a>, <a href="#">Autostars</a> </div>
                            <!-- Pagination -->
                            <br />
                            <div align="right">
                            @include('widgets.somacro')
                            </div>
                            <br />
                            <!-- About Author -->
                            <section class="about-author">
                                <div class="img-thumbnail"> <img src="/img/user/{{$news->user->foto}}" alt="avatar"> </div>
                                <div class="post-author-content">
                                    <h3>{{$news->user->name}} <span class="label label-success">Penulis</span></h3>
                               		@if($news->user->user_info)
                                  <p>{{$news->user->user_info}}</p>
                                  @endif
                                </div>
                            </section>
            			</article>
            			<section class="post-comments" id="comments">
                      <div id="disqus_thread"></div>
                  </section>
          			</div>
          			<!-- Start Sidebar -->
          			<div class="col-md-3 sidebar">
                        <div class="widget sidebar-widget widget_recent_posts">
                            <h3 class="widgettitle">Berita Terbaru</h3>
                            <ul>
                              @foreach($berita_baru as $value)
                            	<li>
                                	<a href="/news/{{$value->post_slug}}"><img src="/img/post/{{$value->post_foto}}" alt="" class="img-thumbnail"></a>
                                    <h5><a href="/news/{{$value->post_slug}}">{{$value->post_title}}</a></h5>
                                    <div class="post-actions"><div class="post-date">{{Carbon::createFromTimeStamp(strtotime($value->created_at))->diffForHumans()}}</div></div>
                                </li>
                              @endforeach
                            </ul>
                       	</div>

                        @include('widgets.kategori-berita')
            		</div>
          		</div>
        	</div>
      	</div>
 	</div>
    <!-- End Body Content -->
@endsection
