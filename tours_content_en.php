<div class="container" id="middle_container">	
   	<div class="col-md-12" id="middle_content_header">
   		<h2>Tours in Georgia</h2>
   	</div>
   	<div class="col-md-12" id="middle_content_cont">
   		<div class="col-md-12" id="main_cont_wrapper">

   		</div>
         <div class="col-md-3">
            <?php include 'left_events_en.php';?>
         </div>
         <div class="col-md-9">

               <?php

                    include 'db.php';

                    $query = "SELECT * FROM tours ORDER BY id DESC";
                    $run   = mysqli_query($conn,$query);

                    while($row = mysqli_fetch_array($run)){
                        $id                 = $row['id'];
                        $tour_name_geo      = $row['tour_name_geo'];
                        $tour_name_rus      = $row['tour_name_rus'];
                        $tour_name_eng      = $row['tour_name_eng'];
                        $tour_desc_geo      = $row['tour_desc_geo'];
                        $tour_desc_rus      = $row['tour_desc_rus']; 
                        $tour_desc_eng      = $row['tour_desc_eng'];
                        $tour_length        = $row['tour_length'];
                        $tour_pic1          = $row['tour_pic1'];
                        $tour_price         = $row['tour_price'];
                        $tour_valute        = $row['tour_valute'];
                        //$tour_date          = $row['tour_date'];
                        $datee              = $row['datee'];
                        

                        echo 
                        '
                        <a href="tour_in_en.php?'.$id.'">
                           <div class="col-md-12" id="main_cont_box_wrapper">
                              <div class="col-md-4" id="tours_pic_wrapper">
                                 <img src="images/tours/'.$tour_pic1.'" id="tours_pic">
                              </div>
                              <div class="col-md-8" id="tours_right_wrapper">
                                 <div class="col-md-10" id="tours_left_in_wrapper">
                                    <div class="col-md-12" id="tours_in_title">
                                       <h2>'.$tour_name_eng.'</h2>
                                    </div>
                                    <div class="col-md-12" id="tours_in_description">
                                       <h4>
                                          '.mb_substr($tour_desc_eng,0,220, "utf-8").' ...'.'
                                       </h4>
                                    </div>
                                    <div class="col-md-12" id="tours_in_date">
                                       <h4> Date:    '.$datee.'    Number of Days:     '.$tour_length.'</h4>
                                    </div>
                                 </div>
                                 <div class="col-md-2" id="tours_right_in_wrapper">
                                    <h4> From - '.$tour_price.'</h4>
                                 </div>
                              </div>
                           </div>    
                        </a>                       
                           ';
                  }

            ?>


         </div>

   	</div>

</div>