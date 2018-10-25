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
                <th scope="col">Region Name</th>
                <th scope="col">Availability</th>
                <th scope="col">Previous GovHack Experience</th>
                <th scope="col">Apply Reason</th>
                <th scope="col">status</th>


            </tr>
            </thead>
            <tbody>
            <tr>
                <td><?php echo $volunteering->role; ?></td>
                <td><?php echo $volunteering->regionName;?></td>
                <td><?php echo $volunteering->availability;?></td>
                <td><?php echo $volunteering->previous_govhack_experience;?></td>
                <td><?php echo $volunteering->apply_reason;?></td>
                <td><?php echo $volunteering->application_status;?></td>
            </tr>
            </tbody>
        </table>

    </div>

</main>