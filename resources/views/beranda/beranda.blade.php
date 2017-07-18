@extends('layouts.app')

@section('scripts')
<script src="{!! asset('mytuta/js/select.spec.js') !!}"></script>
<script id="dsq-count-scr" src="//mobilokal.disqus.com/count.js" async></script>
@endsection

@section('content')
@include('layouts.slider')
  @include('layouts.utility')
    <!-- Start Body Content -->
  	<div class="main" role="main">
    	<div id="content" class="content full padding-b0">
            <div class="container">
            	<!-- Welcome Content and Services overview -->
            	<div class="row">
                	<div class="col-md-6">
                    	<h1 class="uppercase strong">Pilih Mobil Idaman<br>Apply sekarang juga.</h1>
                        <p class="lead">Mobilokal, Portal terkemuka di Indonesia mempermudah dan mempercepat <span class="accent-color">Pembelian dan Penjualan Mobil</span> baik mobil baru maupun mobil bekas</p>
                    </div>
                    <div class="col-md-6">
                        {!! Form::open(array('url' => 'spesifikasi-mobil-baru', 'method' => 'post')) !!}
                          <!-- kota -->
                          <div class="form-group required {{ $errors->has('city') ? ' has-error' : '' }}">
                            <label for="kota" class="col-sm-2 control-label">Kota :</label>
                            <div class="col-sm-10">

                            <select name="city" class="form-control" id="city" required>
                              <option value="">--Pilih Kota--</option>
                              @foreach($city as $value)
                              <option value="{{$value->city_id}}">{{$value->city->city}}</option>
                              @endforeach
                            </select>
                            </div>
                            @if ($errors->has('city'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('city') }}</strong>
                                </span>
                            @endif
                        </div>
                        <!-- kota end -->
                        <!-- merek -->
                        <div class="form-group required {{ $errors->has('merek') ? ' has-error' : '' }}">
                        <label for="merek" class="col-sm-2 control-label">Merek :</label>
                        <div class="col-sm-10">
                         <select name="merek" id="merek" class="form-control">
                            <option value="">--Pilih Merek--</option>
                          </select>
                          @if ($errors->has('merek'))
                              <span class="help-block">
                                  <strong>{{ $errors->first('merek') }}</strong>
                              </span>
                          @endif
                        </div>
                      </div>
                      <!-- merek end -->
                      <!-- model / design -->
                      <div class="form-group required {{ $errors->has('design') ? ' has-error' : '' }}">
                      <label for="design" class="col-sm-2 control-label">Model :</label>
                      <div class="col-sm-10">
                       <select name="design" id="design" class="form-control" required>
                          <option>--Pilih Model--</option>
                        </select>
                        @if ($errors->has('design'))
                            <span class="help-block">
                                <strong>{{ $errors->first('design') }}</strong>
                            </span>
                        @endif
                      </div>
                    </div>
                    <!-- model / design end -->
                    <!-- tipe -->
                    <div class="form-group required {{ $errors->has('tipe') ? ' has-error' : '' }}">
                    <label for="tipe" class="col-sm-2 control-label">Tipe :</label>
                    <div class="col-sm-10">
                     <select name="tipe" id="tipe" class="form-control" required>
                        <option>--Pilih Tipe--</option>
                      </select>
                      @if ($errors->has('tipe'))
                          <span class="help-block">
                              <strong>{{ $errors->first('tipe') }}</strong>
                          </span>
                      @endif
                    </div>
                  </div>
                  <!-- tipe end -->
  <button type="submit" class="btn btn-danger pull-right">Pilih</button>
</form>
                    </div>
                </div>
                <div class="spacer-75"></div>
                <!-- Recently Listed Vehicles -->
                @include('widgets.etalase-mobil-baru')
                <div class="spacer-60"></div>
                @include('widgets.etalase-mobil-bekas')
                <div class="spacer-60"></div>
             	  @include('widgets.etalase-berita')
           	</div>
            <div class="spacer-50"></div>
            <div class="lgray-bg make-slider">
            	<div class="container">
                    <!-- Search by make -->

                </div>
            </div>
        </div>
   	</div>
    <!-- End Body Content -->
@endsection
