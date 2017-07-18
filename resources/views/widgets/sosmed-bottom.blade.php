<ul class="social-icons social-icons-colored pull-right">
  @if(TutaComp::sosmed()->facebook)
    <li class="facebook"><a href="{{TutaComp::sosmed()->facebook}}" target="_blank"><i class="fa fa-facebook"></i></a></li>
  @endif
  @if(TutaComp::sosmed()->twitter)
    <li class="twitter"><a href="{{TutaComp::sosmed()->twitter}}"><i class="fa fa-twitter"></i></a></li>
  @endif
  @if(TutaComp::sosmed()->google)
    <li class="googleplus"><a href="{{TutaComp::sosmed()->google}}"><i class="fa fa-google-plus"></i></a></li>
  @endif
  @if(TutaComp::sosmed()->linkedin)
    <li class="linkedin"><a href="{{TutaComp::sosmed()->linkedin}}"><i class="fa fa-linkedin"></i></a></li>
  @endif
</ul>
