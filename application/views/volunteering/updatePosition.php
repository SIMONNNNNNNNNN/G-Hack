
<main class="edit_profile col-md-7">

    <div class="row">
        <div class="mx-auto text-center my-4" style="width: 200px;" >
            <h4>Update Volunteering Role</h4>
            <hr>         
<!--            <?php echo 'ID: '.$volunteering->id;?>    -->
        </div>
    </div>

    <div class="bg-success text-center text-white">
       <p> <?php echo validation_errors(); ?> </p>
   </div>

<?php
echo form_open('volunteering/updatePosition');
echo form_hidden('id', $volunteering->id);
?>

    <div class="container mx-auto" style="width: 80%;">
        <form style="display:block;" method="post">
            

            <h5 class="my-2">Role</h5>
            <div class="form-group">
                <input type="text" name="role" class="form-control" value="<?php echo $volunteering->role;?>">
                    <!-- <option selected>Large Custom Select Menu</option> -->

                </input>
            </div>

            <h5 class="my-2">Region</h5>
            <div class="form-group">
                <select name="region_id" class="custom-select">
                    <!-- <option selected>Large Custom Select Menu</option> -->
                    <option <?php if($volunteering->region_id==1){echo "selected";}?> value="1">Queensland</option>
                    <option <?php if($volunteering->region_id==2){echo "selected";}?> value="2">New South Wales</option>
                    <option <?php if($volunteering->region_id==3){echo "selected";}?> value="3">Northern Territory</option>
                    <option <?php if($volunteering->region_id==4){echo "selected";}?> value="4">Tasmania</option>
                    <option <?php if($volunteering->region_id==5){echo "selected";}?> value="5">Western Australia</option>
                    <option <?php if($volunteering->region_id==6){echo "selected";}?> value="6">Brisbane</option>
                    <option <?php if($volunteering->region_id==7){echo "selected";}?> value="7">Sydney</option>
                    <option <?php if($volunteering->region_id==8){echo "selected";}?> value="8">Darwin</option>
                    <option <?php if($volunteering->region_id==9){echo "selected";}?> value="9">Hobart</option>
                    <option <?php if($volunteering->region_id==10){echo "selected";}?> value="10">Perth</option>
                    <option <?php if($volunteering->region_id==11){echo "selected";}?> value="11">National</option>

                </select>
            </div>

            <div>
                <h5 class="my-2">Available Number</h5>
                <input type="text" name="available_number" class="form-control" value="<?php echo $volunteering->available_number;?>"/>

            </div>

            <!-- Add time picker-->
            <h5 class="my-2">Description</h5>
            <div class="form-group">
                <textarea name="description" class="form-control" ><?php echo $volunteering->description; ?></textarea>
            </div>



            <div class="form-group my-4">
                <button class="btn btn-primary" type="submit" style="width: 10em;">Update</button>
            </div>



        </form>
    </div>
</main>