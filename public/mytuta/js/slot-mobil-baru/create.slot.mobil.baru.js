$(document).ready(function() {

  $(".readonly").keydown(function(e){
          e.preventDefault();
      });

$('#btn-add-user').click(function(){
    $('#myModal').modal('show');
});

$('#name').click(function(){
    $('#myModal').modal('show');
});

$('.btn-get-user').click(function(){
  var id = $(this).val();
  var user = $(this).data('user');
  $('#id').val(id);
  $('#name').val(user[0]);
  $('#email').val(user[1]);
  $('#username').val(user[2]);
    $('#myModal').modal('hide');
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

});
