@extends('layouts.app-dash-lte')

@section('breadcump')
<li class="active">Dashboard</li>
@endsection

@section('content')
<div class="row">
      <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
          <span class="info-box-icon bg-aqua"><i class="fa fa-crosshairs" aria-hidden="true"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">Data Mobil Baru</span>
            <span class="info-box-number">{{TutaComp::mobilBaruCount()}} Item</span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->
      <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
          <span class="info-box-icon bg-red"><i class="fa fa-th-large" aria-hidden="true"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">Slot Mobil Baru</span>
            <span class="info-box-number">{{TutaComp::SlotBaruCount()}} Item</span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->

      <!-- fix for small devices only -->
      <div class="clearfix visible-sm-block"></div>

      <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
          <span class="info-box-icon bg-green"><i class="fa fa-columns" aria-hidden="true"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">Info 3</span>
            <span class="info-box-number">count</span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->
      <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
          <span class="info-box-icon bg-yellow"><i class="ion ion-ios-people-outline"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">Pengguna</span>
            <span class="info-box-number">{{TutaComp::penggunaCount()}} Orang</span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
@endsection
