$(document).ready(function() {

    $('#createButton').on('click', function(event) {
        event.preventDefault();
        resetForm();
        $('#modalCreateSport').modal('show');
    });

    //Open and load data to edit modal
    $('.card').on('click', function(event) {
        event.preventDefault();
        resetForm();

        let id = $(this).attr('id').replace('sport', '');

        let dataSport;

        $.ajax({
            url: 'http://192.168.100.20/api/clubex/sport/' + id,
            type: 'GET',
            dataType: 'json',
            success: function(data) {
                modal = $('#modalEditSport');
                modal.find('#sportId').val(data.id);
                modal.find('.sportName').val(data.name);
                modal.find('.sportDescription').val(data.description);
                modal.find('#previewImage').attr('src', data.image);
                modal.find('.modalTitle').html("Dados do esporte: " + data.name);

            },
            error: function(data) {
                console.log(data);
            }
        })

        $('#formEditSport').attr('action', 'http://192.168.100.20/sports/' + id);
        $('#formDelete').attr('action', 'http://192.168.100.20/sports/' + id);

        console.log($('#formEditSport').html());
        
        $('#modalEditSport').modal('show');
    });


    //Update image preview
    $('.sportImage').on('change', function() {
        console.log('change');
        var reader = new FileReader();
    
        reader.onload = function(e) {
            $('.previewImage').attr('src', e.target.result);
        }
    
        reader.readAsDataURL(this.files[0]); 
    });

    $("#modalEditButton").on('click', function(event) {
        event.preventDefault();
        let name = $("#sportName").val();
        let description = $("#sportDescription").val();
        let id = $("#sportId").val();
        //Get image
        var image = $('#sportImage').prop('files')[0];

        console.log([
            name,
            description,
            id,
            image
        ]);

    });

    function resetForm() {
        $(".sportName").val('');
        $(".sportDescription").val('');
        $(".sportImage").val('');
        $('.previewImage').attr('src', '');
    }
});