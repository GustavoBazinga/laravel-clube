$(document).ready(function() {

    $('#createButton').on('click', function(event) {
        event.preventDefault();
        modal = $('#modalCreateSportClass');
        resetForm();
        $.ajax({
            url: 'http://192.168.100.20/api/clubex/sportClass/sports/professors',
            type: 'GET',
            dataType: 'json',
            success: function(data) {

                list_professors_names = [];
                list_sports_names = [];
                list_professors_ids = [];
                list_sports_ids = [];

                data.professors.forEach(professor => {
                    list_professors_names.push(professor.name);
                    list_professors_ids.push(professor.id);
                });

                data.sports.forEach(sport => {
                    list_sports_names.push(sport.name);
                    list_sports_ids.push(sport.id);
                });

                selectSport = makeSelect('selectSport', 'sport_id', list_sports_names, list_sports_ids, "selectSport");
                selectProfessor = makeSelect('selectProfessor', 'professor_id', list_professors_names, list_professors_ids, "selectProfessor");

                modal.find('.selectSport').replaceWith(selectSport);
                modal.find('.selectProfessor').replaceWith(selectProfessor);

                disableForm(false)

            },
            error: function(data) {
                console.log(data);
            }
        })
        $('#modalCreateSportClass').modal('show');
    });

    $(document).on('change', '.selectSport', function(event) {
        event.preventDefault();
        let sportId = $(this).val();
        $.ajax({
            url: 'http://192.168.100.20/api/clubex/sport/getImage/' + sportId,
            type: 'GET',
            success: function(data) {
                console.log(data)
                $('.previewImageSport').attr('src', 'http://192.168.100.20' + data);
            },
            error: function(data) {
                console.log(data);
            }
        })
    });

    $(document).on('change', '.selectProfessor', function(event) {
        event.preventDefault();
        let professorId = $(this).val();
        $.ajax({
            url: 'http://192.168.100.20/api/clubex/professor/getImage/' + professorId,
            type: 'GET',
            success: function(data) {
                console.log(data)
                $('.previewImageProfessor').attr('src', 'http://192.168.100.20' + data);
            },
            error: function(data) {
                console.log(data);
            }
        })
    });

    $('.card').on('click', function(event) {
        event.preventDefault();
        let modal = $('#modalEditSportClass');

        resetForm();

        let data = $(this).find('.dataClass').text();
        data = data.split('/')
        let sport_id = data[0];
        let professor_id = data[1];
        let day = data[2];
        let hour = data[3];

        $.ajax({
            url: 'http://192.168.100.20/api/clubex/sportClass/getSpecified',
            type: 'GET',
            data: {
                sport_id: sport_id,
                professor_id: professor_id,
                day: day,
                hour: hour
            },
            success: function(data) {
                console.log(data);
                list_professors_names = [];
                list_sports_names = [];
                list_professors_ids = [];
                list_sports_ids = [];
                
                data.professors.forEach(professor => {
                    list_professors_names.push(professor.name);
                    list_professors_ids.push(professor.id);
                });

                data.sports.forEach(sport => {
                    list_sports_names.push(sport.name);
                    list_sports_ids.push(sport.id);
                });

                let selectSport = makeSelect('selectSport', 'sport_id', list_sports_names, list_sports_ids, "selectSport", sport_id );
                let selectProfessor = makeSelect('selectProfessor', 'professor_id', list_professors_names, list_professors_ids, "selectProfessor", professor_id);

                modal.find('.selectSport').replaceWith(selectSport);
                modal.find('.selectProfessor').replaceWith(selectProfessor);

                modal.find('.hourClass').val(hour);
                modal.find('.slotsClass').val(data.class.slots);
                modal.find('.priceClass').val(data.class.price);

                modal.find('.dayClass option').each(function() {
                    if ($(this).val() == day)
                        $(this).attr('selected', true);
                });

                modal.find('.nameClass').val(data.class.name);
                modal.find('.descriptionClass').val(data.class.description);

                //Call selectSport change event
                modal.find('.selectSport').trigger('change');
                modal.find('.selectProfessor').trigger('change');
                stringCompose = `${sport_id}_${professor_id}_${day}_${hour}`
                $('.originalClass').val(stringCompose);
                disableForm();

            },
            error: function(data) {
                console.log("====")
                console.log(data);
            }
        })

        
        $('#formDelete').attr('action', 'http://192.168.100.20/sportsClass/delete/' + sport_id + '/' + professor_id + '/' + day + '/' + hour);
        $('#modalEditSportClass').modal('show');
        
    });

    $('.editButtonClass').on('click', function(event) {
        event.preventDefault();
        disableForm(false);
        
    });

    function disableForm(disabled = true) {
        form = $('.form');
        
        //Disable all input elements
        $('.form').each(function() {
            $(this).find('input').each(function() {
                $(this).attr('disabled', disabled);
            });
        });

        //Disable all select elements
        $('.form').each(function() {
            $(this).find('select').each(function() {
                $(this).attr('disabled', disabled);
            });
        });

        //Disable all textarea elements
        $('.form').each(function() {
            $(this).find('textarea').each(function() {
                $(this).attr('disabled', disabled);
            });
        });

        //Disable all button elements
    }

    function resetForm(disabled = false) {
        
        form = $('.form');

        //Reset all input elements
        $('.form').each(function() {
            $(this).find('input').each(function() {
                $(this).val('')
            });
        });


        //Reset all select elements
        $('.form').each(function() {
            $(this).find('select').each(function() {
                if (!this.classList.contains('dayClass')){
                    //Remove all options
                    $(this).find('option').each(function() {
                        $(this).remove();
                    });
                }
                else {
                    this.classList = ""
                    this.setAttribute("class", 'dayClass form-control border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm')
                }
            });
        });

                
        //Reset all textarea elements
        $('.form').each(function() {
            $(this).find('textarea').each(function() {
                $(this).val('')
            });
        });

        //Reset all img elements
        $('.form').each(function() {
            $(this).find('img').each(function() {
                $(this).attr('src', '');
            });
        });

        
    }

    function makeSelect(id, name, options, values = null, classes = null, selected = null) {
        select = document.createElement("select");
        select.setAttribute("class", "form-control");
        select.setAttribute("id", id);
        select.setAttribute("name", name);
        if (classes != null){
            classes = classes + " form-control border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm";
            select.setAttribute("class", classes);
        }
        else select.setAttribute("class", "border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm");

        option = document.createElement("option");
        option.setAttribute("value", "-1");
        option.appendChild(document.createTextNode("Selecione uma opção"));
        select.appendChild(option);


        for (let i = 0; i < options.length; i++) {
            option = document.createElement("option");
            if (values == null) 
                option.setAttribute("value", options[i]);
            else{
                option.setAttribute("value", values[i]);
                if (values[i] == selected)
                    option.setAttribute("selected", true);
            }
            option.appendChild(document.createTextNode(options[i]));
            select.appendChild(option);
        }
        return select;
    }

});