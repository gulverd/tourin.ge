<div class="container" id="middle_container">   
      <div class="col-md-12" id="middle_content_header">
         <h2>Events in Georgia</h2> 
      </div>
</div>
<div class="container">
      <div class="col-md-12" id="middle_content_cont">
         <?php

            include 'db.php';

            $query = "SELECT * FROM events ORDER BY id ASC";
            $run   = mysqli_query($conn,$query);

            while($row = mysqli_fetch_array($run)){
               $id           = $row['id'];
               $title_geo    = $row['title_geo'];
               $title_rus    = $row['title_rus'];
               $title_eng    = $row['title_eng'];
               $city_geo     = $row['city_geo'];
               $city_rus     = $row['city_rus'];
               $city_eng     = $row['city_eng'];
               $location_geo = $row['location_geo'];
               $location_rus = $row['location_rus'];
               $location_eng = $row['location_eng'];
               $event_date   = $row['event_date'];
               $image        = $row['image'];
               $datee        = $row['datee'];

               echo '
                     <div class="col-md-6" id="news_wrapper">
                        <div class="col-md-12" id="news_box_wrapper">
                           <div class="col-md-12" id="news_pic_wrapper">
                              <img src="images/events/'.$image.'" id="news_pic">
                           </div>
                           <div class="col-md-12" id="news_location_and_date_wrapper">
                              <div class="col-md-8" id="news_location_wrapper">
                                 <h3><i class="fa fa-map-marker" aria-hidden="true"></i> '.$city_eng.' - '.$location_eng.'</h3>
                              </div>
                              <div class="col-md-4" id="news_date_wrapper">
                                 <h3>'.$event_date.'</h3>
                              </div>
                           </div> 
                           <div class="col-md-12" id="news_title_wrapper">
                              <h2>'.$title_eng.'</h2>
                           </div>
                        </div>
                     </div>';
            }
         ?>
      </div>
</div>