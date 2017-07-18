<section class="listing-block recent-vehicles">
  <div class="listing-header">
      <h3>Mobil Bekas</h3>
    </div>
    <div class="listing-container">
        <div class="carousel-wrapper">
            <div class="row">
                <ul class="owl-carousel carousel-fw" id="vehicle-slider" data-columns="4" data-autoplay="" data-pagination="yes" data-arrows="no" data-single-item="no" data-items-desktop="4" data-items-desktop-small="3" data-items-tablet="2" data-items-mobile="1">
                    <!-- foreach mobil baru-->
                    @foreach($mobil_bekas as $value)
                    <li class="item">
                        <div class="vehicle-block format-standard">
                            <a href="/mobil-bekas/{{$value->slug}}" class="media-box"><img src="/img/mobil-bekas/{{$value->foto1}}" alt=""></a>
                            <div class="vehicle-block-content">
                                <span class="label label-default vehicle-age">Mobil Bekas</span>
                                <span class="label label-danger premium-listing">{{$value->merek->merek}} | {{$value->city->city}}</span>
                                <h5 class="vehicle-title"><a href="/mobil-bekas/{{$value->slug}}">{{$value->title}}</a></h5>
                                <span class="vehicle-meta">Penjual: <abbr class="user-type" title="Listed by an individual user">{{$value->user->name}}</abbr></span>

                                <span class="vehicle-cost pull-right">Rp. {{number_format($value->product_price, 0 , ',', '.')}} @if ($value->nego == 1) Nego @endif</span>
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
