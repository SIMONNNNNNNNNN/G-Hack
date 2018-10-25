<!-- This page is used to show details of a challenge with data stored in the database.
 It also allows registering a project in a challenge -->
 
<main class="container challenge_details">
 
  <h2 class="my-4 mx-0 p-0" style="color: black;">Challenge Details</h2>
 
  <div class="row inidividual_challenge">
   <!--Left Card  -->
    <div class="card col-md-8 p-0 shadow" >     
      <div class="card-body bg-dark text-white">
        <h3 class="card-title"><?php echo $challenge_detail->name ?></h3>
        <h5 class="card-text"><small> Region:  <?php echo $challenge_detail->region_name ?> </small></h5>
      </div>

      <ul class="list-group list-group-flush">
        
        <li class="list-group-item">
          <strong>Description</strong> 
          <p class="card-text"><?php echo $challenge_detail->long_description ?>
          </p>
        </li>
        
        <li class="list-group-item">
          <strong>Eligibility</strong>
          <p>Must use GNAF</p>
        </li>

        <li class="list-group-item">
          <strong>Dataset Highlight</strong>
          <p>Geocoded National Address Flat File<br>
          <a target="_blank" href='https://data.gov.au/dataset/gnaf-flat-file'>https://data.gov.au/dataset/gnaf-flat-file</a><br>
          API for the Geocoded National Address File<br>
          <a target="_blank" href='http://gnafld.net/'>http://gnafld.net/</a>
        </p>
        </li>
      </ul>
    </div>

   <!--Right Card  -->

   <div class="card col-sm-3 mx-3 p-0 shadow">
    <h5 class="card-header bg-dark text-white">Sponsor</h5>
    <img class="card-img-top p-3" src="<?php echo $challenge_detail->image_url ?>" alt="Card image cap">
    <a href="<?php echo base_url('challenges/register_challenge/'.$challenge_detail->challenge_id) ?>" class="btn btn-primary btn-block mt-lg-4 text-white">Register</a>
  </div>

  </div>


    <section class="row team_challenge_list">
       <h2 class="my-4" style="color: black;">Team Entries</h2>
            <table class="table table-striped mx-2 shadow">
                <thead class="text-white bg-dark" >
                <tr>
                    <th scope="col">Project Title</th>
                    <th scope="col">Team Name</th>
                    <th scope="col">Event Location</th>
                </tr>
                </thead>

                <tbody>
                <?php if(isset($team_entries)){
                    foreach($team_entries as $row){
                        echo "
                        <tr>
                    <th scope='row'>".$row->title."</th>
                    <td>".$row->teamName."</td>
                    <td>".$row->locationName."</td>
                </tr>
                        ";
                    }
                };?>


                </tbody>
            </table>
    </section>
</main>