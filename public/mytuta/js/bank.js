
$(document).ready(function(){

    var info       = $('.info');
    var infodelete = $('.info-delete');
    var $_token    = $('#token').val();

    $('#bank-list').on('click', '.open-modal', function(){
        info.hide().find('ul').empty();
        var id = $(this).val();
        $.get('bank/edit' + '/' + id, function (data) {
            $('#id').val(data.id);
            $('#bank').val(data.name);
            $('.save').val("update");
            $('#myModal').modal('show');
        })
    });

    $('#btn-add').click(function(){
        $('.save').val("add");
        $('#frm').trigger("reset");
        info.hide().find('ul').empty();
        $('#myModal').modal('show');
    });

    $('#bank-list').on('click', '.delete', function(){
        var id = $(this).val();
        var x = confirm("Are you sure you want to delete?");
        if(x)
        {
            $.ajax({
                type: "POST",
                headers: { 'X-XSRF-TOKEN' : $_token },
                url: 'bank/delete' + '/' + id,
                success: function (data) {

                    infodelete.hide().find('ul').empty();
                    if(data.success == false)
                    {
                        infodelete.find('ul').append('<li>'+data.errors+'</li>');
                        infodelete.slideDown();
                        infodelete.fadeTo(2000, 500).slideUp(500, function(){
                           infodelete.hide().find('ul').empty();
                        });
                    }
                    else
                    {
                        $("#bank" + id).remove();
                    }
                },
            });

            return true;

        }

    });

    $(".save").click(function (e) {
        e.preventDefault();
        var state = $('.save').val();
        var id = $('#id').val();
        var url = 'bank/store';

        if (state == "update"){
            url  = 'bank/update/' + id;
        }

        var formData = {
            id: $('#id').val(),
            name: $('#bank').val()
        }

        $.ajax({

            type: 'POST',
            url: url,
            data: formData,
            dataType: 'json',
            headers: { 'X-XSRF-TOKEN' : $_token },
            success: function (data) {

                info.hide().find('ul').empty();

                if(data.success == false)
                {
                    console.log(url);
                    $.each(data.errors, function(index, error) {
                        info.find('ul').append('<li>'+error+'</li>');
                    });

                    info.slideDown();
                    info.fadeTo(2000, 500).slideUp(500, function(){
                       info.hide().find('ul').empty();
                    });
                }
                else
                {
                    var bank = '<tr class="success" id="bank' + data.data.id + '"><td>' + data.data.name + '</td>';
                    bank += '<td><button class="btn btn-xs btn-primary open-modal" id="buruk" value="' + data.data.id + '"> <i class="glyphicon glyphicon-edit"></i> Edit</button>';
                    bank += '&nbsp;<button class="btn btn-xs btn-danger delete" id="buruk" value="' + data.data.id + '"><i class="glyphicon glyphicon-trash"></i> Delete</button></td></tr>';

                    if (state == "add"){
                        $('#bank-list tr:first').before(bank);
                    }else{
                        $("#bank" + id).replaceWith(bank);
                    }

                    $('#frm').trigger("reset");
                    $('#myModal').modal('hide');
                    //location.reload();

                }


            },
            error: function (data) {}
        });
    });
});
