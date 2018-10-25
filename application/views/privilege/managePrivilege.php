<main class="profile">

    <!-- Title -->
    <div class="row">
        <div class="mx-auto text-center my-4" style="width: 200px;" >
            <h4>Volunteering Position Application</h4>
            <hr>
        </div>
    </div>

    <!-- Content -->

    <div class="container row mx-auto" style="width: 85%; display:block;" >
        <table class="table">
            <thead class="thead-dark">
            <tr>
                <th scope="col">Name</th>
                <th scope="col">Email Address</th>
                <th scope="col">Preferred Name</th>
                <th scope="col">Privilege</th>


            </tr>
            </thead>
            <tbody>

            <?php foreach($privileges as $row){
              echo "
              <tr>
              <td>".$row->name."</td>
              <td>".$row->email_address."</td>
              <td>".$row->preferred_name."</td>
              <td>
              <select name='' class='custom-select' data-id='".$row->account_id."'>
                  <option ";

              if($row->privilege=='administrator'){
                  echo "selected";
              }
              echo "value='administrator'>Administrator</option>
            <option ";

              if($row->privilege=='volunteer'){
              echo "selected";
              }
              echo " value='volunteer'>Volunteer</option><option ";

    if($row->privilege=='managementTeam'){
        echo "selected";
    }
    echo " value='managementTeam'>Management Team</option><option ";

    if($row->privilege=='regionDirector'){
        echo "selected";
    }
    echo " value='regionDirector'>Region Director</option><option ";

    if($row->privilege=='regionSupport'){
        echo "selected";
    }
    echo " value='regionSupport'>Region Support</option><option ";

    if($row->privilege=='eventHost'){
        echo "selected";
    }
    echo " value='eventHost'>Event Host</option><option ";

    if($row->privilege=='eventSupport'){
        echo "selected";
    }
    echo " value='eventSupport'>Event Support</option><option ";

    if($row->privilege=='sponsorshipDirector'){
        echo "selected";
    }
    echo " value='sponsorshipDirector'>Sponsorship Director</option><option ";

    if($row->privilege=='sponsorContact'){
        echo "selected";
    }
    echo " value='sponsorContact'>Sponsor Contact</option><option ";

    if($row->privilege=='chiefJudge'){
        echo "selected";
    }
    echo " value='chiefJudge'>Chief Judge</option><option ";

    if($row->privilege=='competitionDirector'){
        echo "selected";
    }
    echo " value='competitionDirector'>Competition Director</option><option ";

    if($row->privilege=='captain'){
        echo "selected";
    }
    echo " value='captain'>Captain</option><option ";

    if($row->privilege=='teamMember'){
        echo "selected";
    }
    echo " value='teamMember'>teamMember</option></select></td></tr>

                <p id='successful' style='display:none'>Update Successfully</p>";

    }?>
            </tbody>
        </table>

    </div>

</main>