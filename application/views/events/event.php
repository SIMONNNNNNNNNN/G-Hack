<!-- this page is used to show all existing events in the database
    It has a filter to narrow down events by month, state and type -->

<?php
    //Here will prepare all the <div> and contents that needs to be added in to HTML.
    $div_created='';
    $filter_options_month=["All"];
    $filter_options_parentRegion=["All"];
    $filter_options_eventType=["All"];
    foreach ($query_results->result() as $row)
    {
        $month = date("F",strtotime(trim($row->eventDate)));
        $parentRegion = $row->eventParentRegion;
        
        //This event types will show in the dropdown box of the filter
        if($row->eventType=='connections'){
            $eventType = 'Connections';
        }else if($row->eventType=='competitions'){
            $eventType = 'Competitions';
        }else if($row->eventType=='remoteEvent'){
            $eventType = 'Remote Events';
        }
        $event_id = $row->id;
        if(!in_array($month, $filter_options_month)){
            array_push($filter_options_month,$month);
        }
        if(!in_array($parentRegion,$filter_options_parentRegion)){
            array_push($filter_options_parentRegion,$parentRegion);
        }
        if(!in_array($eventType, $filter_options_eventType)){
            array_push($filter_options_eventType,$eventType);
        }

        //This event type will display in the Event tile under Region.
        if($row->eventType=='connections'){
            $className = 'evt_connections';
            $eventType = 'Connections';
        }else if($row->eventType=='competitions'){
            $className = 'evt_comp';
            $eventType = 'Competition';
        }else if($row->eventType=='remoteEvent'){
            $className = 'evt_remote';
            $eventType = 'Remote Event';
        }

        //data format transform
        $date_format_expected = date("j F Y",strtotime(trim($row->eventDate)));
        $time_format_expected = date("h:i A",strtotime(trim($row->eventDate)));
        $temp_div = ('<article class="'.$className.' event_item">
                    <a href="'.base_url('events/eventDetails?event_id='.$event_id).'">
                        <h5>'.trim($row->eventSelfRegion).'<br>'.trim($eventType).'</h5>
                        <p id=region>'.trim($row->eventParentRegion).'</p >
                        <p id=time>'.$date_format_expected.'<br>'.$time_format_expected.'</p >
                    </a>
            </article>');
        $div_created= $div_created.$temp_div;
    }

    $div_options_month="";
    $div_options_parentRegion="";
    $div_options_eventType="";
    // $filter_options_month=["All"];
    // $filter_options_parentRegion=["All"];
    // $filter_options_eventType=["All"];
    foreach($filter_options_month as $temp){
        $div_options_month = $div_options_month."<a class='dropdown-item' onclick=\"searchByMonth('$temp')\">".$temp."</a>";
    }

    foreach($filter_options_parentRegion as $temp){
        $div_options_parentRegion =  $div_options_parentRegion."<a class='dropdown-item' onclick=\"searchByRegion('$temp')\">".$temp."</a>";
    }

    foreach($filter_options_eventType as $temp){
        $div_options_eventType =  $div_options_eventType."<a class='dropdown-item' onclick=\"searchByType('$temp')\">".$temp."</a>";
    }
?>

        <!-- Including header-->
        <main class="container">
            <section>
                <div class="row">
                    <h3>Event Types</h3>
                </div>
                <div class="event_types">
                    <article>
                        <h4>Connections</h4>
                        <p>Get ready for the competition by attending
                            a connections event close to you. This is the
                            best way to meet mentors and to find out more
                            about the competition before the hacking starts.
                        </p>
                    </article>
                    <article>
                        <h4>Competitions</h4>
                        <p>All the hacking occurs during competitions.
                            For 48 hours, teams around the world will be coming
                            together to explore new ways to use the datasets,
                            competing for different prizes and challenges.
                        </p>
                    </article>
                    <article>
                        <h4>Remote Events</h4>
                        <p>If you can't attend a competition's physical location,
                            then a remote event is for you. We support hackers
                            around the country, so if you would like to hack in
                            your own space then sign up for a remote event.
                        </p>
                    </article>
                </div>
            </section>
            <section>
                <div class="row">
                    <h3>Browse Events</h3>
                </div>
<!-- Testing Filter -->

<div class="row mx-auto text-center my-3" style="width: 20em;">
    <div class="btn-group" role="group" aria-label="Button group with nested dropdown">

     <div class="btn-group" role="group">
        <button id="month_btn" type="button" class="btn btn-outline-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Month</button>
        <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
          <?php echo $div_options_month;?>
        </div>
      </div>

       <div class="btn-group" role="group">
        <button id="region_btn" type="button" class="btn btn-outline-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Region</button>
        <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
          <?php echo $div_options_parentRegion;?>
        </div>
      </div>

      <div class="btn-group" role="group">
        <button id="type_btn" type="button" class="btn btn-outline-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Type</button>
        <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
          <?php echo $div_options_eventType;?>
        </div>
      </div>
    </div>
</div>

<!-- End of testing -->

        <div class="events_browse">
				      <?php echo $div_created;?>
        </div>
      </section>
        </main>
