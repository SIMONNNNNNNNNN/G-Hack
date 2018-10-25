function volunteerDisplay() {


    $.ajax({
        type: "POST",
        url: base_url + 'volunteering/index',
        success: function(data, status) {
            //will redirect user to create a project if user is in a comp

            if (data) {

                var data = JSON.parse(data);
                var str = "";
                data.forEach(function(element){
                   str = str +
                       "<tr>"+
                       "<td>"+element['role']+"</td>" +
                       "<td>"+element['regionName']+"</td>" +
                       "<td>"+element['available_number']+"</td>" +
                       "<td>"+element['description']+"</td>" +
                       "<td><a class='text-center' href='"+base_url+"volunteering/applyPosition/"+element['id']+"'><i class='far fa-edit'></i> Apply</a></td>" +
                    "</tr>"
                });
                $('main').empty();

                $('main').append(
                "<div clas='container row'>"+
                    "<div class='row'>"+
                    "<div class='text-center my-4 mx-auto' style='width:40%;'>"+
                    "<h4>Volunteering</h4>"+
                    "<hr>"+
                    "</div>"+
                "<div>"+
                "<table class='table mx-auto' style='width:120%;'>"+
                    "<thead class='thead-dark'>"+
                   " <tr>"+
                    "<th scope='col'>Role</th>"+
                    "<th scope='col'>Region</th>"+
                    "<th scope='col'>Available Number</th>"+
                    "<th scope='col'>Description</th>"+
                    "<th scope='col'>Apply</th>"+
                "</tr>"+
                "</thead>"+
                "<tbody>"+
               str+
                "</tbody>"+
                "</table>"+
                "</div>"+
                "</div>"


                );



            } else {
                $("main").append("<p>ajax down</p>");
            }
        }
    });
}

function volunteerManage() {


    $.ajax({
        type: "POST",
        url: base_url + 'volunteering/manageVolunteering',
        success: function(data, status) {   

            //will redirect user to create a project if user is in a comp
            if (data) {
                var data = JSON.parse(data);
                $("main").empty();

                var str = "";
                data.forEach(function(element){
                    str = str+
                        "<tr>"+
                        "<td>"+element['role']+"</td>"+
                        "<td>"+element['name']+"</td>"+
                        "<td>"+element['email']+"</td>"+
                        "<td>"+element['regionName']+"</td>"+
                        "<td>"+element['application_status']+"</td>"+
                        "<td><a class='text-center' href='"+base_url+"volunteering/applicationDetail/"+element['volunteer_id']+"'><i class='far fa-edit'></i>Review</a></td>"+
                        "</tr>"

                });
                $("main").append("<div class='container row'>" +
                    "<div class='mx-auto text-center my-4' style='width: 40%;' >"+
                    "            <h4>Volunteering Applications</h4><hr>" +
                    "          </div>" +
                    "          <div>" +
                    "          <table class='table'>" +
                    "          <thead class='thead-dark'>" +
                    "            <tr>" +
                    "              <th scope='col'>Role</th>" +
                    "              <th scope='col'>Name</th>" +
                    "              <th scope='col'>Email</th>" +
                    "              <th scope='col'>Region Name</th>" +
                    "              <th scope='col'>Application Status</th>" +
                    "              <th scope='col'>Review</th>" +

                    "            </tr>" +
                    "          </thead>" +
                    "          <tbody>" +
                    str +
                    "</tbody>" +
                    "</table>" +
                    "</div>" +
                    "</div>");

            } else {
                $("main").append("<p>ajax down</p>");

            }
        }
    });
}
$('#application_status').change(function(){
    $.ajax({
        url: base_url + 'volunteering/updateStatus',
        data: { "status": $("#application_status").val(),"id":$("#volunteer_id").text() },
        dataType:"html",
        type: "post",
        success: function(data){
                if(data="1"){

                    $('#successful').show()
                    $('#successful').fadeOut(3000);
                }else{

                }

            }

    });
});

