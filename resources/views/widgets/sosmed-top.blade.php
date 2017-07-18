<div class="col-md-4 col-sm-6 col-xs-4">
  <ul class="utility-icons social-icons social-icons-colored">
    @if($sosmed->facebook)
      <li class="facebook"><a href="{{$sosmed->facebook}}" target="_blank"><i class="fa fa-facebook"></i></a></li>
    @endif
    @if($sosmed->twitter)
      <li class="twitter"><a href="{{$sosmed->twitter}}"><i class="fa fa-twitter"></i></a></li>
    @endif
    @if($sosmed->google)
      <li class="googleplus"><a href="{{$sosmed->google}}"><i class="fa fa-google-plus"></i></a></li>
    @endif
    @if($sosmed->linkedin)
      <li class="linkedin"><a href="{{$sosmed->linkedin}}"><i class="fa fa-linkedin"></i></a></li>
    @endif
    </ul>
</div>
