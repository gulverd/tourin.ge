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
        <h2>ღონისძიებები საქართველოში</h2>
      </div>
      <div class="col-md-12" id="hd_admin">
        <h4>სიახლეების შესაცვლელად დააწექით ღილაკს <span class="glyphicon glyphicon-edit"></span>, წასაშლელად - <span class="glyphicon glyphicon-trash"></span>  ან  <a href="add_new_event.php">დაამატეთ ახალი სიახლე</a></h4>
      </div>
      <div class="col-md-12">
        <form action="" method="POST" enctype="multipart/form-data">
          <div class="form-group">
            <label>ტელეფონის ნომერი</label>
            <input type="text" name="tel" class="form-control" placeholder="მაგ: +995599344488" autocomplete="off">
          </div>
          <div class="form-group">
            <label>ელ-ფოსტა</label>
            <input type="text" name="email" class="form-control" placeholder="მაგ: info@tourin.ge" autocomplete="off">
          </div>
          <div class="form-group">
            <label>Facebook URL</label>
            <input type="text" name="facebook" class="form-control" placeholder="მაგ: https://www.facebook.com/tourin" autocomplete="off">
          </div>  
          <div class="form-group">
            <label>Odnoklassniki URL</label>
            <input type="text" name="odnoklasniki" class="form-control" placeholder="მაგ: https://www.odnoklasniki.ru/tourin" autocomplete="off">
          </div>  
          <div class="form-group">
            <label>Vkontakte URL</label>
            <input type="text" name="vkontakte" class="form-control" placeholder="მაგ: http://vk.com/tourin" autocomplete="off">
          </div>
          <div class="form-group">
            <label>Instagram URL</label>
            <input type="text" name="instagram" class="form-control" placeholder="მაგ: http://instagram.com/tourin" autocomplete="off">
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
  //echo gettype($datea + 0);


  if(isset($_POST['submit'])){

    $tel          = $_POST['tel'];
    $email        = $_POST['email'];
    $facebook     = $_POST['facebook'];
    $odnoklasniki = $_POST['odnoklasniki'];
    $vkontakte    = $_POST['vkontakte'];
    $instagram    = $_POST['instagram']; 

    if($facebook === ''){
      $facebook = '#';
    }
    if($odnoklasniki === ''){
      $odnoklasniki = '#';
    }
    if($vkontakte === ''){
      $vkontakte = '#';
    }
    if($instagram === ''){
      $instagram = '#';
    }

    if(empty($tel)){
      echo "<div class='container'><p class='bg-danger' id='warn'>";
        echo 'გთხოვთ შეავსოთ ყველა ველი!';
      echo "</p></div>";
    }else{  

          
              
        $query1 = "INSERT INTO contact (tel,email,facebook,odnoklasniki,vkontakte,instagram) VALUES ('$tel','$email','$facebook','$odnoklasniki','$vkontakte','$instagram')";
        $run1   =  mysqli_query($conn,$query1);
              
        header('Location: admin_contact.php');


      }
    }

?>