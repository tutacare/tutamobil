<div class="tabs vehicle-details-tabs">
    <ul class="nav nav-tabs">
        <li class="active"> <a data-toggle="tab" href="#vehicle-dimensi">Dimensi</a></li>
        <li> <a data-toggle="tab" href="#vehicle-mesin">Mesin</a></li>
        <li> <a data-toggle="tab" href="#vehicle-transmisi">Transmisi</a></li>
        <li> <a data-toggle="tab" href="#vehicle-kaki">Kaki</a></li>
    </ul>
    <div class="tab-content">
      <!-- dimensi -->
      <div id="vehicle-dimensi" class="tab-pane fade in active">
          <p>
            <table class="table-specifications table table-striped table-hover">
                  <tbody>
                    <tr>
                      <td>Panjang</td>
                      <td>{{$dimensi->panjang}}</td>
                    </tr>
                    <tr>
                      <td>Lebar</td>
                      <td>{{$dimensi->lebar}}</td>
                    </tr>
                    <tr>
                      <td>Tinggi</td>
                      <td>{{$dimensi->tinggi}}</td>
                    </tr>
                    <tr>
                      <td>Jarak Sumbu Roda</td>
                      <td>{{$dimensi->jarak_sumbu_roda}}</td>
                    </tr>
                    <tr>
                      <td>Jarak Pijak Depan</td>
                      <td>{{$dimensi->jarak_pijak_depan}}</td>
                    </tr>
                    <tr>
                      <td>Jarak Pijak Belakang</td>
                      <td>{{$dimensi->jarak_pijak_belakang}}</td>
                    </tr>
                    <tr>
                      <td>Jarak Terendah Ke Tanah</td>
                      <td>{{$dimensi->jarak_terendah_ke_tanah}}</td>
                    </tr>
                    <tr>
                      <td>Radius Putar</td>
                      <td>{{$dimensi->radius_putar}}</td>
                    </tr>
                    <tr>
                      <td>Berat Kosong</td>
                      <td>{{$dimensi->berat_kosong}}</td>
                    </tr>
                  </tbody>
            </table>
          </p>
      </div>
      <!-- end dimensi -->
        <div id="vehicle-mesin" class="tab-pane fade">
            <p>
              <table class="table-specifications table table-striped table-hover">
                    <tbody>
                      <tr>
                        <td>Jenis / Tipe Mesin</td>
                        <td>{{$mesin->jenis_mesin}}</td>
                      </tr>
                      <tr>
                        <td>Kapasitas Silinder</td>
                        <td>{{$mesin->kapasitas_silinder}}</td>
                      </tr>
                      <tr>
                        <td>Daya Maksimum</td>
                        <td>{{$mesin->daya_maksimum}}</td>
                      </tr>
                      <tr>
                        <td>Torsi Maksimum</td>
                        <td>{{$mesin->torsi_maksimum}}</td>
                      </tr>
                      <tr>
                        <td>Perbandingan Kompresi</td>
                        <td>{{$mesin->perbandingan_kompresi}}</td>
                      </tr>
                      <tr>
                        <td>Sistem Pembakaran</td>
                        <td>{{$mesin->sistem_pembakaran}}</td>
                      </tr>
                      <tr>
                        <td>Bahan Bakar</td>
                        <td>{{$mesin->bahan_bakar}}</td>
                      </tr>
                      <tr>
                        <td>Kapasitas Bahan Bakar</td>
                        <td>{{$mesin->kapasitas_bahan_bakar}}</td>
                      </tr>
                    </tbody>
              </table>
            </p>
        </div>
        <div id="vehicle-transmisi" class="tab-pane fade">
          <p>
            <table class="table-specifications table table-striped table-hover">
                  <tbody>
                    <tr>
                      <td>Kopling</td>
                      <td>{{$transmisi->kopling}}</td>
                    </tr>
                    <tr>
                      <td>Tipe Transmisi</td>
                      <td>{{$transmisi->tipe_transmisi}}</td>
                    </tr>
                    <tr>
                      <td>Sistem Kemudi</td>
                      <td>{{$transmisi->sistem_kemudi}}</td>
                    </tr>
                  </tbody>
            </table>
          </p>
            <!-- End Toggle -->
        </div>
        <div id="vehicle-kaki" class="tab-pane fade">
          <p>
            <table class="table-specifications table table-striped table-hover">
                  <tbody>
                    <tr>
                      <td>Tipe Rangka</td>
                      <td>{{$kaki->tipe_rangka}}</td>
                    </tr>
                    <tr>
                      <td>Suspensi Depan</td>
                      <td>{{$kaki->suspensi_depan}}</td>
                    </tr>
                    <tr>
                      <td>Suspensi Belakang</td>
                      <td>{{$kaki->suspensi_belakang}}</td>
                    </tr>
                    <tr>
                      <td>Rem Depan</td>
                      <td>{{$kaki->rem_depan}}</td>
                    </tr>
                    <tr>
                      <td>Rem Belakang</td>
                      <td>{{$kaki->rem_belakang}}</td>
                    </tr>
                    <tr>
                      <td>Velg</td>
                      <td>{{$kaki->velg}}</td>
                    </tr>
                    <tr>
                      <td>Ukuran Ban</td>
                      <td>{{$kaki->ukuran_ban}}</td>
                    </tr>
                  </tbody>
            </table>
          </p>
            <!-- End Toggle -->
        </div>
        
    </div>
</div>
