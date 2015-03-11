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

if(isset($_POST['simpan']))
{
	$sql_edit_pelajar = "SELECT * FROM user WHERE user_id != '".$_GET['id']."' AND username = '".$username."'";
	if($result_edit_pelajar = $connect->query($sql_edit_pelajar))
	{
		if($total_edit_pelajar = $result_edit_pelajar->num_rows)
		{
			echo "<script language=javascript>alert('ID pengguna telah wujud. Sila cuba lagi.');window.location='my-profile.php?id=".$_GET['id']."';</script>";
		}
		else
		{
			
			{
				
				$sql_edit_pelajar = "UPDATE user SET nama = '".$name_edit."', email = '".$email_edit."', no_tel = '".$no_tel_edit1."', alamat = '".$alamat_edit1."', daerah = '".$daerah_edit1."', poskod = '".$poskod_edit1."', negeri = '".$negeri_edit."', username = '".$username_edit."', password = '".$password_edit."' WHERE user_id = '".$_GET['id']."'";
				if($result_edit_pelajar = $connect->query($sql_edit_pelajar))
				{
					echo "<script language=javascript>alert('Maklumat pelajar berjaya dikemaskini.');window.location='my-profile.php?id=".$_GET['id']."';</script>";
				}
				else
				{
					echo "<script language=javascript>alert('Maklumat pelajar tidak berjaya dikemaskini. Sila cuba lagi.');window.location='my-profile.php?id=".$_GET['id']."';</script>";
				}
			}
		}
	}
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
							<input type="text" name="name_edit" class="input-xlarge" id="name" value="<?php echo ucwords($rows_pelajar['nama']);?>" />
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="email">E-mail</label>
						<div class="controls">
							<input type="text" name="email_edit" class="input-xlarge" id="email" value="<?php echo ucwords($rows_pelajar['email']);?>" />
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="pnohe">No Telefon</label>
						<div class="controls">
							<input type="text" name="no_tel_edit1" class="input-xlarge" id="phone" value="<?php echo ucwords($rows_pelajar['no_tel']);?>" />
						</div>
					</div>
                    <div class="control-group">
						<label class="control-label" for="description">Alamat</label>
						<div class="controls">
							<textarea class="input-xlarge" name="alamat_edit1" id="description" rows="3"><?php echo ucwords($rows_pelajar['alamat']);?></textarea>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="city">Daerah</label>
						<div class="controls">
							<input type="text" name="daerah_edit1" class="input-xlarge" id="city" value="<?php echo ucwords($rows_pelajar['daerah']);?>"/>
						</div>
					</div>
                    <div class="control-group">
						<label class="control-label" for="city">Poskod</label>
						<div class="controls">
							<input type="text" name="poskod_edit1" class="input-xlarge" id="city" value="<?php echo ucwords($rows_pelajar['poskod']);?>"/>
						</div>
					</div>	
                    	
                    <div class="form-group">
                                            <label class="control-label">Negeri</label>
                                            <div class="controls">
                                           <input type="text" name="negeri_edit" class="input-xlarge" id="city" value="<?php echo ucwords($rows_pelajar['negeri']);?>"/></div>
                                           
                                        </div><br>
                                          <div class="control-group">
						<label class="control-label" for="city">Nama Pengguna</label>
						<div class="controls">
							<input type="text" name="username_edit" class="input-xlarge" id="city" value="<?php echo ucwords($rows_pelajar['username']);?>"/>
						</div>
					</div>	
                      <div class="control-group">
						<label class="control-label" for="city">Kata Laluan</label>
						<div class="controls">
							<input type="text" name="password_edit" class="input-xlarge" id="city" value="<?php echo ucwords($rows_pelajar['password']);?>"/>
						</div>
					</div>	
                      <div class="control-group">
						<label class="control-label" for="city">Tarikh Daftar</label>
						<div class="controls">
							<input type="text" name="reg_edit" class="input-xlarge" id="city" value="<?php echo ucwords($rows_pelajar['date_register']);?>" readonly/>
						</div>
					</div>
			<!--		<div class="control-group">
						<label class="control-label" for="role">Role</label>
						<div class="controls">
							<select id="role">
								<option value="admin">Admin</option>
								<option value="mod">Moderator</option>
								
							</select>
						</div>
					</div>	
					<div class="control-group">
						<label class="control-label" for="active">Active?</label>
						<div class="controls">
							<input type="checkbox" id="active" value="1" />
						</div>
					</div> -->
					<div class="form-actions">
                    <button type="submit" name="simpan" class="btn btn-success btn-large">Simpan</button>
					<button type="button" name="simpan" class="btn" onclick="window.location.href='my-profile.php?id=<?php echo $_GET['id'];?>'">Batal</button>
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
