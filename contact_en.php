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
        <?php include 'main_menu_en.php';?>
      </div>    
    </div>
    <div class="col-md-12" id="carousel_wrapper">
      <?php include 'carousel.php';?>
    </div>
    <div class="col-md-12" id="middle_wrapper">
      <?php
        $query = "SELECT * FROM contact";
        $run   = mysqli_query($conn,$query);

        while($row = mysqli_fetch_array($run)){
          $tel          = $row['tel'];
          $email        = $row['email'];
          $facebook     = $row['facebook'];
          $odnoklasniki = $row['odnoklasniki'];
          $vkontakte    = $row['vkontakte'];
          $instagram    = $row['instagram'];
          
        }
      ?>
      <div class="container" id="conact_cont_wrapper">
            <div class="col-md-12" id="contact_title">
              <h2>Contact us</h2>
            </div>
            <div class="col-md-9">
              <form action="" method="POST">
                <div class="col-md-6" id="contact_inputs_wrapper">
                  <label>First Name</label>
                  <input type="text" name="fname" placeholder="John" class="form-control" autocomplete="off">
                </div>
                <div class="col-md-6" id="contact_inputs_wrapper">
                  <label>Last Name</label>
                  <input type="text" name="lname" placeholder="Doe" class="form-control"  autocomplete="off">
                </div>
                <div class="col-md-6" id="contact_inputs_wrapper">
                  <label>E-mail</label>
                  <input type="text" name="mail" placeholder="მაგ: someone@example.com" class="form-control"  autocomplete="off">
                </div>
                <div class="col-md-6" id="contact_inputs_wrapper">
                  <label>Mobile Number</label>
                  <input type="text" name="phone" placeholder="545 45 45 45" class="form-control"  autocomplete="off">
                </div>
                <div class="col-md-12" id="contact_inputs_wrapper">
                  <label>Message</label>
                  <textarea class="form-control" name="text" rows="6"></textarea>
                </div> 
                <div class="col-md-12" id="contact_inputs_wrapper">
                  <input type="submit" name="submit" class="btn btn-success" value="Submit">
                </div>             
              </form>
            </div> 
            <div class="col-md-3">
              <div class="col-md-12" id="booking_right_pannels">
                <h4>TOURIN.GE</h4>
              </div>
              <div class="col-md-12" id="booking_right_pannels">
                <div class="col-md-3" id="contact_socials_wrapper">
                    <a href="<?php echo $facebook;?>" id="social_icons" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                </div>
                <div class="col-md-3" id="contact_socials_wrapper">
                    <a href="<?php echo $instagram;?>" id="social_icons" target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                </div>
                <div class="col-md-3" id="contact_socials_wrapper">
                    <a href="<?php echo $vkontakte;?>" id="social_icons" target="_blank"><i class="fa fa-vk" aria-hidden="true"></i></a>
                </div>
                <div class="col-md-3" id="contact_socials_wrapper">
                    <a href="<?php echo $odnoklassniki;?>" id="social_icons" target="_blank"><i class="fa fa-odnoklassniki" aria-hidden="true"></i></a>
                </div>
              </div>
              <div class="col-md-12" id="booking_right_pannels">
                <h4><a href="tel:<?php echo $tel;?>"><i class="fa fa-mobile" aria-hidden="true"></i> <?php echo substr($tel, 4,3).'-'.substr($tel,7,2).'-'.substr($tel, 9,2).'-'.substr($tel, 11,2);?></a> </h4>
              </div> 
              <div class="col-md-12" id="booking_right_pannels">
                <h4><a href="mailto:<?php echo $email;?>" target="_top"><i class="fa fa-envelope-o" aria-hidden="true"></i> <?php echo $email;?></a></h4>
              </div>  
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
    require "phpmailer/class.phpmailer.php";

    if(isset($_POST['submit'])){
      $fname = $_POST['fname'];
      $lname = $_POST['lname'];
      $mail  = $_POST['mail'];
      $phone = $_POST['phone'];
      $text  = $_POST['text'];


      $message = '<table>
                    <tr>
                      <td>FROM</td>
                      <td>'.$fname.'</td>
                      <td>'.$lname.'</td>                      
                    </tr>
                    <tr>
                      <td>contact</td>
                      <td>'.$mail.'</td>
                      <td>'.$phone.'</td>
                    </tr>
                    <tr>
                      <td colspan="#">'.$text.'</td>
                    </tr>
                 </table>';



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
          $mail->FromName = 'TOURIN.GE CONTACT FORM';
          $mail->addAddress('info@tourin.ge');     // Add a recipient
          $mail->Subject = "CONTACT FORM!";      // Subject (which isn't required)  
          $mail->MsgHTML($message);

          $result = $mail->Send();    // Send!  
          $message = $result ? 'წარმატებით გაიგზავნა!' : 'გაგზავნა ვერ მოხერხდა!';      
          unset($mail);

          if($message){
              echo "<script> 
                  window.alert('მოთხოვნა წარმატებით გაიგზავნა!');
                </script>";
          }else{
              echo "<script> 
                  window.alert('შეტყობინების გაიგზავნა ვერ მოხერხდა!');
                  window.location.assign('index.php');
                </script>";
          }



    }