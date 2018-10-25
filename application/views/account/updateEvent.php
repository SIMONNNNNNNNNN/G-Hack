<?php
if (!isset($_SESSION['privilege'])) {
    redirect('account/login');
  }else{
    if($_SESSION['privilege'] != 'managementTeam'){
      redirect('account/login');
    }
  }

?>
<?php echo validation_errors(); ?>
<?php
    echo form_open('account/editEvent');
    echo form_hidden('event_id', $event_id);
?>

<?php
    $div_content_eventLocation = "";
    $div_content_event_type="";
    $div_content_registration_setting="";
    $content_event_time="";
    if($current_value){
        foreach ($current_value->result() as $row){
            $div_content_eventLocation = $div_content_eventLocation.'<option selected value="'.$row->eventLocationName.'">'.$row->eventLocationName.' (Current Value)</option>';
            $div_content_event_type = $div_content_event_type.'<option selected value="'.$row->eventType.'">'.$row->eventType.' (Current Value)</option>';
            $div_content_registration_setting = $div_content_registration_setting.'<option selected value="'.$row->setting.'">'.$row->setting.' (Current Value)</option>';
            $content_event_time = $row->eventDate;
        }
        $content_event_time = date("m/j/Y h:i A",strtotime($content_event_time));
    }else{
        $content_event_time = date("m/j/Y h:i A",time());
    }

    foreach ($event_information->result() as $row){
        $div_content_eventLocation = $div_content_eventLocation.'<option value="'.$row->eventLoationName.'">'.$row->eventLoationName.'</option>';
    }
    foreach ($all_event_type->result() as $row){
        $div_content_event_type = $div_content_event_type.'<option value="'.$row->unnest.'">'.$row->unnest.'</option>';
    }
    foreach ($all_registration_setting->result() as $row){
        $div_content_registration_setting = $div_content_registration_setting.'<option value="'.$row->unnest.'">'.$row->unnest.'</option>';
    }
?>

<!-- Add time picker-->
<script type="text/javascript" src="../../javaScript/moment.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.0-alpha14/js/tempusdominus-bootstrap-4.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.0-alpha14/css/tempusdominus-bootstrap-4.min.css" />

<!-- Fields are filled in with what's stored in the databse for the user.
    User's changes are sent to the database as an update  -->

<main class="edit_profile col-md-10">

    <div class="row">
      <div class="mx-auto text-center my-4" style="width: 200px;" >
          <h4>Edit Event</h4>
          <hr>
<!--            <?php
            echo 'ID: '.$event_id;
          ?>   -->       
      </div>
    </div>

    <div class="container mx-auto" style="width: 80%;">
        <form style="display:block;">
                <h5 class="my-3">Event Location</h5>
                <div>
                    <select name="event_location" class="custom-select">
                        <!-- <option selected>Large Custom Select Menu</option> -->
                        <?php echo $div_content_eventLocation?>
                    </select>
                </div>

               <h5 class="my-3">Registration Setting</h5>
                <div>
                    <select name="registration_setting" class="custom-select">
                        <!-- <option selected>Large Custom Select Menu</option> -->
                        <?php echo $div_content_registration_setting?>
                    </select>
                </div>

                <h5 class="my-3">Event Type</h5>
                <div>
                    <select name="event_type" class="custom-select">
                        <!-- <option selected>Large Custom Select Menu</option> -->
                        <?php echo $div_content_event_type?>
                    </select>
                </div>

                <!-- Add time picker-->
                <h5 class="my-3">Event Time</h5>
                <div class="form-group">
                    <div class="input-group date" id="datetimepicker1" data-target-input="nearest">
                        <input type="text" name="event_time" value ="<?php echo  $content_event_time?>" class="form-control datetimepicker-input" data-target="#datetimepicker1"/>
                        <div class="input-group-append" data-target="#datetimepicker1" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                    </div>
                </div>
                <script type="text/javascript">
                    $(function () {
                        $('#datetimepicker1').datetimepicker();
                    });
                </script>

                <div class="form-group my-4">
                    <button class="btn btn-primary"id="updateEvent" type="submit" >Update Event</button>
                </div>



                <!-- <div class="form-group">
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
                    <labelfor="profilePicture">Profile Image</label><br>
                    <div class="custom-file" style="width: 30%;">
                    <input type="file" class="custom-file-input" id="inputGroupFile01" name="profilePicture">
                    <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                </div> -->
        </form>
    </div>
</main>



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
