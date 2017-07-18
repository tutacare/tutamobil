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
    $('#cdata1').DataTable();
    $('#cdata2').DataTable();
});
</script>
@endsection

@section('content-header', 'Deposit Pengguna')

@section('breadcump')
<li>Dashboard</li>
<li>Keuangan</li>
<li class="active">Deposit Pengguna</li>
@endsection

@section('content')
@include('layouts.assets.message')
<!-- sudah konfirmasi -->
<div class="box box-warning">
	<div class="box-header with-border">
		<h3 class="box-title">
		Deposit Sudah Dikonfirmasi
		</h3>
	</div>
	<div class="box-body">
		<table id="cdata" class="table table-bordered table-striped">
			<thead>
				<tr>
          <th>No#</th>
          <th>Pengguna</th>
          <th>TANGGAL</th>
          <th>Dari Bank</th>
          <th>No. Rekening</th>
          <th>Atas Nama</th>
          <th>Jumlah Deposit</th>
          <th>Status</th>
          <th>Proses</th>
				</tr>
			</thead>
			<tbody>
				@foreach($deposit_konfirmasi as $value)
				<tr>
          <td>{{ $value->id }}</td>
          <td>{{ $value->user->name }}</td>
          <td>{{ date('d-m-Y', strtotime($value->created_at)) }}</td>
          <td>{{ $value->from_bank }}</td>
          <td>{{ $value->no_rekening }}</td>
          <td>{{ $value->atas_nama }}</td>
          <td><strong>{{number_format($value->deposit, 0, ',', '.')}}</strong></td>
          <td>
            @if($value->status == 0)
            <strong class="text-danger">Belum Dibayar</strong>
            @elseif($value->status == 1)
            <strong class="text-warning">Sudah Dikonfirmasi</strong>
            @else
            <strong class="text-success">Sudah Dibayar</strong>
            @endif
          </td>
          <td>
            {!! Form::model($value, array('url' => array('dashboard/deposit-pengguna/invoice/proses', $value->id), 'method' => 'PUT')) !!}
            {!! Form::submit('Sudah Dibayar', array('class' => 'btn btn-xs btn-info', 'onClick' => "return confirm('Benar ingin memproses Pembayaran?')")) !!}
            {!! Form::close() !!}
          </td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>
<!-- sudah konfirmasi end -->
<!-- sudah dibayar -->
<div class="box box-success">
	<div class="box-header with-border">
		<h3 class="box-title">
		Deposit Sudah Dibayar
		</h3>
	</div>
	<div class="box-body">
		<table id="cdata1" class="table table-bordered table-striped">
			<thead>
				<tr>
          <th>No. Deposit</th>
          <th>TANGGAL</th>
          <th>Dari Bank</th>
          <th>No. Rekening</th>
          <th>Atas Nama</th>
          <th>Jumlah Deposit</th>
          <th>Status</th>
				</tr>
			</thead>
			<tbody>
				@foreach($deposit_sudah_dibayar as $value)
				<tr>
          <td>{{ $value->id }}</td>
          <td>{{ date('d-m-Y', strtotime($value->created_at)) }}</td>
          <td>{{ $value->from_bank }}</td>
          <td>{{ $value->no_rekening }}</td>
          <td>{{ $value->atas_nama }}</td>
          <td><strong>{{number_format($value->deposit, 0, ',', '.')}}</strong></td>
          <td>
            @if($value->status == 0)
            <strong class="text-danger">Belum Dibayar</strong>
            @elseif($value->status == 1)
            <strong class="text-warning">Sudah Dikonfirmasi</strong>
            @else
            <strong class="text-success">Sudah Dibayar</strong>
            @endif
          </td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>
<!-- sudah dibayar end -->
<!-- belum dibayar -->
<div class="box box-info">
	<div class="box-header with-border">
		<h3 class="box-title">
		Deposit Belum Dibayar
		</h3>
	</div>
	<div class="box-body">
		<table id="cdata2" class="table table-bordered table-striped">
			<thead>
				<tr>
          <th>No. Deposit</th>
          <th>TANGGAL</th>
          <th>Dari Bank</th>
          <th>No. Rekening</th>
          <th>Atas Nama</th>
          <th>Jumlah Deposit</th>
          <th>Status</th>
				</tr>
			</thead>
			<tbody>
				@foreach($deposit_belum_dibayar as $value)
				<tr>
          <td>{{ $value->id }}</td>
          <td>{{ date('d-m-Y', strtotime($value->created_at)) }}</td>
          <td>{{ $value->from_bank }}</td>
          <td>{{ $value->no_rekening }}</td>
          <td>{{ $value->atas_nama }}</td>
          <td><strong>{{number_format($value->deposit, 0, ',', '.')}}</strong></td>
          <td>
            @if($value->status == 0)
            <strong class="text-danger">Belum Dibayar</strong>
            @elseif($value->status == 1)
            <strong class="text-warning">Sudah Dikonfirmasi</strong>
            @else
            <strong class="text-success">Sudah Dibayar</strong>
            @endif
          </td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>
<!-- belum dibayar end -->
@endsection
