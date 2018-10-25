<!-- user profile information is fetched from the database and displayed here -->

<main class="profile">
	
		<!-- Title -->
		<div class="row">
	      <div class="mx-auto text-center my-4" style="width: 60%;" >
	          <h4>User Profile</h4>
	          <hr>
	      </div>
		</div>

		<!-- Content -->

	    <div class="container row mx-auto" style="width: 99%; display:block;" >

			<div class="card mx-auto" style="width: 35rem;">
			<div class="mx-auto text-center" style="width: 50%;">
			  	<?php 
		    	if(isset($profilePicture)){ echo "<img src=".$profilePicture." alt='Card image cap'/>";}
		    	else{echo "<img class='mt-lg-4' src='http://www.stickpng.com/assets/images/585e4beacb11b227491c3399.png' width='100em' alt='Card image cap'/>";} ?>
		    </div>
			<div class="card-body">
			<h5 class="mb-lg-4">Name: &nbsp;<small><?php echo $name;?></small></h5>
	    	<h5 class="my-lg-4">Preferred Name: &nbsp;<small><?php echo $preferredName;?></small></h5>
	    	<h5 class="my-lg-4">Email: &nbsp;<small><?php echo $email;?></small></h5>
	    	<h5 class="my-lg-4">Privilege: &nbsp;<small><?php echo "<a class='text-center href='privilege'><i class='fas fa-award'></i> ".$privilege."</a>"; ?></small></h5>
			<div class="mx-auto" style="width: 40%;">
			<a class="btn btn-primary text-center" href="<?php echo base_url('account/updateProfile'); ?>" style='width: 13em;'><i class="far fa-edit"></i> Edit</a>
			  </div>
			</div>
			</div>

	    	<!-- <table class="table">
			  <thead class="thead-dark">
			    <tr>
			      <th scope="col"><small>Profile Picture</small></th>		    	
			      <th scope="col"><small>Name</small></th>
			      <th scope="col"><small>Preferred Name</small></th>
			      <th scope="col"><small>Email</small></th>
			      <th scope="col"><small>Privilege</small></th>
			      <th scope="col"><small>Edit</small></th>
			    </tr>
			  </thead>
			  <tbody>
			    <tr>
			      <td><?php if(isset($profilePicture)){ echo "<img src=".$profilePicture."/>";} ?></td>
			      <td><?php echo $name;?></td>
			      <td><?php echo $preferredName;?></td>
			      <td><?php echo $email;?></td>
			      <td>
			      	<?php 

			      		echo "
						<a class='text-center href='privilege'><i class='fas fa-award'></i> ".$privilege."</a>"; ?>
				  </td>
			      
			      <td><a class="text-center" href="<?php echo base_url('account/updateProfile'); ?>"><i class="far fa-edit"></i> Edit</a></td>
			    </tr>
			  </tbody>
			</table> -->
		</div>

</main>
<!-- 		<div class="row">

			<a class="btn btn-outline-primary text-center" href="<?php echo base_url('account/updateProfile'); ?>">Update Personal Details</a> -->

			<!-- If user is part of the management team, button to go to privilege system is shown -->
	<!-- 		<?php if($privilege=='managementTeam'){echo "
				<a class='btn btn-outline-primary' href='privilege'>Privilege System</a>";} ?> -->

			<br>
			<!-- sign out including google -->
			<!-- <a class="btn btn-outline-dark" href="logout" onclick="signOut();"><i class="fas fa-sign-out-alt"></i> Sign out</a>
 -->

