$(document).ready(function() {
    $("#saveCachet").click(function(event) {
        trs = document.querySelectorAll("#cachet tbody tr");
        event.preventDefault();
        dictToPOST = [];
        event_id = document.querySelector("#cachet").getAttribute("event");
        trs.forEach(element => {
            tds = element.querySelectorAll("td");
            tds.forEach(td => {
                let select = td.querySelector("select");
                let input = td.querySelector("input");
                let value;
                if (select) {
                    classes = select.classList;
                    value = select.value;
                } else if (input) {
                    value = input.value;
                    classes = input.classList;
                } else {
                    value = td.textContent.split(" - ")[0];
                    classes = td.classList;
                }
                if (classes.contains("workerClass") && value != "") 
                    worker_id = value;
                else if (classes.contains("roleClass") && value != "") 
                    role_name = value;
                else if (classes.contains("startTimeClass") && value != "") 
                    start_time = value;
                else if (classes.contains("endTimeClass") && value != "")
                    end_time = value;
                else {
                    worker_id = null;
                    role_name = null;
                    start_time = null;
                    end_time = null;
                }
                

            });
            dictToPOST.push({
                "event_id": event_id,
                "worker_id": worker_id,
                "role_name": role_name,
                "start_time": start_time,
                "end_time": end_time
            });
        });   
        
        $.ajax({
            url: "http://192.168.100.20/api/updateCachet",
            type: "POST",
            contentType: "application/json",
            data: JSON.stringify(dictToPOST),
            success: function(response) {
                console.log("Success");
                console.log(response);
            },
            error: function(error) {
                console.log("Error");
                console.log(error);
            }
        });
    });


});