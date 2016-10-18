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
    <div class="col-md-12">
      <div class="col-md-12" id="admin_personal_wrapper">
          <div class="col-md-12" id="admin_personal_title_wrapper">
            <h4>რეგიონები</h4>
          </div>
          <div class="col-md-12" id="admin_personal_table_wrapper">
            <table class="table table-bordered">
              <tr id="table_adm">
                <td id="tbl_40px">
                  <span class="glyphicon glyphicon-edit"></span>
                </td>
                <td id="tbl_40px">
                  <span class="glyphicon glyphicon-trash"></span>
                </td>
                <td>დასახელება (GEO)</td>
                <td>დასახელება (RUS)</td>
                <td>დასახელება (ENG)</td>
                <td>აღწერა (GEO)</td>
                <td>აღწერა (RUS)</td>
                <td>აღწერა (ENG)</td>
                <td>Wiki (GEO)</td>
                <td>Wiki (RUS)</td>
                <td>Wiki (ENG)</td>
                <td>სურათი 1</td>
                <td>სურათი 2</td>
                <td>სურათი 3</td>
                <td>სურათი 4</td>
              </tr>
              <?php

                  $query = "SELECT * FROM city";
                  $run   = mysqli_query($conn,$query);
                  while($row = mysqli_fetch_array($run)){
                    $id            = $row['id'];
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

                      if($desc_geo != ''){
                        $d_geo = '<span class="glyphicon glyphicon-plus" id="plus"></span>';
                      }else{
                        $d_geo = '<span class="glyphicon glyphicon-minus" id="minus"></span>';
                      }
                      if($desc_rus != ''){
                        $d_rus = '<span class="glyphicon glyphicon-plus" id="plus"></span>';
                      }else{
                        $d_rus = '<span class="glyphicon glyphicon-minus" id="minus"></span>';
                      }                      
                      if($desc_eng != ''){
                        $d_eng = '<span class="glyphicon glyphicon-plus" id="plus"></span>';
                      }else{
                        $d_eng = '<span class="glyphicon glyphicon-minus" id="minus"></span>';
                      } 
                      if($wiki_geo != ''){
                        $w_geo = '<span class="glyphicon glyphicon-plus" id="plus"></span>';
                      }else{
                        $w_geo = '<span class="glyphicon glyphicon-minus" id="minus"></span>';
                      }   
                      if($wiki_rus != ''){
                        $w_rus = '<span class="glyphicon glyphicon-plus" id="plus"></span>';
                      }else{
                        $w_rus = '<span class="glyphicon glyphicon-minus" id="minus"></span>';
                      }
                      if($wiki_eng != ''){
                        $w_eng = '<span class="glyphicon glyphicon-plus" id="plus"></span>';
                      }else{
                        $w_eng = '<span class="glyphicon glyphicon-minus" id="minus"></span>';
                      }
                      if($img1 != ''){
                        $img_sign1 = '<span class="glyphicon glyphicon-plus" id="plus"></span>';
                      }else{
                        $img_sign1 = '<span class="glyphicon glyphicon-minus" id="minus"></span>';
                      }  
                      if($img2 != ''){
                        $img_sign2 = '<span class="glyphicon glyphicon-plus" id="plus"></span>';
                      }else{
                        $img_sign2 = '<span class="glyphicon glyphicon-minus" id="minus"></span>';
                      }  
                      if($img3 != ''){
                        $img_sign3 = '<span class="glyphicon glyphicon-plus" id="plus"></span>';
                      }else{
                        $img_sign3 = '<span class="glyphicon glyphicon-minus" id="minus"></span>';
                      }  
                      if($img4 != ''){
                        $img_sign4 = '<span class="glyphicon glyphicon-plus" id="plus"></span>';
                      }else{
                        $img_sign4 = '<span class="glyphicon glyphicon-minus" id="minus"></span>';
                      }  

                    echo
                    '<tr>
                        <td id="edit">
                          <a href="edit_city.php?id='.$id.'"><span class="glyphicon glyphicon-edit"></span></a>
                        </td>
                        <td id="tbl_40px">
                          <a href="delete_city.php?'.$id.'"><span class="glyphicon glyphicon-trash"></span></a>
                        </td>
                        <td>'.$city_name_geo.'</td>
                        <td>'.$city_name_rus.'</td>
                        <td>'.$city_name_eng.'</td>
                        <td id="td_georgia_signs">'.$d_geo.'</td>
                        <td id="td_georgia_signs">'.$d_rus.'</td>
                        <td id="td_georgia_signs">'.$d_eng.'</td>
                        <td id="td_georgia_signs">'.$w_geo.'</td>
                        <td id="td_georgia_signs">'.$w_rus.'</td>
                        <td id="td_georgia_signs">'.$w_eng.'</td>
                        <td id="td_georgia_signs">'.$img_sign1.'</td>
                        <td id="td_georgia_signs">'.$img_sign2.'</td>
                        <td id="td_georgia_signs">'.$img_sign3.'</td>
                        <td id="td_georgia_signs">'.$img_sign4.'</td>
                    </tr>';

                  }
              ?>
            </table>
          </div>
          <div class="col-md-12" id="admin_personal_but_wrapper">
            <a href="add_new_city.php">დაამატეთ ახალი</a>
          </div>
      </div>
    </div>
  </body>
</html>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
