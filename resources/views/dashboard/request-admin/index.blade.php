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
});
</script>
@endsection

@section('content-header', 'Permintaan Pengguna')

@section('breadcump')
<li>Dashboard</li>
<li class="active">Permintaan Pengguna</li>
@endsection

@section('content')
@include('widgets.message')
<div class="box">
	<div class="box-header">
		<h3 class="box-title">
		Permintaan Pengguna
		</h3>
	</div>
	<!-- /.box-header -->
	<div class="box-body">
		<table id="cdata" class="table table-bordered table-striped">
			<thead>
				<tr>
					<th>NO#</th>
					<th>Judul</th>
          <th>Aksi</th>
				</tr>
			</thead>
			<tbody>
				@foreach($req_admin as $key => $value)
				<tr>
					<td>{{ $key+1 }}</td>
					<td>{{ $value->title }}</td>
          <td><a href="{!! route('dashboard.myrequest.show', $value->id) !!}" class="btn btn-xs btn-info"><i class="glyphicon glyphicon-eye-open"></i> Lihat</a></td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>
@endsection
