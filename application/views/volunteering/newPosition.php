



<main class="edit_profile col-md-7">

    <div class="row">
        <div class="mx-auto text-center my-4" style="width: 30%;" >
            <h4>New Volunteering Role</h4>
            <hr>
        </div>
    </div>

<?php
echo form_open('volunteering/newPosition');
?>
    <div class="container mx-auto" style="width: 80%;">
        <form style="display:block;" method="post">
            <?php echo validation_errors(); ?>
            
            <div class="form-group">
            <h5 class="my-2">Role</h5>
                <input type="text" name="role" class="form-control">

                <!-- <option selected>Large Custom Select Menu</option> -->

            </div>

            <div class="form-group">   
            <h5 class="my-2">Region</h5>
            <div class="form-group">
                <select name="region_id" class="custom-select">
                    <!-- <option selected>Large Custom Select Menu</option> -->
                    <option  value="1">Queensland</option>
                    <option  value="2">New South Wales</option>
                    <option  value="3">Northern Territory</option>
                    <option  value="4">Tasmania</option>
                    <option  value="5">Western Australia</option>
                    <option  value="6">Brisbane</option>
                    <option  value="7">Sydney</option>
                    <option  value="8">Darwin</option>
                    <option  value="9">Hobart</option>
                    <option  value="10">Perth</option>
                    <option  value="11">National</option>

                </select>
            </div>
            </div>

            <div class="form-group">              
            <h5 class="my-2">Available Number</h5>
            <div>
                <input type="text" name="available_number" class="form-control" value=""/>

            </div>
            </div>

            <!-- Add time picker-->
            <div class="form-group">   
            
            <h5 class="my-2">Description</h5>
            <div class="form-group">
                <textarea name="description" class="form-control"></textarea>
            </div>
        </div>


            <div class="form-group my-4">
                <button class="btn btn-primary" type="submit" style="width: 10em;">Create</button>
            </div>



        </form>
    </div>
</main>