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
        <h2>გამოცხადებული ტურები</h2>
      </div>
      <div class="col-md-12" id="hd_admin">
        <h4>სიახლეების შესაცვლელად დააწექით ღილაკს <span class="glyphicon glyphicon-edit"></span>, წასაშლელად - <span class="glyphicon glyphicon-trash"></span>  ან  <a href="add_new_tour.php">დაამატეთ ახალი სიახლე</a></h4>
      </div>
      <div class="col-md-12">
        <form action="" method="POST" enctype="multipart/form-data">
          <div class="form-group">
            <label>აირჩიეთ ადგილმდებარეობა 1</label>
            <select name="region1">
            <option></option>
              <?php
                $query2 = "SELECT id, city_name_geo FROM city";
                $run2   = mysqli_query($conn,$query2);

                while($row2 = mysqli_fetch_array($run2)){
                  $cityID    = $row2['id'];
                  $city_name = $row2['city_name_geo'];
                  echo '<option value="'.$cityID.'">'.$city_name.'</option>';
                }
              ?>
            </select>
          </div>
          <div class="form-group">
            <label>აირჩიეთ ადგილმდებარეობა 2</label>
            <select name="region2">
            <option></option>
              <?php
                $query2 = "SELECT id, city_name_geo FROM city";
                $run2   = mysqli_query($conn,$query2);

                while($row2 = mysqli_fetch_array($run2)){
                  $cityID    = $row2['id'];
                  $city_name = $row2['city_name_geo'];
                  echo '<option value="'.$cityID.'">'.$city_name.'</option>';
                }
              ?>
            </select>
          </div>
          <div class="form-group">           
            <label>აირჩიეთ ადგილმდებარეობა 3</label>
            <select name="region3">
              <option></option>
              <?php
                $query2 = "SELECT id, city_name_geo FROM city";
                $run2   = mysqli_query($conn,$query2);

                while($row2 = mysqli_fetch_array($run2)){
                  $cityID    = $row2['id'];
                  $city_name = $row2['city_name_geo'];
                  echo '<option value="'.$cityID.'">'.$city_name.'</option>';
                }
              ?>
            </select>
          </div>
          <div class="form-group">
            <label>აირჩიეთ ადგილმდებარეობა 4</label>
            <select name="region4">
              <option></option>
              <?php
                $query2 = "SELECT id, city_name_geo FROM city";
                $run2   = mysqli_query($conn,$query2);

                while($row2 = mysqli_fetch_array($run2)){
                  $cityID    = $row2['id'];
                  $city_name = $row2['city_name_geo'];
                  echo '<option value="'.$cityID.'">'.$city_name.'</option>';
                }
              ?>
            </select>
          </div>
          <div class="form-group">
            <label>დასახელება (GEO)</label>
            <input type="text" name="tour_name_geo" class="form-control" placeholder="მაგ: თბილისის ტური" autocomplete="off">
          </div>
          <div class="form-group">
            <label>დასახელება (RUS)</label>
            <input type="text" name="tour_name_rus" class="form-control" placeholder="მაგ: Тбилиси Тур" autocomplete="off">
          </div>
          <div class="form-group">
            <label>დასახელება (ENG)</label>
            <input type="text" name="tour_name_eng" class="form-control" placeholder="მაგ: Tbilisi Tour" autocomplete="off">
          </div>
          <div class="form-group">
            <label>ტურის აღწერა (GEO)</label>
            <textarea class="form-control" rows="10" name="tour_desc_geo"></textarea>            
          </div>
          <div class="form-group">
            <label>ტურის აღწერა (RUS)</label>
            <textarea class="form-control" rows="10" name="tour_desc_rus"></textarea>            
          </div>
          <div class="form-group">
            <label>ტურის აღწერა (ENG)</label>
            <textarea class="form-control" rows="10" name="tour_desc_eng"></textarea>            
          </div>
          <div class="form-group">
            <label>ტურის აღწერა (ENG)</label>
            <textarea class="form-control" rows="10" name="tour_desc_eng"></textarea>            
          </div>
          <div class="form-group">
            <label>ტურის შესახებ (GEO)</label>
            <textarea class="form-control" rows="7" name="about_tour_geo"></textarea>
          </div>
          <div class="form-group">
            <label>ტურის შესახებ (RUS)</label>
            <textarea class="form-control" rows="7" name="about_tour_rus"></textarea>
          </div>
          <div class="form-group">
            <label>ტურის შესახებ (ENG)</label>
            <textarea class="form-control" rows="7" name="about_tour_eng"></textarea>
          </div>
          <div class="form-group">
            <label>ტურის ხანგძლივობა (დღეების რაოდენობა)</label>
            <input type="number" name="tour_length" class="form-control" autocomplete="off" min="1">
          </div>
          <div class="form-group">
            <label>ტურის ფასი</label>
            <input type="text" name="tour_price" class="form-control" autocomplete="off" min="1" placeholder="100">
          </div>
          <div class="form-group">
            <label for="exampleInputFile">ატვირთეთ მთავარი სურათი</label>
            <input type="file" class="form-control" id="exampleInputEmail1" name="image" autocomplete="off">
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
  if(isset($_POST['submit'])){
      $tour_name_geo     = $_POST['tour_name_geo'];
      $tour_name_rus     = $_POST['tour_name_rus'];
      $tour_name_eng     = $_POST['tour_name_eng'];
      $tour_desc_geo     = $_POST['tour_desc_geo'];
      $tour_desc_rus     = $_POST['tour_desc_rus'];
      $tour_desc_eng     = $_POST['tour_desc_eng'];  
      $tour_length       = $_POST['tour_length'];
      $tour_price        = $_POST['tour_price'];
      $region1           = $_POST['region1'];
      $region2           = $_POST['region2'];
      $region3           = $_POST['region3'];
      $region4           = $_POST['region4'];
      $about_tour_geo    = $_POST['about_tour_geo'];
      $about_tour_rus    = $_POST['about_tour_rus'];
      $about_tour_eng    = $_POST['about_tour_eng'];

    if(empty($tour_name_geo)){
      echo "<div class='container'><p class='bg-danger' id='warn'>";
        echo 'გთხოვთ შეავსოთ ყველა ველი!';
      echo "</p></div>";
    }else{  
      if(isset($_FILES['image'])){
          $errors     = array();
          $file_name  = $_FILES['image']['name'];
          $new_name   = time().
          $file_size  = $_FILES['image']['size'];
          $file_tmp   = $_FILES['image']['tmp_name'];
          $file_type  = $_FILES['image']['type'];   
          $file_ext   = strtolower(end(explode('.',$_FILES['image']['name'])));
          $extensions = array("jpeg","jpg","png"); 

          $image_name = $datz.$file_name;

          if(empty($errors)==true){
              move_uploaded_file($file_tmp,"..//images/tours/".$image_name);
              
              $query1 = "INSERT INTO tours (tour_name_geo,tour_name_rus,tour_name_eng,tour_desc_geo,tour_desc_rus,tour_desc_eng,tour_length,tour_price,tour_pic1,datee,region1,region2,region3,region4,about_tour_geo,about_tour_rus,about_tour_eng) VALUES ('$tour_name_geo','$tour_name_rus','$tour_name_eng','$tour_desc_geo','$tour_desc_rus','$tour_desc_eng','$tour_length','$tour_price','$image_name','$datee','$region1','$region2','$region3','$region4','$about_tour_geo','$about_tour_rus','$about_tour_eng')";
              $run1   =  mysqli_query($conn,$query1);
              
              header('Location: admin_tours.php');

          }else{
              print_r($errors);
          }
      }
    }

  }
?>