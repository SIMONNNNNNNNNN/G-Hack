// Ajax that will check if user is signed up to a competition, if not, then a pop up will
// tell them they need to register to attend a comp event before they can create a project
function createProjectCheck() {
  $.ajax({
      type: "POST",
      url: base_url + 'dashboard/create_project_check',
      success: function(data, status) {
        //will redirect user to create a project if user is in a comp
        if (data) {
            window.location.href = base_url + 'projects/create_project';
        } else {
            alert("Please register to attend a competition event first");
        }
      }
  });
}

//Google user log out function
function signOut() {
    var auth2 = gapi.auth2.getAuthInstance();
    auth2.signOut().then(function () {
        console.log('Google user signed out.');
    });
}

// needed on the Logout page to log Google user out
function onLoad() {
    gapi.load('auth2', function() {
        gapi.auth2.init();
    });
}

//This function will hide or show event_items accroding to the key words.
function searchForEvent(){
  var month = $("#month_btn").text();
  var region_key = $("#region_btn").text();
  var type = $("#type_btn").text();
  if(type == 'Competitions'){
    type = 'Competition';
  }
  if(type == 'Remote Events'){
    type = 'Remote Event';
  }
 
  //iterate all event items and check if they contains the key word.
  $( ".event_item" ).each(function() {
     if (region_key.includes($(this).children().children("#region").text()) &&
          $(this).children().children("h5").text().includes(type) &&
          $(this).children().children("#time").text().includes(month)) {
     $(this).show();
     } else {
     $(this).hide();
     }

     if((region_key=="All" || region_key=="Region") && (month=="All" || month=="Month") && (type=="All" || type=="Type")){
       $(this).show();
     }

     if((region_key=="All" || region_key=="Region") && (month=="All" || month=="Month") && (type!="All" && type!="Type")){
       if($(this).children().children("h5").text().includes(type)){
         $(this).show();
         } else {
         $(this).hide();
         }
     }

     if((region_key=="All" || region_key=="Region") && (month!="All" && month!="Month") && (type=="All" || type=="Type")){
       if($(this).children().children("#time").text().includes(month)){
         $(this).show();
         } else {
         $(this).hide();
         }
     }

     if((region_key!="All" && region_key!="Region") && (month=="All" || month=="Month") && (type=="All" || type=="Type")){
       if(region_key.includes($(this).children().children("#region").text())){
         $(this).show();
         } else {
         $(this).hide();
         }
     }

     if((region_key!="All" && region_key!="Region") && (month!="All" && month!="Month") && (type=="All" || type=="Type")){
       if(region_key.includes($(this).children().children("#region").text())&&
          $(this).children().children("#time").text().includes(month)){
         $(this).show();
         } else {
         $(this).hide();
         }
     }

     if((region_key=="All" || region_key=="Region") && (month!="All" && month!="Month") && (type!="All" && type!="Type")){
       if($(this).children().children("h5").text().includes(type) &&
          $(this).children().children("#time").text().includes(month)){
         $(this).show();
         } else {
         $(this).hide();
         }
     }

     if((region_key!="All" && region_key!="Region") && (month=="All" || month=="Month") && (type!="All" && type!="Type")){
       if($(this).children().children("h5").text().includes(type) &&
          region_key.includes($(this).children().children("#region").text())){
         $(this).show();
         } else {
         $(this).hide();
         }
     }
});
};

//Following three functions will change the key words and show event_items accroding to the key words.
function searchByMonth(month) {
    $("#month_btn").text(month);
    searchForEvent();
};
function searchByRegion(region) {
    $("#region_btn").text(region);
    searchForEvent();
};
function searchByType(type) {
    $("#type_btn").text(type);
    searchForEvent();
};

// This is how AJAX work, maybe useful later.
// $.post("http://ec2-13-211-239-163.ap-southeast-2.compute.amazonaws.com/events_ajax_test/events/loadEventsByFileter",
// {
//   month: $('#month').find(":selected").text(),
//   region: $('#region').find(":selected").text(),
//   type: $('#type').find(":selected").text(),
// },
// function(data){
//   $(".events_browse").empty();
//   $('.events_browse').append(data);
// });
