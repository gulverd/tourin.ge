   	<div class="col-md-12" id="suggested_title">
   		<h4>Recomended Tours</h4> 
   	</div>
   	<div class="col-md-12" id="middle_content_cont">
         <?php

                    include 'db.php';

                    $query = "SELECT * FROM tours ORDER BY RAND() LIMIT 3";
                    $run   = mysqli_query($conn,$query);

                    while($row = mysqli_fetch_array($run)){
                        $id                 = $row['id'];
                        $tour_name_eng      = $row['tour_name_eng'];
                        $tour_desc_eng      = $row['tour_desc_eng'];
                        $tour_length        = $row['tour_length'];
                        $tour_price         = $row['tour_price'];
                        $tour_pic1          = $row['tour_pic1'];
                        $tour_valute        = $row['tour_valute'];
                        //$tour_date          = $row['tour_date'];
                        $datee              = $row['datee'];
                        $region1            = $row['region1'];
                        $region2            = $row['region2'];
                        $region3            = $row['region3'];
                        $region4            = $row['region4'];


                       if($region1 != ''){
                           $cityQuery1 = "SELECT * FROM city WHERE id = '$region1'";
                           $cityRun1   = mysqli_query($conn,$cityQuery1);

                           while($rowCity1 = mysqli_fetch_array($cityRun1)){
                             $regi1 = $rowCity1['city_name_eng'];
                           }               
                       }else{
                         $regi1   = '';
                       }  

                       if($region2 != ''){
                           $cityQuery2 = "SELECT * FROM city WHERE id = '$region2'";
                           $cityRun2   = mysqli_query($conn,$cityQuery2);

                           while($rowCity2 = mysqli_fetch_array($cityRun2)){
                             $regi2 = $rowCity2['city_name_eng'];
                           }               
                       }else{
                         $regi2   = '';
                       }  

                       if($region3 != ''){
                           $cityQuery3 = "SELECT * FROM city WHERE id = '$region3'";
                           $cityRun3   = mysqli_query($conn,$cityQuery3);

                           while($rowCity3 = mysqli_fetch_array($cityRun3)){
                             $regi3 = $rowCity3['city_name_eng'];
                           }               
                       }else{
                         $regi3   = '';
                       } 

                       if($region4 != ''){
                           $cityQuery4 = "SELECT * FROM city WHERE id = '$region4'";
                           $cityRun4   = mysqli_query($conn,$cityQuery4);

                           while($rowCity4 = mysqli_fetch_array($cityRun4)){
                             $regi4 = $rowCity4['city_name_eng'];
                           }               
                       }else{
                         $regi4   = '';
                       }   
                        echo  
                           '
                              <a href="tour_in_en.php?'.$id.'">
                                 <div class="col-md-4" id="main_cont_wrapper">
                                    <div class="col-md-12" id="main_cont_box_wrapper">
                                       <div class="col-md-12" id="main_cont_pic_wrapper">
                                          <img src="images/tours/'.$tour_pic1.'" id="main_cont_pic">
                                       </div>
                                       <div class="col-md-12" id="main_cont_title_wrapper">
                                          <h3>'.$tour_name_eng.'</h3>
                                       </div>
                                       <div class="col-md-12" id="main_cont_short_description_wrapper">
                                          <h3>'.$regi1 .' '.$regi2.' '. $regi3 .' '.$regi4.'</h3>
                                       </div>
                                       <div class="col-md-12" id="main_cont_date_and_price_wrapper">
                                          <div class="col-md-8" id="main_cont_date_wrapper">
                                             <h4>'.$datee.'</h4>
                                          </div>
                                          <div class="col-md-4" id="main_cont_price_wrapper">
                                             <h4> From - '.$tour_price.'</h4>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </a>

                           ';
                     }

         ?>


   	
      </div>