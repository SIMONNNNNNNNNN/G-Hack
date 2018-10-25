<?php
if (!isset($_SESSION['privilege'])) {
    redirect('account/login');
  }else{
    if($_SESSION['privilege'] != 'managementTeam'){
      redirect('account/login');
    }
  }

  echo form_open("account/updateDataset/".$dataset_id);

  $div_region_option = "";

  foreach ($region_options as $row){
      $div_region_option = $div_region_option.'<option value="'.$row->name.'">'.$row->name.'</option>';
  }

?>


<main class="edit_profile col-md-10">
    <div class="row">
      <div class="mx-auto text-center my-4" style="width: 200px;" >
          <h4>Edit Dataset</h4>
          <hr>
<!--           <?php
            echo 'ID: '.$dataset_id;
          ?> -->
      </div>
    </div>

    <div class="container mx-auto" style="width: 80%;">
      <?php echo validation_errors(); ?>
      <form style="display:block;">
              <div class="form-group">
                  <label for="name">Dataset Name</label>
                  <input class='form-control' name="name" id="name" type="text" value="<?php if($dataset_id != 'new'){echo $name;}?>">
              </div>

              <div class="form-group">
                  <label for="description">Description</label>
                  <input class='form-control' name="description" id="description" type="text" value="<?php if($dataset_id != 'new'){echo $description;}?>">
              </div>

              <div class="form-group">
                  <label for="url">Dataset URL</label>
                  <input class='form-control' name="url" id="url" type="text" value="<?php if($dataset_id != 'new'){echo $url;}?>">
              </div>


              <div class="form-group">
                <label for="region">Region</label>
                  <select name="region" class="custom-select">

                      <?php
                      if($dataset_id != 'new'){
                        echo '<option value="'.$current_region.'">'.$current_region.'(current region)</option>';
                      }
                      echo $div_region_option;
                      ?>
                  </select>
              </div>



              <div class="form-group my-4">
                  <button class="btn btn-primary"id="updateEvent" type="submit" >
                    <?php
                      if($dataset_id != 'new'){
                          echo 'Update Dataset';
                        }else{
                          echo 'Create Dataset';
                        }
                    ?>
                  </button>
              </div>

      </form>
    </div>
</main>
