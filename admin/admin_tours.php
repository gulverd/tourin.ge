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
    <div class="container">
      <div class="col-md-12" id="middle_content_header">
        <h2>გამოცხადებული ტურები</h2>
      </div>
      <div class="col-md-12" id="hd_admin">
        <h4>სიახლეების შესაცვლელად დააწექით ღილაკს <span class="glyphicon glyphicon-edit"></span>, წასაშლელად - <span class="glyphicon glyphicon-trash"></span>  ან  <a href="add_new_tour.php">დაამატეთ ახალი სიახლე</a></h4>
      </div>
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
              სურათი
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

                    $query = "SELECT * FROM tours ORDER BY id DESC";
                    $run   = mysqli_query($conn,$query);

                    while($row = mysqli_fetch_array($run)){
                        $id                 = $row['id'];
                        $tour_name_geo      = $row['tour_name_geo'];
                        $tour_name_rus      = $row['tour_name_rus'];
                        $tour_name_eng      = $row['tour_name_eng'];
                        $tour_desc_geo      = $row['tour_desc_geo'];
                        $tour_desc_rus      = $row['tour_desc_rus']; 
                        $tour_desc_eng      = $row['tour_desc_eng'];
                        $tour_length        = $row['tour_length'];
                        $tour_price         = $row['tour_price'];
                        $tour_pic1          = $row['tour_pic1'];
                        //$tour_date          = $row['tour_date'];
                        $datee              = $row['datee'];
                        $region1            = $row['region1'];
                        $region2            = $row['region2'];
                        $region3            = $row['region3'];
                        $region4            = $row['region4'];

                        if($region1 != ''){
                          $queryCity1 = "SELECT * FROM city WHERE id = '$region1'";
                          $runCity1   = mysqli_query($conn,$queryCity1);

                          while($rowCity1 = mysqli_fetch_array($runCity1)){
                            $reg1 = $rowCity1['city_name_geo'];
                          }
                        }else{
                          $reg1   = '';
                        }

                        if($region2 != ''){
                          $queryCity2 = "SELECT * FROM city WHERE id = '$region2'";
                          $runCity2   = mysqli_query($conn,$queryCity2);

                          while($rowCity2 = mysqli_fetch_array($runCity2)){
                            $reg2 = ','.$rowCity2['city_name_geo'];
                          }
                        }else{
                          $reg2   = '';
                        }

                        if($region3 != ''){
                          $queryCity3 = "SELECT * FROM city WHERE id = '$region3'";
                          $runCity3   = mysqli_query($conn,$queryCity3);

                          while($rowCity3 = mysqli_fetch_array($runCity3)){
                            $reg3 = ','.$rowCity3['city_name_geo'];
                          }
                        }else{
                          $reg3   = '';
                        }

                        if($region4 != ''){
                          $queryCity4 = "SELECT * FROM city WHERE id = '$region4'";
                          $runCity4   = mysqli_query($conn,$queryCity4);

                          while($rowCity4 = mysqli_fetch_array($runCity4)){
                            $reg4 = ','.$rowCity4['city_name_geo'];
                          }
                        }else{
                          $reg4   = '';
                        }

                        if($tour_name_geo != ''){
                          $geo = '<span class="glyphicon glyphicon-plus" id="plus"></span>';
                        }else{
                          $geo = '<span class="glyphicon glyphicon-minus" id="minus"></span>';
                        }
                        if($tour_name_rus != ''){
                          $rus = '<span class="glyphicon glyphicon-plus" id="plus"></span>';
                        }else{
                          $rus = '<span class="glyphicon glyphicon-minus" id="minus"></span>';
                        }
                        if($tour_name_rus != ''){
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
                              <a href="edit_tour.php?'.$id.'"><span class="glyphicon glyphicon-edit"></span></a>
                            </td>
                            <td id="tbl_40px">
                              <a href="delete_tour.php?'.$id.'"><span class="glyphicon glyphicon-trash"></span></a>
                            </td>
                            <td>';
                              echo  $tour_name_geo;
                      echo    '</td>
                            <td>
                              '.$reg1.$reg2.$reg3.$reg4.'
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
  </body>
</html>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
