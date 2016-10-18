<?php 
  include '..//db.php'; 
  ob_start();
  date_default_timezone_set("Asia/Tbilisi");
  $datee = date("Y-m-d  H:i:s");
  $datea = date("YmdHis");
  $city_id = $_GET['id'];
  //echo $city_id;
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
        <h2>რეგიონის რედაქტირება</h2>
      </div>
      <div class="col-md-12" id="hd_admin">
  
      </div>
      <?php
        $query = "SELECT * FROM city WHERE id = '$city_id'";
        $run   = mysqli_query($conn,$query);

        while($row = mysqli_fetch_array($run)){
          $city_name_geo = $row['city_name_geo'];
          $city_name_rus = $row['city_name_rus'];
          $city_name_eng = $row['city_name_eng'];
          $desc_geo      = $row['desc_geo'];
          $desc_rus      = $row['desc_rus'];
          $desc_eng      = $row['desc_eng'];
          $wiki_geo      = $row['wiki_geo'];
          $wiki_rus      = $row['wiki_rus'];
          $wiki_eng      = $row['wiki_eng']; 
          $img1          = $row['img1'];
          $img2          = $row['img2'];
          $img3          = $row['img3'];
          $img4          = $row['img4'];
        }
      ?>
      <div class="col-md-12">
        <form action="" method="POST" enctype="multipart/form-data">
          <div class="form-group">
            <label>რეგიონის დასახელება (GEO)</label>
            <input type="text" name="city_name_geo" class="form-control" autocomplete="off" value="<?php echo $city_name_geo;?>">
          </div>
          <div class="form-group">
            <label>რეგიონის დასახელება (RUS)</label>
            <input type="text" name="city_name_rus" class="form-control" autocomplete="off" value="<?php echo $city_name_rus;?>">
          </div>
          <div class="form-group">
            <label>რეგიონის დასახელება (ENG)</label>
            <input type="text" name="city_name_eng" class="form-control" autocomplete="off" value="<?php echo $city_name_eng;?>">
          </div> 
          <div class="form-group">
            <label>რეგიონის აღწერა (GEO)</label>
            <textarea name="desc_geo" class="form-control" rows="6"><?php echo $desc_geo;?></textarea>
          </div>
          <div class="form-group">
            <label>რეგიონის აღწერა (RUS)</label>
            <textarea name="desc_rus" class="form-control" rows="6"><?php echo $desc_rus;?></textarea>
          </div>
          <div class="form-group">
            <label>რეგიონის აღწერა (ENG)</label>
            <textarea name="desc_eng" class="form-control" rows="6"><?php echo $desc_eng;?></textarea>
          </div>
          <div class="form-group">
            <label>Wiki link (GEO)</label>
            <input type="text" name="wiki_geo" class="form-control" autocomplete="off" value="<?php echo $wiki_geo;?>">
          </div>
          <div class="form-group">
            <label>Wiki link (RUS)</label>
            <input type="text" name="wiki_rus" class="form-control" autocomplete="off" value="<?php echo $wiki_rus;?>">
          </div>  
          <div class="form-group">
            <label>Wiki link (ENG)</label>
            <input type="text" name="wiki_eng" class="form-control" autocomplete="off" value="<?php echo $wiki_eng;?>">
          </div>
          <div class="form-group">
            <label>Image Url 1</label>
            <input type="text" name="img1" class="form-control" autocomplete="off" value="<?php echo $img1;?>">
          </div>
          <div class="form-group">
            <label>Image Url 2</label>
            <input type="text" name="img2" class="form-control" autocomplete="off" value="<?php echo $img2;?>">
          </div> 
          <div class="form-group">
            <label>Image Url 3</label>
            <input type="text" name="img3" class="form-control" autocomplete="off" value="<?php echo $img3;?>">
          </div> 
          <div class="form-group">
            <label>Image Url 4</label>
            <input type="text" name="img4" class="form-control" autocomplete="off" value="<?php echo $img4;?>">
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
  $datz =  $datea + 0;
  //echo gettype($datea + 0);


  if(isset($_POST['submit'])){

    $city_name_geo1 = $_POST['city_name_geo'];
    $city_name_rus1 = $_POST['city_name_rus'];
    $city_name_eng1 = $_POST['city_name_eng'];
    $desc_geo1      = $_POST['desc_geo'];
    $desc_rus1      = $_POST['desc_rus'];
    $desc_eng1      = $_POST['desc_eng'];
    $wiki_geo1      = $_POST['wiki_geo'];
    $wiki_rus1      = $_POST['wiki_rus'];
    $wiki_eng1      = $_POST['wiki_eng'];
    $dscigeo        = str_replace ("'", "`", $desc_geo1);
    $dscirus        = str_replace ("'", "`", $desc_rus1);
    $dscieng        = str_replace ("'", "`", $desc_eng1);
    $image1         = $_POST['img1'];
    $image2         = $_POST['img2'];
    $image3         = $_POST['img3'];
    $image4         = $_POST['img4'];

    if(empty($city_name_geo1)){
      echo "<div class='container'><p class='bg-danger' id='warn'>";
        echo 'გთხოვთ შეავსოთ ყველა ველი!';
      echo "</p></div>";
    }else{  
              
      $query1 = "UPDATE city SET city_name_geo = '$city_name_geo1', city_name_rus = '$city_name_rus1', city_name_eng = '$city_name_eng1', desc_geo = '$dscigeo', desc_rus = '$dscirus', desc_eng = '$dscieng', wiki_geo = '$wiki_geo1', wiki_rus = '$wiki_rus1', wiki_eng = '$wiki_eng1', img1 = '$image1',img2 = '$image2', img3 = '$image3', img4 = '$image4' WHERE id = '$city_id'";
      $run1   =  mysqli_query($conn,$query1);
              
      header('Location: admin_georgia.php');

    }
  }

?>