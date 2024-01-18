$(document).ready(function() {

    $("#openModalRoles").click(function(event) {
        //Prevent the default action of the button
        event.preventDefault();
        $.ajax({
            url: "http://192.168.100.20/api/roles/names",
            type: "GET",
            success: function(response) {
                //Create the select
                select = makeSelect("selectRoles", "name", response);
                $("#modalRoles .modal-body #role").append(select);      
            },
            error: function(err) {
                console.log(err);
            }
        });
        $("#modalRoles").modal("show");
    }); 

    //When select role change
    $("#modalRoles .modal-body").on("change", "#selectRoles", function(event) {
        event.preventDefault();
        $.ajax({
            url: "http://192.168.100.20/api/roles/hours/" + $("#selectRoles").val(),
            type: "GET",
            success: function(response) {
                $("#modalRoles .modal-body #hour").empty();
                select = makeSelect("selectHours", "hours", response);
                $("#modalRoles .modal-body #hour").append(select);
                      

            },
            error: function(err) {
                console.log(err);
            }
        });
    });

    //When select hour change
    $("#modalRoles .modal-body").on("change", "#selectHours", function(event) {
        event.preventDefault();
        $.ajax({
            url: "http://192.168.100.20/api/role/cash/"+ $("#selectRoles").val() + "/" + $("#selectHours").val(),
            type: "GET",
            success: function(response) {
                $("#modalRoles .modal-body #cash").empty();
                input = document.createElement("input");
                input.setAttribute("class", "form-control");
                input.setAttribute("id", "cash");
                input.setAttribute("name", "cash");
                input.setAttribute("type", "number");
                input.setAttribute("step", "0.01");
                input.setAttribute("value", response);
                $("#modalRoles .modal-body #cash").append(input);
            },
            error: function(err) {
                console.log(err);
            }
        });
    });


    function makeSelect(id, name, options, values = null, classes) {
        select = document.createElement("select");
        select.setAttribute("class", "form-control");
        select.setAttribute("id", id);
        select.setAttribute("name", name);
        if (classes != null)
            select.setAttribute("class", classes);

        option = document.createElement("option");
        option.setAttribute("value", "");
        option.appendChild(document.createTextNode("Selecione uma opção"));
        select.appendChild(option);


        for (let i = 0; i < options.length; i++) {
            option = document.createElement("option");
            if (values == null) 
                option.setAttribute("value", options[i]);
            else
                option.setAttribute("value", values[i]);
            option.appendChild(document.createTextNode(options[i]));
            select.appendChild(option);
        }
        return select;
    }

    $('#addWorker').click(function(event) {
        event.preventDefault();
        $.ajax({
            url: "http://192.168.100.20/api/workersAndRoles",
            type: "GET",
            success: function(response) {
                workers = []
                mats = []
                response['workers'].forEach(element => {
                    workers.push(element[1]);
                    mats.push(element[0].toString());
                });
                table = document.querySelector("#cachet tbody");
                tr = document.createElement("tr");
                
                tdWorker = document.createElement("td");
                selectWorkers = makeSelect("selectWorkers", "workers[]", workers, mats);
                selectWorkers.classList.add("workerClass");
                tdWorker.appendChild(selectWorkers);
                tr.appendChild(tdWorker);

                tdRole = document.createElement("td");
                selectRoles = makeSelect("selectRoles", "roles[]", response["roles"], null);
                selectRoles.classList.add("roleClass");
                tdRole.appendChild(selectRoles);
                tr.appendChild(tdRole);

                tdHour = document.createElement("td");
                inputHour = document.createElement("input");
                inputHour.setAttribute("class", "form-control");
                inputHour.setAttribute("type", "time");
                inputHour.setAttribute("name", "start_time[]");
                inputHour.classList.add("startTimeClass");
                tdHour.appendChild(inputHour);

                tr.appendChild(tdHour);

                tdHour = document.createElement("td");
                inputHour = document.createElement("input");
                inputHour.setAttribute("class", "form-control");
                inputHour.setAttribute("type", "time");
                inputHour.setAttribute("name", "end_time[]");
                inputHour.classList.add("endTimeClass");
                tdHour.appendChild(inputHour);

                tr.appendChild(tdHour);



                table.appendChild(tr);
                

            },
            error: function(err) {
                console.log(err);
            }
        });
    });



});
