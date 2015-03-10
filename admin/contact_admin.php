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


$sql_pentadbir = "SELECT * FROM user WHERE user_id = '".$_SESSION['user_id']."'";
if($result_pentadbir = $connect->query($sql_pentadbir))
{
	$rows_pentadbir = $result_pentadbir->fetch_array();
	$total_pentadbir = $result_pentadbir->num_rows;
}

if(isset($_POST['simpan']))
{
	$sql_daftar = "SELECT * FROM feedback ";
	if($result_daftar = $connect->query($sql_daftar))
	{
		if($total_daftar = $result_daftar->num_rows)
		{
			$sql_daftar = "INSERT INTO feedback (nama,email,subject,descr,date_send) values
		('".$name."','".$email1."','".$subj."','".$descr."',now())";
			if($result_daftar = $connect->query($sql_daftar))
			{
				echo "<script language=javascript>alert('Data berjaya disimpan.');window.location='../admin/index.php';</script>";
			}
			else
			{
				echo "<script language=javascript>alert('Data tidak berjaya disimpan.');window.location='contact_admin.php';</script>";
			}
		}
	}
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Admin | Erent</title>
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
				<h1>Pertanyaan/Maklum Balas <small></small></h1>
			</div>
			<form class="form-horizontal" action="contact_admin.php" method="post">
				<fieldset>
					<div class="control-group">
						<label class="control-label" for="role">Nama</label>
						<div class="controls">
							<input type="text" class="input-xlarge" id="role" name="name"/>
						</div>
					</div>
                    <div class="control-group">
						<label class="control-label" for="slug">Email</label>
						<div class="controls">
							<input type="text" class="input-xlarge" id="slug" name="email"/>
						</div>
					</div>
                    
					
                       <div class="control-group">
						<label class="control-label" for="slug">Subjek</label>
						<div class="controls">
							<input type="text" class="input-xlarge" id="slug" name="subj"/>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="description">Pertanyaan</label>
						<div class="controls">
							<textarea class="input-xlarge" id="description" rows="3" name="descr"></textarea>
						</div>
					</div>
					
					<div class="form-actions">
						<input type="submit" name="simpan" class="btn btn-success btn-large" value="Hantar" /> <a class="btn" href="index.php">Kembali</a>
					</div>					
				</fieldset>
			</form>
<br>

		  </div>
        </div>
      </div>

      <hr>
    </div>

    <script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
  </body>
</html>
