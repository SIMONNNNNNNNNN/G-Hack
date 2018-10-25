
<?php
echo form_open('volunteering/applyPosition/'.$id);
?>


<main class="edit_profile col-md-10">

    <div class="row">
        <div class="mx-auto text-center my-4" style="width: 200px;" >
            <h4>Volunteering Position Application</h4>
            <hr>
        </div>
    </div>

    <div class="container mx-auto" style="width: 80%;">
        <form style="display:block;" method="post">
            <?php echo validation_errors(); ?>

            <h3>Previous Experience</h3>
            <div class="form-group">

                <textarea name="previous_experience"  class=""></textarea>
            </div>

            <h3>Availability</h3>
            <div class="form-group">
                <textarea name="availability"  class=""></textarea>
            </div>

            <h3>Previous GovHack Experience</h3>
            <div class="form-group">
                <textarea name="previous_govhack_experience" class="" ></textarea>
            </div>

            <h3>Apply Reason</h3>
            <div>
                <textarea name="apply_reason"  class=""></textarea>
            </div>
            <input name="id" hidden value="<?php echo $id?>"/>
            <div class="form-group my-4">
                <button class="btn btn-primary"  type="submit" >Apply</button>
            </div>



        </form>
    </div>
</main>