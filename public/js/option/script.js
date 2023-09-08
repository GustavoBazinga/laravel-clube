$(document).ready(function() {


    $(document).on('click', '.remove-button', function() {
        let parent = $(this).parent().parent().parent();

        $(this).parent().parent().remove();

        let labels = parent.find('.label-options');

        if (labels.length <= 1) {
            parent.find('.remove-button').hide();
        }

        //Update the name of the labels
        for (let i = 0; i < labels.length; i++) {
            labels[i].innerHTML = `Opção ${i + 1}:`;
        }

    });

});
