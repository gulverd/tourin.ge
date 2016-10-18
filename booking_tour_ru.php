<?php 
  include 'db.php'; 
  require "phpmailer/class.phpmailer.php";
  ob_start();
  date_default_timezone_set("Asia/Tbilisi");
  $datee    = date("Y-m-d  H:i:s");
  $tour_id = $_GET['id'];

?>


<!DOCTYPE html>
<html lang="ge">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>TourIN.GE</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
  </head>
  <body>
    <div class="col-md-12" id="header_wrapper">
      <div class="col-md-12" id="main_menu_wrapper">
        <?php include 'main_menu_ru.php';?>
      </div>    
    </div>
    <div class="col-md-12" id="middle_wrapper">
      <div class="container">
        <div class="col-md-12" id="booking_tour_main_wrapper">
          <form method="POST" action="">
              <div class="col-md-12">
                <h4>Бронирование тура</h3>
              </div>
              <div class="col-md-6" id="booking_inputs_wrapper">
                <label>Имя</label>
                <input type="text" class="form-control" placeholder="John" autocomplete="off" name="fname">
              </div>
              <div class="col-md-6" id="booking_inputs_wrapper">
                <label>Фамилия</label>
                <input type="text" class="form-control" placeholder="Jolly" autocomplete="off" name="lname">
              </div>
              <div class="col-md-6" id="booking_inputs_wrapper">
                <label>Номер телефона</label>
                <input type="text" class="form-control" placeholder="+995 539 99 99 99" autocomplete="off" name="tel">
              </div>
              <div class="col-md-6" id="booking_inputs_wrapper">
                <label>Эл. адрес</label>
                <input type="email" class="form-control" placeholder="someone@example.com" autocomplete="off" name="email">
              </div>      
              <div class="col-md-6" id="booking_inputs_wrapper">
                <label>Количество туристов</label>
                <input type="number" class="form-control" placeholder="" autocomplete="off" name="humans_count" min="1">                
              </div>
              <div class="col-md-6" id="booking_inputs_wrapper">
                <label>Дата тура</label>
                <input type="date" class="form-control" placeholder="" autocomplete="off" name="tour_date" min="<?php echo date('Y-m-d'); ?>" value="<?php echo date('Y-m-d'); ?>">
              </div>     
              <div class="col-md-12" id="booking_inputs_wrapper">
                <input type="submit" class="btn btn-success" id="tour_in_book_button" name="submit" value="Бронирование">
              </div>
          </form>
        </div>
      </div>
      <div class="container">
        <div class="col-md-12">
          <?php include 'suggested_ru.php';?>
        </div>
      </div>
    </div>
    <div class="col-md-12" id="footer_wrapper">
      <?php include 'footer.php';?>
    </div>
  </body>
</html>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>


<?php
    
    if(isset($_POST['submit'])){
      $fname        = $_POST['fname'];
      $lname        = $_POST['lname'];
      $tel          = $_POST['tel'];
      $email        = $_POST['email'];
      $humans_count = $_POST['humans_count'];
      $tour_date    = $_POST['tour_date'];
      
      if(empty($fname) OR empty($lname) or empty($tel) or empty($email) or empty($humans_count)){
        echo 'Пожалуйста, заполните все поля!';
      }else{
          $query    = "INSERT INTO booking (tour_id,fname,lname,email,tel,humans_count,datee,tour_date) VALUES ('$tour_id','$fname','$lname','$tel','$email','$humans_count','$datee','$tour_date')";
          $run      = mysqli_query($conn,$query);
          
          $query2   = "SELECT * FROM tours WHERE id = '$tour_id'";
          $run2     = mysqli_query($conn,$query2);

          while($row2 = mysqli_fetch_array($run2)){
            $id                 = $row2['id'];
            $tour_name_rus      = $row2['tour_name_rus'];
            $tour_desc_rus      = $row2['tour_desc_rus'];
            $tour_length        = $row2['tour_length'];
            $tour_location_rus  = $row2['tour_location_rus'];
            $tour_price         = $row2['tour_price'];
            $tour_pic1          = $row2['tour_pic1'];
            $tour_valute        = $row2['tour_valute'];;
          }

          $total = $tour_price * $humans_count;

          $message = '
            <html>
            <head>
                <title>TOURIN.GE</title>
            </head>
            <body>
                <h3>ტურის შესახებ:</h4>
                <table cellspacing="0" style="border: 1px solid #CCCCCC">
                    <tr>
                        <th width: 350px; heigth: 35px; font-color:#000000;>ტურის სახელი:</th><td width: 350px; heigth: 35px; font-color:#000000;>'. $tour_name_rus.'</td>
                    </tr>
                    <tr style="background-color: #e0e0e0;">
                        <th width: 350px; heigth: 35px; font-color:#000000;>ტურის ადგილმდებარეობა:</th><td width: 350px; heigth: 35px; font-color:#000000;>'. $tour_location_rus.'</td>
                    </tr>
                    <tr>
                        <th width: 350px; heigth: 35px; font-color:#000000;>ტურის თარიღი:</th><td width: 350px; heigth: 35px; font-color:#000000;>'. $tour_date.'</td>
                    </tr>
                    <tr style="background-color: #e0e0e0;">
                        <th width: 350px; heigth: 35px; font-color:#000000;>ტურის ფასი:</th><td width: 350px; heigth: 35px; font-color:#000000;>'.$tour_price .'</td>
                    </tr>
                </table>

                <h3>დამკვეთის შესახებ:</h4>
                  <table cellspacing="0" style="border: 1px solid #CCCCCC">
                    <tr>
                        <th width: 350px; heigth: 35px; font-color:#000000;>დამკვეთის სახელი და გვარი:</th><td width: 350px; heigth: 35px; font-color:#000000;>'.$fname . ' ' .$lname.'</td>
                    </tr>
                    <tr>
                        <th width: 350px; heigth: 35px; font-color:#000000;>დამკვეთის ტელეფონის ნომერი:</th><td width: 350px; heigth: 35px; font-color:#000000;>'.$tel.'</td>
                    </tr>
                    <tr style="background-color: #e0e0e0;">
                        <th width: 350px; heigth: 35px; font-color:#000000;>დამკვეთის ელ-ფოსტა:</th><td width: 350px; heigth: 35px; font-color:#000000;>'.$email.'</td>
                    </tr>
                    <tr>
                        <th width: 350px; heigth: 35px; font-color:#000000;>დამსვენებლის რაოდენობა:</th><td width: 350px; heigth: 35px; font-color:#000000;>'.$humans_count.'</td>
                    </tr>
                </table>
            </body>
            </html>';


      // Instantiate Class  
          $mail = new PHPMailer();  
                          
          // Set up SMTP  
          $mail->IsSMTP();                // Sets up a SMTP connection  
          $mail->SMTPAuth = true;         // Connection with the SMTP does require authorization    
          $mail->SMTPSecure = "ssl";      // Connect using a TLS connection  
          $mail->Host = "gator3307.hostgator.com";  //Gmail SMTP server address
          $mail->Port = 465;  //Gmail SMTP port
          $mail->Encoding = '7bit';
          $mail->CharSet = "UTF-8";
                        
          // Authentication  
          $mail->Username   = "booking@tourin.ge"; // Your full Gmail address
          $mail->Password   = "tirkmeli9"; // Your Gmail password
                           
          // Composey
          $mail->From = 'booking@tourin.ge';
          $mail->FromName = 'TOURIN.GE BOOKING';
          $mail->addAddress('info@tourin.ge');     // Add a recipient
          $mail->AddReplyTo($mail, $fname . ' ' .$lname);
          $mail->Subject = "NEW ORDER!";      // Subject (which isn't required)  
          $mail->MsgHTML($message);

          $result = $mail->Send();    // Send!  
          $message = $result ? 'წარმატებით გაიგზავნა!' : 'გაგზავნა ვერ მოხერხდა!';      
          unset($mail);

          if($message){
              echo "<script> 
                  window.alert('Запрос был отправлен!');
                </script>";
          }else{
              echo "<script> 
                  window.alert('შეტყობინების გაიგზავნა ვერ მოხერხდა!');
                  window.location.assign('index_ru.php');
                </script>";
          }


          $query3 = "SELECT * FROM booking";
          $run3   = mysqli_query($conn,$query3);
          while($row3 = mysqli_fetch_array($run3)){
            $booking_id = $row3['id'];
          }

          header('location: booking_report_ru.php?id='.$booking_id);

      }


    }


?>