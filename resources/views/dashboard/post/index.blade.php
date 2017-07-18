@extends('layouts.app-dash-lte')

@section('styles')
<link rel="stylesheet" href="{!! asset('template/plugins/datatables/dataTables.bootstrap.css') !!}">
@endsection

@section('scripts')
<script src="{!! asset('template/plugins/datatables/jquery.dataTables.min.js') !!}"></script>
<script src="{!! asset('template/plugins/datatables/dataTables.bootstrap.min.js') !!}"></script>
<script type="text/javascript">
$(document).ready(function() {
    $('#cdata').DataTable();
    //menu active
    $('#menu-berita').addClass("active");
    $('#menu-post').addClass("active");
});
</script>
@endsection

@section('content-header', 'Posting')

@section('breadcump')
<li>Dashboard</li>
<li class="active">Posting</li>
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
<div class="box">
	<div class="box-header">
		<h3 class="box-title">
		<a href="/dashboard/post/create" class="btn btn-primary btn-sm" id="btn-add"><i class="fa fa-plus"></i> Buat Post Baru</a>
		</h3>
	</div>
	<!-- /.box-header -->
	<div class="box-body">
		<table id="cdata" class="table table-bordered table-striped">
			<thead>
				<tr>
					<th>NO#</th>
					<th>Judul</th>
          <th>Kategori</th>
          <th>Tanggal Dibuat</th>
          <th>Tanggal Diedit</th>
          <th>Status</th>
          <th>Aksi</th>
				</tr>
			</thead>
			<tbody>
				@foreach($post as $key => $value)
				<tr>
					<td>{{ $key+1 }}</td>
					<td>{{ $value->post_title }}</td>
          <td>{{ $value->category->category }}</td>
          <td>{{ date('d-m-Y H:i', strtotime($value->created_at)) }}</td>
          <td>{{ date('d-m-Y H:i', strtotime($value->updated_at)) }}</td>
          <td>{{ $value->post_status }}</td>
          <td>
			            {!! Form::open(['route' => ['dashboard.post.destroy', $value->id], 'method' => 'delete']) !!}
                  <a href="{!! route('dashboard.post.show', $value->id) !!}" class="btn btn-xs btn-info"><i class="glyphicon glyphicon-eye-open"></i></a>
			            <a href="{!! route('dashboard.post.edit', $value->id) !!}" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i></a>
			            <a onclick="if (!confirm('Benar Ingin Menghapus?')) {return false;};">
			              <button type="submit" class="btn btn-xs btn-danger delete"><i class="glyphicon glyphicon-trash"></i></button>
			            </a>
			            {!! Form::close() !!}
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>
@endsection
