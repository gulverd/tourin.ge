<?php 
  include '..//db.php'; 
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
        <h4>სიახლეების შესაცვლელად დააწექით ღილაკს <span class="glyphicon glyphicon-edit"></span>, წასაშლელად - <span class="glyphicon glyphicon-trash"></span>  ან  <a href="add_new_event.php">დაამატეთ ახალი სიახლე</a></h4>
      </div>
      <?php
            $query = "SELECT a.id as id, a.name_geo as name_geo, a.name_rus as name_rus,a.name_eng as name_eng, a.desc_geo as desc_geo, a.desc_rus as desc_rus, a.desc_eng as desc_eng,a.genre_id as genre_id, a.city_id as city_id,a.price as price, b.city_name_geo as city_geo , c.genre_name_geo as genre_geo FROM other_tours a JOIN city b ON a.city_id = b.id JOIN tour_genres c ON a.genre_id = c.id WHERE a.id = 2";
            $run   = mysqli_query($conn,$query);

            while($row = mysqli_fetch_array($run)){
              $id         = $row['id'];
              $name_geo   = $row['name_geo'];
              $name_rus   = $row['name_rus'];
              $name_eng   = $row['name_eng'];
              $desc_geo   = $row['desc_geo'];
              $desc_rus   = $row['desc_rus'];
              $desc_eng   = $row['desc_eng'];
              $genre_id   = $row['genre_id'];
              $price      = $row['price'];
              $city_id    = $row['city_id'];
              $city_geo   = $row['city_geo'];
              $genre_geo  = $row['genre_geo'];

            }


      ?>
      <div class="col-md-12">
        <form action="" method="POST" enctype="multipart/form-data">
          <div class="form-group">
            <label>დასახელება (GEO)</label>
            <input type="text" name="name_geo" class="form-control" autocomplete="off" value="<?php echo $name_geo;?>">
          </div>
          <div class="form-group">
            <label>დასახელება (RUS)</label>
            <input type="text" name="name_rus" class="form-control" autocomplete="off" value="<?php echo $name_rus;?>">
          </div>
          <div class="form-group">
            <label>დასახელება (ENG)</label>
            <input type="text" name="name_eng" class="form-control" autocomplete="off" value="<?php echo $name_eng;?>">
          </div>
          <div class="form-group">
            <label>ტურის ადგილმდებარეობა</label>
            <select name="city_geo" class="form-control">
              <option value="<?php echo $city_id;?>"><?php echo $city_geo;?></option>
              <?php 
                $cityQuery = "SELECT * FROM city WHERE id != '$city_id'";
                $runCity   = mysqli_query($conn,$cityQuery);

                while($rowCity = mysqli_fetch_array($runCity)){
                  $tour_city_id   = $rowCity['id'];
                  $tour_city_name = $rowCity['city_name_geo'];
                  echo '<option value='.$tour_city_id.'>'.$tour_city_name.'</option>';
                }
              ?>
            </select>
          </div>
          <div class="form-group">
            <label>ტურის სახეობა</label>
            <select name="genre_geo" class="form-control">
              <option value="<?php echo $genre_id;?>"><?php echo $genre_geo;?></option>
              <?php 
                $genreQuery = "SELECT * FROM tour_genres WHERE id != '$genre_id'";
                $runGenre   = mysqli_query($conn,$genreQuery);

                while($rowGenre = mysqli_fetch_array($runGenre)){
                  $tour_genre_id   = $rowGenre['id'];
                  $tour_genre_name = $rowGenre['genre_name_geo'];
                  echo '<option value='.$tour_genre_id.'>'.$tour_genre_name.'</option>';
                }
              ?>
            </select>
          </div>
          <div class="form-group">
            <label>ტურის ფასი</label>
            <input type="text" name="price" class="form-control" autocomplete="off" value="<?php echo $price;?>">
          </div>
          <div class="form-group">
            <label>ტურის აღწერა (GEO)</label>
            <textarea class="form-control" rows="10" name="desc_geo" value=""><?php echo $desc_geo;?></textarea>            
          </div>
          <div class="form-group">
            <label>ტურის აღწერა (RUS)</label>
            <textarea class="form-control" rows="10" name="desc_rus" value=""><?php echo $desc_rus;?></textarea>            
          </div>
          <div class="form-group">
            <label>ტურის აღწერა (ENG)</label>
            <textarea class="form-control" rows="10" name="desc_eng" value=""><?php echo $desc_eng;?></textarea>            
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

    $genre_geo1 = $_POST['genre_geo'];
    $city_geo1  = $_POST['city_geo'];
    $name_geo1  = $_POST['name_geo'];
    $name_rus1  = $_POST['name_rus'];
    $name_eng1  = $_POST['name_eng'];
    $desc_geo1  = $_POST['desc_geo'];
    $desc_rus1  = $_POST['desc_rus'];
    $desc_eng1  = $_POST['desc_eng'];
    $price1     = $_POST['price'];

    $query1 = "UPDATE other_tours 
    SET genre_id = '$genre_geo1', city_id = '$city_geo1', name_geo = '$name_geo1', name_rus = '$name_rus1', name_eng = '$name_eng1',desc_geo = '$desc_geo1', desc_rus = '$desc_rus1', desc_eng = '$desc_eng1',price = '$price1'
    WHERE id = '$tour_id'";
    $run1   =  mysqli_query($conn,$query1);
              
    header('Location: admin_other_tours.php');

  }
?>