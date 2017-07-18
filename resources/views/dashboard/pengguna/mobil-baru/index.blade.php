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
		Data Mobil Baru yang anda handle
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
          <th>Model</th>
          <th>Tipe</th>
          <th>Harga</th>
          <th>Aksi</th>
				</tr>
			</thead>
			<tbody>
				@foreach($mobil_baru as $key => $value)
				<tr>
					<td>{{ $key+1 }}</td>
          <td>{{ $value->city }}</td>
          <td>{{ $value->merek }}</td>
          <td>{{ $value->design }}</td>
          <td>{{ $value->tipe }}</td>
          <td>Rp. {{number_format($value->harga, 0 , ',', '.')}}</td>
          <td>
			            <a href="{!! route('dashboard.pengguna.mobil-baru.edit', $value->id) !!}" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Edit Harga</a>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>
@endsection
