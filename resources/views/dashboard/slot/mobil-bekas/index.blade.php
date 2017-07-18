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

@section('content-header', 'Mobil Bekas')

@section('breadcump')
<li>Dashboard</li>
<li class="active">Mobil Bekas</li>
@endsection

@section('content')
@include('widgets.message')
<div class="box">
	<div class="box-header">
		<h3 class="box-title">
		<a href="/dashboard/pengguna/mobil-bekas/create" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Tambah Mobil Bekas</a>
		</h3>
	</div>
	<!-- /.box-header -->
	<div class="box-body">
		<table id="cdata" class="table table-bordered table-striped">
			<thead>
				<tr>
					<th>NO#</th>
					<th>Judul</th>
          <th>Tanggal Mulai</th>
          <th>Tanggal Expired</th>
          <th>Status</th>
          <th>Aksi</th>
				</tr>
			</thead>
			<tbody>
				@foreach($mobil_bekas as $key => $value)
				<tr>
					<td>{{ $key+1 }}</td>
					<td>{{ $value->title }}</td>
          <td class="text-success">{{ date('d-m-Y', strtotime($value->sundul_at)) }}</td>
          <td class="text-danger">{{ date('d-m-Y', strtotime(Carbon::parse($value->sundul_at)->addMonth())) }}</td>
          <td>@if($value->status == 'mod')
              Pending
              @elseif($value->status == 'publish')
              Publish
              @endif
          </td>
          <td>
			            {!! Form::open(['route' => ['dashboard.slot.mobil-bekas.destroy', $value->id], 'method' => 'delete']) !!}

			            <a href="{!! route('dashboard.slot.mobil-bekas.edit', $value->id) !!}" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i></a>
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
