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
  <?php include '..//db.php';?>
  <body>
    <div class="col-md-12" id="header_wrapper">
      <div class="col-md-12" id="main_menu_wrapper">
        <?php include 'admin_main_menu.php';?>
      </div>    
    </div>
    <div class="container">
      <div class="col-md-12" id="admin_personal_wrapper">
        <form action="" method="POST"> 
          <div class="col-md-12">
            <div class="form-group">
              <h4>ახალი სახეობის დამატება</h4>
            </div>
            <div class="form-group">
              <label>სახეობის დასახელება (GEO)</label>
              <input type="text" name="genre_name_geo" placeholder="ველო ტური" class="form-control" autocomplete="off">
            </div>
            <div class="form-group">
              <label>სახეობის დასახელება (RUS)</label>
              <input type="text" name="genre_name_rus" placeholder="Велотур" class="form-control" autocomplete="off">
            </div>
            <div class="form-group">
              <label>სახეობის დასახელება (ENG)</label>
              <input type="text" name="genre_name_eng" placeholder="Cycling tour" class="form-control" autocomplete="off">
            </div>
            <div class="form-group">
              <input type="submit" name="submit" class="btn btn-success" id="tour_in_book_button" value="დადასტურება">
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
        $genre_name_geo = $_POST['genre_name_geo'];
        $genre_name_rus = $_POST['genre_name_rus'];
        $genre_name_eng = $_POST['genre_name_eng'];

        if($genre_name_geo != '' or $genre_name_eng != '' or $genre_name_rus != '' ){
            $query = "INSERT INTO tour_genres (genre_name_geo,genre_name_rus,genre_name_eng) VALUES ('$genre_name_geo','$genre_name_rus','$genre_name_eng')";
            $run   = mysqli_query($conn,$query); 
            header('location: admin_personal.php');       
        }else{
          echo 'გთხოვთ შეავსოთ ყველა ველი!';
        }
        


      }
?>