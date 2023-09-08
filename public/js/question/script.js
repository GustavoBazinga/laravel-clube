$(document).ready(function() {
    $('#btn-add-question').click(function() {
        let count = $('#questions-list').children().length;

        label = $('<label></label>').text('Question ' + (count + 1)).addClass('block text-sm font-medium text-gray-700 label-questions');
        input = $('<input></input>')
            .attr('type', 'text')
            .attr('name', 'new_questions[' + count + ']')
            .addClass('border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm')
            .attr('style', 'width: 100%')
            .attr('required', 'required');
        select = $('<select></select>')
            .attr('name', 'new_types[' + count + ']')
            .addClass('border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm')
            .attr('style', 'width: 100%')
            .attr('required', 'required');
        select.html(`
            <option value="text">Texto</option>
            <option value="longtext">Texto Longo</option>
            <option value="select">Seleção</option>
            <option value="email">E-mail</option>
            <option value="number">Quantidade</option>
            <option value="date">Data</option>
            <option value="telephone">Telefone</option>
        `);


        divInputs = $('<div></div>').addClass('row');
        //Create two columns
        divInputs.append($('<div></div>').addClass('col-6').append(input));
        divInputs.append($('<div></div>').addClass('col-5').append(select));
        divInputs.append($('<div></div>').addClass('col-1').html('<button class="remove-button">X</button>'));
        div = $('<div></div>').append(label).append(divInputs);

        $('#questions-list').append(div);

        //Get all .label-questions and show the remove button
        let labels = $('.label-questions');
        if (labels.length > 1) {
            $('.remove-button').show();
        }

    });

    $(document).on('click', '.remove-button', function() {
        $(this).parent().parent().parent().remove();

        //Get all .label-questions and hide the remove button if there is only one
        let labels = $('.label-questions');
        if (labels.length == 1) {
            $('.remove-button').hide();
        }
        //Loop through all labels
        for (let i = 0; i < labels.length; i++) {
            //Change the text of the label
            $(labels[i]).text('Questão ' + (i + 1));
        }


    });

});
