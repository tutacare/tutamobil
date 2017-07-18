@extends('layouts.app-dash-lte')

@section('styles')
<link rel="stylesheet" href="{!! asset('template/plugins/datatables/dataTables.bootstrap.css') !!}">
@endsection

@section('scripts')
<script src="{!! asset('template/plugins/datatables/jquery.dataTables.min.js') !!}"></script>
<script src="{!! asset('template/plugins/datatables/dataTables.bootstrap.min.js') !!}"></script>
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
		<a href="/dashboard/pengguna/slot/mobil-baru/create" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Buat Slot Mobil Baru</a>
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
          <th>Order Mulai</th>
          <th>Order Expired</th>
				</tr>
			</thead>
			<tbody>
				@foreach($slot_mobil_baru as $key => $value)
				<tr>
					<td>{{ $key+1 }}</td>
          <td class="text-info"><strong>{{ $value->city->city }}</strong></td>
          <td class="text-info"><strong>{{ $value->merek->merek }}</strong></td>
          <td class="text-success">{{ date('d-m-Y', strtotime($value->order_start_at)) }}</td>
          <td class="text-danger">{{ date('d-m-Y', strtotime($value->order_finish_at)) }}</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>
@endsection
