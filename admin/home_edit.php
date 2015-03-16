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

$sql_pelajar = "SELECT * FROM home WHERE id = '".$_GET['id']."'";
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
 
if(isset($_POST['simpan']))

{
	/*$sql_edit_pelajar = "SELECT * FROM home WHERE id != '".$_GET['id']."'";
	if($result_edit_pelajar = $connect->query($sql_edit_pelajar))
	{
		if($total_edit_pelajar = $result_edit_pelajar->num_rows)
		{
			echo "<script language=javascript>alert('ID pengguna telah wujud. Sila cuba lagi.');window.location='home_edit.php?id=".$_GET['id']."';</script>";
		}
		else
		{*/
	extract($_POST);
	
			 //$gambar = isset($_POST['gambar']) ? $_POST['gambar'] : '';
			$gambar = $connect->real_escape_string(stripslashes($_FILES['gambar']['name']));
			$target = "upload/";
			$target = $target.basename($gambar);
			if($gambar!=NULL)
			{
				$sql_edit_pelajar = "UPDATE home SET nama_pemilik='".$nama_pemilik."', kawasan_id='".$kawasan_id."', alamat = '".$alamat_edit."', poskod = '".$poskod_edit."', no_tel = '".$no_tel_edit."', email = '".$email3_edit."', location = '".$location_edit."', type_properties = '".$jenis_edit."', bedroom = '".$bil_bed_edit."', bath_room = '".$bil_bath_edit."',furnished = '".$furnished_edit."',price_rent = '".$harga_edit."',descr = '".$desc_edit."',gambar_rumah = '".$gambar."',status_bayaran = '".$status_bayaran."',updated_by = '".$updated_by."',updated_dt ='now()' WHERE id = '".$_GET['id']."'";
				
				if($result_edit_pelajar = $connect->query($sql_edit_pelajar))
				{
					$id=$_GET['id'];
					move_uploaded_file($_FILES['gambar']['tmp_name'], $target);
					echo "<script language=javascript>alert('Maklumat aaaa berjaya dikemaskini.');window.location='home_edit.php?id=$id';</script>";
				}
				else
				{
					echo "<script language=javascript>alert('Maklumat pengguna tidak berjaya dikemaskini. Sila cuba lagi.');window.location='edit.php?id=".$_GET['id']."';</script>";
				}
			}
			else
			{
				$sql_edit_pelajar = "UPDATE home SET nama_pemilik='".$nama_pemilik."', kawasan_id='".$kawasan_id."',alamat = '".$alamat_edit."', poskod = '".$poskod_edit."', no_tel = '".$no_tel_edit."', email = '".$email3_edit."', location = '".$location_edit."', type_properties = '".$jenis_edit."', bedroom = '".$bil_bed_edit."', bath_room = '".$bil_bath_edit."',furnished = '".$furnished_edit."',price_rent = '".$harga_edit."',descr = '".$desc_edit."',status_bayaran = '".$status_bayaran."',updated_by = '".$updated_by."',updated_dt ='now()'  WHERE id = '".$_GET['id']."'";
				
				if($result_edit_pelajar = $connect->query($sql_edit_pelajar))
				{
					$id=$_GET['id'];
					echo "<script language=javascript>alert('Maklumat pengguna berjaya dikemaskini.');window.location='home_edit.php?id=$id';</script>";
				}
				else
				{
					echo "<script language=javascript>alert('Maklumat pengguna tidak berjaya dikemaskini. Sila cuba lagi.');window.location='edit.php?id=".$_GET['id']."';</script>";
				}
			}
		//}
	//}
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
				<h1>Pendaftaran Rumah Untuk Sewaan <small></small></h1>
			</div>
            <form method="post" enctype="multipart/form-data" class="form-horizontal">
				<fieldset>
					<div class="control-group">
						<label class="control-label" for="name">Gambar Rumah</label>
						<div class="controls">
						
                         <?php 
								 if($rows_pelajar['gambar_rumah']==NULL) { ?>
								<img src="img/url.png" width="150" height="150" />
													<?php } 
													else { ?>
								<img src="upload/<?php echo $rows_pelajar['gambar_rumah'];?>" width="150" height="150" />
													<?php } ?>
                                                
							<input type="file" class="input-xlarge" id="name" name="gambar"/><br>
                            <input type="hidden" name="nama_user" value="<?php echo ucwords($rows_pentadbir ['username']);?>" readonly>
						</div>
                        
					</div>
                    
                     <div class="control-group">
						<label class="control-label" for="email">Nama Pemilik</label>
						<div class="controls">
							<input type="text" class="input-xlarge" id="email" name="nama_pemilik" value="<?php echo $rows_pelajar['nama_pemilik'];?>"/>
						</div>
					</div>
                     
                    <div class="control-group">
						<label class="control-label" for="name">Alamat</label>
						<div class="controls">
							<textarea class="input-xlarge" id="description" rows="3" name="alamat_edit" required><?php echo $rows_pelajar['alamat'];?></textarea>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="email">Poskod</label>
						<div class="controls">
							<input type="text" class="input-xlarge" id="email" name="poskod_edit" value="<?php echo $rows_pelajar['poskod'];?>"/>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="pnohe">No Telefon</label>
						<div class="controls">
							<input type="text" class="input-xlarge" id="phone" name="no_tel_edit" value="<?php echo $rows_pelajar['no_tel'];?>" />
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="city">Email</label>
						<div class="controls">
							<input type="text" class="input-xlarge" id="city" name="email3_edit" value="<?php echo $rows_pelajar['email'];?>" />
						</div>
					</div>	
                    <!-- <div class="control-group">
						<label class="control-label" for="city">Lokasi</label>
						<div class="controls">
							<input type="text" class="input-xlarge" id="city" name="location_edit" value="<?php echo $rows_pelajar['location'];?>" />
						</div>
					</div> -->	
					<div class="control-group">
						<label class="control-label" for="city">Lokasi</label>
						<div class="controls">
							<select name="kawasan_id">
							<?php
							
							$sql_pentadbir1 = "SELECT * FROM kawasan";
							$result_pentadbir1 = $connect->query($sql_pentadbir1)or die(mysql_error());
							while($rows_pentadbir1 = $result_pentadbir1->fetch_array())
							{

							?>
							<option value="<?php echo $rows_pentadbir1['kawasan_id'];?>">
								<?php echo $rows_pentadbir1['kawasan_name'];?>
							</option>
							<?php
							}

							?>
							</select>
						</div>
					</div>	
                     <div class="control-group">
						<label class="control-label" for="city">Jenis Perumahan</label>
						<div class="controls">
							<input type="text" class="input-xlarge" id="city" name="jenis_edit" value="<?php echo $rows_pelajar['type_properties'];?>" />
						</div>
					</div>	
                     <div class="control-group">
						<label class="control-label" for="city">Bilangan Bilik Tidur</label>
						<div class="controls">
							<input type="text" class="input-xlarge" id="city" name="bil_bed_edit" value="<?php echo $rows_pelajar['bedroom'];?>" />
						</div>
					</div>	
                     <div class="control-group">
						<label class="control-label" for="city">Bilangan Bilik Mandi</label>
						<div class="controls">
							<input type="text" class="input-xlarge" id="city" name="bil_bath_edit" value="<?php echo $rows_pelajar['bath_room'];?>" />
						</div>
					</div>	
                     <div class="control-group">
						<label class="control-label" for="city">Perabot</label>
						<div class="controls">
							<input type="text" class="input-xlarge" id="city" name="furnished_edit" value="<?php echo $rows_pelajar['furnished'];?>" />
						</div>
					</div>	
                     <div class="control-group">
						<label class="control-label" for="city">Harga</label>
						<div class="controls">
							<input type="text" class="input-xlarge" id="city" name="harga_edit" value="<?php echo $rows_pelajar['price_rent'];?>" />
						</div>
					</div>	
                     <div class="control-group">
						<label class="control-label" for="city">Keterangan</label>
						<div class="controls">
							<textarea class="input-xlarge" id="description" rows="3" name="desc_edit"><?php echo $rows_pelajar['descr'];?></textarea>
						</div>
					</div>	
				 <div class="control-group">
						<label class="control-label" for="city">Status Bayaran</label>
						<div class="controls">
							<input type="text" class="input-xlarge" id="city" name="status_bayaran" value="<?php echo $rows_pelajar['status_bayaran'];?>" />
						</div>
					</div>	
                
					
					<div class="form-actions">
						<input type="submit" class="btn btn-success btn-large" value="Kemaskini Rumah" name="simpan"/> 
						<button type="button" name="simpan" class="btn" onclick="window.location.href='my-profile.php?id=<?php echo $_SESSION['user_id'];?>'">Batal</button>
					</div>					
				</fieldset>
			</form>
		  </div>
        </div>
      </div>

      <hr>

      <!-- <footer class="well">
        &copy; Erent
      </footer> -->

    </div>

    <script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
  </body>
</html>
