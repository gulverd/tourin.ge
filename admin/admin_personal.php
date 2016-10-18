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
        <div class="col-md-6">
          <div class="col-md-12" id="admin_personal_title_wrapper">
            <h4>ლოკაციები</h4>
          </div>
          <div class="col-md-12" id="admin_personal_table_wrapper">
            <table class="table table-bordered">
              <tr>
                <td>დასახელება (GEO)</td>
                <td>დასახელება (RUS)</td>
                <td>დასახელება (ENG)</td>
              </tr>
              <?php

                  $query = "SELECT * FROM city";
                  $run   = mysqli_query($conn,$query);
                  while($row = mysqli_fetch_array($run)){
                    $city_name_geo = $row['city_name_geo'];
                    $city_name_rus = $row['city_name_rus'];
                    $city_name_eng = $row['city_name_eng'];    
                    echo 
                    '<tr>
                        <td>'.$city_name_geo.'</td>
                        <td>'.$city_name_rus.'</td>
                        <td>'.$city_name_eng.'</td>
                    </tr>';            
                  }
              ?>
            </table>
          </div>
          <div class="col-md-12" id="admin_personal_but_wrapper">
            <a href="add_new_city.php">დაამატეთ ახალი</a>
          </div>
        </div>
        <div class="col-md-6">
          <div class="col-md-12" id="admin_personal_title_wrapper">
            <h4>ტურის სახეობები</h4>
          </div>
          <div class="col-md-12" id="admin_personal_table_wrapper">
            <table class="table table-bordered">
              <tr>
                <td>დასახელება (GEO)</td>
                <td>დასახელება (RUS)</td>
                <td>დასახელება (ENG)</td>
              </tr>
              <?php

                  $query2 = "SELECT * FROM tour_genres";
                  $run2   = mysqli_query($conn,$query2);
                  while($row2 = mysqli_fetch_array($run2)){
                    $genre_name_geo = $row2['genre_name_geo'];
                    $genre_name_rus = $row2['genre_name_rus'];
                    $genre_name_eng = $row2['genre_name_eng'];    
                    echo 
                    '<tr>
                        <td>'.$genre_name_geo.'</td>
                        <td>'.$genre_name_rus.'</td>
                        <td>'.$genre_name_eng.'</td>
                    </tr>';            
                  }
              ?>
            </table>
          </div>
          <div class="col-md-12" id="admin_personal_but_wrapper">
            <a href="add_new_genre.php">დაამატეთ ახალი</a>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
