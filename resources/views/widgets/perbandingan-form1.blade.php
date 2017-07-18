
  <!-- kota -->
  <div class="form-group required {{ $errors->has('city_form1') ? ' has-error' : '' }}">


    <select name="city_form1" class="form-control" id="city_form1" required>
      <option value="">--Pilih Kota--</option>
      @foreach($city as $value)
      <option value="{{$value->city_id}}">{{$value->city->city}}</option>
      @endforeach
    </select>

    @if ($errors->has('city_form1'))
        <span class="help-block">
            <strong>{{ $errors->first('city_form1') }}</strong>
        </span>
    @endif
</div>
<!-- kota end -->
<!-- merek -->
<div class="form-group required {{ $errors->has('merek_form1') ? ' has-error' : '' }}">

 <select name="merek_form1" id="merek_form1" class="form-control" required>
    <option value="">--Pilih Merek--</option>
  </select>
  @if ($errors->has('merek_form1'))
      <span class="help-block">
          <strong>{{ $errors->first('merek_form1') }}</strong>
      </span>
  @endif

</div>
<!-- merek end -->
<!-- model / design -->
<div class="form-group required {{ $errors->has('design_form1') ? ' has-error' : '' }}">

<select name="design_form1" id="design_form1" class="form-control" required>
  <option>--Pilih Model--</option>
</select>
@if ($errors->has('design_form1'))
    <span class="help-block">
        <strong>{{ $errors->first('design_form1') }}</strong>
    </span>
@endif

</div>
<!-- model / design end -->
<!-- tipe -->
<div class="form-group required {{ $errors->has('tipe_form1') ? ' has-error' : '' }}">

<select name="tipe_form1" id="tipe_form1" class="form-control" required>
<option>--Pilih Tipe--</option>
</select>
@if ($errors->has('tipe_form1'))
  <span class="help-block">
      <strong>{{ $errors->first('tipe_form1') }}</strong>
  </span>
@endif

</div>
<!-- tipe end -->
