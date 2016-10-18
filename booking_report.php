<?php 
  include 'db.php'; 
  require "phpmailer/class.phpmailer.php";
  ob_start();
  date_default_timezone_set("Asia/Tbilisi");
  $datee    = date("Y-m-d  H:i:s");
  $tour_id = $_GET['id'];
?>


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
        <?php include 'main_menu.php';?>
      </div>    
    </div>
    <div class="col-md-12" id="middle_wrapper">
      <div class="container">
        <div class="col-md-12" id="booking_tour_main_wrapper">
          <div class="col-md-12" id="boking_title_wrapper">
            <h3>თქვენ მიერ მოთხოვნილი ტური დაჯავშნილია!</h3>
          </div>
          <div class="col-md-12" id="boking_title_wrapper">
            <h4>ჩვენი ოპერატორი მალე დაგიკავშირდებათ!</h4>
          </div>
          <div class="col-md-12">
            <?php
                $query = "SELECT a.fname, a.lname,a.p_id,a.email,a.tel,a.humans_count,a.datee, b.tour_name_geo ,b.tour_location_geo, b.tour_price, b.tour_valute, a.tour_date FROM `booking` a JOIN tours b ON a.tour_id = b.id  
                WHERE a.id = '$tour_id' ";
                $run   = mysqli_query($conn,$query);

                while($row = mysqli_fetch_array($run)){
                  $fname              = $row[0];
                  $lname              = $row[1];
                  $p_id               = $row[2];
                  $email              = $row[3];
                  $tel                = $row[4];
                  $humans_count       = $row[5];
                  $datee              = $row[6];
                  $tour_name_geo      = $row[7];
                  $tour_location_geo  = $row[8];
                  $tour_price         = $row[9];
                  $tour_valute        = $row[10];
                  $tour_date          = $row[11];
                  
                  echo '
                    <div class="col-md-12">
                      <h4>ტურის დეტალები:</h4>
                    </div>
                    <div class="col-md-5" id="bookkng_date_wrapper">
                      მოთხოვნის თარიღი: <span id="tour_in_price_span">'.$datee.'</span>
                    </div>
                    <div class="col-md-7" id="bookkng_date_wrapper">
                      ტურის ღირებულება : <span id="tour_in_price_span">'.$tour_price.'</span>
                    </div>
                    <div class="col-md-12">
                      <table class="table table-hovered">
                        <tr>
                          <td>სახელი</td>
                          <td><span id="booking_span">'.$fname.'</span></td>
                          <td>გვარი</td>
                          <td><span id="booking_span">'.$lname.'</span></td>
                        </tr>
                        <tr>
                          <td>ტურის თარიღი</td>
                          <td><span id="booking_span">'.$tour_date.'</span></td> 
                          <td>ტელეფონის ნომერი</td>
                          <td><span id="booking_span">'.$tel.'</span></td>
                        </tr>
                        <tr>
                          <td>ელ-ფოსტა</td>
                          <td><span id="booking_span">'.$email.'</span></td>
                          <td>ადამიანების რაოდენობა</td>
                          <td><span id="booking_span">'.$humans_count.'</span></td>
                        </tr>
                      </table>
                    </div>
                  ';
                }

            ?>
          </div>
          <div  class="col-md-12">
            <h4>დამატებითი ინფორმაციისთვის გთხოვთ დაგვიკავშირდეთ:</h4>
          </div>
          <div class="col-md-6" id="booking_contact_wrapper">
            <h4><a href="tel:+995599344488"><i class="fa fa-mobile" aria-hidden="true"></i> +(995) 599 - 34 - 44 - 88 </a> </h4>
          </div> 
          <div class="col-md-6" id="booking_contact_wrapper">
            <h4><a href="mailto:info@tourin.ge" target="_top"><i class="fa fa-envelope-o" aria-hidden="true"></i> info@tourin.ge</a></h4>
          </div>  
        </div>
      </div>
      <div class="container">
        <div class="col-md-12">
          <?php include 'suggested.php';?>
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