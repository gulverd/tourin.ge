<?php 
  include 'db.php'; 
  require "phpmailer/class.phpmailer.php";
  ob_start();
  date_default_timezone_set("Asia/Tbilisi");
  $datee    = date("Y-m-d  H:i:s");

?>
   <form action="" method="post">
      <div class="col-md-12" id="middle_reservation_cont_in">
            <div class="form-group">
               <label>Location</label>
               <select name="city" class="form-control">
               <?php 
                  $query2 = "SELECT * FROM city";
                  $run2   = mysqli_query($conn,$query2);

                  while($row2 = mysqli_fetch_array($run2)){
                     $id            = $row2['id'];
                     $city_name_eng = $row2['city_name_eng'];
                     echo '<option value="'.$id.'">' .$city_name_eng.'</option>';
                  }
               ?>
               </select>
            </div>
            <div class="form-group">
               <label>Date From</label>
               <input type="date" name="dateFrom" class="form-control" min="<?php echo date('Y-m-d'); ?>" value="<?php echo date('Y-m-d'); ?>">
            </div>
            <div class="form-group">
               <label>Date To</label>
               <input type="date" name="dateTo" class="form-control" min="<?php echo date('Y-m-d'); ?>" value="<?php echo date('Y-m-d'); ?>">
            </div>
         <div class="form-group">
            <label>Type of Tour</label>
            <select class="form-control" name="tour_genre">
               <?php 
                  $query = "SELECT * FROM tour_genres";
                  $run   = mysqli_query($conn,$query);

                  while($row = mysqli_fetch_array($run)){
                     $id             = $row['id'];
                     $genre_name_eng = $row['genre_name_eng'];
                     echo '<option value="'.$id.'">' .$genre_name_eng.'</option>';
                  }
               ?>
            </select>
         </div>
         <div class="col-md-6" id="res_bottom_left">
            <div class="form-group">
               <label>Adults</label>
               <select name="adultNumber" class="form-control">
                  <?php

                     for ($i = 0; $i<= 20; $i++) {
                        echo '<option>'.$i.'</option>';
                     }

                  ?>
                  <option>20+</option>
               </select>
            </div>
         </div>
         <div class="col-md-6" id="res_bottom_right">
            <div class="form-group">
               <label>Childs</label>
               <select name="childNumber" class="form-control">
                  <?php
                     for ($i = 0; $i<= 20; $i++) {
                        echo '<option>'.$i.'</option>';
                     }
                  ?>
                  <option>20+</option>
               </select>
            </div>
         </div>
         <div class="col-md-6" id="res_bottom_left">
            <div class="form-group">
               <label>First Name</label>
               <input type="text" name="fname" class="form-control" placeholder="John" autocomplete="off">
            </div>
         </div>
         <div class="col-md-6" id="res_bottom_right">
            <div class="form-group">
               <label>Last Name</label>
               <input type="text" name="lname" class="form-control" placeholder="Doe" autocomplete="off">
            </div>
         </div>
         <div class="col-md-6" id="res_bottom_left">
            <div class="form-group">
               <label>Mobile Number</label>
               <input type="text" name="tel" class="form-control" placeholder="578-555-555" autocomplete="off">
            </div>
         </div>
         <div class="col-md-6" id="res_bottom_right">
            <div class="form-group">
               <label>E-mail</label>
               <input type="email" name="email" class="form-control" placeholder="john-jolly@example.com" autocomplete="off">
            </div>
         </div>
         <div class="form-group">
            <a href="res"><input type="submit" name="submit" value="Booking" class="btn btn-success" id="main_submit">
         </div>
      </div>
   </form>
<?php

      if(isset($_POST['submit'])){
         $city        = $_POST['city'];
         $dateFrom    = $_POST['dateFrom'];
         $dateTo      = $_POST['dateTo'];
         $tour_genre  = $_POST['tour_genre'];
         $adultNumber = $_POST['adultNumber'];
         $childNumber = $_POST['childNumber'];
         $tel         = $_POST['tel'];
         $email       = $_POST['email'];
         $fname       = $_POST['fname'];
         $lname       = $_POST['lname'];

         if(!empty($tel) or !empty($email) or !empty($fname) or !empty($lname)){

            $cityQuery = "SELECT * FROM city WHERE id = '$city'";
            $runCity   = mysqli_query($conn,$cityQuery);

            while($row = mysqli_fetch_array($runCity)){
               $cityName = $row['city_name_eng'];
            }

            $genreQuery = "SELECT * FROM tour_genres WHERE id = '$tour_genre'";
            $runGenre   = mysqli_query($conn,$genreQuery);

            while($row2 = mysqli_fetch_array($runGenre)){
               $genreName = $row2['genre_name_eng'];
            }

          $message = '
            <html>
            <head>
                <title>TOURIN.GE</title>
            </head>
            <body>
                <h3>ტურის შესახებ:</h4>
                <table cellspacing="0" style="border: 1px solid #CCCCCC">
                    <tr>
                        <th width: 350px; heigth: 35px; font-color:#000000;>ლოკაციის სახელი:</th><td width: 350px; heigth: 35px; font-color:#000000;>'.$cityName.'</td>
                    </tr>
                    <tr style="background-color: #e0e0e0;">
                        <th width: 350px; heigth: 35px; font-color:#000000;>ტურის დასახელება:</th><td width: 350px; heigth: 35px; font-color:#000000;>'.$genreName.'</td>
                    </tr>
                    <tr>
                        <th width: 350px; heigth: 35px; font-color:#000000;>თარიღიდან:</th><td width: 350px; heigth: 35px; font-color:#000000;>'. $dateFrom.'</td>
                    </tr>
                    <tr>
                        <th width: 350px; heigth: 35px; font-color:#000000;>თარიღამდე:</th><td width: 350px; heigth: 35px; font-color:#000000;>'. $dateTo.'</td>
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
                        <th width: 350px; heigth: 35px; font-color:#000000;>ზრდასრულების რაოდენობა:</th><td width: 350px; heigth: 35px; font-color:#000000;>'.$adultNumber.'</td>
                    </tr>
                    <tr>
                        <th width: 350px; heigth: 35px; font-color:#000000;>ბავშვების რაოდენობა:</th><td width: 350px; heigth: 35px; font-color:#000000;>'.$childNumber.'</td>
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
                $mail->Subject = "Personal tour reservation!";      // Subject (which isn't required)  
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



            $query3 = "INSERT INTO personal (tour_city_id,tour_genre_id,date_from,date_to,adults_count,childs_count,tel,email,fname,lname,datee) 
                       VALUES ('$city','$tour_genre','$dateFrom','$dateTo','$adultNumber','$childNumber','$tel','$email','$fname','$lname','$datee')";
            $run3   = mysqli_query($conn,$query3);

            header('location: booking_personal_en.php?city='.$city.'&tour_genre='.$tour_genre.'&dateFrom='.$dateFrom.'&dateTo='.$dateTo.'&adultNumber='.$adultNumber.'&childNumber='.$childNumber.'&datee='.$datee);

         }else{
            echo 'Please fill all fileds!';
         }

      }
      