// memformat angka ribuan
function formatAngka(angka) {
 if (typeof(angka) != 'string') angka = angka.toString();
 var reg = new RegExp('([0-9]+)([0-9]{3})');
 while(reg.test(angka)) angka = angka.replace(reg, '$1.$2');
 return angka;
}
$(document).ready(function() {
  // tambah titik dan angka saja
  $('#inputdp').on('keypress', function(e) {
   var c = e.keyCode || e.charCode;
   switch (c) {
    case 8: case 9: case 27: case 13: return;
    case 65:
     if (e.ctrlKey === true) return;
   }
   if (c < 48 || c > 57) e.preventDefault();
  }).on('keyup', function() {
   var inp = $(this).val().replace(/\./g, '');

   $(this).val(formatAngka(inp));
  });
  //.end

$('#info-credit').on("click", function () {
    var hargamobil = $('#hargamobil').val();
    var inputdpstring = $('#inputdp').val();
    var inputdp = inputdpstring.replace(/[^0-9]/g, '');
    var persen25 = (hargamobil * 25) / 100;
    if(inputdp < persen25)
    {
      swal("Mohon Maaf", "Minimum DP yang dapat digunakan untuk perhitungan Kredit adalah 25% dari harga kendaraan", "error");
    }
    $.ajax({
      type: 'GET',
      url: '/api/credit-simulation/' + hargamobil + '/' + inputdp,
      success: function (data) {
          $('#credit-simulation').html(data);
        }
    });
  });
});
