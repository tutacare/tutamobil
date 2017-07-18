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

@section('content-header', 'Invoice Deposit')

@section('breadcump')
<li>Dashboard</li>
<li>Keuangan</li>
<li class="active">Invoice Deposit</li>
@endsection

@section('content')
@include('layouts.assets.message')
<div class="box box-primary">
	<div class="box-header with-border">
		<h3 class="box-title">
		Invoice Deposit
		</h3>
	</div>
	<!-- /.box-header -->
  <div class="box-body">
    <div class="row">


      <div class="col-xs-12">


        <table class="table">
          <tr><td>Silahkan Transfer Ke Bank:</td><td>:</td><td>
            <div class="well"><strong>
            {!! $rekening_to->rekening_tujuan !!}
          </strong></div>
          </td></tr>
          <tr><td>Transfer Uang Sejumlah</td><td>:</td><td><h3>Rp. {{number_format($invoice->deposit, 0, ',', '.')}}</h3> <br><em>Harap transfer sesuai dengan jumlah ini untuk mempermudah pelacakan</em></td></tr>
          <tr><td>Status</td><td>:</td><td>  @if($invoice->status == 0)
            <strong class="text-danger">Belum Dibayar</strong>
            @elseif($invoice->status == 1)
            <strong class="text-warning">Sudah Dikonfirmasi</strong>
            @endif</td></tr>

          <tr><td>Tanggal</td><td>:</td><td>{{ date('d-m-Y', strtotime($invoice->created_at)) }}</td></tr>
          <tr><td>No. Deposit</td><td>:</td><td>{{$invoice->id}}</td></tr>
          <tr><td>Dari Bank Anda</td><td>:</td><td>{{$invoice->from_bank}}</td></tr>
          <tr><td>No. Rekening</td><td>:</td><td>{{$invoice->no_rekening}}</td></tr>
          <tr><td>Atas Nama</td><td>:</td><td>{{$invoice->atas_nama}}</td></tr>
          </table>
          @if($invoice->status == 0)
          <hr />
          <div class="row">
            <div class="col-xs-12 offset">
              <div class="form-group pull-right">
          {!! Form::model($invoice, array('url' => array('/dashboard/pengguna/deposit/konfirmasi', $invoice->id), 'method' => 'PUT')) !!}
          <em>Lakukan Konfirmasi Pembayaran hanya setelah anda mentransfer</em><br />
          {!! Form::submit('Konfirmasi Pembayaran', array('class' => 'btn btn-sm btn-warning', 'onClick' => "return confirm('Benar sudah mentransfer dan ingin Konfirmasi Pembayaran?')")) !!}
          {!! Form::close() !!}
              </div>
            </div>
          </div>
          @endif

  <!-- end box -->
</div>
</div></div></div>
@endsection
