$(document).ready(function() {
// merek get design
  $("#merek").change(function() {
    var merek = $("#merek").val();
    $.ajax({
        type: 'GET',
        url: "/api/getdesign/" + merek,

        success: function(data) {
          $("#design").html(data);
        }
    });
  });


});
