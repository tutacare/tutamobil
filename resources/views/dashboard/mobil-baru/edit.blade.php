@extends('layouts.app-dash-lte')

@section('scripts')
<script>
  //hanya angka
  $("#harga").keydown(function (e) {
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

@section('content-header', 'Edit Mobil Baru')

@section('breadcump')
<li>Dashboard</li>
<li>Mobil Baru</li>
<li class="active">Mengganti Mobil Baru</li>
@endsection

@section('content')

<!-- MOBIL BARU SPEC -->
<div class="box box-primary">
  <div class="box-header with-border">
    <h3 class="box-title">Ganti Spesifikasi Mobil Baru</h3>
    <div class="box-tools pull-right">
      <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
      <i class="fa fa-minus"></i></button>
    </div>
  </div>
  <div class="box-body">
    <div class="row">
      {!! Form::model($mobil_baru, array('route' => array('dashboard.mobil-baru.update', $mobil_baru->id), 'method' => 'PUT', 'files' => true)) !!}

      <div class="col-xs-6">

        <div class="form-group required {{ $errors->has('merek_id') ? ' has-error' : '' }}">
            {!! Form::label('merek_id', 'Merek') !!} <strong class="text-danger"> *</strong>
            {!! Form::select('merek_id', $merek, old('merek_id'), array('class' => 'form-control')) !!}
            @if ($errors->has('merek_id'))
                <span class="help-block">
                    <strong>{{ $errors->first('merek_id') }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group required {{ $errors->has('design_id') ? ' has-error' : '' }}">
            {!! Form::label('design_id', 'Model') !!} <strong class="text-danger"> *</strong>
            {!! Form::select('design_id', $design, old('design_id'), array('class' => 'form-control')) !!}
            @if ($errors->has('design_id'))
                <span class="help-block">
                    <strong>{{ $errors->first('design_id') }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group required {{ $errors->has('tipe_id') ? ' has-error' : '' }}">
            {!! Form::label('tipe_id', 'Tipe') !!} <strong class="text-danger"> *</strong>
            {!! Form::select('tipe_id', $tipe, old('tipe_id'), array('class' => 'form-control')) !!}
            @if ($errors->has('tipe_id'))
                <span class="help-block">
                    <strong>{{ $errors->first('tipe_id') }}</strong>
                </span>
            @endif
        </div>

</div>
<div class="col-xs-6">

        {{ Form::tutaText('negara_pembuat', old('negara_pembuat'), '*', ['required' => 'required']) }}
        <div class="form-group">
        <p><img src="/img/mobil-baru/{{$mobil_baru->foto}}" width="100px"></p>
        {!! Form::label('foto', 'Photo') !!} *Ukuran ideal 890 x 600 px
        {!! Form::file('foto', old('foto'), array('class' => 'form-control')) !!}
        </div>
      </div>
  </div>

  <!-- /.box-body -->
</div>
</div>
<!-- /.MOBIL BARU SPEC END -->

<!-- DIMENSI -->
<div class="box box-primary">
  <div class="box-header with-border">
    <h3 class="box-title">Dimensi</h3>
    <div class="box-tools pull-right">
      <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
      <i class="fa fa-minus"></i></button>
    </div>
  </div>
  <div class="box-body">
    <div class="row">

      <div class="col-xs-6">
        {{ Form::tutaText('panjang', $dimensi->panjang) }}
        {{ Form::tutaText('lebar', $dimensi->lebar) }}
        {{ Form::tutaText('tinggi', $dimensi->tinggi) }}
        {{ Form::tutaText('jarak_sumbu_roda', $dimensi->jarak_sumbu_roda) }}
        {{ Form::tutaText('jarak_pijak_depan', $dimensi->jarak_pijak_depan) }}

</div>
<div class="col-xs-6">
        {{ Form::tutaText('jarak_pijak_belakang', $dimensi->jarak_pijak_belakang) }}
        {{ Form::tutaText('jarak_terendah_ke_tanah', $dimensi->jarak_terendah_ke_tanah) }}
        {{ Form::tutaText('radius_putar', $dimensi->radius_putar) }}
        {{ Form::tutaText('berat_kosong', $dimensi->berat_kosong) }}
      </div>
  </div>

  <!-- /.box-body -->
</div>
</div>
<!-- /DIMENSI END -->


<!-- MESIN -->
<div class="box box-primary">
  <div class="box-header with-border">
    <h3 class="box-title">Mesin</h3>
    <div class="box-tools pull-right">
      <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
      <i class="fa fa-minus"></i></button>
    </div>
  </div>
  <div class="box-body">
    <div class="row">

      <div class="col-xs-6">
        {{ Form::tutaText('jenis_mesin', $mesin->jenis_mesin) }}
        {{ Form::tutaText('kapasitas_silinder', $mesin->kapasitas_silinder) }}
        {{ Form::tutaText('daya_maksimum', $mesin->daya_maksimum) }}
        {{ Form::tutaText('torsi_maksimum', $mesin->torsi_maksimum) }}

</div>
<div class="col-xs-6">
        {{ Form::tutaText('perbandingan_kompresi', $mesin->perbandingan_kompresi) }}
        {{ Form::tutaText('sistem_pembakaran', $mesin->sistem_pembakaran) }}
        {{ Form::tutaText('bahan_bakar', $mesin->bahan_bakar) }}
        {{ Form::tutaText('kapasitas_bahan_bakar', $mesin->kapasitas_bahan_bakar) }}
      </div>
  </div>

  <!-- /.box-body -->
</div>
</div>
<!-- /MESIN END -->

<!-- TRANSMISI -->
<div class="box box-primary">
  <div class="box-header with-border">
    <h3 class="box-title">Transmisi</h3>
    <div class="box-tools pull-right">
      <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
      <i class="fa fa-minus"></i></button>
    </div>
  </div>
  <div class="box-body">
    <div class="row">

      <div class="col-xs-6">
        {{ Form::tutaText('kopling', $transmisi->kopling) }}
        {{ Form::tutaText('tipe_transmisi', $transmisi->tipe_transmisi) }}
</div>
<div class="col-xs-6">
        {{ Form::tutaText('sistem_kemudi', $transmisi->sistem_kemudi) }}
      </div>
  </div>

  <!-- /.box-body -->
</div>
</div>
<!-- /TRANSMISI END -->


<!-- KAKI -->
<div class="box box-primary">
  <div class="box-header with-border">
    <h3 class="box-title">Kaki</h3>
    <div class="box-tools pull-right">
      <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
      <i class="fa fa-minus"></i></button>
    </div>
  </div>
  <div class="box-body">
    <div class="row">

      <div class="col-xs-6">
        {{ Form::tutaText('tipe_rangka', $kaki->tipe_rangka) }}
        {{ Form::tutaText('suspensi_depan', $kaki->suspensi_depan) }}
        {{ Form::tutaText('suspensi_belakang', $kaki->suspensi_belakang) }}
        {{ Form::tutaText('rem_depan', $kaki->rem_depan) }}
</div>
<div class="col-xs-6">
        {{ Form::tutaText('rem_belakang', $kaki->rem_belakang) }}
        {{ Form::tutaText('velg', $kaki->velg) }}
        {{ Form::tutaText('ukuran_ban', $kaki->ukuran_ban) }}
      </div>
  </div>

  <!-- /.box-body -->
</div>
</div>
<!-- /KAKI END -->


<!-- AKSI -->
<div class="box box-primary">
  <div class="box-header with-border">
    <h3 class="box-title">Aksi</h3>
    <div class="box-tools pull-right">
      <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
      <i class="fa fa-minus"></i></button>
    </div>
  </div>
  <div class="box-body">

  <div class="row">
    <div class="col-xs-12">
      <div class="form-group pull-right">
        {!! Form::submit('Simpan', array('class' => 'btn btn-primary')) !!}
        <a class="btn btn-small btn-warning" href="{{ URL::to('dashboard/mobil-baru') }}">Batal</a>
        {!! Form::close() !!}
      </div>
    </div>
  </div>
  <!-- /.box-body -->
</div>
</div>
<!-- /.AKSI END -->

@endsection
