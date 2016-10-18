<?php
	$query1 = "SELECT * FROM contact";
    $run1   = mysqli_query($conn,$query1);

    while($row1 = mysqli_fetch_array($run1)){
      $tel    = $row1['tel'];
      $email  = $row1['email'];
    }
?>
<div class="container" id="footer_container">
    <div class="col-md-3">
    	<h4><i class="fa fa-mobile" aria-hidden="true"></i> <a href="tel:<?php echo $tel;?>"><?php echo substr($tel, 4,3).'-'.substr($tel,7,2).'-'.substr($tel, 9,2).'-'.substr($tel, 11,2);?></a></h4>
    </div>
    <div class="col-md-3">
    	<h4><i class="fa fa-envelope-o" aria-hidden="true"></i> <a href="mailto:<?php echo $email;?>" target="_top"><?php echo $email;?></a></h4>
    </div>
    <div class="col-md-3">
    	<h4><i class="fa fa-copyright" aria-hidden="true"></i> <?php echo date('Y');?> Tour In . All rights reserved!</h4>
    </div>
    <div class="col-md-3">
    	<!-- TOP.GE COUNTER CODE -->
		<script language="JavaScript" type="text/javascript" src="//counter.top.ge/cgi-bin/cod?100+105457"></script>
		<noscript>
		<a target="_top" href="http://counter.top.ge/cgi-bin/showtop?105457">
		<img src="//counter.top.ge/cgi-bin/count?ID:105457+JS:false" border="0" alt="TOP.GE" /></a>
		</noscript>
		<!-- / END OF TOP.GE COUNTER CODE -->
    </div>
</div>