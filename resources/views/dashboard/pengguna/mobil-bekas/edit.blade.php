@extends('layouts.app-dash-lte')

@section('styles')
<link rel="stylesheet" href="{!! asset('bower_components/jquery-ui/themes/flick/jquery-ui.min.css') !!}">
<link rel="stylesheet" href="{!! asset('aehlke-tag-it/css/jquery.tagit.css') !!}">
@endsection

@section('scripts')
<script type="text/javascript">
    $(document).ready(function() {
        $("#myTags").tagit();
        //menu active
        $('#menu-berita').addClass("active");
        $('#menu-post').addClass("active");
    });
</script>
<script src="{!! asset('ckeditor/ckeditor.js') !!}"></script>
<script>
CKEDITOR.replace( 'post_content', {
        filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
        filebrowserBrowseUrl: '/laravel-filemanager?type=Files'
    });
</script>
<script src="{!! asset('bower_components/jquery-ui/jquery-ui.min.js') !!}"></script>
<script src="{!! asset('aehlke-tag-it/js/tag-it.min.js') !!}"></script>

<script type="text/javascript">
//submit form disabled enter
$(function(){
 var keyStop = {
   8: ":not(input:text, textarea, input:file, input:password)", // stop backspace = back
   13: "input:text, input:password", // stop enter = submit

   end: null
 };
 $(document).bind("keydown", function(event){
  var selector = keyStop[event.which];

  if(selector !== undefined && $(event.target).is(selector)) {
      event.preventDefault(); //stop event
  }
  return true;
 });
});
  </script>
@endsection

@section('content-header', 'Ganti Postingan')

@section('breadcump')
<li>Dashboard</li>
<li>Posting</li>
<li class="active">Mengganti Postingan</li>
@endsection

@section('content')
@if (Session::has('message'))
<div class="row">
<div class="col-md-12">
  <div class="alert {{ Session::get('alert-class', 'alert-success') }} alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    {{ Session::get('message') }}
  </div>
</div></div>
@endif
<!-- POST BARU -->
<div class="box box-primary">
  <div class="box-header with-border">
    <h3 class="box-title">Ganti Posting</h3>
    <div class="box-tools pull-right">
      <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
      <i class="fa fa-minus"></i></button>
    </div>
  </div>
  <div class="box-body">
    <div class="row">
      {!! Form::model($post, array('route' => array('dashboard.post.update', $post->id), 'method' => 'PUT', 'files' => true)) !!}
      <div class="col-xs-12">
      {{ Form::tutaText('post_title', null, '*', ['required' => 'required'], 'Judul') }}
      <div class="form-group required {{ $errors->has('category_id') ? ' has-error' : '' }}">
          {!! Form::label('category_id', 'Kategori') !!} <strong class="text-danger"> *</strong>
          {!! Form::select('category_id', $category, null, array('class' => 'form-control', 'required' => 'required')) !!}
          @if ($errors->has('category_id'))
              <span class="help-block">
                  <strong>{{ $errors->first('citcategory_idy_id') }}</strong>
              </span>
          @endif
      </div>
      <div class="form-group">
        {!! Form::label('post_content', 'Post Content') !!} <strong class="text-danger"> *</strong>
      {!! Form::textarea('post_content', null, ['id' => 'post_content']) !!}
      </div>
      <div class="form-group">
        {!! Form::label('tag', 'Tag') !!}
        <input name="post_tag" id="myTags" value="{{$post->post_tag}}">
      </div>
      <div class="form-group">
      <p><img src="/img/post/{{$post->post_foto}}" width="100px"></p>
      {!! Form::label('post_foto', 'Photo') !!} *Ukuran ideal 890 x 600 px
      {!! Form::file('post_foto', null, array('class' => 'form-control')) !!}
      </div>

      </div>
    </div>

  <!-- /.box-body -->
</div>
</div>
<!-- /.POST END -->


<!-- AKSI -->
<div class="box box-primary">
  <div class="box-header with-border">
    <h3 class="box-title">Aksi</h3>
    <div class="box-tools pull-right">
      <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
      <i class="fa fa-minus"></i></button>
    </div>
  </div>
  <div class="box-body">

  <div class="row">
    <div class="col-xs-12">
      <div class="form-group pull-right">
        {!! Form::submit('Draft', array('class' => 'btn btn-default', 'name' => 'button')) !!}
        {!! Form::submit('Publish', array('class' => 'btn btn-primary', 'name' => 'button')) !!}
        <a class="btn btn-small btn-warning" href="{{ URL::to('dashboard/post') }}">Batal</a>
        {!! Form::close() !!}
      </div>
    </div>
  </div>
  <!-- /.box-body -->
</div>
</div>
<!-- /.AKSI END -->

@endsection
