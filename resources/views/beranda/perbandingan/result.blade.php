@extends('layouts.app')

@section('content')
<!-- Start Page header -->
    @include('layouts.bg-page-header')
    	<div class="container">
        	<h1 class="page-title">Hasil Perbandingan</h1>
       	</div>
    </div>
    <!-- Utiity Bar -->
    <div class="utility-bar">
    	<div class="container">
        	<div class="row">
            	<div class="col-md-8 col-sm-6 col-xs-8">
                    <ol class="breadcrumb">
                        <li><a href="/">Beranda</a></li>
                        <li class="active">Hasil Perbandingan</li>
                    </ol>
            	</div>
                @include('widgets.sosmed-top')
            </div>
      	</div>
    </div>
    <!-- Start Body Content -->
  	<div class="main" role="main">
    	<div id="content" class="content full">
        	<div class="container">
            	<!-- Vehicle Comparision -->
                <div class="comparision-table-resp">
                <div class="col2 comparision-table">
                	<div class="tsticky thead-sticky comp-table-row">
                    	<div class="comp-table-col">&nbsp;</div>
                        <div class="comp-table-col">
                        	<strong>{{$mobil_baru1->merek->merek}} {{$mobil_baru1->design->design}} {{$mobil_baru1->tipe->tipe}}</strong>
                            <span class="price">Rp. {{number_format((isset($price1->harga) ? $price1->harga : 0), 0 , ',', '.')}} / {{$spec1->city->city}}</span>
                        </div>
                        <div class="comp-table-col">
                        	<strong>{{$mobil_baru2->merek->merek}} {{$mobil_baru2->design->design}} {{$mobil_baru2->tipe->tipe}}</strong>
                            <span class="price">Rp. {{number_format((isset($price2->harga) ? $price2->harga : 0), 0 , ',', '.')}} / {{$spec2->city->city}}</span>
                        </div>
                    </div>
                	<div class="comp-image comp-table-row">
                        <div class="comp-table-col">&nbsp;</div>
                        <div class="comp-table-col"><div class="img-thumbnail"><img src="/img/mobil-baru/{{$mobil_baru1->foto}}" alt=""></div></div>
                        <div class="comp-table-col"><div class="img-thumbnail"><img src="/img/mobil-baru/{{$mobil_baru2->foto}}" alt=""></div></div>

                    </div>
                	<div class="comp-feature-head comp-table-row">
                        <div class="comp-table-col">Perbandingan Detail</div>
                    </div>
                	<div class="comp-table-row">
                        <div class="comp-table-col">Tipe</div>
                        <div class="comp-table-col">{{$mobil_baru1->design->design}} {{$mobil_baru1->tipe->tipe}}</div>
                        <div class="comp-table-col">{{$mobil_baru2->design->design}} {{$mobil_baru2->tipe->tipe}}</div>

                    </div>
                	<div class="comp-table-row">
                        <div class="comp-table-col">Tipe Mesin</div>
                        <div class="comp-table-col">{{$mesin1->jenis_mesin}}</div>
                        <div class="comp-table-col">{{$mesin2->jenis_mesin}}</div>

                    </div>
                	<div class="comp-table-row">
                        <div class="comp-table-col">Transmisi</div>
                        <div class="comp-table-col">{{$transmisi1->tipe_transmisi}}</div>
                        <div class="comp-table-col">{{$transmisi2->tipe_transmisi}}</div>

                    </div>
                	<div class="comp-table-row">
                        <div class="comp-table-col">Berat Kosong</div>
                        <div class="comp-table-col">{{$dimensi1->berat_kosong}}</div>
                        <div class="comp-table-col">{{$dimensi2->berat_kosong}}</div>

                    </div>
                	<div class="comp-table-row">
                        <div class="comp-table-col">Suspensi Depan</div>
                        <div class="comp-table-col">{{$kaki1->suspensi_depan}}</div>
                        <div class="comp-table-col">{{$kaki2->suspensi_depan}}</div>

                    </div>
                	<div class="comp-table-row">
                        <div class="comp-table-col">Suspensi Belakang</div>
                        <div class="comp-table-col">{{$kaki1->suspensi_belakang}}</div>
                        <div class="comp-table-col">{{$kaki2->suspensi_belakang}}</div>

                    </div>
                	<div class="comp-table-row">
                        <div class="comp-table-col">Rem Depan</div>
                        <div class="comp-table-col">{{$kaki1->rem_depan}}</div>
                        <div class="comp-table-col">{{$kaki2->rem_depan}}</div>

                    </div>
                	<div class="comp-table-row">
                        <div class="comp-table-col">Rem Belakang</div>
                        <div class="comp-table-col">{{$kaki1->rem_belakang}}</div>
                        <div class="comp-table-col">{{$kaki2->rem_belakang}}</div>

                    </div>
                	<div class="comp-table-row">
                        <div class="comp-table-col">Kapasitas Bahan Bakar</div>
                        <div class="comp-table-col">{{$mesin1->kapasitas_bahan_bakar}}</div>
                        <div class="comp-table-col">{{$mesin2->kapasitas_bahan_bakar}}</div>

                    </div>
                	<div class="comp-table-row">
                        <div class="comp-table-col">Velg</div>
                        <div class="comp-table-col">{{$kaki1->velg}}</div>
                        <div class="comp-table-col">{{$kaki2->velg}}</div>

                    </div>
                	<div class="comp-table-row">
                        <div class="comp-table-col">Bahan Bakar</div>
                        <div class="comp-table-col">{{$mesin1->bahan_bakar}}</div>
                        <div class="comp-table-col">{{$mesin2->bahan_bakar}}</div>
                  </div>
                  <div class="comp-table-row">
                        <div class="comp-table-col">Situs</div>
                        <div class="comp-table-col">{{$spec1->user->website}}</div>
                        <div class="comp-table-col">{{$spec2->user->website}}</div>
                  </div>
                  <div class="comp-table-row">
                        <div class="comp-table-col">Panjang</div>
                        <div class="comp-table-col">{{$dimensi1->panjang}}</div>
                        <div class="comp-table-col">{{$dimensi2->panjang}}</div>
                  </div>
                  <div class="comp-table-row">
                        <div class="comp-table-col">Lebar</div>
                        <div class="comp-table-col">{{$dimensi1->lebar}}</div>
                        <div class="comp-table-col">{{$dimensi2->lebar}}</div>
                  </div>
                  <div class="comp-table-row">
                        <div class="comp-table-col">Tinggi</div>
                        <div class="comp-table-col">{{$dimensi1->tinggi}}</div>
                        <div class="comp-table-col">{{$dimensi2->tinggi}}</div>
                  </div>
                  <div class="comp-table-row">
                        <div class="comp-table-col">Jarak Sumbu Roda</div>
                        <div class="comp-table-col">{{$dimensi1->jarak_sumbu_roda}}</div>
                        <div class="comp-table-col">{{$dimensi2->jarak_sumbu_roda}}</div>
                  </div>
                  <div class="comp-table-row">
                        <div class="comp-table-col">Jarak Pijak Depan</div>
                        <div class="comp-table-col">{{$dimensi1->jarak_pijak_depan}}</div>
                        <div class="comp-table-col">{{$dimensi2->jarak_pijak_depan}}</div>
                  </div>
                  <div class="comp-table-row">
                        <div class="comp-table-col">Jarak Pijak Belakang</div>
                        <div class="comp-table-col">{{$dimensi1->jarak_pijak_belakang}}</div>
                        <div class="comp-table-col">{{$dimensi2->jarak_pijak_belakang}}</div>
                  </div>
                  <div class="comp-table-row">
                        <div class="comp-table-col">Jarak Terendah Ke Tanah</div>
                        <div class="comp-table-col">{{$dimensi1->jarak_terendah_ke_tanah}}</div>
                        <div class="comp-table-col">{{$dimensi2->jarak_terendah_ke_tanah}}</div>
                  </div>
                  <div class="comp-table-row">
                        <div class="comp-table-col">Sistem Kemudi</div>
                        <div class="comp-table-col">{{$transmisi1->sistem_kemudi}}</div>
                        <div class="comp-table-col">{{$transmisi2->sistem_kemudi}}</div>
                  </div>
                  <div class="comp-table-row">
                        <div class="comp-table-col">Kapasitas Silinder</div>
                        <div class="comp-table-col">{{$mesin1->kapasitas_silinder}}</div>
                        <div class="comp-table-col">{{$mesin2->kapasitas_silinder}}</div>
                  </div>
                  <div class="comp-table-row">
                        <div class="comp-table-col">Sistem Pembakaran</div>
                        <div class="comp-table-col">{{$mesin1->sistem_pembakaran}}</div>
                        <div class="comp-table-col">{{$mesin2->sistem_pembakaran}}</div>
                  </div>
                  <div class="comp-table-row">
                        <div class="comp-table-col">Negara Pembuat</div>
                        <div class="comp-table-col">{{$mobil_baru1->negara_pembuat}}</div>
                        <div class="comp-table-col">{{$mobil_baru2->negara_pembuat}}</div>
                  </div>


                    <div class="comp-table-row comp-table-permalinks">
                        <div class="comp-table-col">&nbsp;</div>
                        <div class="comp-table-col"><a href="/mobil-baru/{{$city1->slug}}/{{$mobil_baru1->slug}}" class="btn btn-primary btn-lg">Tampilkan</a></div>
                        <div class="comp-table-col"><a href="/mobil-baru/{{$city2->slug}}/{{$mobil_baru2->slug}}" class="btn btn-primary btn-lg">Tampilkan</a></div>

                    </div>
                </div>
                </div>
            </div>
        </div>
   	</div>
    <!-- End Body Content -->

@endsection
