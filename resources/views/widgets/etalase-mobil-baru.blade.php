<section class="listing-block recent-vehicles">
  <div class="listing-header">
    <a href="/mobil-baru" class="btn btn-sm btn-default pull-right">Semua Mobil Baru</a>
      <h3>Mobil Baru</h3>
    </div>
    <div class="listing-container">
        <div class="carousel-wrapper">
            <div class="row">
                <ul class="owl-carousel carousel-fw" id="vehicle-slider" data-columns="4" data-autoplay="" data-pagination="yes" data-arrows="no" data-single-item="no" data-items-desktop="4" data-items-desktop-small="3" data-items-tablet="2" data-items-mobile="1">
                    <!-- foreach mobil baru-->
                    @foreach($newcar as $value)
                    <li class="item">
                        <div class="vehicle-block format-standard">
                            <a href="/mobil-baru/{{$value->city_slug}}/{{$value->slug}}" class="media-box"><img src="/img/mobil-baru/{{$value->foto}}" alt=""></a>
                            <div class="vehicle-block-content">
                                <span class="label label-default vehicle-age">Mobil Baru</span>
                                <span class="label label-danger premium-listing">{{$value->merek}} | {{$value->city}}</span>
                                <h5 class="vehicle-title"><a href="/mobil-baru/{{$value->city_slug}}/{{$value->slug}}">{{$value->design}} {{$value->tipe}}</a></h5>
                                <span class="vehicle-meta">Marketing: <abbr class="user-type" title="Listed by an individual user">{{$value->phone}}</abbr></span>

                                <span class="vehicle-cost pull-right">Rp. {{number_format($value->harga, 0 , ',', '.')}}</span>
                            </div>
                        </div>
                    </li>
                    @endforeach
                    <!-- endforeach mobil baru -->
                </ul>
            </div>
        </div>
    </div>
</section>
