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
        <h2>ტურები საქართველოში</h2>
      </div>

      <?php
            $query = "SELECT * FROM tours WHERE id = '$tour_id'";
            $run   = mysqli_query($conn,$query);

            while($row = mysqli_fetch_array($run)){
              $id                = $row['id'];
              $tour_name_geo     = $row['tour_name_geo'];
              $tour_name_rus     = $row['tour_name_rus'];
              $tour_name_eng     = $row['tour_name_eng'];
              $tour_desc_geo     = $row['tour_desc_geo'];
              $tour_desc_rus     = $row['tour_desc_rus'];
              $tour_desc_eng     = $row['tour_desc_eng'];  
              //$tour_date         = $row['tour_date'];
              $tour_length       = $row['tour_length'];
              $tour_price        = $row['tour_price'];
              $region1           = $row['region1'];
              $region2           = $row['region2'];
              $region3           = $row['region3'];
              $region4           = $row['region4'];
              $about_tour_geo    = $row['about_tour_geo'];
              $about_tour_rus    = $row['about_tour_rus'];
              $about_tour_eng    = $row['about_tour_eng'];
            }


      ?>
      <div class="col-md-12">
        <form action="" method="POST" enctype="multipart/form-data">
          <div class="form-group">
              <label>აირჩიეთ ადგილმდებარეობა 1</label>
              <select name="region1">
                <?php 

                  $queryCityA1 = "SELECT * FROM city WHERE id = '$region1'";
                  $runCityA1   = mysqli_query($conn,$queryCityA1);

                  while($rowCityA1 = mysqli_fetch_array($runCityA1)){
                    $cityNameA1    = $rowCityA1['city_name_geo'];
                    echo '<option value="'.$region1.'">'.$cityNameA1.'</option>';
                  }

                  $queryCities1 = "SELECT id, city_name_geo FROM city";
                  $runCities1   = mysqli_query($conn,$queryCities1);

                  while($rowCities1 = mysqli_fetch_array($runCities1)){
                    $cityID    = $rowCities1['id'];
                    $city_name = $rowCities1['city_name_geo'];
                    echo '<option value="'.$cityID.'">'.$city_name.'</option>';

                  }
                ?>
                <option value=""></option>
            </select>
          </div>
          <div class="form-group">
              <label>აირჩიეთ ადგილმდებარეობა 2</label>
              <select name="region2">
                <?php 

                  $queryCityA2 = "SELECT * FROM city WHERE id = '$region2'";
                  $runCityA2   = mysqli_query($conn,$queryCityA2);

                  while($rowCityA2 = mysqli_fetch_array($runCityA2)){
                    $cityNameA2    = $rowCityA2['city_name_geo'];
                    echo '<option value="'.$region2.'">'.$cityNameA2.'</option>';
                  }

                  $queryCities2 = "SELECT id, city_name_geo FROM city";
                  $runCities2   = mysqli_query($conn,$queryCities2);

                  while($rowCities2 = mysqli_fetch_array($runCities2)){
                    $cityID    = $rowCities2['id'];
                    $city_name = $rowCities2['city_name_geo'];
                    echo '<option value="'.$cityID.'">'.$city_name.'</option>';
                  }
                ?>
                <option value=""></option>
            </select>
          </div>
          <div class="form-group">
              <label>აირჩიეთ ადგილმდებარეობა 3</label>
              <select name="region3">
                <?php 

                  $queryCityA3 = "SELECT * FROM city WHERE id = '$region3'";
                  $runCityA3   = mysqli_query($conn,$queryCityA3);

                  while($rowCityA3 = mysqli_fetch_array($runCityA3)){
                    $cityNameA3    = $rowCityA3['city_name_geo'];
                    echo '<option value="'.$region3.'">'.$cityNameA3.'</option>';
                  }

                  $queryCities3 = "SELECT id, city_name_geo FROM city";
                  $runCities3   = mysqli_query($conn,$queryCities3);

                  while($rowCities3 = mysqli_fetch_array($runCities3)){
                    $cityID    = $rowCities3['id'];
                    $city_name = $rowCities3['city_name_geo'];
                    echo '<option value="'.$cityID.'">'.$city_name.'</option>';
                  }
                ?>
                <option value=""></option>
            </select>
          </div>
          <div class="form-group">
              <label>აირჩიეთ ადგილმდებარეობა 4</label>
              <select name="region4">
                <?php 

                  $queryCityA4 = "SELECT * FROM city WHERE id = '$region4'";
                  $runCityA4   = mysqli_query($conn,$queryCityA4);

                  while($rowCityA4 = mysqli_fetch_array($runCityA4)){
                    $cityNameA4    = $rowCityA4['city_name_geo'];
                    echo '<option value="'.$region4.'">'.$cityNameA4.'</option>';
                  }

                  $queryCities4 = "SELECT id, city_name_geo FROM city";
                  $runCities4   = mysqli_query($conn,$queryCities4);

                  while($rowCities4 = mysqli_fetch_array($runCities4)){
                    $cityID    = $rowCities4['id'];
                    $city_name = $rowCities4['city_name_geo'];
                    echo '<option value="'.$cityID.'">'.$city_name.'</option>';
                  }
                ?>
            </select>
          </div>
          <div class="form-group">
            <label>დასახელება (GEO)</label>
            <input type="text" name="tour_name_geo" class="form-control" placeholder="მაგ: თბილისის ტური" autocomplete="off" value="<?php echo $tour_name_geo;?>">
          </div>
          <div class="form-group">
            <label>დასახელება (RUS)</label>
            <input type="text" name="tour_name_rus" class="form-control" placeholder="მაგ: Тбилиси Тур" autocomplete="off" value="<?php echo $tour_name_rus;?>">
          </div>
          <div class="form-group">
            <label>დასახელება (ENG)</label>
            <input type="text" name="tour_name_eng" class="form-control" placeholder="მაგ: Tbilisi Tour" autocomplete="off" value="<?php echo $tour_name_eng;?>">
          </div>
          <div class="form-group">
            <label>ტურის აღწერა (GEO)</label>
            <textarea class="form-control" rows="10" name="tour_desc_geo" value=""><?php echo $tour_desc_geo;?></textarea>            
          </div>
          <div class="form-group">
            <label>ტურის აღწერა (RUS)</label>
            <textarea class="form-control" rows="10" name="tour_desc_rus" value=""><?php echo $tour_desc_rus;?></textarea>            
          </div>
          <div class="form-group">
            <label>ტურის აღწერა (ENG)</label>
            <textarea class="form-control" rows="10" name="tour_desc_eng" value=""><?php echo $tour_desc_eng;?></textarea>            
          </div>
          <div class="form-group">
            <label>ტურის დეტალები (GEO)</label>
            <textarea class="form-control" rows="7" name="about_tour_geo"><?php echo $about_tour_geo;?></textarea>
          </div>
          <div class="form-group">
            <label>ტურის დეტალები (RUS)</label>
            <textarea class="form-control" rows="7" name="about_tour_rus"><?php echo $about_tour_rus;?></textarea>
          </div>
          <div class="form-group">
            <label>ტურის დეტალები (ENG)</label>
            <textarea class="form-control" rows="7" name="about_tour_eng"><?php echo $about_tour_eng;?></textarea>
          </div>
          <div class="form-group">
            <label>ტურის ხანგძლივობა (დღეების რაოდენობა)</label>
            <input type="number" name="tour_length" class="form-control" autocomplete="off" min="1" value="<?php echo $tour_length;?>">
          </div>
          <div class="form-group">
            <label>ტურის ფასი</label>
            <input type="text" name="tour_price" class="form-control" autocomplete="off" value="<?php echo $tour_price;?>">
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

    $tour_name_geo1     = $_POST['tour_name_geo'];
    $tour_name_rus1     = $_POST['tour_name_rus'];
    $tour_name_eng1     = $_POST['tour_name_eng'];
    $tour_location_geo1 = $_POST['tour_location_geo'];
    $tour_location_rus1 = $_POST['tour_location_rus'];
    $tour_location_eng1 = $_POST['tour_location_eng'];
    $tour_desc_geo1     = $_POST['tour_desc_geo'];
    $tour_desc_rus1     = $_POST['tour_desc_rus'];
    $tour_desc_eng1     = $_POST['tour_desc_eng'];  
    $tour_length1       = $_POST['tour_length'];
    $tour_price1        = $_POST['tour_price'];
    //$tour_valute1       = $_POST['tour_valute'];
    $regi1              = $_POST['region1'];
    $regi2              = $_POST['region2'];
    $regi3              = $_POST['region3'];
    $regi4              = $_POST['region4'];
    $about_tour_geo1    = $_POST['about_tour_geo'];
    $about_tour_rus1    = $_POST['about_tour_rus'];
    $about_tour_eng1    = $_POST['about_tour_eng'];

    if(empty($tour_name_geo1)){
      echo "<div class='container'><p class='bg-danger' id='warn'>";
        echo 'გთხოვთ შეავსოთ ყველა ველი!';
      echo "</p></div>";
    }else{        
        
        $query1 = "UPDATE tours SET tour_name_geo = '$tour_name_geo1', tour_name_rus = '$tour_name_rus1', tour_name_eng = '$tour_name_eng1',tour_desc_geo = '$tour_desc_geo1',tour_desc_rus = '$tour_desc_rus1', tour_desc_eng  = '$tour_desc_eng1', tour_length = '$tour_length1', tour_price = '$tour_price1',region1 = '$regi1',region2 = '$regi2', region3 = '$regi3', region4 = '$regi4', about_tour_geo = '$about_tour_geo1', about_tour_rus = '$about_tour_rus1', about_tour_eng = '$about_tour_eng1' WHERE id = '$tour_id'";
        $run1   =  mysqli_query($conn,$query1);
              
        header('Location: admin_tours.php');
    }

    //echo $title_geo;
  }
?>