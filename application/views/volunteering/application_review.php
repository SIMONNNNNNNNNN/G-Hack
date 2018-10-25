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
                <th scope="col">Role</th>
                <th scope="col">Name</th>
                <th scope="col">Email Address</th>
                <th scope="col">Region Name</th>
                <th scope="col">Availability</th>
                <th scope="col">Previous GovHack Experience</th>
                <th scope="col">Apply Reason</th>
                <th scope="col">status</th>


            </tr>
            </thead>
            <tbody>
            <tr>
                <p id="volunteer_id" hidden><?php echo $application->volunteer_id; ?></p>
                <td><?php echo $application->role; ?></td>
                <td><?php echo $application->name;?></td>
                <td><?php echo $application->email;?></td>
                <td><?php echo $application->regionName;?></td>
                <td><?php echo $application->availability;?></td>
                <td><?php echo $application->previous_govhack_experience;?></td>
                <td><?php echo $application->apply_reason;?></td>
                <td>
                    <select name="application_status" class="custom-select" id="application_status">
                        <option <?php if($application->application_status=='submitted'){echo "selected";}?> value="submitted">Submitted</option>
                        <option <?php if($application->application_status=='approved'){echo "selected";}?> value="approved">Approved</option>
                        <option <?php if($application->application_status=='rejected'){echo "selected";}?> value="rejected">Rejected</option>
                    </select>
                </td>
            </tr>
            </tbody>
        </table>
        <p id="successful" style="display:none">Update Successfully</p>

    </div>

</main>