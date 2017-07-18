<div class="listing-header">
<h3>Interior Exterior</h3>
</div>
<div class="additional-images">
        <ul class="owl-carousel" data-columns="4" data-pagination="no" data-arrows="yes" data-single-item="no" data-items-desktop="4" data-items-desktop-small="4" data-items-tablet="3" data-items-mobile="3">
          @foreach($interior_exterior as $value)
            <li class="item format-image"> <a href="/img/interior/{{$value->interior_exterior}}" data-rel="prettyPhoto[interior]" class="media-box"><img src="/img/interior/{{$value->interior_exterior}}" alt=""></a></li>
          @endforeach
        </ul>
</div>
<div class="spacer-20"></div>
<div id="vehicle-add-features">
	<ul class="add-features-list">
		@foreach($interior_text as $val)
    	<li>{{$val->interior_exterior}}</li>
    	@endforeach
    </ul>
</div>
