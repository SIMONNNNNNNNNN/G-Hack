

//onclick function for dropdown items in serach group in dataset page.
function dataset_searchByKey(region) {
    $("#dataset_region_btn").text(region);
};
//onclick function for search button in serach group in dataset page.
function dataset_search() {
    $( ".dataset_item" ).each(function() {
      if($(this).children().children("#region").text() == $("#dataset_region_btn").text()){
        $(this).show();
      }else {
      $(this).hide();
    };
    if($("#dataset_region_btn").text() == "All"){
      $(this).show();}
  });
};
