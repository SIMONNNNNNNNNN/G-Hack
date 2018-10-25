<main class="container dataset_details">
<div class="row inidividual_challenge">
   <!--Left Card  -->
    <div class="card col-md-8 p-0 shadow" >
      <div class="card-body text-white" style="background-color: #4c9ad2;">
        <h3 class="card-title"><?php echo $dataset_detail->dataset_name ?></h3>
        <h5 class="card-text"><small> Region:  <?php echo $dataset_detail->region_name ?> </small></h5>
      </div>

      <ul class="list-group list-group-flush">

        <li class="list-group-item">
          <strong>Description</strong>
          <p class="card-text"><?php echo $dataset_detail->description ?>
          </p>
        </li>

        <li class="list-group-item">
          <strong>URL</strong>
          <p><a target="_blank" href="<?php echo $dataset_detail->dataset_url ?>"><?php echo $dataset_detail->dataset_url ?></a></p>
        </li>
      </ul>
    </div>

   <!--Right Card  -->

   <div class="card col-sm-3 mx-3 p-0 shadow">
    <h5 class="card-header text-white" style="background-color: #4c9ad2;">Sponsor</h5>
    <img class="card-img-top p-3" src="https://dfat.gov.au/about-us/corporate/PublishingImages/australian-government-stacked-black.png" alt="Card image cap" width="80%">
    <!-- <button class="btn btn-primary btn-block mt-lg-4 mb-0"><a class="text-white" href="">Register</a></button> -->
  </div>

  </div>
</main>