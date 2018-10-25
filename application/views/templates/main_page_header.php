				<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
				<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
				<script>
					$(document).ready(function () {
						$('.functional_table_challenge').DataTable({
							"order": [[ 0, "asc" ]],
							"columnDefs": [
								{ "width": "30%", "targets": 0 },
								{ "width": "30%", "targets": 1 },
								{ "width": "30%", "targets": 2 },
								{ "width": "30%", "targets": 3 },
								{ "width": "30%", "targets": 4 },
  							]
						});

						$('.functional_table').DataTable({
							"order": [[ 0, "asc" ]],
						});

						$('.dataTables_length').addClass('bs-select');
					});
				</script>
		 
		 <!-- This section's php code changes contents of the banner just below navigation bar on the main
          four pages of the site (Events, Challenges, Projects, Datasets) -->
	          <?php 

	            echo '<header class="container-fluid page_header">
	                <div class="row">
	                <aside class="col-md-4">';
	          
	            $page_details = array ( 
	            
	            array(
	                "Events","GovHack is all about the events we run and the people that participate in them."
	            ), 
	            array(
	                "Challenges","What your project achieves will depend on how much you challenge yourself."
	            ), 
	            
	            array(
	                "Projects","Each team will translate 48 hours of work into the design and development of a project."
	            ), 
	            array(
	                "Datasets","The datasets will fuel the projects you create and help you reach your project goals."
				),array(
					"About","The Hackerspace supports the activities that GovHack conducts throughout every year."
				));
	          
		          if($main_page == 0){
		              echo "<h1>".$page_details[0][0]."</h1>";
		          }elseif($main_page == 1){
		              echo "<h1>".$page_details[1][0]."</h1>";
		          }elseif($main_page == 2){
		              echo "<h1>".$page_details[2][0]."</h1>";
		          }elseif($main_page == 3){
		              echo "<h1>".$page_details[3][0]."</h1>";
		          }else{
					echo "<h1>".$page_details[4][0]."</h1>";
				  }
		          
		          echo ' </aside>
		                <article class="col-md-8" id="events">
		                <div class="background">';

		          if($main_page == 0){
		              echo "<h1>".$page_details[0][1]."</h1>";
		          }elseif($main_page == 1){
		              echo "<h1>".$page_details[1][1]."</h1>";
		          }elseif($main_page == 2){
		              echo "<h1>".$page_details[2][1]."</h1>";
		          }elseif($main_page == 3){
		              echo "<h1>".$page_details[3][1]."</h1>";
		          }else{
					echo "<h1>".$page_details[4][1]."</h1>";
				}
            ?>
          </div>
      </article>
  </div>
</header>
