<!-- Financing Calculator -->
      {!! Form::open(array('url' => 'spesifikasi-mobil-baru', 'method' => 'post')) !!}
          <!-- kota -->
          <div class="form-group required {{ $errors->has('city') ? ' has-error' : '' }}">


            <select name="city" class="form-control" id="city" required>
              <option value="">--Pilih Kota--</option>
              @foreach($city as $value)
              <option value="{{$value->city_id}}">{{$value->city->city}}</option>
              @endforeach
            </select>

            @if ($errors->has('city'))
                <span class="help-block">
                    <strong>{{ $errors->first('city') }}</strong>
                </span>
            @endif
        </div>
        <!-- kota end -->
        <!-- merek -->
        <div class="form-group required {{ $errors->has('merek') ? ' has-error' : '' }}">

         <select name="merek" id="merek" class="form-control">
            <option value="">--Pilih Merek--</option>
          </select>
          @if ($errors->has('merek'))
              <span class="help-block">
                  <strong>{{ $errors->first('merek') }}</strong>
              </span>
          @endif

      </div>
      <!-- merek end -->
      <!-- model / design -->
      <div class="form-group required {{ $errors->has('design') ? ' has-error' : '' }}">

       <select name="design" id="design" class="form-control" required>
          <option>--Pilih Model--</option>
        </select>
        @if ($errors->has('design'))
            <span class="help-block">
                <strong>{{ $errors->first('design') }}</strong>
            </span>
        @endif

    </div>
    <!-- model / design end -->
    <!-- tipe -->
    <div class="form-group required {{ $errors->has('tipe') ? ' has-error' : '' }}">

     <select name="tipe" id="tipe" class="form-control" required>
        <option>--Pilih Tipe--</option>
      </select>
      @if ($errors->has('tipe'))
          <span class="help-block">
              <strong>{{ $errors->first('tipe') }}</strong>
          </span>
      @endif

  </div>
  <!-- tipe end -->
<button type="submit" class="btn btn-danger pull-right">Pilih</button>
</form>
<!-- end loan -->
