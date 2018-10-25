//onclick function for dropdown items in serach group in dataset page.
function challenge_searchByKey(region) {
    $("#challenge_region_btn").text(region);
};
//onclick function for search button in serach group in dataset page.
function challenge_search() {
    $( ".challenge_item" ).each(function() {
      if($(this).children().children("#region").text() == $("#challenge_region_btn").text()){
        $(this).show();
      }else {
      $(this).hide();
    };
    if($("#challenge_region_btn").text() == "All"){
      $(this).show();}
  });
};
