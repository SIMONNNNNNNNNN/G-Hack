  <!-- Main page to show existing projects -->

  <main class="project_general container">

    <div class="row">
      <div class="mx-auto text-center my-4" style="width: 200px;" >
        <h4>PROJECTS</h4>
        <hr>
      </div>
    </div>

  <div class="row">
        <div class="mx-auto text-center my-4" style="width: 200px;" >
            <h4>All Projects in 2018</h4>
            <hr>
        </div>
  </div>

  <table class="table table-striped shadow table-bordered functional_table">
    <thead class="text-white" bgcolor="#ca1e56">
      <tr>
        <th scope="col">Project Title<i class="fa fa-sort float-right" aria-hidden="true"></th>
        <th scope="col">Team Name<i class="fa fa-sort float-right" aria-hidden="true"></th>
        <th scope="col">Event Location<i class="fa fa-sort float-right" aria-hidden="true"></th>
      </tr>
    </thead>
    
    <tbody>
    <?php
        foreach($projects as $project){
            echo "
            <tr>
        <th scope='row'><a href='project_details/".$project->project_id."'>".$project->title."</a></th>
        <td>".$project->team_name."</td>
        <td>".$project->location_name."</td>
      </tr>
            ";
        }
    ?>



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