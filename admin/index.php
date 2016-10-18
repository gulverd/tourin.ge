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
    <div class="container">
      <div class="col-md-12" id="login_wrapper_all">
          <div class="container" id="login_cont">
            <div class="col-md-12" id="login_wrp">
              <div class="form-group">
                <label>Authorization</label>
              </div>
              <form action="" method="POST">
                <div class="form-group">
                    <input type="text" name="username" class="form-control" placeholder="Please enter username">
                </div>
                <div class="form-group">
                    <input type="password" name="password" class="form-control" placeholder="Please enter password">
                </div>
                <div class="form-group">
                    <input type="submit" name="submit" class="btn btn-primary" value="Submit">
                </div>
              </form>
            </div>
          </div>
      </div>
    </div>
  </body>
</html>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>

<?php 

    include '..//db.php';

    if(isset($_POST['submit'])){
      $usr = $_POST['username'];
      $psw = $_POST['password'];

      $query = "SELECT id FROM users WHERE username = '$usr' AND password1 = '$psw'";
      $run   = mysqli_query($conn,$query);

      while($row = mysqli_fetch_array($run)){
          header('location: main.php');
      }

    }
  