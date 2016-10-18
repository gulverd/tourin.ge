<?php 
  include '..//db.php'; 
  ob_start();
  date_default_timezone_set("Asia/Tbilisi");
  $datee    = date("Y-m-d  H:i:s");
  $url      = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; 
  $parse    = parse_url($url, PHP_URL_QUERY);
  $event_id = substr($parse,0);
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
        <h2>ღონისძიებები საქართველოში</h2>
      </div>
      <div class="col-md-12" id="hd_admin">
        <h4>სიახლეების შესაცვლელად დააწექით ღილაკს <span class="glyphicon glyphicon-edit"></span>, წასაშლელად - <span class="glyphicon glyphicon-trash"></span>  ან  <a href="add_new_event.php">დაამატეთ ახალი სიახლე</a></h4>
      </div>
      <?php
            $query = "SELECT * FROM events WHERE id = '$event_id'";
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
            }


      ?>
      <div class="col-md-12">
        <form action="" method="POST" enctype="multipart/form-data">
          <div class="form-group">
            <label>დასახელება (GEO)</label>
            <input type="text" name="title_geo" class="form-control" placeholder="მაგ: რობი უილიამსი" autocomplete="off" value="<?php echo $title_geo;?>">
          </div>
          <div class="form-group">
            <label>დასახელება (RUS)</label>
            <input type="text" name="title_rus" class="form-control" placeholder="მაგ: Робби Уильямс" autocomplete="off" value="<?php echo $title_rus;?>">
          </div>
          <div class="form-group">
            <label>დასახელება (ENG)</label>
            <input type="text" name="title_eng" class="form-control" placeholder="მაგ: Robbie Williams" autocomplete="off" value="<?php echo $title_eng;?>">
          </div>
          <div class="form-group">
            <label>ღონისძიების ქალაქის დასახელება (GEO)</label>
            <input type="text" name="city_geo" class="form-control" placeholder="მაგ: თბილისი" autocomplete="off" value="<?php echo $city_geo;?>">
          </div>
          <div class="form-group">
            <label>ღონისძიების ქალაქის დასახელება (RUS)</label>
            <input type="text" name="city_rus" class="form-control" placeholder="მაგ: Тбилиси" autocomplete="off" value="<?php echo $city_rus;?>">
          </div>
          <div class="form-group">
            <label>ღონისძიების ქალაქის დასახელება (ENG)</label>
            <input type="text" name="city_eng" class="form-control" placeholder="მაგ: Tbilisi" autocomplete="off" value="<?php echo $city_eng;?>">
          </div>
          <div class="form-group">
            <label>ღონისძიების ადგილმდებარეობა (GEO)</label>
            <input type="text" name="location_geo" class="form-control" placeholder="მაგ: დინამო არენა" autocomplete="off" value="<?php echo $location_geo;?>">
          </div>
          <div class="form-group">
            <label>ღონისძიების ადგილმდებარეობა (RUS)</label>
            <input type="text" name="location_rus" class="form-control" placeholder="მაგ: Динамо-Арена" autocomplete="off" value="<?php echo $location_rus;?>">
          </div>
          <div class="form-group">
            <label>ღონისძიების ადგილმდებარეობა (ENG)</label>
            <input type="text" name="location_eng" class="form-control" placeholder="მაგ: Dinamo Arena" autocomplete="off" value="<?php echo $location_eng;?>">
          </div>
          <div class="form-group">
            <label>ღონისძიების თარიღი</label>
            <input type="date" name="event_date" class="form-control" autocomplete="off" value="<?php echo $event_date;?>">
          </div>
          <div class="form-group">
            <label for="exampleInputFile">ატვირთეთ ღონისძიების სურათი</label>
            <input type="file" class="form-control" id="exampleInputEmail1" name="image" autocomplete="off" value="">
          </div>
          <button type="submit" name="submit" class="btn btn-default">დადასტურება</button>
        </form>
      </div>
    </div>
  </body>
</html>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>

<?php 
  if(isset($_POST['submit'])){

    $title_geo1    = $_POST['title_geo'];
    $title_rus1    = $_POST['title_rus'];
    $title_eng1    = $_POST['title_eng'];
    $city_geo1     = $_POST['city_geo'];
    $city_rus1     = $_POST['city_rus'];
    $city_eng1     = $_POST['city_eng'];
    $location_geo1 = $_POST['location_geo'];
    $location_rus1 = $_POST['location_rus'];
    $location_eng1 = $_POST['location_eng'];
    $event_date1   = $_POST['event_date'];

    if(empty($title_geo)){
      echo "<div class='container'><p class='bg-danger' id='warn'>";
        echo 'გთხოვთ შეავსოთ ყველა ველი!';
      echo "</p></div>";
    }else{  
      if(isset($_FILES['image'])){
          $errors= array();
          $file_name = $_FILES['image']['name'];
          $file_size = $_FILES['image']['size'];
          $file_tmp  = $_FILES['image']['tmp_name'];
          $file_type = $_FILES['image']['type'];   
          $file_ext  = strtolower(end(explode('.',$_FILES['image']['name'])));
          $extensions = array("jpeg","jpg","png");                   
          if(empty($errors)==true){
              move_uploaded_file($file_tmp,"..//img/".$file_name);
              
            $query1 = "UPDATE events SET title_geo = '$title_geo1',title_rus = '$title_rus1',title_eng = '$title_eng1',city_geo = '$city_geo1',city_rus = '$city_rus1',city_eng = '$city_eng1',location_geo = '$location_geo1',location_rus = '$location_rus1',location_eng = '$location_eng1',event_date = '$event_date1',image = '$file_name', datee = '$datee' WHERE id = '$event_id'";
              $run1   =  mysqli_query($conn,$query1);
              
              header('Location: admin_events.php');

          }else{
              print_r($errors);
          }
      }
    }

    echo $title_geo;
  }
?>