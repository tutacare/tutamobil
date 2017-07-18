@extends('layouts.app-dash-lte')

@section('scripts')
<script>
  //hanya angka
  $("#inputDeposit").keydown(function (e) {
        // Allow: backspace, delete, tab, escape, enter
        // http://keycode.info/
        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110]) !== -1 ||
             // Allow: Ctrl+A, Command+A
            (e.keyCode == 65 && ( e.ctrlKey === true || e.metaKey === true ) ) ||
             // Allow: home, end, left, right, down, up
            (e.keyCode >= 35 && e.keyCode <= 40)) {
                 // let it happen, don't do anything
                 return;
        }
        // Ensure that it is a number and stop the keypress
        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
            e.preventDefault();
        }
    });
    //end hanya angka

  </script>
@endsection

@section('content-header', 'Deposit Lokal Bank')

@section('breadcump')
<li>Dashboard</li>
<li>Slot</li>
<li>Mobil Baru</li>
<li class="active">Deposit Lokal Bank</li>
@endsection

@section('content')
@include('layouts.assets.message')


<!-- Data Slot MOBIL BARU SPEC -->
<div class="box box-primary">
  <div class="box-header with-border">
    <h3 class="box-title">Deposit Lokal Bank</h3>
    <div class="box-tools pull-right">
      <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
      <i class="fa fa-minus"></i></button>
    </div>
  </div>
  <div class="box-body">
    <div class="row">


      <div class="col-xs-6">
        {!! Form::open(array('url' => 'dashboard/pengguna/deposit/local-bank/store')) !!}

        <div class="form-group">
          {!! Form::label('money', 'Jumlah Deposit') !!}
            <div class="input-group">
            <div class="input-group-addon">Rp.</div>
            <input type="text" name="money" class="form-control" id="inputDeposit" placeholder="Jumlah deposit, masukan angka saja" required>
          </div>
        </div>
        <div class="form-group">
          {!! Form::label('from_bank', 'Bank Anda') !!}
          {!! Form::select('from_bank', $from_bank, old('from_bank'), array('class' => 'form-control', 'required' => 'required')) !!}
        </div>
      </div><div class="col-xs-6">
        <div class="form-group">
          {!! Form::label('no_rekening', 'No. Rekening Anda') !!}
          {!! Form::text('no_rekening', old('no_rekening'), array('class' => 'form-control', 'required' => 'required')) !!}
        </div>
        {{ Form::tutaText('atas_nama', old('atas_nama'), '*', ['required' => 'required']) }}

        <div class="row">
          <div class="col-xs-12">
            <div class="form-group pull-right">
              {!! Form::submit('Deposit', array('class' => 'btn btn-primary')) !!}
              {!! Form::close() !!}
            </div>
          </div>
        </div>
  <!-- /.box-body -->
</div>
</div>
<!-- /. data slot MOBIL BARU SPEC END -->




@endsection
