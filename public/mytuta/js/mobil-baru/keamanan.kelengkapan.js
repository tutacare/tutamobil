
$(document).ready(function(){

    var infokeamanan       = $('.info-keamanan');
    var infodeletekeamanan = $('.info-delete-keamanan');
    var $_token    = $('#token-keamanan').val();

    $('#keamanan_kelengkapan-list').on('click', '.open-modal-keamanan', function(){
        infokeamanan.hide().find('ul').empty();
        var id = $(this).val();
        $.get('keamanan/edit' + '/' + id, function (data) {
            $('#id').val(data.id);
            $('#keamanan_kelengkapan').val(data.keamanan_kelengkapan);
            $('.save-keamanan').val("update-keamanan");
            $('#myModalKeamanan').modal('show');
        })
    });

    $('#btn-add-keamanan').click(function(){
        $('.save-keamanan').val("add-keamanan");
        $('#frmk').trigger("reset");
        infokeamanan.hide().find('ul').empty();
        $('#myModalKeamanan').modal('show');
    });

    $('#keamanan_kelengkapan-list').on('click', '.delete-keamanan', function(){
        var id = $(this).val();
        var x = confirm("Benar ingin menghapus?");
        if(x)
        {
            $.ajax({
                type: "POST",
                headers: { 'X-XSRF-TOKEN' : $_token },
                url: 'keamanan/delete' + '/' + id,
                success: function (data) {

                    infodeletekeamanan.hide().find('ul').empty();
                    if(data.success == false)
                    {
                        infodeletekeamanan.find('ul').append('<li>'+data.errors+'</li>');
                        infodeletekeamanan.slideDown();
                        infodeletekeamanan.fadeTo(2000, 500).slideUp(500, function(){
                           infodeletekeamanan.hide().find('ul').empty();
                        });
                    }
                    else
                    {
                        $("#keamanan_kelengkapan" + id).remove();
                    }
                },
            });

            return true;

        }

    });

    $(".save-keamanan").click(function (e) {
        e.preventDefault();
        var state = $('.save-keamanan').val();
        var id = $('#id').val();
        var spesifikasi_mobil_baru_id = $('#spesifikasi_mobil_baru_id').val();
        var keamanan_kelengkapan = $('#keamanan_kelengkapan').val();
        var url = 'keamanan/store';

        if (state == "update-keamanan"){
            url  = 'keamanan/update/' + id;
        }

        var formData = {
            id: $('#id').val(),
            spesifikasi_mobil_baru_id: $('#spesifikasi_mobil_baru_id').val(),
            keamanan_kelengkapan: $('#keamanan_kelengkapan').val()
        }

        $.ajax({

            type: 'POST',
            url: url,
            data: formData,
            dataType: 'json',
            headers: { 'X-XSRF-TOKEN' : $_token },
            success: function (data) {

                infokeamanan.hide().find('ul').empty();

                if(data.success == false)
                {
                    console.log(url);
                    $.each(data.errors, function(index, error) {
                        infokeamanan.find('ul').append('<li>'+error+'</li>');
                    });

                    infokeamanan.slideDown();
                    infokeamanan.fadeTo(2000, 500).slideUp(500, function(){
                       infokeamanan.hide().find('ul').empty();
                    });
                }
                else
                {
                    var keamanan_kelengkapan = '<tr class="success" id="keamanan_kelengkapan' + data.data.id + '"><td>' + data.data.keamanan_kelengkapan + '</td>';
                    keamanan_kelengkapan += '<td><button class="btn btn-xs btn-primary open-modal-keamanan" value="' + data.data.id + '"> <i class="glyphicon glyphicon-edit"></i> Edit</button>';
                    keamanan_kelengkapan += '&nbsp;<button class="btn btn-xs btn-danger delete-keamanan" value="' + data.data.id + '"><i class="glyphicon glyphicon-trash"></i> Delete</button></td></tr>';

                    if (state == "add-keamanan"){
                        $('#keamanan_kelengkapan-list tr:first').before(keamanan_kelengkapan);
                    }else{
                        $("#keamanan_kelengkapan" + id).replaceWith(keamanan_kelengkapan);
                    }

                    $('#frm').trigger("reset");
                    $('#myModalKeamanan').modal('hide');
                    //location.reload();

                }


            },
            error: function (data) {}
        });
    });
});
