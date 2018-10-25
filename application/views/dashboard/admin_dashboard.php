<!-- This page is showing contents of the user's dashboard -->



    <main class= "profile col-lg-8">

        <!-- Events -->

          <div clas="container row">
            <div class="align-items-center py-2 my-3 border-bottom">
              <h2>Events</h2>
              <?php
                echo "<a class='text-center' href='".base_url("account/updateEvent")."/new'"."><i class='far fa-edit'></i> Create New Event</a>";
              ?>
            </div>
            <div>

            <table class="table table-striped table-bordered functional_table">
            <thead class="thead-dark">
              <tr>
                <th scope="col">Event ID<i class="fa fa-sort float-right" aria-hidden="true"></i></th>
                <th scope="col">Event Location<i class="fa fa-sort float-right" aria-hidden="true"></i></th>
                <th scope="col">Event Type<i class="fa fa-sort float-right" aria-hidden="true"></i></th>
                <th scope="col">Event Date<i class="fa fa-sort float-right" aria-hidden="true"></i></th>
                <th scope="col">Edit</th>
              </tr>
            </thead>
            <tbody>
            <?php
            foreach($event as $row){
              $time = date("j/F/Y h:i A",strtotime(trim($row->eventDate)));
              echo "
                  <tr>
                      <td>".$row->id."</td>
                      <td>".$row->eventSelfRegion."</td>
                      <td>".$row->eventType."</td>
                      <td>".$time."</td>
                      <td><a class='text-center' href=".base_url('account/updateEvent')."/".$row->id."><i class='far fa-edit'></i> Edit</a></td>
                  </tr>
              ";
            }
            ?>
            </tbody>
            </table>
            </div>

          </div>


        <!-- Challenges -->

        <div clas="container row">
          <div class="align-items-center pb-2 my-3 border-bottom">
            <h2>Challenges</h2>
            <?php
              echo "<a class='text-center' href='".base_url("account/editChallenge")."/new'"."><i class='far fa-edit'></i> Create New Challenge</a>";
            ?>
          </div>

          <div>
          <table class="table table-striped table-bordered functional_table">
          <thead class="thead-dark">
            <tr>
              <th scope="col">Challenge ID<i class="fa fa-sort float-right" aria-hidden="true"></i></th>
              <th scope="col">Challenge Name<i class="fa fa-sort float-right" aria-hidden="true"></i></th>
              <th scope="col">Challenge Region<i class="fa fa-sort float-right" aria-hidden="true"></i></th>
              <th scope="col">Edit</th>
            </tr>
          </thead>
          <tbody>
          <?php
          foreach($challenge as $row){
            echo "
                <tr>
                    <td>".$row->challenge_id."</td>
                    <td>".$row->name."</td>
                    <td>".$row->region_name."</td>
                    <td><a class='text-center' href=".base_url('account/editChallenge')."/".$row->challenge_id."><i class='far fa-edit'></i> Edit</a></td>
                </tr>
            ";
          }
          ?>
          </tbody>
          </table>
          </div>

       </div>


      <!-- Datasets -->

        <div clas="container row">
          <div class="align-items-center pb-2 my-3 border-bottom">
            <h2>Datasets</h2>
            <?php
              echo "<a class='text-center' href='".base_url("account/editDataset")."/new'"."><i class='far fa-edit'></i> Create New Dataset</a>";
            ?>
          </div>
          <div>
          <table class="table table-striped table-bordered functional_table_datasets">
          <thead class="thead-dark">
            <tr>
              <th scope="col">Dataset ID<i class="fa fa-sort float-right" aria-hidden="true"></i></th>
              <th scope="col">Dataset Name<i class="fa fa-sort float-right" aria-hidden="true"></i></th>
              <th scope="col">Dataset Region<i class="fa fa-sort float-right" aria-hidden="true"></i></th>
              <th scope="col">Dataset URL<i class="fa fa-sort float-right" aria-hidden="true"></i></th>
              <th scope="col">Edit</th>
            </tr>
          </thead>
          <tbody>
          <?php
          foreach($dataset as $row){
            echo "
                <tr>
                    <td>".$row->dataset_id."</td>
                    <td>".$row->dataset_name."</td>
                    <td>".$row->regionName."</td>
                    <td>".$row->dataset_url."</td>
                    <td><a class='text-center' href=".base_url('account/editDataset')."/".$row->dataset_id."><i class='far fa-edit'></i> Edit</a></td>
                </tr>
            ";
          }
          ?>
          </tbody>
          </table>
          </div>
        </div>

        <!-- Volunteering -->

        <div clas="container row">
            <div class="align-items-center pb-2 my-3 border-bottom">
                <h2>Volunteering Position</h2>
                <?php
                echo "<a class='text-center' href='".base_url("volunteering/newPosition")."'"."><i class='far fa-edit'></i> Create New Volunteer Role</a>";
                ?>
            </div>
            <div>
                <table class="table table-striped table-bordered functional_table">
                    <thead class="thead-dark">
                    <tr>
                        <th scope="col">Role<i class="fa fa-sort float-right" aria-hidden="true"></i></th>
                        <th scope="col">Region<i class="fa fa-sort float-right" aria-hidden="true"></i></th>
                        <th scope="col">Available Number<i class="fa fa-sort float-right" aria-hidden="true"></i></th>
                        <th scope="col">Description<i class="fa fa-sort float-right" aria-hidden="true"></i></th>
                        <th scope="col">Edit</th>

                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    foreach($volunteering as $row){
                        echo "
                    <tr>
                    <td>".$row->role."</td>
                    <td>".$row->regionName."</td>
                    <td>".$row->available_number."</td>
                    <td>".$row->description."</td>
                    <td><a class='text-center' href=".base_url('volunteering/updatePosition')."/".$row->id."><i class='far fa-edit'></i> Edit</a></td>
                </tr>
            ";
                    }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>

</main>
</div>

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
