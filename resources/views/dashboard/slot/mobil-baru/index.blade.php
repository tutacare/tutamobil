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
    $('#menu-slot').addClass("active");
    $('#menu-mobil-baru').addClass("active");
});
</script>
@endsection

@section('content-header', 'Slot Mobil Baru')

@section('breadcump')
<li>Dashboard</li>
<li>Slot</li>
<li class="active">Mobil Baru</li>
@endsection

@section('content')
@include('layouts.assets.message')
<div class="box">
	<div class="box-header">
		<h3 class="box-title">
		<a href="/dashboard/slot/mobil-baru/create" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Buat Slot Mobil Baru</a>
		</h3>
	</div>
	<!-- /.box-header -->
	<div class="box-body">
		<table id="cdata" class="table table-bordered table-striped">
			<thead>
				<tr>
					<th>NO#</th>
          <th>Kota</th>
					<th>Merek</th>
          <th>Pengguna</th>
          <th>Order Mulai</th>
          <th>Order Expired</th>
          <th>Aksi</th>
				</tr>
			</thead>
			<tbody>
				@foreach($slot_mobil_baru as $key => $value)
				<tr>
					<td>{{ $key+1 }}</td>
          <td>{{ $value->city->city }}</td>
          <td>{{ $value->merek->merek }}</td>
          <td>{{ $value->user->username }}</td>
          <td class="text-success">{{ date('d-m-Y', strtotime($value->order_start_at)) }}</td>
          <td class="text-danger">{{ date('d-m-Y', strtotime($value->order_finish_at)) }}</td>
          <td>
			            {!! Form::open(['route' => ['dashboard.slot.mobil-baru.destroy', $value->id], 'method' => 'delete']) !!}
			            <a href="{!! route('dashboard.slot.mobil-baru.edit', $value->id) !!}" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i></a>
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
