<!-- This page is showing contents of the user's dashboard -->

    <main class= "profile col-lg-8" style="margin-left: 1em;">

        <!-- Events -->

          <div clas="container row">
            <div class="align-items-center py-2 my-3 border-bottom">
              <h2>Events</h2>
            </div>

            <div class="card-columns">

                <?php
                if(isset($event)){
                    foreach($event as $row){
                      if($row->eventType == 'connections') {
                        $eventType = 'Connections';
                      }else if($row->eventType == 'competitions') {
                        $eventType = 'Competition';
                      }else if($row->eventType == 'remoteEvent') {
                        $eventType = 'Remote Event';
                      }  
                      echo "
                <a href='".base_url('events/eventDetails?event_id='.$row->id)."'>
                <div class='card bg-light mr-2 my-2' style='max-width: 18rem; height:14rem;'>
                  <div class='card-header bg-dark text-white'style='height:6em; line-height:6em;'><h4><small>".$row->event_location."<br>".$eventType." </small></h4></div>
                  <div class='card-body'>
                    <h6 class='card-text'><strong>Date: </strong>".date("j F Y",strtotime(trim($row->eventDate)))."</h6> 
                    <h6 class='card-text'><strong>Time: </strong>".date("h:i A",strtotime(trim($row->eventDate)))."</h6>
                    <h6 class='card-text'><strong>Region: </strong>$row->eventSelfRegion</h6>
                  </div>
                </div>
                </a>
                ";
                    }
                }
                ?>

              <!-- <a href='#'>
                <div class='card bg-light mr-2\' style='max-width: 18rem; height:13rem;'>
                    <div class='card-body m-3'>
                      <h2 class='card-text text-center text-secondary'><i class="fas fa-plus"></i></h2>
                      <h6 class="text-center text-secondary">New Event</h6>
                    </div>
                </div>
              </a> -->

            </div>
          </div>


        <!-- Challenges -->

        <div clas="container row">
          <div class="align-items-center pb-2 my-3 border-bottom">
            <h2>Challenges</h2>
          </div>

          <div class="card-columns">
              <?php
                if(isset($challenge)){
                    foreach($challenge as $row){
                        echo "
                <a href='".site_url()."challenges/challenge_detail/".$row->challenge_id."'>
                <div class='card bg-light mr-2 my-3' style='max-width: 18rem; height:11rem;'>
                <div class='card-header bg-dark text-white' style='height:7em; line-height:7em;'><h4><small>".$row->name."</small></h4></div>
                <div class='card-body'>
                  <h6 class='card-text'><strong>Region:</strong> ".$row->region_name." </h6>
                </div>
              </div>
              </a>
               ";
                    }
                }

              ?>

              <!-- <a href='#'>
                <div class='card bg-light mr-2\' style='max-width: 18rem; height:10rem;'>
                    <div class='card-body m-3'>
                      <h2 class='card-text text-center text-secondary'><i class="fas fa-plus"></i></h2>
                      <h6 class="text-center text-secondary">New Challenge</h6>
                    </div>
                </div>
              </a> -->


          </div>
        </div>


        <!-- Projects -->

        <div clas="container row">
          <div class="align-items-center pb-2 my-3 border-bottom">
            <h2>Projects</h2>
          </div>
          <div class="bg-danger text-white text-center my-2" style="display: none; font-size: 1.2em;" id="alert"> Please register a competition event first!</div>   
          
          <div class="card-columns my-2">

              <?php
                if(isset($project)){
                    foreach($project as $row){
                        echo "
              <a href='".site_url()."projects/project_details/".$row->project_id."'>
                <div class='card bg-light mr-2 my-3\' style='max-width: 18rem; height:10rem;'>
                    <div class='card-header bg-dark text-white' style='height:6em; line-height:6em;'><h4><small>".$row->title."</small></h4></div>
                    <div class='card-body'>
                      <h6 class='card-text'><strong>Team: </strong>".$row->team_name."</h6>
                    </div>
                </div>
              </a>
            ";
                    }
                }

              ?>


          <a onclick = "createProjectCheck()">
            <div class='card bg-light mr-2 my-3\' style='max-width: 18rem; height:10rem;'>
                <div class='card-body m-3'>
                  <h2 class='card-text text-center text-secondary'><i class="fas fa-plus"></i></h2>
                  <h6 class="text-center text-secondary">Create A New Project</h6>
                </div>
            </div>
          </a>



<!--           <button type="button" class="btn btn-outline-primary">
            <a onclick = "compCheck()">
                Create Project
            </a>
          </button> -->

        </div>


      <!-- Datasets -->

        <div clas="container row">
          <div class="align-items-center pb-2 my-3 border-bottom">
            <h2>Datasets</h2>
          </div>

          <div class="card-columns">
              <?php
                if(isset($dataset)){
                    foreach($dataset as $row){
                        echo "
                   <a href='".site_url()."datasets/dataset_details/".$row->dataset_id."'>
                  <div class='card bg-light mr-2 my-3' style='max-width: 18rem; height:10rem;'>
                <div class='card-header bg-dark text-white' style='height:6em; line-height:6em;'><h4><small>".$row->dataset_name."</small></h4></div>
                <div class='card-body'>
                  <h6 class='card-text'><strong>Region:</strong> ".$row->regionName." </h6>
                </div>
              </div>
              </a>
                  ";
                }

              }

              ?>

          <!-- <a href='#'>
            <div class='card bg-light mr-2\' style='max-width: 18rem; height:10rem;'>
                <div class='card-body m-3'>
                  <h2 class='card-text text-center text-secondary'><i class="fas fa-plus"></i></h2>
                  <h6 class="text-center text-secondary">New Dataset</h6>
                </div>
            </div>
          </a> -->

          </div>
        </div>


      <!-- Teams -->

        <div clas="container row">
          <div class="align-items-center pb-2 my-3 border-bottom">
            <h2>Teams</h2>
          </div>

          <div class="card-columns">
              <?php
              if(isset($team)){
                  echo "
              <div class='card bg-light mr-2' style='max-width: 18rem; height:10rem;' data-toggle='modal' data-target='#updateTeam'>
                <div class='card-header bg-dark text-white' style='height:5.5em;'><h4>".$team->name."</h4></div>
                <div class='card-body'>
                  <h6 class='card-text'><strong>Team Members:</strong> ".$team->number." </h6>
                </div>
              </div>

                  ";
              }else{
                echo "
                <div class='card bg-light mr-2\' style='max-width: 18rem; height:10rem;' data-toggle='modal' data-target='#createTeam'>
                    <div class='card-body m-3'>
                      <h2 class='card-text text-center text-secondary'><i class='fas fa-plus'></i></h2>
                      <h6 class='text-center text-secondary'>Create A New Team</h6>
                    </div>
                </div>
                ";
              }

            ?>
            <!-- modal -->
            <div class="modal fade" id="updateTeam" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Edit Team</h5>
                    <a type="button" class="close btn btn-dark" data-dismiss="modal" aria-label="Close" style="background-color: transparent;"></a>

                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <?php echo form_open("account/updateTeam/".$team->id); ?>

                  <form style="display:block;">
                  <div class="modal-body">

                      <div class="form-group">
                          <label for="name">Team Name</label>
                          <input class='form-control' name="name" id="name" type="text" value="<?php echo $team->name ?>">
                      </div>

                  </div>
                  <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" >Update</button>
                  </div>
                  </form>

                </div>
              </div>
            </div>

            <div class="modal fade" id="createTeam" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Create Team</h5>
                    <a type="button" class="close btn btn-dark" data-dismiss="modal" aria-label="Close" style="background-color: transparent;"></a>

                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <?php echo form_open("account/updateTeam/"."new"); ?>

                  <form style="display:block;">
                  <div class="modal-body">

                      <div class="form-group">
                          <label for="name">Team Name</label>
                          <input class='form-control' name="name" id="name" type="text" value="">
                      </div>

                  </div>
                  <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" >Create</button>
                  </div>
                  </form>

                </div>
              </div>
            </div>


          </div>
        </div>

            <!-- Volunteering -->

            <div clas="container row">
                <div class="align-items-center pb-2 my-3 border-bottom">
                    <h2>Volunteering Application</h2>
                </div>

                <div class="card-columns">
                    <?php
                    if(isset($volunteering)){
                        foreach($volunteering as $row){
                            echo "
                   <a href='".site_url()."volunteering/application_detail/".$row->volunteer_id."'>
                  <div class='card bg-light mr-2' style='max-width: 18rem; height:10rem;'>
                <div class='card-header bg-dark text-white' style='height:5.5em;'><h4>".$row->role."</h4></div>
                <div class='card-body'>
                  <h6 class='card-text'><strong>Region:</strong> ".$row->regionName." (".$row->application_status.")"."</h6>
                </div>
              </div>
              </a>
                  ";
                        }

                    }

                    ?>

                    <!-- <a href='#'>
                      <div class='card bg-light mr-2\' style='max-width: 18rem; height:10rem;'>
                          <div class='card-body m-3'>
                            <h2 class='card-text text-center text-secondary'><i class="fas fa-plus"></i></h2>
                            <h6 class="text-center text-secondary">New Dataset</h6>
                          </div>
                      </div>
                    </a> -->

                </div>
            </div>



</div>


<!--         <div class="col-md-10">
        <h3>Events</h3>
            <section>
                <article id="Brisbane_Comp">
                    <h6>Brisbane Competition</h6>
                </article>
                <article>
                    <h6>Brisbane Connections</h6>
                </article>
                <article>
                    <h6>Brisbane Competition</h6>
                </article>
                <article>
                    <h6>Brisbane Competition</h6>
                </article>
            </section>

            <h3>Projects</h3>

            <section> -->

            <!-- This code displays projects that the user is part of -->
            <!-- $row->project_id   $row->thumbnail_image -->
<!--             <?php

            foreach($project as $row){
                echo "
            <a href='".site_url()."projects/project_details/".$row->project_id."'><article><h6>".$row->title."</h6></article></a>

            ";
            }
            ?>

            <button>
                <a onclick = "compCheck()">
                    <h6>Create Project</h6>
                </a>
            </button>

            </section>
                <h3>Challenges</h3>
                <section> -->

                    <!-- This code displays challenges that the user's project is registerd for -->
                    <!-- $row->challenge_id   $row->image_url -->
<!--                     <?php

                        foreach($challenge as $row){
                            echo "
                        <a href='".site_url()."challenges/challenge_detail/".$row->challenge_id."'><article><h6>".$row->name."</h6></article></a>
                        ";
                        }
                    ?>
                </section>
            </div>-->
        </main>
