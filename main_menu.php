<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="container" id="main_menu_container">
    <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="index.php"><Span id="logo_font">TOUR</span><span id="logo_i">I</Span><Span id="logo_font">N.GE</Span> </a>
      </div>

      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
          <li><a href="index.php">მთავარი</a></li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">ტურები <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="tours.php">ტურები საქართველოში</a></li>
              <li><a href="personal.php">პერსონალური ტური</a></li>
            </ul>
          <li><a href="events.php" id="events_a">ღონისძიებები</a></li>
          <li><a href="contact.php">კონტაქტი</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
          <?php 

            include 'db.php';

            $query = "SELECT * FROM contact";
            $run   = mysqli_query($conn,$query);
            
            while($row = mysqli_fetch_array($run)){
              $facebook      = $row['facebook'];
              $odnoklassniki = $row['odnoklasniki'];
              $vkontakte     = $row['vkontakte'];
              $instagram     = $row['instagram'];
            }
            

          ?>
          <li><a href="<?php echo $facebook;?>" id="social_icons" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
          <li><a href="<?php echo $instagram;?>" id="social_icons" target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
          <li><a href="<?php echo $vkontakte;?>" id="social_icons" target="_blank"><i class="fa fa-vk" aria-hidden="true"></i></a></li>
          <li><a href="<?php echo $odnoklassniki;?>" id="social_icons" target="_blank"><i class="fa fa-odnoklassniki" aria-hidden="true"></i></a></li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><img src="img/geo.jpg" id="flag_img"> <span class="caret"></span></a>
            <ul class="dropdown-menu" id="dropdown_flag">
              <li><a href="index.php"><img src="img/geo.jpg" id="flag_img"></a></li>
              <li><a href="index_ru.php"><img src="img/rus.jpeg" id="flag_img"></a></li>
              <li><a href="index_en.php"><img src="img/great.jpg" id="flag_img"></a></li>
            </ul>
          </li>
        </ul>
      </div><!-- /.navbar-collapse -->
    </div>
  </div><!-- /.container-fluid -->
</nav>