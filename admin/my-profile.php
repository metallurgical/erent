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


$sql_pelajar = "SELECT * FROM user WHERE user_id = ".$_GET['id']."";
if($result_pelajar = $connect->query($sql_pelajar))
{
	$rows_pelajar = $result_pelajar->fetch_array();
	if(!$total_pelajar = $result_pelajar->num_rows)
	{
		echo "<script language=javascript>alert('Maklumat pelajar tidak wujud.');window.location='student-list.php';</script>";
	}
} 
else
{
	echo "<script language=javascript>alert('Maklumat pelajar tidak wujud.');window.location='student-list.php';</script>";
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
    <style type="text/css">
    body {
	background-image: url(img/2.png);
}
    </style>
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
        <a class="brand" href="#">Erent</a></div>
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
				<h1>Profil <small>(Kemaskini info)</small></h1>
			</div>
			<form class="form-horizontal" method="post">
				<fieldset>
					<div class="control-group">
						<label class="control-label" for="name">Nama</label>
						<div class="controls">
							<?php echo ucwords($rows_pelajar['nama']);?>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="email">E-mail</label>
						<div class="controls">
							<?php echo ucwords($rows_pelajar['email']);?>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="pnohe">No Telefon</label>
						<div class="controls">
							<?php echo ucwords($rows_pelajar['no_tel']);?>
						</div>
					</div>
                    <div class="control-group">
						<label class="control-label" for="description">Alamat</label>
						<div class="controls">
							<?php echo ucwords($rows_pelajar['alamat']);?>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="city">Daerah</label>
						<div class="controls">
							<?php echo ucwords($rows_pelajar['daerah']);?>
						</div>
					</div>
                    <div class="control-group">
						<label class="control-label" for="city">Poskod</label>
						<div class="controls">
							<?php echo ucwords($rows_pelajar['poskod']);?>
						</div>
					</div>	
                    	
                    <div class="control-group">
                        <label class="control-label" for="city">Negeri</label>
                         <div class="controls">
                     <?php echo ucwords($rows_pelajar['negeri']);?>
                     	</div>
                                           
                    </div>
                    <div class="control-group">
						<label class="control-label" for="city">Nama Pengguna</label>
						<div class="controls">
							<?php echo ucwords($rows_pelajar['username']);?>
						</div>
					</div>	
                      <div class="control-group">
						<label class="control-label" for="city">Kata Laluan</label>
						<div class="controls">
							<?php echo ucwords($rows_pelajar['password']);?>
						</div>
					</div>	
                      <div class="control-group">
						<label class="control-label" for="city">Tarikh Daftar</label>
						<div class="controls">
							<?php echo ucwords($rows_pelajar['date_register']);?>
						</div>
					</div>
			
					<div class="form-actions">
                    <button type="button" name="simpan" class="btn btn-success btn-large" onclick="window.location.href='my-profile-kemaskini.php?id=<?php echo $_GET['id'];?>'">Kemaskini</button>
						 
					</div>					
				</fieldset>
			</form>
		  </div>
        </div>
      </div>

      <hr>
    </div>

    <script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
  </body>
</html>
