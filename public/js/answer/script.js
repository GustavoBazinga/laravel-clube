$(document).ready(function(){
    $('.upStatus').click(function(){
        //Find the parent element with the class accordion-item
        let parent = $(this).parents('.accordion-item');
        let id = parent.data('id');
        let status = parent.data('status');
        let number = parent.data('number');


        //Open the modal
        $('#modalStatus').modal('show');
        $('#modalStatusTitle').html(`Atualização de Status para a requisição #${id}`);
        $('#captionSelect').html(`Ao clicar em salvar, a mensagem será enviada para o número ${number.split('@')[0]}`);
        $('#modalStatusSelect').find('option').each(function(){
            if($(this).val() === status){
                $(this).attr('selected', true);
            }else{
                $(this).attr('selected', false);
            }
        });
    });

    $('#modalStatusSelect').change(function(){
        let newStatus = $(this).val();
        let id = $('#modalStatusTitle').html().split('#')[1];
        if (newStatus === "Em andamento") {
            $('#modalStatusMessage').val(`Olá, sua requisição #${id} está em andamento. Aguarde por mais informações.`);
        } else if (newStatus === "Finalizado") {
            $('#modalStatusMessage').val(`Olá, sua requisição #${id} foi finalizada. Obrigado por utilizar nossos serviços.`);
        }

    });

    $('#modalStatus').on('hidden.bs.modal', function(){
        $('#modalStatusMessage').val('');
        $('#modalStatusTitle').html('');
    });

    $('#modalStatusButton').click(function(){
        let newStatus = $('#modalStatusSelect').val();
        let id = $('#modalStatusTitle').html().split('#')[1];
        var message = $('#modalStatusMessage').val();
        var caption = $('#captionSelect').html().split(' ');
        var number = caption[caption.length - 1] + '@c.us';

        console.log({number: number, message: message });



        $.ajax({
            url: "http://192.168.100.20/api/requests/" + id,
            method: 'PUT',
            data: { status: newStatus },
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
