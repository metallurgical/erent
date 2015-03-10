<?php
session_start();
include('../config.php');
error_reporting(0);
if(!isset($_SESSION['user_id']))
{
	echo "<script language=javascript>alert('Sila log masuk terlebih dahulu.');window.location='../login.php';</script>";
}

if($_GET['action']=="logout")
{
	unset($_SESSION['user_id']);
	echo "<script language=javascript>alert('Log keluar berjaya.');window.location='../login.php';</script>";
}

$sql_pelajar = "SELECT * FROM feedback WHERE id = '".$_GET['id']."'";
if($result_pelajar = $connect->query($sql_pelajar))
{
	$rows_pelajar = $result_pelajar->fetch_array();
	$total_pelajar = $result_pelajar->num_rows;
}
$sql_pentadbir = "SELECT * FROM user WHERE user_id = '".$_SESSION['user_id']."'";
if($result_pentadbir = $connect->query($sql_pentadbir))
{
	$rows_pentadbir = $result_pentadbir->fetch_array();
	$total_pentadbir = $result_pentadbir->num_rows;
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
			  <li><a href="my-profile.html">Profile</a></li>
              <li class="divider"></li>
              <li><a href="#">Sign Out</a></li>
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
		  <div class="row-fluid">
			<div class="page-header">
				<h1>My profile <small>Update info</small></h1>
			</div>
			<form class="form-horizontal">
				<fieldset>
					<div class="control-group">
						<label class="control-label" for="name">Name</label>
						<div class="controls">
	 <input type="text" name="nama"  class="form-control" value="<?php echo ucwords($rows_pelajar['nama']);?>" readonly>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="email">E-mail</label>
						<div class="controls">
	 <input type="text" name="no_tel" class="form-control" value="<?php echo ucwords($rows_pelajar['email']);?>" readonly>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="pnohe">Subjek</label>
						<div class="controls">
	<input type="text" name="no_tel" class="form-control" value="<?php echo ucwords($rows_pelajar['subject']);?>" readonly>
						</div>
					</div>
                    <div class="control-group">
						<label class="control-label" for="description">Maklum Balas</label>
						<div class="controls">
		 <textarea readonly><?php echo ucwords($rows_pelajar['descr']);?></textarea>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="city">Tarikh Hantar</label>
						<div class="controls">
<input type="text" class="input-xlarge" id="city" value="<?php echo ucwords($rows_pelajar['date_register']);?>" readonly>
						</div>
					</div>
                   
			
					<div class="form-actions">
                    <a href="list_contact.php" class="btn btn-primary">Kembali</a>
					</div>					
				</fieldset>
			</form>
		  </div>
        </div>
      </div>

      <hr>

      <footer class="well">
        &copy; Erent
      </footer>

    </div>

    <script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
  </body>
</html>
