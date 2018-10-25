<!-- this page is used to show event details of an event and a user can register to attend 
this event (or change registration) from this page -->

<?php
    /**
    * prepare the contents of event details that needs to 
    * be added to this HTML page.
    */
    $date ='';
    $start_time = '';
    $end_time = '';
    $region_name = '';
    $event_type = '';
    $setting = '';
    $hours = '';
    $address = '';
    $email_address = '';
    $accessibility = '';
    $youth_support = '';
    $parking = '';
    $public_transfer = '';
    foreach ($query_results->result() as $row) {
        if ($row->eventType == 'connections') {
            $event_type = 'Connections';
        } else if ($row->eventType == 'competitions') {
            $event_type = 'Competition';
        } else if ($row->eventType == 'remoteEvent') {
            $event_type = 'Remote Event';
        }
        $event_location = $row->eventLocationName." ";
        $hours = $row->hours_of_operation_information;
        $date = date("j F Y",strtotime(trim($row->eventDate)));
        $start_time = date("h:i A",strtotime(trim($row->eventDate)));
        $end_time = date("h:i A",strtotime(trim($row->eventDate)) + $hours*60*60);
        $setting = $row->setting;
        $address = $row->address;
        $email_address = $row->email_address;
        $accessibility = $row->accessibility_information;
        $youth_support = $row->youth_support_information;
        $parking = $row->parking_information;
        $public_transfer = $row->public_transfer_information;
    }
    if ($registered) {
        $modal_message = 'Would you like to cancel your registration?';
        $modal_button_name = 'Cancel Registration';
        $modal_button_id = 'register_cancel';
    } else {
        $modal_message = 'Would you like to register to attend this event?';
        $modal_button_name = 'Register';
        $modal_button_id = 'register_confirm';
    }
 ?>

        <main class="container event_details">

            <h2><?php echo $event_location.$event_type ?></h2>
            <section class="row">
                <article class="col-md-6">
                    <p>Want a winning edge or perhaps you are intrigued and want to find out what GovHack is all about?</p>
                    <p>The local GovHack team will give you an overview of the competition and answer any questions you may have. Learn more about official events in your region and all about youth, maker or special interest themed nodes.</p>
                    <p>The best teams have a mix of skills, and this event is a great opportunity to find a team to join. Many new friendships are formed at GovHack and this is the perfect place for you to meet like minded people.</p>
                    <p>Data Mentors will be in attendance to share their knowledge of open government data and to provide insight that could help incubate ideas to pursue during the competition.</p>
                    <p>Tech savvy mentors may even be available to share some tips and tricks to help you create winning concepts.</p>
                </article>
                <div class="col-md-1">
                </div>
                <aside class="col-md-4">
                    <h4>Event Details</h4>
                    <ul>
                        <li>Registration Type: <span><?php echo $setting ?></span></li>
                        <li>Date: <span><?php echo $date ?></span></li>
                        <li>Start Time: <span><?php echo $start_time ?></span></li>
                        <li>End Time: <span><?php echo $end_time ?></span></li>
                        <li>Address: <span><?php echo $address ?></span></li>
                        <li>Email: <span><?php echo $email_address ?></span></li>
                    </ul>
                    <div class="flex_center">

                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                        <?php echo $modal_button_name; ?>
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                          <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Event Registration</h5>
                                <a type="button" class="close btn btn-dark" data-dismiss="modal" aria-label="Close" style="background-color: transparent;"></a>

                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                <?php echo $modal_message; ?>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary" id="<?php echo $modal_button_id; ?>">Yes</button>
                              </div>
                            </div>
                          </div>
                        </div>
                    </div>
                </aside>
            </section>
            <section class="row">
                <article class="col-md-7">
                    <h2>Event Location Details</h2>
                    <h6>Accessibility:</h6>
                    <p><?php echo $accessibility ?></p>
                    <h6>Youth Support:</h6>
                    <p><?php echo $youth_support ?></p>
                    <h6>Parking:</h6>
                    <p><?php echo $parking ?></p>
                    <h6>Public Transport:</h6>
                    <p><?php echo $public_transfer ?></p>
                    <h6>Operating hours:</h6>
                    <p><?php echo 'Opening for '.$start_time.' start. Closes '.$end_time ?> </p>
                </article>
<!--                 <div class="col-md-1">
                </div> -->
                <div class="col-md-4 mt-lg-4">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7079.85913037315!2d153.02439018605625!3d-27.471452084389224!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6b915a04a8eef00d%3A0x7002e514b58528f2!2s155+Queen+St%2C+Brisbane+City+QLD+4000!5e0!3m2!1sen!2sau!4v1536669741766" width="350em" height="350em" frameborder="0" style="border:0" allowfullscreen></iframe>
                </div>
            </section>
            <section class="row sponsors">
                <article class="col-md-12">
                    <h2>State Sponsors</h2>
                </article>
                <article class="col-md-12">
                    <h6>State Award Naming Rights and Premier Sponsor</h6>
                    <div class="row">
                        <figure class="col-md-4 pr-0" style="border-style:none;">
                            <img src="http://ec2-13-211-239-163.ap-southeast-2.compute.amazonaws.com/g_hack//images/Sponsor_Sebastian.png" width= "70%"/>
                        </figure>
                    </div>
                </article>
                <article class="col-md-12">
                    <h6>Gold Sponsors</h6>
                    <div class="row">
                        <figure class="col-md-4" style="border-style:none;">
                            <img src="http://ec2-13-211-239-163.ap-southeast-2.compute.amazonaws.com/g_hack//images/Sponsor_Zhi.png" width= "70%" />
                        </figure>
                        <figure class="col-md-4" style="border-style:none;">
                            <img src="http://ec2-13-211-239-163.ap-southeast-2.compute.amazonaws.com/g_hack//images/Sponsor_Ivan.png" width= "70%" />
                        </figure>
                    </div>
                </article>
                <article class="col-md-12">
                    <h6>Silver Sponsor</h6>
                    <div class="row">
                        <figure class="col-md-4" style="border-style:none;">
                            <img src="http://ec2-13-211-239-163.ap-southeast-2.compute.amazonaws.com/g_hack//images/Sponsor_Xu.png" width= "70%" />
     
                        </figure>
                        <figure class="col-md-4" style="border-style:none;">
                            <img src="http://ec2-13-211-239-163.ap-southeast-2.compute.amazonaws.com/g_hack//images/Sponsor_Jemin.png" width= "70%" />
                            
                        </figure>

                    </div>
                </article>
                <article class="col-md-12">
                    <h6>Bronze Sponsor</h6>
                    <div class="row">
                        <figure class="col-md-4" style="border-style:none;">
                            <img src="http://ec2-13-211-239-163.ap-southeast-2.compute.amazonaws.com/g_hack//images/Sponsor_Yu.png" width= "70%" />
                            <figcaption>

                            </figcaption>
                        </figure>
                        <figure class="col-md-4" style="border-style:none;">
                            <img src="http://ec2-13-211-239-163.ap-southeast-2.compute.amazonaws.com/g_hack//images/Sponsor_Shengyao.png" width= "70%" />
  
                        </figure>
                        <figure class="col-md-4" style="border-style:none;">
                            <img src="http://ec2-13-211-239-163.ap-southeast-2.compute.amazonaws.com/g_hack//images/Sponsor_Jian.png" width= "70%" />
                        </figure>

                    </div>
                </article>
            </section>
        </main>

    <script>
        // This ajax is used to send event registration request to the server 
        // and receieve json data returned. After that show feedback information on the
        // bootstrap 'modal' and change 'modal' components according to the feedback
        // information.
        $('#register_confirm').click(function (){
            var data = {
                event_id: <?php echo $event_id?>
            }

            $.ajax({
                url: "<?php echo base_url()?>events/register/",
                data: data,
                dataType: "json", //"jsonp" do not work here, why?
                success: function(data) {
                    $('.modal-body').html(data["result"]);
                    
                    if(data["result"]=="Please log in first."){
                        $('.modal-footer').html('<div style="text-align: center;width:100%"><a href="<?php echo base_url()?>account/login">Go to Log In Page</a></div>');
                    }else{
                        $('.modal-footer').html('<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>');
                    }
                    console.log(data);
                }
            });

        });

        // This ajax is used to send event registration cancellation request to the server 
        // and receieve json data returned. After that show feedback information on the
        // bootstrap 'modal' and change 'modal' components according to the feedback
        // information.
        $('#register_cancel').click(function() {
            var data = {
                event_id: <?php echo $event_id?>
            }
            $.ajax({
                url: "<?php echo base_url()?>events/cancel_registration/",
                data: data,
                dataType: "json",
                success: function(data) {
                    $('.modal-body').html(data["result"]);
                    $('.modal-footer').html('<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>');
                    console.log(data);
                }
            });
        });
    </script>
