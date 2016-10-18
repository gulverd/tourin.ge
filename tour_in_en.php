<?php 
  include 'db.php'; 
  ob_start();
  date_default_timezone_set("Asia/Tbilisi");
  $datee    = date("Y-m-d  H:i:s");
  $url      = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; 
  $parse    = parse_url($url, PHP_URL_QUERY);
  $tour_id = substr($parse,0);
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
        <?php include 'main_menu_en.php';?>
      </div>    
    </div>
    <div class="col-md-12" id="middle_wrapper">
      <div class="container">
        <?php

            $query1 = "SELECT * FROM contact";
            $run1   = mysqli_query($conn,$query1);

            while($row1 = mysqli_fetch_array($run1)){
              $tel    = $row1['tel'];
              $email  = $row1['email'];
            }

            $query = "SELECT * FROM tours WHERE id = '$tour_id'";
            $run   = mysqli_query($conn,$query);

            while($row = mysqli_fetch_array($run)){
              $id                 = $row['id'];
              $tour_name_eng      = $row['tour_name_eng'];
              $tour_desc_eng      = $row['tour_desc_eng'];
              $tour_length        = $row['tour_length'];
             // $tour_location_eng  = $row['tour_location_eng'];
              $tour_price         = $row['tour_price'];
              $tour_valute        = $row['tour_valute'];
              $tour_pic1          = $row['tour_pic1'];
              //$tour_date          = $row['tour_date'];
              $datea              = $row['datee'];
              $region1            = $row['region1'];
              $region2            = $row['region2'];
              $region3            = $row['region3'];
              $region4            = $row['region4'];


              if($region1 != ''){
                  $cityQuery1 = "SELECT * FROM city WHERE id = '$region1'";
                  $cityRun1   = mysqli_query($conn,$cityQuery1);

                  while($rowCity1 = mysqli_fetch_array($cityRun1)){
                    $reg1 = '<div class="col-md-12" id="tour_right_pannels">
                              <h4><span id="tourin_price"><i class="fa fa-map-marker" aria-hidden="true"></i> '.$rowCity1['city_name_eng'].'</span></h4>
                            </div>';
                    $reg1Desc = $rowCity1['desc_eng'];
                    $reg1Wiki = $rowCity1['wiki_eng'];
                    $regImg1  = $rowCity1['img1'];
                    
                    $regImg1A  = $rowCity1['img1'];
                    $regImg1B  = $rowCity1['img2'];
                    $regImg1C  = $rowCity1['img3'];
                    $regImg1D  = $rowCity1['img4'];

                     $cont1 = '
                                  <div class="col-md-12" id="tour_in_carousel_wrapper">  

                                    <div id="carousel-example-generic1" class="carousel slide" data-ride="carousel">
                                      <!-- Indicators -->
                                      <ol class="carousel-indicators">
                                        <li data-target="#carousel-example-generic1" data-slide-to="0" class="active"></li>
                                        <li data-target="#carousel-example-generic1" data-slide-to="1"></li>
                                        <li data-target="#carousel-example-generic1" data-slide-to="2"></li>
                                        <li data-target="#carousel-example-generic1" data-slide-to="3"></li>
                                      </ol>

                                      <!-- Wrapper for slides -->
                                      <div class="carousel-inner" role="listbox">
                                        <div class="item active">
                                          <img src="'.$regImg1A.'" id="img_inside_region">
                                        </div>
                                        <div class="item">
                                          <img src="'.$regImg1B.'" id="img_inside_region">
                                        </div>
                                        <div class="item">
                                          <img src="'.$regImg1C.'" id="img_inside_region">
                                        </div>
                                        <div class="item">
                                          <img src="'.$regImg1D.'" id="img_inside_region">
                                        </div>
                                      </div>
                                      <!-- Controls -->
                                      <a class="left carousel-control" href="#carousel-example-generic1" role="button" data-slide="prev">
                                        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                                        <span class="sr-only">Previous</span>
                                      </a>
                                      <a class="right carousel-control" href="#carousel-example-generic1" role="button" data-slide="next">
                                        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                                        <span class="sr-only">Next</span>
                                      </a>

                                    </div>
                                </div>

                              <div class="col-md-12" id="route_tour_in">
                                '.nl2br($reg1Desc).'
                              </div>
                              <div class="col-md-12" id="wiki_link_wrapper">
                                  <a href="'.$reg1Wiki.'" target="_blank"  class="btn btn-primary">Wikipedia link</a>
                              </div>';
                  }               
              }else{
                $reg1   = '';
                $cont1  = '';
              }  
              if($region2 != ''){
                $cityQuery2 = "SELECT * FROM city WHERE id = '$region2'";
                $cityRun2   = mysqli_query($conn,$cityQuery2);

                while($rowCity2 = mysqli_fetch_array($cityRun2)){
                  $reg2 = '<div class="col-md-12" id="tour_right_pannels">
                            <h4><span id="tourin_price"><i class="fa fa-map-marker" aria-hidden="true"></i> '.$rowCity2['city_name_eng'].'</span></h4>
                          </div>';
                  $reg2Desc = $rowCity2['desc_eng'];
                  $reg2Wiki = $rowCity2['wiki_eng'];
                  $regImg2  = $rowCity2['img1'];
                    
                  $regImg2A  = $rowCity2['img1'];
                  $regImg2B  = $rowCity2['img2'];
                  $regImg2C  = $rowCity2['img3'];
                  $regImg2D  = $rowCity2['img4'];
                    
                  $cont2 = '
                                  <div class="col-md-12" id="tour_in_carousel_wrapper">  

                                    <div id="carousel-example-generic2" class="carousel slide" data-ride="carousel">
                                      <!-- Indicators -->
                                      <ol class="carousel-indicators">
                                        <li data-target="#carousel-example-generic2" data-slide-to="0" class="active"></li>
                                        <li data-target="#carousel-example-generic2" data-slide-to="1"></li>
                                        <li data-target="#carousel-example-generic2" data-slide-to="2"></li>
                                        <li data-target="#carousel-example-generic2" data-slide-to="3"></li>
                                      </ol>

                                      <!-- Wrapper for slides -->
                                      <div class="carousel-inner" role="listbox">
                                        <div class="item active">
                                          <img src="'.$regImg2A.'" id="img_inside_region">
                                        </div>
                                        <div class="item">
                                          <img src="'.$regImg2B.'" id="img_inside_region">
                                        </div>
                                        <div class="item">
                                          <img src="'.$regImg2C.'" id="img_inside_region">
                                        </div>
                                        <div class="item">
                                          <img src="'.$regImg2D.'" id="img_inside_region">
                                        </div>
                                      </div>
                                                                            <!-- Controls -->
                                      <a class="left carousel-control" href="#carousel-example-generic2" role="button" data-slide="prev">
                                        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                                        <span class="sr-only">Previous</span>
                                      </a>
                                      <a class="right carousel-control" href="#carousel-example-generic2" role="button" data-slide="next">
                                        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                                        <span class="sr-only">Next</span>
                                      </a>

                                    </div>
                                </div>
                            <div class="col-md-12" id="route_tour_in">
                              '.nl2br($reg2Desc).'
                            </div>
                            <div class="col-md-12" id="wiki_link_wrapper">
                              <a href="'.$reg2Wiki.'" target="_blank"  class="btn btn-primary">Wikipedia link</a>
                            </div>';
                }
              }else{
                $reg2  = '';
                $cont2 = '';
              }  
              if($region3 != ''){
                $cityQuery3 = "SELECT * FROM city WHERE id = '$region3'";
                $cityRun3   = mysqli_query($conn,$cityQuery3);

                while($rowCity3 = mysqli_fetch_array($cityRun3)){
                  $reg3 = '<div class="col-md-12" id="tour_right_pannels">
                            <h4><span id="tourin_price"><i class="fa fa-map-marker" aria-hidden="true"></i> '.$rowCity3['city_name_eng'].'</span></h4>
                          </div>';
                  $reg3Desc = $rowCity3['desc_eng'];
                  $reg3Wiki = $rowCity3['wiki_eng'];
                  $regImg3  = $rowCity3['img1'];
                  $regImg3A   = $rowCity3['img1'];
                  $regImg3B   = $rowCity3['img2'];
                  $regImg3C   = $rowCity3['img3'];
                  $regImg3D   = $rowCity3['img4'];
  
                  $cont3 = '
                                  <div class="col-md-12" id="tour_in_carousel_wrapper">  

                                    <div id="carousel-example-generic3" class="carousel slide" data-ride="carousel">
                                      <!-- Indicators -->
                                      <ol class="carousel-indicators">
                                        <li data-target="#carousel-example-generic3" data-slide-to="0" class="active"></li>
                                        <li data-target="#carousel-example-generic3" data-slide-to="1"></li>
                                        <li data-target="#carousel-example-generic3" data-slide-to="2"></li>
                                        <li data-target="#carousel-example-generic3" data-slide-to="3"></li>
                                      </ol>

                                      <!-- Wrapper for slides -->
                                      <div class="carousel-inner" role="listbox">
                                        <div class="item active">
                                          <img src="'.$regImg3A.'" id="img_inside_region">
                                        </div>
                                        <div class="item">
                                          <img src="'.$regImg3B.'" id="img_inside_region">
                                        </div>
                                        <div class="item">
                                          <img src="'.$regImg3C.'" id="img_inside_region">
                                        </div>
                                        <div class="item">
                                          <img src="'.$regImg3D.'" id="img_inside_region">
                                        </div>
                                      </div>
                                                                            <!-- Controls -->
                                      <a class="left carousel-control" href="#carousel-example-generic3" role="button" data-slide="prev">
                                        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                                        <span class="sr-only">Previous</span>
                                      </a>
                                      <a class="right carousel-control" href="#carousel-example-generic3" role="button" data-slide="next">
                                        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                                        <span class="sr-only">Next</span>
                                      </a>

                                    </div>
                                </div>
                           <div class="col-md-12" id="route_tour_in">
                              '.nl2br($reg3Desc).'
                           </div>
                           <div class="col-md-12" id="wiki_link_wrapper">
                              <a href="'.$reg3Wiki.'" target="_blank"  class="btn btn-primary">Wikipedia link</a>
                           </div>';

                }
              }else{
                $reg3 = '';
                $cont3 = '';
              }  
              if($region4 != ''){
                $cityQuery4 = "SELECT * FROM city WHERE id = '$region4'";
                $cityRun4   = mysqli_query($conn,$cityQuery4);

                while($rowCity4 = mysqli_fetch_array($cityRun4)){
                  $reg4 = '<div class="col-md-12" id="tour_right_pannels">
                              <h4><span id="tourin_price"><i class="fa fa-map-marker" aria-hidden="true"></i> '.$rowCity4['city_name_eng'].'</span></h4>
                           </div>';
                  $reg4Desc = $rowCity4['desc_eng'];
                  $reg4Wiki = $rowCity4['wiki_eng'];
                  $regImg4A   = $rowCity4['img1'];
                  $regImg4B   = $rowCity4['img2'];
                  $regImg4C   = $rowCity4['img3'];
                  $regImg4D   = $rowCity4['img4'];
                  
                  $cont4 = '
                                  <div class="col-md-12" id="tour_in_carousel_wrapper">  

                                    <div id="carousel-example-generic4" class="carousel slide" data-ride="carousel">
                                      <!-- Indicators -->
                                      <ol class="carousel-indicators">
                                        <li data-target="#carousel-example-generic4" data-slide-to="0" class="active"></li>
                                        <li data-target="#carousel-example-generic4" data-slide-to="1"></li>
                                        <li data-target="#carousel-example-generic4" data-slide-to="2"></li>
                                        <li data-target="#carousel-example-generic4" data-slide-to="3"></li>
                                      </ol>

                                      <!-- Wrapper for slides -->
                                      <div class="carousel-inner" role="listbox">
                                        <div class="item active">
                                          <img src="'.$regImg4A.'" id="img_inside_region">
                                        </div>
                                        <div class="item">
                                          <img src="'.$regImg4B.'" id="img_inside_region">
                                        </div>
                                        <div class="item">
                                          <img src="'.$regImg4C.'" id="img_inside_region">
                                        </div>
                                        <div class="item">
                                          <img src="'.$regImg4D.'" id="img_inside_region">
                                        </div>
                                      </div>
                                                                            <!-- Controls -->
                                      <a class="left carousel-control" href="#carousel-example-generic4" role="button" data-slide="prev">
                                        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                                        <span class="sr-only">Previous</span>
                                      </a>
                                      <a class="right carousel-control" href="#carousel-example-generic4" role="button" data-slide="next">
                                        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                                        <span class="sr-only">Next</span>
                                      </a>

                                    </div>
                                </div>                            
                           <div class="col-md-12" id="route_tour_in">
                              '.nl2br($reg4Desc).'
                           </div>
                           <div class="col-md-12" id="wiki_link_wrapper">
                              <a href="'.$reg4Wiki.'" target="_blank"  class="btn btn-primary">Wikipedia link</a>
                           </div>';

                }
              }else{
                $reg4 = '';
                $cont4 = '';
              }


              echo 
              '
                <div class="col-md-12" id="inside_tour_main_wrapper">
                  <div class="col-md-12" id="inside_tour_name_wrapper">
                    <h3>'.$tour_name_eng.'</h3>
                  </div>
                  <div class="col-md-8">
                    <div class="col-md-12" id="inside_tour_left_wrapper">
                      <div class="col-md-12">
                        <img src="images/tours/'.$tour_pic1.'" id="tour_in_main">
                      </div>

                    <div class="col-md-12" id="tour_in_description">
                        <ul class="nav nav-tabs" role="tablist" id="tabi">
                          <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Routes</a></li>
                          <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">About the region</a></li>
                        </ul>

                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane active" id="home">
                              <div class="col-md-12" id="route_tour_in">
                                '.nl2br($tour_desc_eng).'
                              </div>
                            </div>
                            <div role="tabpanel" class="tab-pane" id="profile">

                                '.$cont1.'
                                '.$cont2.'
                                '.$cont3.'
                                '.$cont4.'

                            </div>
                        </div>
                      </div>


                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="col-md-12" id="inside_tour_right_wrapper">
                      '.$reg1.'
                      '.$reg2.'
                      '.$reg3.'
                      '.$reg4.'
                      <div class="col-md-5" id="tour_right_pannels">
                        <h4><i class="fa fa-calendar" aria-hidden="true"></i>  '.substr($datea,0,10).'</h4>
                      </div>
                      <div class="col-md-6" id="tour_right_pannels">
                        <h4><i class="fa fa-calendar-o" aria-hidden="true"></i>  Number of days:'.$tour_length.' </h4>
                      </div>
                      <div class="col-md-12" id="tour_right_pannels">
                        <h4><span id="tourin_price"><i class="fa fa-money" aria-hidden="true"></i> <span id="tour_in_price_span"> From - '.$tour_price.'</span></span></h4>
                      </div>
                      <div class="col-md-12" id="tour_right_button_wrapper">
                        <a href="booking_tour_en.php?id='.$tour_id.'"><button type="button" class="btn btn-success" id="tour_in_book_button">Booking</button></a>
                      </div>
                      <div class="col-md-12" id="tour_right_contact_wrapper">
                        <div class="col-md-12" id="tour_right_contact_title_wrapper">
                          <h4>Contact Us:</h4>
                        </div>
                        <div class="col-md-12" id="tour_right_contact_pannels_wrapper">
                            <a href="tel:'.$tel.'"><i class="fa fa-mobile" aria-hidden="true"></i> <span id="tour_right_contact_pannels_span_mobile">'.substr($tel, 4,3).'-'.substr($tel,7,2).'-'.substr($tel, 9,2).'-'.substr($tel, 11,2).'</span></a> 
                        </div>
                        <div class="col-md-12" id="tour_right_contact_pannels_wrapper">
                          <a href="mailto:'.$email.'" target="_top"><i class="fa fa-envelope-o" aria-hidden="true"></i> <span id="tour_right_contact_pannels_span_mail">'.$email.'<span> </a>
                        </div>                        
                      </div>
                    </div>
                  </div>
                </div>
              ';
            }
        ?>
        
      </div>
      <div class="container">
        <div class="col-md-12">
          <?php include 'suggested_en.php';?>
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

<?php 