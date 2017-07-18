<div class="row">
      <!-- Latest News -->
      <div class="col-md-12 col-sm-6">
          <section class="listing-block latest-news">
              <div class="listing-header">
                <a href="/news" class="btn btn-sm btn-default pull-right">Semua Berita</a>
                  <h3>Berita Terbaru</h3>
              </div>
              <div class="listing-container">
                <div class="carousel-wrapper">
                      <div class="row">
                          <ul class="owl-carousel" id="news-slider" data-columns="4" data-autoplay="" data-pagination="yes" data-arrows="yes" data-single-item="no" data-items-desktop="4" data-items-desktop-small="3" data-items-tablet="2" data-items-mobile="1">
                            @foreach($post as $value)
                              <li class="item">
                                  <div class="post-block format-standard">
                                      <a href="/news/{{$value->post_slug}}" class="media-box post-image"><img src="/img/post/{{$value->post_foto}}" alt=""></a>
                                      <div class="post-actions">
                                          <div class="post-date">{{date('d F Y', strtotime($value->created_at))}}</div>
                                          <div class="comment-count"><a href="#"><i class="icon-dialogue-text"></i> <span class="disqus-comment-count" data-disqus-url="{{url()->full()}}/news/{{$value->post_slug}}"></span></a></div>
                                      </div>
                                      <h3 class="post-title"><a href="/news/{{$value->post_slug}}">{{$value->post_title}}</a></h3>
                                      <div class="post-content">
                                          <p>{!! str_limit(strip_tags($value->post_content), 200) !!}</p>
                                      </div>
                                      <div class="post-meta">
                                          Posted in: <a href="/news/category/{{$value->category->slug}}"><span class="label label-primary">{{$value->category->category}}</span></a>
                                      </div>
                                  </div>
                              </li>
                            @endforeach
                          </ul>
                      </div>
                  </div>
              </div>
          </section>
      <div class="spacer-40"></div>

      </div>


  </div>
