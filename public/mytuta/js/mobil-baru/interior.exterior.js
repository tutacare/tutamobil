
$(document).ready(function(){

    var infointerior       = $('.info-interior');
    var infodeleteinterior = $('.info-delete-interior');
    var $_token    = $('#token-interior').val();

    $('#interior_exterior-list').on('click', '.open-modal-interior', function(){
        infointerior.hide().find('ul').empty();
        var id = $(this).val();
        $.get('interior/edit' + '/' + id, function (data) {
            $('#id').val(data.id);
            $('#interior_exterior').val(data.interior_exterior);
            $('.save-interior').val("update-interior");
            $('#myModalInterior').modal('show');
        })
    });

    $('#btn-add-interior').click(function(){
        $('.save-interior').val("add-interior");
        $('#frm').trigger("reset");
        infointerior.hide().find('ul').empty();
        $('#myModalInterior').modal('show');
    });

    $('#interior_exterior-list').on('click', '.delete-interior', function(){
        var id = $(this).val();
        var x = confirm("Benar ingin menghapus?");
        if(x)
        {
            $.ajax({
                type: "POST",
                headers: { 'X-XSRF-TOKEN' : $_token },
                url: 'interior/delete' + '/' + id,
                success: function (data) {

                    infodeleteinterior.hide().find('ul').empty();
                    if(data.success == false)
                    {
                        infodeleteinterior.find('ul').append('<li>'+data.errors+'</li>');
                        infodeleteinterior.slideDown();
                        infodeleteinterior.fadeTo(2000, 500).slideUp(500, function(){
                           infodeleteinterior.hide().find('ul').empty();
                        });
                    }
                    else
                    {
                        $("#interior_exterior" + id).remove();
                    }
                },
            });

            return true;

        }

    });

    $(".save-interior").click(function (e) {
        e.preventDefault();
        var state = $('.save-interior').val();
        var id = $('#id').val();
        var spesifikasi_mobil_baru_id = $('#spesifikasi_mobil_baru_id').val();
        var interior_exterior = $('#interior_exterior').val();
        var url = 'interior/store';

        if (state == "update-interior"){
            url  = 'interior/update/' + id;
        }

        var formData = {
            id: $('#id').val(),
            spesifikasi_mobil_baru_id: $('#spesifikasi_mobil_baru_id').val(),
            interior_exterior: $('#interior_exterior').val()
        }

        $.ajax({

            type: 'POST',
            url: url,
            data: formData,
            dataType: 'json',
            headers: { 'X-XSRF-TOKEN' : $_token },
            success: function (data) {

                infointerior.hide().find('ul').empty();

                if(data.success == false)
                {
                    console.log(url);
                    $.each(data.errors, function(index, error) {
                        infointerior.find('ul').append('<li>'+error+'</li>');
                    });

                    infointerior.slideDown();
                    infointerior.fadeTo(2000, 500).slideUp(500, function(){
                       infointerior.hide().find('ul').empty();
                    });
                }
                else
                {
                    var interior_exterior = '<tr class="success" id="interior_exterior' + data.data.id + '"><td>' + data.data.interior_exterior + '</td>';
                    interior_exterior += '<td><button class="btn btn-xs btn-primary open-modal-interior" value="' + data.data.id + '"> <i class="glyphicon glyphicon-edit"></i> Edit</button>';
                    interior_exterior += '&nbsp;<button class="btn btn-xs btn-danger delete-interior" value="' + data.data.id + '"><i class="glyphicon glyphicon-trash"></i> Delete</button></td></tr>';

                    if (state == "add-interior"){
                        $('#interior_exterior-list tr:first').before(interior_exterior);
                    }else{
                        $("#interior_exterior" + id).replaceWith(interior_exterior);
                    }

                    $('#frm').trigger("reset");
                    $('#myModalInterior').modal('hide');
                    //location.reload();

                }


            },
            error: function (data) {}
        });
    });
});
