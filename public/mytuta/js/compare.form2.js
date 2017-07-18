$(document).ready(function() {
// kota get merek
  $("#city_form2").change(function() {
    var city = $("#city_form2").val();
    $.ajax({
        type: 'GET',
        url: "/api/getmerek/" + city,

        success: function(data) {
          $("#merek_form2").html(data);
        }
    });
  });
// merek get model/design
$("#merek_form2").change(function() {
  var city = $("#city_form2").val();
  var merek = $("#merek_form2").val();
  $.ajax({
      type: 'GET',
      url: "/api/getdesign/" + city + "/" + merek,

      success: function(data) {
        $("#design_form2").html(data);
      }
  });
});
// model/design get tipe
$("#design_form2").change(function() {
  var city = $("#city_form2").val();
  var merek = $("#merek_form2").val();
  var design = $("#design_form2").val();
  $.ajax({
      type: 'GET',
      url: "/api/gettipe/" + city + "/" + merek + "/" + design,

      success: function(data) {
        $("#tipe_form2").html(data);
      }
  });
});

});
