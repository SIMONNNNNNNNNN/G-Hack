<!-- This is a project details page, that's populated with a project's data from the database-->

<main role="main" class="container project_details">
      <!-- TEAM TITLE -->
      <div class="d-flex align-items-center p-3 my-3 text-white rounded shadow" style="background-color: #ca1e56;">
        <div class="lh-100">
          <h3 class="mb-3 lh-100"><?php echo $title ?></h3>
          <h5><?php echo "Team: " . $team_name;?></h5>
        </div>
      </div>

      <!-- PROJECT INFO -->

      <div class="my-3 p-3 bg-white rounded shadow">
        <h5 class="border-bottom border-gray pb-2 mb-0">Project Description</h5>
        
        <div class="media text-muted pt-3">
          <div class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray" style="h1{font-size: 5px;} h2{font-size: 3px;}">
              <?php echo $description;?>
          </div>
        </div>
        
      </div>

      <div class="my-3 p-3 bg-white rounded shadow">
        <h5 class="border-bottom border-gray pb-2 mb-0">Data Story</h5>
        
        
        <div class="media text-muted pt-3">
          <div class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
            <?php echo $data_story;?>
          </div>
        </div>

      </div>


      
      <div class="my-3 p-3 bg-white rounded shadow">
        <h5 class="border-bottom border-gray pb-2 mb-0">Datasets</h5>
        
        <?php 
          if (isset($datasets)) {
            foreach ($datasets as $row) { 
        ?>
              <div class="media text-muted pt-3">
                <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
                  <strong class="d-block text-gray-dark">
                    <a href= <?php echo "'".site_url()."datasets/dataset_details/".$row->dataset_id."'>".$row->dataset_name; ?>
                    </a>
                  </strong>
                  <?php echo $row->dataset_url; ?> <br>
                  Region: <?php echo $row->region; ?>
                </p>
              </div>
        <?php
            }
          }
        ?>
      </div>

      <div class="my-3 p-3 bg-white rounded shadow">
        <h5 class="border-bottom border-gray pb-2 mb-0">Challenges</h5>
        
        <?php 
          if (isset($challenges)) {
            foreach ($challenges as $row) { 
        ?>
              <div class="media text-muted pt-3">
                <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
                  <strong class="d-block text-gray-dark">
                    <!-- adding link to challenge details page -->
                    <a href= <?php echo "'".site_url()."challenges/challenge_detail/".$row->challenge_id."'>".$row->name; ?> 
                    </a>
                      
                  </strong>
                  Region: <?php echo $row->region; ?>
                </p>
              </div>
        <?php
            }
          }
        ?>
       <!--  <div class="media text-muted pt-3">
          <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
            <strong class="d-block text-gray-dark">New Engaging Ways to connect to upcoming NTG Open Data Portal</strong>
           Region: Northern Territory
        </div>
        
        <div class="media text-muted pt-3">
          <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
            <strong class="d-block text-gray-dark">Make Darwin the coolest city around</strong>
            Region: Northern Territory
          </p>
        </div> -->

      </div>

     <div class="my-3 p-3 bg-white rounded shadow">
      <h5 class="border-bottom border-gray pb-2 mb-0">Project Resources</h5>
      <div class="row mx-auto">
        <a class="btn col-sm-2 m-3" href="<?php echo $source_code_url;?>" style="border-color: #ca1e56; color: #ca1e56;" target="_blank">Source code</a>

        <a class="btn col-sm-2 m-3" href="<?php echo $video_url;?>" style="border-color: #ca1e56; color: #ca1e56;" target="_blank">Video</a>

        <a class="btn col-sm-2 m-3" href="<?php echo $homepage_url;?>" style="border-color: #ca1e56; color: #ca1e56;" target="_blank">Project Website</a>
      </div>
    </div>
     </div>

    </main>