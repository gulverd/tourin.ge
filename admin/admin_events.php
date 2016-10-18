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
        <h2>ღონისძიებები საქართველოში</h2>
      </div>
      <div class="col-md-12" id="hd_admin">
        <h4>სიახლეების შესაცვლელად დააწექით ღილაკს <span class="glyphicon glyphicon-edit"></span>, წასაშლელად - <span class="glyphicon glyphicon-trash"></span>  ან  <a href="add_new_event.php">დაამატეთ ახალი სიახლე</a></h4>
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
              დასახელება
            </td>
            <td>
              ადგილმდებარეობა
            </td>
            <td>
              ღონისძიების თარიღი
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

                    $query = "SELECT * FROM events ORDER BY id DESC";
                    $run   = mysqli_query($conn,$query);

                    while($row = mysqli_fetch_array($run)){
                        $id         = $row['id'];
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
                        $datee        = $row['datee'];

                      if($title_geo != ''){
                        $geo = '<span class="glyphicon glyphicon-plus" id="plus"></span>';
                      }else{
                        $geo = '<span class="glyphicon glyphicon-minus" id="minus"></span>';
                      }
                      if($title_rus != ''){
                        $rus = '<span class="glyphicon glyphicon-plus" id="plus"></span>';
                      }else{
                        $rus = '<span class="glyphicon glyphicon-minus" id="minus"></span>';
                      }
                      if($title_eng != ''){
                        $eng = '<span class="glyphicon glyphicon-plus" id="plus"></span>';
                      }else{
                        $eng = '<span class="glyphicon glyphicon-minus" id="minus"></span>';
                      }

                      echo '<tr id="table_adm">
                            <td id="edit">
                              <a href="edit_event.php?'.$id.'"><span class="glyphicon glyphicon-edit"></span></a>
                            </td>
                            <td id="tbl_40px">
                              <a href="delete_event.php?'.$id.'"><span class="glyphicon glyphicon-trash"></span></a>
                            </td>
                            <td>';
                              echo  $title_geo;
                      echo    '</td>
                            <td>
                              '.$city_geo . ' - ' . $location_geo.'
                            </td>
                            <td>
                              '.$event_date.'
                            </td>
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
