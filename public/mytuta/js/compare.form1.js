$(document).ready(function() {
// kota get merek
  $("#city_form1").change(function() {
    var city = $("#city_form1").val();
    $.ajax({
        type: 'GET',
        url: "/api/getmerek/" + city,

        success: function(data) {
          $("#merek_form1").html(data);
        }
    });
  });
// merek get model/design
$("#merek_form1").change(function() {
  var city = $("#city_form1").val();
  var merek = $("#merek_form1").val();
  $.ajax({
      type: 'GET',
      url: "/api/getdesign/" + city + "/" + merek,

      success: function(data) {
        $("#design_form1").html(data);
      }
  });
});
// model/design get tipe
$("#design_form1").change(function() {
  var city = $("#city_form1").val();
  var merek = $("#merek_form1").val();
  var design = $("#design_form1").val();
  $.ajax({
      type: 'GET',
      url: "/api/gettipe/" + city + "/" + merek + "/" + design,

      success: function(data) {
        $("#tipe_form1").html(data);
      }
  });
});

});
