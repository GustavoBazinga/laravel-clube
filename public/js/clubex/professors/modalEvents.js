$(document).ready(function() {

    $('#createButton').on('click', function(event) {
        event.preventDefault();
        resetForm();
        $('#modalCreateProfessor').modal('show');
    });

    //Open and load data to edit modal
    $('.card').on('click', function(event) {
        event.preventDefault();
        resetForm();

        let id = $(this).attr('id').replace('professor', '');

        let dataSport;

        $.ajax({
            url: 'http://192.168.100.20/api/clubex/professors/' + id,
            type: 'GET',
            dataType: 'json',
            success: function(data) {
                modal = $('#modalEditProfessor');
                modal.find('#professorId').val(data.id);
                modal.find('.professorName').val(data.name);
                modal.find('.professorTelephone').val(data.telephone);
                modal.find('.professorEmail').val(data.email);
                modal.find('.professorMore').val(data.more);
                modal.find('#previewImage').attr('src', data.image);
                modal.find('.modalTitle').html("Dados do Professor: " + data.name);

            },
            error: function(data) {
                console.log(data);
            }
        })

        $('#formEditProfessor').attr('action', 'http://192.168.100.20/professors/' + id);
        $('#formDelete').attr('action', 'http://192.168.100.20/professors/' + id);

        console.log($('#formEditSport').html());
        
        $('#modalEditProfessor').modal('show');
    });

    $(".professorImage").change(function() {
        console.log('change');
        var reader = new FileReader();

        reader.onload = function(e) {
            $('.previewImage').attr('src', e.target.result);
        }

        reader.readAsDataURL(this.files[0]); 
    });

    $("#modalEditButton").on('click', function(event) {
        event.preventDefault();
        let name = $("#professorName").val();
        let description = $("#professorDescription").val();
        let id = $("#professorId").val();
        //Get image
        var image = $('#professorImage').prop('files')[0];

        console.log([
            name,
            description,
            id,
            image
        ]);

    });

    function resetForm() {
        $(".professorName").val('');
        $(".professorDescription").val('');
        $(".professorImage").val('');
        $('.previewImage').attr('src', '');
    }


});