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
    date_default_timezone_set("Asia/Tbilisi");
    $datee = date("Y-m-d  H:i:s");
    $datea = date("YmdHis");
    $datz  = $datea + 0;
?>
  <body>
    <div class="col-md-12" id="header_wrapper">
      <div class="col-md-12" id="main_menu_wrapper">
        <?php include 'admin_main_menu.php';?>
      </div>    
    </div>
    <div class="container" id="main_contia_wrappers">
      <div class="col-md-12" id="middle_content_header">
        <h2>სხვა ტურები</h2>
      </div>
      <div class="col-md-12" id="admin_personal_wrapper">
        <form action="" method="POST" enctype="multipart/form-data"> 
          <div class="col-md-12">
            <div class="form-group">
              <div class="col-md-4" id="fgroup_wrp">
                <label>დასახელება (GEO) </label>
                <input type="text" name="name_geo" placeholder="საცხენოსნო ტური" class="form-control">
              </div>
              <div class="col-md-4" id="fgroup_wrp">
                <label>დასახელება (RUS) </label>
                <input type="text" name="name_rus" placeholder="Конный тур" class="form-control">
              </div>
              <div class="col-md-4" id="fgroup_wrp">
                <label>დასახელება (ENG) </label>
                <input type="text" name="name_eng" placeholder="Horse tour" class="form-control">
              </div>
            </div> 
            <div class="form-group">
              <div class="col-md-6" id="fgroup_wrp">
                <label for="exampleInputFile">ატვირთეთ ტურის სურათი</label>
                <input type="file" class="form-control" id="exampleInputEmail1" name="image" autocomplete="off">
              </div>
              <div class="col-md-6" id="fgroup_wrp">
                <label>ტურის ფასი</label>
                <input type="text" name="price" class="form-control">
              </div>
            </div>
            <div class="form-group"  >
              <div class="col-md-6" id="fgroup_wrp">
                <label>აირჩიეთ ლოკაცია</label>
                <select name="city" class="form-control">
                  <?php
                      $query = "SELECT * FROM city";
                      $run   = mysqli_query($conn,$query);

                      while($row = mysqli_fetch_array($run)){
                        $city_id         = $row['id'];
                        $city_name_geo   = $row['city_name_geo'];

                        echo '<option value="'.$city_id.'">'.$city_name_geo.'</option>'; 
                      }

                  ?>
                </select>
              </div>
              <div class="col-md-6" id="fgroup_wrp">
                <label>აირჩიეთ ტურის სახეობა</label>
                <select name="genre" class="form-control">
                  <?php
                      $query2 = "SELECT * FROM tour_genres";
                      $run2   = mysqli_query($conn,$query2);

                      while($row2 = mysqli_fetch_array($run2)){
                        $genre_id        = $row2['id'];
                        $genre_title_geo = $row2['genre_name_geo'];

                        echo '<option value="'.$genre_id.'">'.$genre_title_geo.'</option>'; 
                      }

                  ?>
                </select>
              </div>
            </div>
            <div class="form-group">
              <div class="col-md-12" id="fgroup_wrp">
                <label>ტურის აღწერა (GEO)</label>
                <textarea class="form-control" name="desc_geo" rows="10"></textarea>
              </div>
              <div class="col-md-12" id="fgroup_wrp">
                <label>ტურის აღწერა (RUS)</label>
                <textarea class="form-control" name="desc_rus" rows="10"></textarea>
              </div>
              <div class="col-md-12" id="fgroup_wrp" >
                <label>ტურის აღწერა (eng)</label>
                <textarea class="form-control" name="desc_eng" rows="10"></textarea>
              </div>
            </div>
            <div class="form-group"  >
              <div class="col-md-12" id="fgroup_wrp">
                <button type="submit" name="submit" class="btn btn-default">დადასტურება</button>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </body>
</html>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>


<?php 

      if(isset($_POST['submit'])){
        $name_geo = $_POST['name_geo'];
        $name_rus = $_POST['name_rus'];
        $name_eng = $_POST['name_eng'];
        $price    = $_POST['price'];
        $city     = $_POST['city'];
        $genre    = $_POST['genre'];
        $desc_geo = $_POST['desc_geo'];
        $desc_rus = $_POST['desc_rus'];
        $desc_eng = $_POST['desc_eng'];

        if(empty($name_geo)){
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
                  
                 
                $query1 = "INSERT INTO other_tours (genre_id,city_id,name_geo,name_rus,name_eng,desc_geo,desc_rus,desc_eng,price,img_url,datee) VALUES ('$genre','$city','$name_geo','$name_rus','$name_eng','$desc_geo','$desc_rus','$desc_eng','$price','$image_name','$datee')";
                $run1   =  mysqli_query($conn,$query1);
              
                header('Location: admin_other_tours.php');

              }else{
                  print_r($errors);
              }
          }

      }
  }

?>