  <!-- kota -->
  <div class="form-group required {{ $errors->has('city_form2') ? ' has-error' : '' }}">


    <select name="city_form2" class="form-control" id="city_form2" required>
      <option value="">--Pilih Kota--</option>
      @foreach($city as $value)
      <option value="{{$value->city_id}}">{{$value->city->city}}</option>
      @endforeach
    </select>

    @if ($errors->has('city_form2'))
        <span class="help-block">
            <strong>{{ $errors->first('city_form2') }}</strong>
        </span>
    @endif
</div>
<!-- kota end -->
<!-- merek -->
<div class="form-group required {{ $errors->has('merek_form2') ? ' has-error' : '' }}">

 <select name="merek_form2" id="merek_form2" class="form-control" required>
    <option value="">--Pilih Merek--</option>
  </select>
  @if ($errors->has('merek_form2'))
      <span class="help-block">
          <strong>{{ $errors->first('merek_form2') }}</strong>
      </span>
  @endif

</div>
<!-- merek end -->
<!-- model / design -->
<div class="form-group required {{ $errors->has('design_form2') ? ' has-error' : '' }}">

<select name="design_form2" id="design_form2" class="form-control" required>
  <option>--Pilih Model--</option>
</select>
@if ($errors->has('design_form2'))
    <span class="help-block">
        <strong>{{ $errors->first('design_form2') }}</strong>
    </span>
@endif

</div>
<!-- model / design end -->
<!-- tipe -->
<div class="form-group required {{ $errors->has('tipe_form2') ? ' has-error' : '' }}">

<select name="tipe_form2" id="tipe_form2" class="form-control" required>
<option>--Pilih Tipe--</option>
</select>
@if ($errors->has('tipe_form2'))
  <span class="help-block">
      <strong>{{ $errors->first('tipe_form2') }}</strong>
  </span>
@endif

</div>
<!-- tipe end -->
