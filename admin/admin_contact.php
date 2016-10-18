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
        <h2>საკონტაქტო ინფორმაცია</h2>
      </div>
      <div class="col-md-12" id="hd_admin">
        <h4>სიახლეების შესაცვლელად დააწექით ღილაკს <span class="glyphicon glyphicon-edit"></span>, წასაშლელად - <span class="glyphicon glyphicon-trash"></span>  ან  <a href="add_new_contact.php">დაამატეთ ახალი სიახლე</a></h4>
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
              ტელეფონის ნომერი
            </td>
            <td>
              ელ-ფოსტა
            </td>
            <td>
              <i class="fa fa-facebook" aria-hidden="true"></i>
            </td>
            <td>
              <i class="fa fa-odnoklassniki" aria-hidden="true"></i>
            </td>
            <td>
              <i class="fa fa-vk" aria-hidden="true"></i>
            </td>
            <td>
              <i class="fa fa-instagram" aria-hidden="true"></i>
            </td>
          </tr>
                <?php

                    include '..//db.php';

                    $query = "SELECT * FROM contact ORDER BY id DESC";
                    $run   = mysqli_query($conn,$query);

                    while($row = mysqli_fetch_array($run)){
                        $id           = $row['id'];
                        $tel          = $row['tel'];
                        $email        = $row['email'];
                        $facebook     = $row['facebook'];
                        $odnoklasniki = $row['odnoklasniki'];
                        $vkontakte    = $row['vkontakte'];
                        $instagram    = $row['instagram'];
                      

                        if($facebook != ''){
                          $facebook = '<span class="glyphicon glyphicon-plus" id="plus"></span>';
                        }else{
                          $facebook = '<span class="glyphicon glyphicon-minus" id="minus"></span>';
                        }
                        if($odnoklasniki != ''){
                          $odnoklasniki = '<span class="glyphicon glyphicon-plus" id="plus"></span>';
                        }else{
                          $odnoklasniki = '<span class="glyphicon glyphicon-minus" id="minus"></span>';
                        }
                        if($vkontakte != ''){
                          $vkontakte = '<span class="glyphicon glyphicon-plus" id="plus"></span>';
                        }else{
                          $vkontakte = '<span class="glyphicon glyphicon-minus" id="minus"></span>';
                        }
                        if($instagram != ''){
                          $instagram = '<span class="glyphicon glyphicon-plus" id="plus"></span>';
                        }else{
                          $instagram = '<span class="glyphicon glyphicon-minus" id="minus"></span>';
                        }  

                      echo '<tr id="table_adm">
                            <td id="edit">
                              <a href="edit_contact.php?'.$id.'"><span class="glyphicon glyphicon-edit"></span></a>
                            </td>
                            <td id="tbl_40px">
                              <a href="delete_contact.php?'.$id.'"><span class="glyphicon glyphicon-trash"></span></a>
                            </td>
                            <td>';
                              echo  $tel;
                      
                      echo    '</td>
                            <td>
                              '. $email.'
                            </td>                             
                            <td>
                              '.$facebook.'
                            </td>
                            <td>
                              '.$odnoklasniki.'
                            </td>
                            <td>
                              '.$vkontakte.'
                            </td>
                            <td>
                              '.$instagram.'
                            </td>
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
