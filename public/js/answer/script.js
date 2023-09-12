$(document).ready(function(){
    $('.upRequest').click(function(){
        //Find the parent element with the class accordion-item
        let parent = $(this).parents('.accordion-item');
        let id = parent.data('id');

        $.ajax({
            url: "http://192.168.100.20/api/request/" + id,
            method: 'GET',
            success: function(data){
                $('#modalTitle').html(`Atualizar requisição #${data.id}`);
                
                $('#modalName').val(data.name);
                $('#modalNumber').val((data.number.replace('@c.us', '')));
                //Find the option with the value of the data
                $('#modalStatus option[value="' + data.status + '"]').attr('selected', 'selected');
                $('#modalArea').val(data.area);
                $('#modalType').val(data.type);
            },
            error: function(err){
                alert("Erro ao buscar requisição\n" + err);
            }
        })
        //Open the modal
        $('#modalStatusWindow').modal('show');
    });


    $('#modalStatusButton').click(function(){

        let status = $('#modalStatus').val();
        let message = $('#modalMessage').val();
        let name = $('#modalName').val();
        let number = $('#modalNumber').val() + '@c.us';
        let area = $('#modalArea').val();
        let type = $('#modalType').val();

        let id = $('#modalTitle').html().split('#')[1];

        $.ajax({
            url: "http://192.168.100.20/api/request/" + id,
            method: 'PUT',
            data: { status: status, area: area, type: type, name: name },
            success: function(data){
                if (message !== ''){
                    $.ajax({
                        url: "http://192.168.100.20:3000/sendMessage",
                        method: 'POST',
                        data: JSON.stringify({ "number": number, "message": message }),
                        dataType: 'json',
                        headers: { 'Content-Type': 'application/json' },
                        success: function(data){
                            console.log({ "status": "success", number: number, message: message });
                            window.location.reload();
                        },
                        error : function(err){
                            console.log({ "status": "error", number: number, message: message });
                            console.log("Erro ao enviar mensagem");
                            console.log(err);
                        }
                    });
                }
                window.location.reload();
            },
            error: function(err){
                console.log("Erro ao atualizar status");
                console.log(err);
            }
        });
    });

});
