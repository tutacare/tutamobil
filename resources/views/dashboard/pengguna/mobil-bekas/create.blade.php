@extends('layouts.app-dash-lte')

@section('scripts')
<script>
$(document).ready(function() {
//hanya angka
$("#tahun").keydown(function (e) {
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
  $("#description").keydown(function(){
      el = $(this);
      if(el.val().length >= 600){
          el.val( el.val().substr(0, 600) );
      } else {
          $("#charNum").text(0+el.val().length);
      }
  });
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
  // tambahkan koma pada harga
 $('#harga').keyup(function(event) {

  // skip for arrow keys
  if(event.which >= 37 && event.which <= 40){
   event.preventDefault();
  }

  $(this).val(function(index, value) {
      value = value.replace(/,/g,''); // remove commas from existing input
      return numberWithCommas(value); // add commas back in
  });
});

function numberWithCommas(x) {
    var parts = x.toString().split(".");
    parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    return parts.join(".");
}
//.hanya angka

});
</script>
@endsection

@section('content-header', 'Tambah Mobil Bekas')

@section('breadcump')
<li>Dashboard</li>
<li>Posting</li>
<li class="active">Menambah Data Mobil Bekas</li>
@endsection

@section('content')

<!-- POST BARU -->
<div class="box box-primary">
  <div class="box-header with-border">
    <h3 class="box-title">Tambah Mobil Bekas</h3>
    <div class="box-tools pull-right">
      <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
      <i class="fa fa-minus"></i></button>
    </div>
  </div>
  <div class="box-body">
    <div class="row">
      {!! Form::open(array('route' => 'dashboard.pengguna.mobil-bekas.store', 'method' => 'POST', 'files' => true)) !!}
      <div class="col-xs-6">
      <div class="form-group required {{ $errors->has('city_id') ? ' has-error' : '' }}">
          {!! Form::label('city_id', 'Kota') !!} <strong class="text-danger"> *</strong>
          {!! Form::select('city_id', $city, old('city_id'), array('class' => 'form-control', 'required' => 'required')) !!}
          @if ($errors->has('city_id'))
              <span class="help-block">
                  <strong>{{ $errors->first('city_id') }}</strong>
              </span>
          @endif
      </div>
      <div class="form-group required {{ $errors->has('merek_id') ? ' has-error' : '' }}">
          {!! Form::label('merek_id', 'Merek') !!} <strong class="text-danger"> *</strong>
          {!! Form::select('merek_id', $merek, old('merek_id'), array('class' => 'form-control', 'id' => 'merek', 'required' => 'required')) !!}
          @if ($errors->has('merek_id'))
              <span class="help-block">
                  <strong>{{ $errors->first('merek_id') }}</strong>
              </span>
          @endif
      </div>
      <div class="form-group required {{ $errors->has('design_id') ? ' has-error' : '' }}">
          {!! Form::label('design_id', 'Model') !!} <strong class="text-danger"> *</strong>
          {!! Form::select('design_id', $design, old('design_id'), array('class' => 'form-control', 'id' => 'design', 'required' => 'required')) !!}
          @if ($errors->has('design_id'))
              <span class="help-block">
                  <strong>{{ $errors->first('design_id') }}</strong>
              </span>
          @endif
      </div>

      <div class="form-group required {{ $errors->has('transmisi') ? ' has-error' : '' }}">
          {!! Form::label('transmisi', 'Transmisi') !!} <strong class="text-danger"> *</strong>
          {!! Form::select('transmisi', array('Automatic' => 'Automatic', 'Manual' => 'Manual', 'Triptonic' => 'Triptonic'), old('transmisi'), array('class' => 'form-control')); !!}
          @if ($errors->has('transmisi'))
              <span class="help-block">
                  <strong>{{ $errors->first('transmisi') }}</strong>
              </span>
          @endif
      </div>
      {{ Form::tutaText('tahun', old('tahun'), '*', ['required' => 'required', 'id' => 'tahun', 'placeholder'=>'Masukan hanya angka saja', 'maxlength' => 4]) }}
</div>
<div class="col-xs-6">

      {{ Form::tutaText('judul', old('judul'), '*', ['required' => 'required']) }}
      <!-- Textarea -->
      <div class="form-group">
          <label>Keterangan </label>
              <textarea class="form-control" id="description" name="product_description">Keterangan, Buat seunik mungkin</textarea>
              <span class="help-block">Sebaiknya minimal 60 karakter. <span class="pull-right" id="charNum">0</span></span>
      </div>

      <!-- Prepended text-->
      <div class="form-group">
          <label>Harga</label>
              <div class="input-group"><span class="input-group-addon">Rp</span>
                  <input id="harga" name="harga" class="form-control"
                         autocomplete="off" placeholder="Harga" required="" type="text">
              </div>
              <div class="checkbox">
                  <label class="pull-right">
                      {!! Form::checkbox('nego', 'true') !!}
                      Nego </label>
              </div>
      </div>

      <!-- gambar utama -->
      <div class="form-group">
      {!! Form::label('foto1', 'Photo Utama') !!} *Ukuran ideal 890 x 600 px
      {!! Form::file('foto1', old('foto1'), array('class' => 'form-control')) !!}
      </div>
</div>
    </div>

<!-- gambar -->
<hr />
    <div class="row">
      <div class="col-xs-3">

      <div class="form-group">
      {!! Form::label('foto2', 'Photo 2') !!} *Ukuran ideal 890 x 600 px
      {!! Form::file('foto2', old('foto2'), array('class' => 'form-control')) !!}
      </div>
    </div>
    <div class="col-xs-3">
      <div class="form-group">
      {!! Form::label('foto3', 'Photo 3') !!} *Ukuran ideal 890 x 600 px
      {!! Form::file('foto3', old('foto3'), array('class' => 'form-control')) !!}
      </div>
    </div>
    <div class="col-xs-3">
      <div class="form-group">
      {!! Form::label('foto4', 'Photo 4') !!} *Ukuran ideal 890 x 600 px
      {!! Form::file('foto4', old('foto4'), array('class' => 'form-control')) !!}
      </div>
    </div>
    <div class="col-xs-3">
      <div class="form-group">
      {!! Form::label('foto5', 'Photo 5') !!} *Ukuran ideal 890 x 600 px
      {!! Form::file('foto5', old('foto5'), array('class' => 'form-control')) !!}
      </div>
    </div>

</div>



  <!-- /.box-body -->
</div>
</div>
<!-- /.POST END -->


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
        {!! Form::submit('Tambahkan', array('class' => 'btn btn-primary form-button')) !!}
        <a class="btn btn-small btn-warning" href="{{ URL::to('dashboard/pengguna/mobil-bekas') }}">Batal</a>
        {!! Form::close() !!}
      </div>
    </div>
  </div>
  <!-- /.box-body -->
</div>
</div>
<!-- /.AKSI END -->

@endsection
