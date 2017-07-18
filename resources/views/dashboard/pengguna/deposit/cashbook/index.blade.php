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

@section('content-header', 'Buku Kas')

@section('breadcump')
<li>Dashboard</li>
<li>Keuangan</li>
<li class="active">Buku Kas</li>
@endsection

@section('content')
@include('layouts.assets.message')
<div class="box">
	<div class="box-header">
		<h3 class="box-title">
		Buku Kas
		</h3>
	</div>
	<!-- /.box-header -->
	<div class="box-body">
		<table id="cdata" class="table table-bordered table-striped">
			<thead>
				<tr>
          <th>NO</th>
          <th>Kode KAS</th>
          <th>Keterangan</th>
          <th>MASUK (Rp)</th>
          <th>KELUAR (Rp)</th>
          <th>SALDO (Rp)</th>
				</tr>
			</thead>
			<tbody>
				@foreach($cashbook as $key => $value)
				<tr>
          <td>{{$key+1}}</td>
          <td>{{ $value->cash_code }}</td>
          <td>{{ $value->description }}</td>
          <td align="right">{{ number_format($value->cash_in, 0, ',', '.') }}</td>
          <td align="right">{{ number_format($value->cash_out, 0, ',', '.') }}</td>
          <td align="right">{{ number_format($value->balance, 0, ',', '.') }}</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>
@endsection
