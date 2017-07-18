$(document).ready(function() {

  $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
  });

  $(".readonly").keydown(function(e){
          e.preventDefault();
      });

// city get_all model/design
$("#city").change(function() {
  $.ajax({
      type: 'GET',
      url: "/api/getmerekslot",

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
      url: "/api/getresponslot/" + city + '/' + merek,
      success: function(data) {
        $(".message-respon").html(data);
      }
  });
});

//total_harga
$("#durasi").change(function() {
  var durasi = $("#durasi").val();
  $.ajax({
      type: 'POST',
      url: "/api/gettotalharga",
      data: {durasi: durasi},
      success: function(data) {
          $("#total-harga").val(data);
      }
  });

});


});
