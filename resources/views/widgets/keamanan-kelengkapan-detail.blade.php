<div class="listing-header" id="credit">
    <h3>Keamanan Kelengkapan</h3>

</div>
<div class="additional-images">
        <ul class="owl-carousel" data-columns="4" data-pagination="no" data-arrows="yes" data-single-item="no" data-items-desktop="4" data-items-desktop-small="4" data-items-tablet="3" data-items-mobile="3">
          @foreach($keamanan_kelengkapan as $value)
            <li class="item format-image"> <a href="/img/keamanan/{{$value->keamanan_kelengkapan}}" data-rel="prettyPhoto[keamanan]" class="media-box"><img src="/img/keamanan/{{$value->keamanan_kelengkapan}}" alt=""></a></li>
          @endforeach
        </ul>
</div>
<div class="spacer-20"></div>
<div id="vehicle-add-features">
	<ul class="add-features-list">
		@foreach($keamanan_text as $val)
    	<li>{{$val->keamanan_kelengkapan}}</li>
    	@endforeach
    </ul>
</div>