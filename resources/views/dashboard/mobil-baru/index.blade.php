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

@section('content-header', 'Data Mobil Baru')

@section('breadcump')
<li>Dashboard</li>
<li class="active">Mobil Baru</li>
@endsection

@section('content')
@include('layouts.assets.message')
<div class="box">
	<div class="box-header">
		<h3 class="box-title">
		<a href="/dashboard/mobil-baru/create" class="btn btn-primary btn-sm" id="btn-add"><i class="fa fa-plus"></i> Tambah Mobil Baru</a>
		</h3>
	</div>
	<!-- /.box-header -->
	<div class="box-body">
		<table id="cdata" class="table table-bordered table-striped">
			<thead>
				<tr>
					<th>NO#</th>
					<th>Merek</th>
          <th>Model</th>
          <th>Tipe</th>
          <th>Negara Pembuat</th>
          <th>Aksi</th>
				</tr>
			</thead>
			<tbody>
				@foreach($mobil_baru as $key => $value)
				<tr>
					<td>{{ $key+1 }}</td>
          <td>{{ $value->merek->merek }}</td>
          <td>{{ $value->design->design }}</td>
          <td>{{ $value->tipe->tipe }}</td>
          <td>{{ $value->negara_pembuat }}</td>
          <td>
			            {!! Form::open(['route' => ['dashboard.mobil-baru.destroy', $value->id], 'method' => 'delete']) !!}
                  <a href="/dashboard/mobil-baru/feature/{{$value->id}}" class="btn btn-xs btn-success"><i class="glyphicon glyphicon-list-alt"></i></a>
                  <a href="{!! route('dashboard.mobil-baru.show', $value->id) !!}" class="btn btn-xs btn-info"><i class="glyphicon glyphicon-eye-open"></i></a>
			            <a href="{!! route('dashboard.mobil-baru.edit', $value->id) !!}" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i></a>
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
