<!DOCTYPE html>
<html lang="ge">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>TourIN.GE</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
  </head>
  <body>
    <div class="col-md-12" id="header_wrapper">
      <div class="col-md-12" id="main_menu_wrapper">
        <?php include 'main_menu_en.php';?>
      </div>    
    </div>
    <div class="col-md-12" id="middle_wrapper">
<?php 
   include 'db.php'; 
   require "phpmailer/class.phpmailer.php";
   ob_start();
   date_default_timezone_set("Asia/Tbilisi");
   //$datee    = date("Y-m-d  H:i:s");   

   $city_id         = $_GET['city'];
   $tour_genre_id   = $_GET['tour_genre'];
   $dateFrom        = $_GET['dateFrom'];
   $dateTo          = $_GET['dateTo'];
   $adultNumber     = $_GET['adultNumber'];
   $childNumber     = $_GET['childNumber'];
   $datee           = $_GET['datee'];

?>

      <div class="col-md-12" id="personal_booking_wrapper">
         <div class="container">
             <div class="col-md-12" id="boking_title_wrapper">
               <h3>The Tour you have requested is booked!</h3>
             </div>
             <div class="col-md-12" id="boking_title_wrapper">
               <h4>Our operator will contact you!</h4>
             </div>
            <div class="col-md-12">
               <h4>Tour details:</h4>
            </div>
            <div class="col-md-12" id="bookkng_date_wrapper">
               Request date: <span id="tour_in_price_span"><?php echo $datee;?></span>
            </div>
            <div class="col-md-12">
               <table class="table table-bordered">
                  <tr>
                     <td>Location</td>
                     <td>Type of Tour</td>
                     <td>Date From</td>
                     <td>Date To</td>               
                     <td>Adults</td>
                     <td>Childs</td>
                  </tr>
                  <tr>
                     <td>
                        <?php

                           $query = "SELECT * FROM city WHERE id = '$city_id'";
                           $run   = mysqli_query($conn,$query);

                           while($row = mysqli_fetch_array($run)){
                              $city_name_eng = $row['city_name_eng'];
                              echo $city_name_eng;
                           } 

                         ?>
                     </td>
                     <td>
                        <?php
                        
                           $query2 = "SELECT * FROM tour_genres WHERE id = '$tour_genre_id'";
                           $run2   = mysqli_query($conn,$query2);

                           while($row2 = mysqli_fetch_array($run2)){
                              $genre_name_eng = $row2['genre_name_eng'];
                              echo $genre_name_eng;
                           } 

                         ?>
                     </td>
                     <td><?php echo $dateFrom;?></td>
                     <td><?php echo $dateTo;?></td>
                     <td><?php echo $adultNumber;?></td>
                     <td><?php echo $childNumber;?></td>
                  </tr>
               </table>
            </div>
               <div  class="col-md-12">
                  <h4>For more information please contact us:</h4>
                </div>
                <div class="col-md-6" id="booking_contact_wrapper">
                  <h4><a href="tel:+995599344488"><i class="fa fa-mobile" aria-hidden="true"></i> +(995) 599 - 34 - 44 - 88 </a> </h4>
                </div> 
                <div class="col-md-6" id="booking_contact_wrapper">
                  <h4><a href="mailto:info@tourin.ge" target="_top"><i class="fa fa-envelope-o" aria-hidden="true"></i> info@tourin.ge</a></h4>
                </div>
               </div>
         <div class="container">
           <div class="col-md-12">
             <?php include 'suggested_en.php';?>
           </div>
         </div>
      </div>
    </div>
    <div class="col-md-12" id="footer_wrapper">
      <?php include 'footer.php';?>
    </div>
  </body>
</html>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>


  