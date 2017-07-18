<div class="listing-header">
    <h3>Simulasi Kredit</h3>
</div>
<br />
<div>
  <div class="row">
                      <div class="form-group">
                          <div class="col-md-6">
                              <label>Harga {{$mobil_baru->merek->merek}} {{$mobil_baru->design->design}} {{$mobil_baru->tipe->tipe}} {{$spec->city->city}}</label>
                              <div class="alert alert-info">Rp. {{number_format((isset($price->harga) ? $price->harga : 0), 0 , ',', '.')}}</div>
                          </div>
                          <div class="col-md-6">
                              <label>Down Payment (DP)</label>
                              <input type="text" value="{{number_format($dp, 0 , ',', '.')}}" maxlength="100" class="form-control" name="inputdp" id="inputdp" onkeyup="javascript:tandaPemisahTitik(this);">
                              <em>(DP dapat diubah secara manual, minimum 25% dari harga kendaraan)</em>
                          </div>
                      </div>
  </div>
  <div class="row">
      <div class="col-md-12">
        <input id="hargamobil" name="hargamobil" type="hidden" value="{{ (isset($price->harga) ? $price->harga : 0) }}">
    <button type="button" id="info-credit" class="btn btn-info pull-right">Kalkulasi</button>
      </div>
  </div>
  <div class="spacer-30"></div>
  <div class="row" id="credit-simulation">
    @include('widgets.credit-simulation')
  </div>
  <div class="row">
    <ul>
    <li>Rincian kredit diatas tidak mengikat dan dapat berubah sewaktu-waktu.</li>
    <li>Harga diatas sudah termasuk asuransi all risk</li>
    </ul>
  </div>
</div>
