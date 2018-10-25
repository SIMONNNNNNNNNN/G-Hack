<!-- This is the main Challenges page of the site which displays challenges stored in the database -->
<?php
$dropdownItems = '';
$dropdownItemsArrya=[];
foreach($challenges as $row){
  if(!in_array($row->region_name, $dropdownItemsArrya)){
      array_push($dropdownItemsArrya,$row->region_name);
  }
}
array_push($dropdownItemsArrya,"All");
$dropdownItemsArrya = array_reverse($dropdownItemsArrya);
foreach($dropdownItemsArrya as $temp){
    $temp_dropdownItem = "<a class='dropdown-item' onclick=\"challenge_searchByKey('$temp')\">".$temp."</a>";
    $dropdownItems = $dropdownItems.$temp_dropdownItem;
}
?>

<main class="container challenges">

<div class="row">
      <div class="mx-auto text-center my-4" style="width: 200px;" >
          <h4>CHALLENGES</h4>
          <hr>
      </div>
</div>

<div class="row mx-auto"  style="width: 30em;">


</div>
<div class="row">
<table class="table table-striped table-bordered functional_table_challenge">
  <thead class="text-white" bgcolor="#000000">
    <tr>
      <th  scope="col">Name<i class="fa fa-sort float-right" aria-hidden="true"></i></th>
      <th  scope="col">Description<i class="fa fa-sort float-right" aria-hidden="true"></i></th>
      <th  scope="col">Participation<i class="fa fa-sort float-right" aria-hidden="true"></i></th>
      <th  scope="col">Sponsor(s)</th>
      <th  scope="col">Region<i class="fa fa-sort float-right" aria-hidden="true"></i></th>
    </tr>
  </thead>

  <tbody>

  	<!-- The following code creates a table with challenges stored in the database -->
 	<?php
        foreach($challenges as $row){
            echo "
         <tr class = 'challenge_item'>
	      <td><a href='".site_url()."challenges/challenge_detail/".$row->challenge_id."'>".$row->name ."</a></td>
	      <td><small>".$row->short_description."</small>
	      </td>
	      <td>20</td>

	      <td>
	       <img src='".$row->image_url."'>
	      </td>
	      <td><small id = 'region'>".$row->region_name."</small></td>
	    </tr>";
    }
    ?>
</tbody>

</table>
</div>

<style>
tbody td img{
	width: 8em;
}

.dataTables_filter {
  display:flex;
  justify-content:flex-end;
}

.pagination {
  display:flex;
  justify-content:flex-end;
}
</style>



</main>
