

<!-- Fields are filled in with what's stored in the databse for the user.
    User's changes are sent to the database as an update  -->

<main class="edit_profile col-md-8" >


    <div class="row">
      <div class="mx-auto text-center my-lg-4" style="width: 20%;" >
          <h4>Edit Profile</h4>
          <hr>
      </div>
    </div>
<?php echo form_open('account/updateProfile'); ?>
    <div class="bg-danger text-center text-white"> 
    <p>
    <?php echo validation_errors(); ?>
    </p>
    </div>
    <div class="container mx-auto" style="width: 99%;" >

        
        <form style="display:block;">

            <div class="form-group">
                <label for="name">Full Name</label>
                <input class='form-control' name="name" id="name" type="text" value="<?php echo $name;?>">
            </div>

            <div class="form-group">
                <label for="preferredName">Preferred Name</label>
                <input class='form-control' name="preferredName" id="preferredName" type="text" value="<?php echo $preferredName;?>">
            </div>

            <div class="form-group">
                <label for="fullLegalName">Full Legal Name</label>
                <input class='form-control' name="fullLegalName" id="fullLegalName" type="text" value="<?php echo $fullLegalName;?>">
            </div>

            <div class="form-group">
                <label for="profilePicture">Profile Image</label><br>
                <div class="custom-file" style="width: 30%;">
                <input type="file" class="custom-file-input" id="inputGroupFile01" name="profilePicture">
                <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
              </div>
            </div> 

            <div class="form-group">
                <label for="dietaryRequirement">Dietary Requirement</label>
                <input class='form-control' name="dietaryRequirement" id="dietaryRequirement" type="text" value="<?php echo $dietaryRequirement;?>">
            </div>

            <div class="form-group">
                <label for="communicationPreference">Communication Preference</label>
                <input class='form-control' name="communicationPreference" id="communicationPreference" type="text" value="<?php echo $communicationPreference;?>">
            </div>

            <div class="form-group">
                <label for="tShirtSize">T-Shirt Size</label>
                <input class='form-control' name="tShirtSize" id="tShirtSize" type="text" value="<?php echo $tShirtSize;?>">
            </div>

            <div class="form-group">
                <label for="departureAirport">Departure Airport</label>
                <input class='form-control' name="departureAirport" id="departureAirport" type="text" value="<?php echo $departureAirport;?>">
            </div>

            <div class="form-group">
                <label for="flightPreference">Flight Preference</label>
                <input class='form-control' name="flightPreference" id="flightPreference" type="text" value="<?php echo $flightPreference;?>">
            </div>

            <div class="form-group">
                <label for="roomSharePreference">Room Share Preference</label>
                <input class='form-control' name="roomSharePreference" id="roomSharePreference" type="text" value="<?php echo $roomSharePreference;?>">
            </div>


            <div class="form-group my-4">
                <button class="btn btn-primary"id="updateProfile" type="submit" >Update Profile</button>
            </div>

        </form>
    </div>


</main>


</div>
<!-- 


<h1 class="text-center"></h1>
    <div class="form-group">
        <label for="name">Full Name</label>
        <input class='form-control' name="name" id="name" type="text" value="<?php echo $name;?>">
    </div>

    <div class="form-group">
        <label for="preferredName">Preferred Name</label>
        <input class='form-control' name="preferredName" id="preferredName" type="text" value="<?php echo $preferredName;?>">
    </div>

    <div class="form-group">
        <label for="fullLegalName">Full Legal Name</label>
        <input class='form-control' name="fullLegalName" id="fullLegalName" type="text" value="<?php echo $fullLegalName;?>">
    </div>

    <div class="form-group">
      <label for="profilePicture">Profile Image</label>
    <input type="file" name="profilePicture"/>
    </div>

    <div class="form-group">
        <label for="dietaryRequirement">Dietary Requirement</label>
        <input class='form-control' name="dietaryRequirement" id="dietaryRequirement" type="text" value="<?php echo $dietaryRequirement;?>">
    </div>

    <div class="form-group">
        <label for="communicationPreference">Communication Preference</label>
        <input class='form-control' name="communicationPreference" id="communicationPreference" type="text" value="<?php echo $communicationPreference;?>">
    </div>

    <div class="form-group">
        <label for="tShirtSize">T-Shirt Size</label>
        <input class='form-control' name="tShirtSize" id="tShirtSize" type="text" value="<?php echo $tShirtSize;?>">
    </div>

    <div class="form-group">
        <label for="departureAirport">Departure Airport</label>
        <input class='form-control' name="departureAirport" id="departureAirport" type="text" value="<?php echo $departureAirport;?>">
    </div>

    <div class="form-group">
        <label for="flightPreference">Flight Preference</label>
        <input class='form-control' name="flightPreference" id="flightPreference" type="text" value="<?php echo $flightPreference;?>">
    </div>

    <div class="form-group">
        <label for="roomSharePreference">Room Share Preference</label>
        <input class='form-control' name="roomSharePreference" id="roomSharePreference" type="text" value="<?php echo $roomSharePreference;?>">
    </div>


    <div class="form-group">
        <button id="updateProfile" type="submit" >Update Profile</button>
    </div>
</div>
 -->