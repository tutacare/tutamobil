$(document).ready(function() {
// kota get merek
  $("#city").change(function() {
    var city = $("#city").val();
    $.ajax({
        type: 'GET',
        url: "/api/getmerek/" + city,

        success: function(data) {
          $("#merek").html(data);
        }
    });
  });
// merek get model/design
$("#merek").change(function() {
  var city = $("#city").val();
  var merek = $("#merek").val();
  $.ajax({
      type: 'GET',
      url: "/api/getdesign/" + city + "/" + merek,

      success: function(data) {
        $("#design").html(data);
      }
  });
});
// model/design get tipe
$("#design").change(function() {
  var city = $("#city").val();
  var merek = $("#merek").val();
  var design = $("#design").val();
  $.ajax({
      type: 'GET',
      url: "/api/gettipe/" + city + "/" + merek + "/" + design,

      success: function(data) {
        $("#tipe").html(data);
      }
  });
});

});
