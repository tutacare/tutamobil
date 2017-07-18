<div class="widget sidebar-widget widget_categories">
    <h3 class="widgettitle">Kategori Berita</h3>
    <ul>
      @foreach($category as $value)
        @if(TutaComp::getCountCategory($value->id) <> 0)
          <li><a href="/news/category/{{$value->slug}}">{{$value->category}}</a> ({{TutaComp::getCountCategory($value->id)}})</li>
        @endif
      @endforeach
    </ul>
</div>
