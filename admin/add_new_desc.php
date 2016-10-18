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
  <?php 
    include '..//db.php';
    ob_start();
  ?>
  <body>
    <div class="col-md-12" id="header_wrapper">
      <div class="col-md-12" id="main_menu_wrapper">
        <?php include 'admin_main_menu.php';?>
      </div>    
    </div>
    <div class="container">
      <div class="col-md-12" id="admin_personal_wrapper">
          <div class="col-md-12" id="admin_personal_title_wrapper">
            <h4>რეგიონები</h4>
          </div>
          <div class="col-md-12" id="admin_personal_table_wrapper">
            <form action="" method="POST">
              <div class="form-group">
                <label>აირჩიეთ რეგიონი</label>
                <select name="city_id" class="form-control">
                  <?php 
                    $query  = "SELECT id,city_name_geo FROM city";
                    $run    = mysqli_query($conn,$query);
                    while ($row = mysqli_fetch_array($run)){
                      $c_id   = $row['id'];
                      $c_name = $row['city_name_geo'];
                      echo '<option value="'.$c_id.'">'.$c_name.'</option>';
                    }
                  ?>
                </select>
              </div>
              <div class="form-group">
                <label>რეგიონის აღწერილობა (GEO)</label>
                <textarea class="form-control" name="desc_geo" rows="7"></textarea>
              </div>
              <div class="form-group">
                <label>რეგიონის აღწერილობა (RUS)</label>
                <textarea class="form-control" name="desc_rus" rows="7"></textarea>
              </div>
              <div class="form-group">
                <label>რეგიონის აღწერილობა (ENG)</label>
                <textarea class="form-control" name="desc_eng" rows="7"></textarea>
              </div>
              <div class="form-group">
                <label>Wiki GEO</label>
                <input type="url" class="form-control" name="wiki_geo">
              </div>
              <div class="form-group">
                <label>Wiki RUS</label>
                <input type="url" class="form-control" name="wiki_rus">
              </div>
              <div class="form-group">
                <label>Wiki ENG</label>
                <input type="url" class="form-control" name="wiki_eng">
              </div>
              <div class="form-group">
                <input type="submit" name="submit" value="დადასტურება" class="btn btn-default">
              </div>
            </form>
          </div>
      </div>
    </div>
  </body>
</html>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>


<?php

  if(isset($_POST['submit'])){

    $city_id  = $_POST['city_id'];
    $desc_geo = $_POST['desc_geo'];
    $desc_rus = $_POST['desc_rus'];
    $desc_eng = $_POST['desc_eng'];
    $wiki_geo = $_POST['wiki_geo'];
    $wiki_rus = $_POST['wiki_rus'];
    $wiki_eng = $_POST['wiki_eng'];

    $query1   = "INSERT INTO georgia (desc_geo,desc_rus,desc_eng,wiki_geo,wiki_rus,wiki_eng,city_id) VALUES ('$desc_geo','$desc_rus','$desc_eng','$wiki_geo','$wiki_rus','$wiki_eng','$city_id')";
    $run1     = mysqli_query($conn,$query1);

    header('Location: admin_reg_desc.php');

  }