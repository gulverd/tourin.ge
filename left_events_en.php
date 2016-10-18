            <div class="col-md-12" id="left_events_main_wrapper">
               <div class="col-md-12" id="left_events_title_wrapper">
                  <h3>Events</h3>
               </div>
               <?php

                     include 'db.php';

                     $query = "SELECT * FROM events ORDER BY RAND() LIMIT 4";
                     $run   = mysqli_query($conn,$query);

                     while($row = mysqli_fetch_array($run)){
                        $id           = $row['id'];
                        $title_eng    = $row['title_eng'];
                        $city_eng     = $row['city_eng'];
                        $location_eng = $row['location_eng'];
                        $event_date   = $row['event_date'];
                        $image        = $row['image'];

                        echo 
                        '
                           <div class="col-md-12" id="left_events_wrapper">
                              <div class="col-md-12" id="left_events_pic_wrapper">
                                 <img src="images/events/'.$image.'" id="event_pic_left"> 
                              </div>
                              <div class="col-md-12" id="left_events_name_wrapper">
                                 '.$title_eng.'
                              </div>
                              <div class="col-md-12" id="left_events_date_wrapper">
                                 <i class="fa fa-map-marker" aria-hidden="true"></i> '.$city_eng.' - '.$event_date.'
                              </div>
                           </div>
                        ';
                     }
               ?>             
            </div>



