<?php
error_reporting(0);
session_start();
include('../config.php');

if(!isset($_SESSION['user_id']))
{
	echo "<script language=javascript>alert('Sila log masuk terlebih dahulu.');window.location='../login.php';</script>";
}

if($_GET['action']=="logout")
{
	unset($_SESSION['user_id']);
	echo "<script language=javascript>alert('Log keluar berjaya.');window.location='../login.php';</script>";
}


$sql_pentadbir = "SELECT * FROM user WHERE user_id = '".$_SESSION['user_id']."'";
if($result_pentadbir = $connect->query($sql_pentadbir))
{
	$rows_pentadbir = $result_pentadbir->fetch_array();
	$total_pentadbir = $result_pentadbir->num_rows;
}
$sql_pelajar = "SELECT * FROM home WHERE id = '".$_GET['id']."'";
if($result_pelajar = $connect->query($sql_pelajar))
{
	$rows_pelajar = $result_pelajar->fetch_array();
	$total_pelajar = $result_pelajar->num_rows;
}


?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Admin | i-Home</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Admin panel developed with the Bootstrap from Twitter.">
    <meta name="author" content="travis">

    <link href="css/bootstrap.css" rel="stylesheet">
	<link href="css/site.css" rel="stylesheet">
    <link href="css/bootstrap-responsive.css" rel="stylesheet">
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <style type="text/css">
        .gallery
{
    display: inline-block;
    margin-top: 20px;
}
    </style>
    <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="../bootstrap/js/bootstrap.min.js"></script>
  </head>
  <body>
    <div class="navbar navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container-fluid">
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <a class="brand" href="#">Erent</a>
          <div class="btn-group pull-right">
			<a class="btn" href="my-profile.html"><i class="icon-user"></i> Admin</a>
            <a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
              <span class="caret"></span>
            </a>
            <ul class="dropdown-menu">
			  
              <li class="divider"></li>
              <li><a href="<?php echo $_SERVER['PHP_SELF']."?action=logout";?>">Logout</a></li>
            </ul>
          </div>
         
        </div>
      </div>
    </div>

    <div class="container-fluid">
      <div class="row-fluid">
        <div class="span3">
          <div class="well sidebar-nav">
          <?php  include 'menu.php'; ?>
          </div>
        </div>
        <div class="span9">
      <!-- References: https://github.com/fancyapps/fancyBox -->
<link rel="stylesheet" href="//frontend.reklamor.com/fancybox/jquery.fancybox.css" media="screen">
<script src="//frontend.reklamor.com/fancybox/jquery.fancybox.js"></script>

			
            <div class="container">
	<div class="row"><div class="list-group gallery">
            <div class="col-lg-13">
                <a class="thumbnail fancybox" rel="ligthbox" href="../admin/upload/<?php echo $rows_pelajar['gambar_rumah'];?>" id="link">
              <!--   <a href="view_contact.php?id=<?php echo $rows_pelajar['id'];?>" title="lihat"> -->
                  <?php 
								 if($rows_pelajar['gambar_rumah']==NULL) { ?>
								<img src="../admin/img/url.png" width="500" height="350" />
													<?php } 
													else { ?>
								<img src="../admin/upload/<?php echo $rows_pelajar['gambar_rumah'];?>" width="500" height="350" />
													<?php } ?>
                  <!--  <img class="img-responsive" alt="" src="http://placehold.it/320x320"/>-->
                    <div class='text-right'>
                        <small class='text-muted'>Image Title</small>
                    </div> <!-- text-right / end -->
                </a>
            </div> <!-- col-6 / end -->
		  </div>
          </div> <!-- row / end -->
</div> <!-- container / end -->

        </div>
      </div>
<script type="text/javascript">
$(document).ready(function(){
	
	//var id=$(this).attr(id);
    //FANCYBOX
    //https://github.com/fancyapps/fancyBox
	
    $("a#link").fancybox({
		// data:{"id":id},
        openEffect: "none",
		
        closeEffect: "none",
		'width'        : '50%',
 'height'       : '60%',
 'autoScale'        : false, 
 'type'         : 'iframe',
 'overlayShow'   : false,
 'transitionIn'  : 'elastic',
 'transitionOut' : 'elastic',
 'callbackOnClose': function() {
       $("#fancy_content").empty();
	   
	   
          }
 
    });
});
   
   
  
</script>
      <hr>

      <footer class="well">
        &copy; Erent
      </footer>

    </div>

  
  </body>
</html>
