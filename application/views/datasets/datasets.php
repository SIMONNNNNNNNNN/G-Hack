<?php
//Here will prepare all the <div> and contents that needs to be added in to HTML.
$tr_created='';

foreach ($query_results->result() as $row)
{
  $temp_tr = "
      <tr class='dataset_item'>
        <td style='width:20%;'><small><a href='dataset_details/".$row->dataset_id."'>".$row->dataset_name."</a></small></th>
        <td style='width:40%;'><small>{$row->description}</small></td>
        <td style='width:20%;'><small><a target='_blank' href='$row->dataset_url'> $row->dataset_url</a></small></td>
        <td style='width:20%;'><small id='region'>".$row->regionName."</small></td>
      </tr>
  ";
  $tr_created = $tr_created.$temp_tr;
}

?>

<main class="project_dataset container">

<div class="row">
      <div class="mx-auto text-center my-4" style="width: 200px;" >
          <h4>DATASETS</h4>
          <hr>
      </div>
</div>



<table class="table table-striped shadow table-bordered functional_table" >
  <thead class="text-white" bgcolor="#4c9ad2">
    <tr>
      <th scope="col" style="width:20%;">Name<i class="fa fa-sort float-right" aria-hidden="true"></i></th>
      <th scope="col" style="width:40%;">Description<i class="fa fa-sort float-right" aria-hidden="true"></i></th>
      <th scope="col" style="width:20%;">Dataset URL<i class="fa fa-sort float-right" aria-hidden="true"></i></th>
      <th scope="col" style="width:20%;">Region<i class="fa fa-sort float-right" aria-hidden="true"></i></th>
    </tr>
  </thead>

  <tbody>
    <?php echo $tr_created;?>
  </tbody>
</table>
</main>

<style type="text/css">
.dataTables_filter {
  display:flex;
  justify-content:flex-end;
}

.pagination {
  display:flex;
  justify-content:flex-end;
}
</style>
