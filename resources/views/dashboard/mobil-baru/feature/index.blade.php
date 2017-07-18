@extends('layouts.app-dash-lte')

@section('meta')
<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('styles')
  <link rel="stylesheet" href="{!! asset('template/plugins/datatables/dataTables.bootstrap.css') !!}">
@endsection

@section('scripts')
<script src="{!! asset('template/plugins/datatables/jquery.dataTables.min.js') !!}"></script>
<script src="{!! asset('template/plugins/datatables/dataTables.bootstrap.min.js') !!}"></script>
{!! Html::script("/mytuta/js/mobil-baru/interior.exterior.js") !!}
{!! Html::script("/mytuta/js/mobil-baru/keamanan.kelengkapan.js") !!}
<script language="javascript" type="text/javascript">
  function resizeIframe(obj) {
    obj.style.height = obj.contentWindow.document.body.scrollHeight + 'px';
  }
</script>
<script type="text/javascript">
$(document).ready(function() {

  $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
  });

$('.btn-refresh').click(function(){
  location.reload();
});

  $('#example').DataTable();
  $('#example1').DataTable();


});
</script>
@endsection

@section('content-header', 'Feature Mobil Baru')

@section('breadcump')
<li>Dashboard</li>
<li>Mobil Baru</li>
<li>Spesifikasi Mobil Baru</li>
<li class="active">Feature</li>
@endsection

@section('content')

<!-- MOBIL BARU SPEC -->
<div class="box box-info">
  <div class="box-header with-border">
    <h3 class="box-title">Spesifikasi Mobil Baru</h3>
    <div class="box-tools pull-right">
      <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
      <i class="fa fa-minus"></i></button>
    </div>
  </div>
  <div class="box-body">
    <div class="row">
      <div class="col-xs-6">
        <table class="table table-condensed">
        <tr><td>Merek</td><td>:</td><td>{{$mobil_baru->merek->merek}}</td></tr>
        <tr><td>Model</td><td>:</td><td>{{$mobil_baru->design->design}}</td></tr>
        <tr><td>Tipe</td><td>:</td><td>{{$mobil_baru->tipe->tipe}}</td></tr>
      </table>
    </div>
    <div class="col-xs-6">
      <table class="table table-condensed">
      <tr><td>Negara Pembuat</td><td>:</td><td>{{$mobil_baru->negara_pembuat}}</td></tr>
      <tr><td>Foto</td><td>:</td><td><img src="/img/mobil-baru/{{$mobil_baru->foto}}" class="img-responsive" width="256px"></td></tr>
    </table>
  </div>
  </div>
  <!-- /.box-body -->
</div>
</div>
<!-- /.MOBIL BARU SPEC END -->

<!-- interior_exterior gambar -->
<div class="box box-danger">
	<div class="box-header with-border">
		<h3 class="box-title">
Interior Exterior Gambar
    </h3>
    <div class="box-tools pull-right">
      <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
      <i class="fa fa-minus"></i></button>
    </div>
	</div>
	<!-- /.box-header -->
	<div class="box-body">
		<iframe src="/dashboard/mobil-baru/interior" frameborder="0" width="100%" scrolling="no" id="iframe" onload='javascript:resizeIframe(this);'></iframe>
</div>
</div>
<!-- interior_exterior gambar end -->

<!-- interior_exterior text -->
<div class="box box-danger">
  <div class="box-header with-border">
    <h3 class="box-title">
<button class="btn btn-success" id="btn-add-interior"><i class="fa fa-plus-circle"></i> Tambah Interior Exterior Text</button> <button class="btn btn-info btn-refresh"><i class="fa fa-refresh"></i></button>
    </h3>
    <div class="box-tools pull-right">
      <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
      <i class="fa fa-minus"></i></button>
    </div>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
    <table id="example" class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>Interior dan Exterior</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody id="interior_exterior-list" name="interior_exterior-list">
        @foreach($interior_text as $value)
            <tr id="interior_exterior{{ $value->id }}">
                <td>{{ $value->interior_exterior }}</td>
                <td>
                    <button class="btn btn-xs btn-primary open-modal-interior" value="{{$value->id}}"><i class="glyphicon glyphicon-edit"></i> Edit</button>
                    <button class="btn btn-xs btn-danger delete-interior" value="{{$value->id}}"><i class="glyphicon glyphicon-trash"></i> Delete</button>
                </td>
            </tr>
        @endforeach
      </tbody>
    </table>
</div>
</div>
<!-- interior_exterior end -->

<!-- keamanan_kelengkapan gambar -->
<div class="box box-danger">
	<div class="box-header with-border">
		<h3 class="box-title">
Keamanan Kelengkapan Gambar
    </h3>
    <div class="box-tools pull-right">
      <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
      <i class="fa fa-minus"></i></button>
    </div>
	</div>
	<!-- /.box-header -->
	<div class="box-body">
		<iframe src="/dashboard/mobil-baru/keamanan" frameborder="0" width="100%" scrolling="no" id="iframe" onload='javascript:resizeIframe(this);'></iframe>
</div>
</div>
<!-- keamanan_kelengkapan gambar end -->

<!-- keamanan_kelengkapan text -->
<div class="box box-danger">
  <div class="box-header with-border">
    <h3 class="box-title">
<button class="btn btn-success" id="btn-add-keamanan"><i class="fa fa-plus-circle"></i> Tambah Kemananan Kelengkapan Text</button> <button class="btn btn-info btn-refresh"><i class="fa fa-refresh"></i></button>
    </h3>
    <div class="box-tools pull-right">
      <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
      <i class="fa fa-minus"></i></button>
    </div>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
    <table id="example1" class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>Keamanan dan Kelengkapan</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody id="keamanan_kelengkapan-list" name="keamanan_kelengkapan-list">
        @foreach($keamanan_text as $value)
            <tr id="keamanan_kelengkapan{{ $value->id }}">
                <td>{{ $value->keamanan_kelengkapan }}</td>
                <td>
                    <button class="btn btn-xs btn-primary open-modal-keamanan" value="{{$value->id}}"><i class="glyphicon glyphicon-edit"></i> Edit</button>
                    <button class="btn btn-xs btn-danger delete-keamanan" value="{{$value->id}}"><i class="glyphicon glyphicon-trash"></i> Delete</button>
                </td>
            </tr>
        @endforeach
      </tbody>
    </table>
</div>
</div>
<!-- keamanan_kelengkapan text end -->

<!-- Gallery iframe -->
<div class="box box-danger">
	<div class="box-header with-border">
		<h3 class="box-title">
Gallery
    </h3>
    <div class="box-tools pull-right">
      <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
      <i class="fa fa-minus"></i></button>
    </div>
	</div>
	<!-- /.box-header -->
	<div class="box-body">
		<iframe src="/dashboard/mobil-baru/gallery" frameborder="0" width="100%" scrolling="no" id="iframe" onload='javascript:resizeIframe(this);'></iframe>
</div>
</div>
<!-- gallery iframe end -->

<!-- Modal interior_exterior -->
<div id="myModalInterior" class="modal fade" role="dialog" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
        <h4 class="modal-title" id="myModalLabel">Interior Exterior Form</h4>
      </div>
      <div class="modal-body">
      {!! Form::open(array('id' => 'frm', 'name' => 'frm',  'onsubmit' => "return false;")) !!}
      <input id="token-interior" type="hidden" value="{{ csrf_token() }}">
      @include('dashboard.mobil-baru.feature.interior_form')
      {!! Form::close() !!}
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
<!-- Modal interior_exterior end-->

<!-- Modal keamanan_kelengkapan -->
<div id="myModalKeamanan" class="modal fade" role="dialog" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
        <h4 class="modal-title" id="myModalLabel">Keamanan Kelengkapan Form</h4>
      </div>
      <div class="modal-body">
      {!! Form::open(array('id' => 'frmk', 'name' => 'frmk',  'onsubmit' => "return false;")) !!}
      <input id="token" type="hidden" value="{{ csrf_token() }}">
      @include('dashboard.mobil-baru.feature.keamanan_form')
      {!! Form::close() !!}
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
<!-- Modal keamanan_kelengkapan end-->

<!-- AKSI -->
<div class="box box-danger">
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
        <a class="btn btn-small btn-info" href="{{ URL::to('dashboard/mobil-baru') }}">Kembali</a>

      </div>
    </div>
  </div>
  <!-- /.box-body -->
</div>
</div>
<!-- /.AKSI END -->

@endsection
