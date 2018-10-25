<!-- This file is implemented for registering a challenge, need to be styled in the future -->



     <div class="jumbotron mx-auto text-center mt-lg-4" style="width: 80%;">
        <h3 class="mb-lg-4 mt-0">Challenge Register</h3>

		<?php
		if(isset($team_null)){
		    echo "Form a team first";
		}else if(isset($register_success)){
		    echo "Successfully registered";
		}else if(isset($no_project)){
		    echo "Register a project first";
        } else if(isset($register_failed)){
		    echo "Registering failed";
		}else if(isset($registered)){
		    echo "You've registered before";
		}else if(isset($projects) and isset($challenge_id)){
			echo " <p class='lead mt-lg-4'>Which project woould you register?</p>";
		    foreach($projects as $project){
		       echo "
		        <a class='btn btn-lg btn-outline-danger mt-lg-3' style='width:15em;' href='".base_url('challenges/register_challenge_for_project/'.$project->project_id).'/'.$challenge_id."'>".$project->title."</a><br>
		        ";
		    }
		}
		?>
	</div>