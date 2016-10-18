<?php 
  include '..//db.php'; 
  ob_start();
  date_default_timezone_set("Asia/Tbilisi");
  $datee = date("Y-m-d  H:i:s");
  $datea = date("YmdHis");
?>

<!DOCTYPE html>
<html lang="ge">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>TourIN.GE</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="..//style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
  </head>
  <body>
    <div class="col-md-12" id="header_wrapper">
      <div class="col-md-12" id="main_menu_wrapper">
        <?php include 'admin_main_menu.php';?>
      </div>    
    </div>
    <div class="container" id="main_contia_wrappers">
      <div class="col-md-12" id="middle_content_header">
        <h2>სხვადასხვა ტურები</h2>
      </div>
      <div class="col-md-12" id="hd_admin">
        <h4>სიახლეების შესაცვლელად დააწექით ღილაკს <span class="glyphicon glyphicon-edit"></span>, წასაშლელად - <span class="glyphicon glyphicon-trash"></span>  ან  <a href="add_new_other_tour.php">დაამატეთ ახალი სიახლე</a></h4>
      </div>
      <div class="col-md-12">
      	      <div class="col-md-12">
        <table class="table table-striped">
          <tr id="table_adm">
            <td id="tbl_40px">
              <span class="glyphicon glyphicon-edit"></span>
            </td>
            <td id="tbl_40px">
              <span class="glyphicon glyphicon-trash"></span>
            </td>
            <td>
              ტურის დასახელება
            </td>
            <td>
              ადგილმდებარეობა
            </td>
            <td>
              მთავარი სურათი
            </td>
            <td>
              GEO
            </td>
            <td>
              ENG
            </td>
            <td>
              RUS
            </td>
            <td>
              დამატების თარიღი
            </td>
          </tr>
                <?php

                    include '..//db.php';

                    $query = "SELECT a.id as id, a.name_geo as name_geo, a.name_rus as name_rus, a.name_eng as name_eng, a.img_url as img_url, a.city_id as city_id , a.datee as datee,b.city_name_geo as city_geo 
                    FROM other_tours a 
                    JOIN city b ON a.city_id = b.id";
                    $run   = mysqli_query($conn,$query);

                    while($row = mysqli_fetch_array($run)){
                        $id                 = $row['id'];
                       	$name_geo 			= $row['name_geo'];
                       	$name_rus 			= $row['name_rus'];
                       	$name_eng 			= $row['name_eng'];
                       	$tour_pic1 			= $row['img_url'];
                        $datee              = $row['datee'];
                        $city_id  			= $row['city_id'];
                        $tour_location_geo  = $row['city_geo'];


                      if($name_geo != ''){
                        $geo = '<span class="glyphicon glyphicon-plus" id="plus"></span>';
                      }else{
                        $geo = '<span class="glyphicon glyphicon-minus" id="minus"></span>';
                      }
                      if($name_rus != ''){
                        $rus = '<span class="glyphicon glyphicon-plus" id="plus"></span>';
                      }else{
                        $rus = '<span class="glyphicon glyphicon-minus" id="minus"></span>';
                      }
                      if($name_eng != ''){
                        $eng = '<span class="glyphicon glyphicon-plus" id="plus"></span>';
                      }else{
                        $eng = '<span class="glyphicon glyphicon-minus" id="minus"></span>';
                      }
                      if($tour_pic1 != ''){
                        $pic = '<span class="glyphicon glyphicon-plus" id="plus"></span>';
                      }else{
                        $pic = '<span class="glyphicon glyphicon-minus" id="minus"></span>';
                      }

                      echo '<tr id="table_adm">
                            <td id="edit">
                              <a href="edit_other_tour.php?'.$id.'"><span class="glyphicon glyphicon-edit"></span></a>
                            </td>
                            <td id="tbl_40px">
                              <a href="delete_other_tour.php?'.$id.'"><span class="glyphicon glyphicon-trash"></span></a>
                            </td>
                            <td>';
                              echo  $name_geo;
                      echo    '</td>
                            <td>
                              '. $tour_location_geo.'
                            </td>
                            <td>'
                              .$pic.
                            '</td>
                            <td>'
                              .$geo.
                            '</td>
                            <td>'
                              .$eng.
                            '</td>
                            <td>'
                              .$rus.
                            '</td>
                            <td>';
                              echo $datee;      
                      echo    '</td>
                          </tr>';
                    }
                  ?>
        </table>
      </div>
      </div>
    </div>
  </body>
</html>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>

