<?php
session_start();
error_reporting(0);
include('../config.php');

if(!isset($_SESSION['user_id']))
{
	echo "<script language=javascript>alert('Sila log masuk terlebih dahulu.');window.location='../login.php';</script>";
}

if($_GET['action']=="logout")
{
	unset($_SESSION['id']);
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
$con=mysqli_connect("localhost","root","","erent");
		// Check connection
		if (mysqli_connect_errno())
		  {
		  echo "Failed to connect to MySQL: " . mysqli_connect_error();
		  }
		$allowedExts = array("gif", "jpeg", "jpg", "png", "bmp");
		$temp = explode(".", $_FILES["file"]["name"]);
		$extension = end($temp);
		$nama_pemilik = mysqli_real_escape_string($con, $_POST['nama_pemilik']);
		$alamat = mysqli_real_escape_string($con, $_POST['alamat']);
		$poskod = mysqli_real_escape_string($con, $_POST['poskod']);
		$no_tel = mysqli_real_escape_string($con, $_POST['no_tel']);
		$email3 = mysqli_real_escape_string($con, $_POST['email']);
		/*$location = mysqli_real_escape_string($con, $_POST['location']);*/
		$kawasan_id = mysqli_real_escape_string($con, $_POST['kawasan_id']);
		$jenis = mysqli_real_escape_string($con, $_POST['jenis']);
		$bil_bed = mysqli_real_escape_string($con, $_POST['bil_bed']);
		$bil_bath = mysqli_real_escape_string($con, $_POST['bil_bath']);
		$furnished = mysqli_real_escape_string($con, $_POST['furnished']);
		$harga = mysqli_real_escape_string($con, $_POST['harga']);
		$desc = mysqli_real_escape_string($con, $_POST['desc']);
		$nama_user = mysqli_real_escape_string($con, $_POST['nama_user']);
		$user_id = mysqli_real_escape_string($con, $_POST['user_id']);
		/*$tajuk = mysqli_real_escape_string($con, $_POST['tajuk']);*/

		$file=$_FILES["file"]["name"];
		$size= $_FILES["file"]["size"];

		if($size >400000)
		{
			//echo "<label class='err'> Image size must not greater than 40kb </label>";
			echo "<script language=javascript>alert('Image size must not greater than 40kb.');</script>";
		}
		/*if ((($_FILES["file"]["type"] == "image/gif")
		|| ($_FILES["file"]["type"] == "image/jpeg")
		|| ($_FILES["file"]["type"] == "image/jpg")
		|| ($_FILES["file"]["type"] == "image/pjpeg")
		|| ($_FILES["file"]["type"] == "image/x-png")
		|| ($_FILES["file"]["type"] == "image/bmp")
		|| ($_FILES["file"]["type"] == "image/png"))
		&& ($_FILES["file"]["size"] < 400000)
		&& in_array($extension, $allowedExts)) 
		{*/
		  if ($_FILES["file"]["error"] > 0) 
		  {
			//echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
		 echo "Return Code: ".$_FILES["file"]["error"]."<br> <script language=javascript>alert('Image upload error.');</script>";
		  } 
		  
				if (file_exists("upload/" . $_FILES["file"]["name"])) 
				{
				// echo $_FILES["file"]["name"] . "Image upload already exist. ";
			 		echo $_FILES["file"]["name"] ."<script language=javascript>alert('Image upload already exist.');</script>";
    			} 
				else
				{

				  move_uploaded_file($_FILES["file"]["tmp_name"],
				  "upload/" . $_FILES["file"]["name"]);
				  mysqli_query($con,"INSERT INTO home (user_id,gambar_rumah,nama_pemilik,alamat,poskod,no_tel,email,kawasan_id,type_properties,bedroom,  bath_room,furnished,price_rent,descr,created_by,created_dt,status_bayaran)
					VALUES ('$user_id','$file','$nama_pemilik','$alamat','$poskod','$no_tel','$email3','$kawasan_id','$jenis','$bil_bed','$bil_bath','$furnished','$harga','$desc','$nama_user',now(),'belum_jelas')")or die(mysql_error());
				//echo "Data Entered Successfully Saved!";
				   echo "<script language=javascript>alert('Data Berjaya Disimpan');</script>";
    			}

		//}
	
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
				<h1>Pendaftaran Rumah Untuk Sewa <small></small></h1>
			</div>
            <form action="home_reg.php" method="post" enctype="multipart/form-data" class="form-horizontal" id="form_reg">
				<fieldset>
					<div class="control-group">
						<label class="control-label" for="name">Gambar Rumah</label>
						<div class="controls">
							<input name="file" type="file" class="input-xlarge" id="name"/><br>
                            <input type="hidden" name="nama_user" value="<?php echo ucwords($rows_pentadbir ['username']);?>" readonly>
                            <input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id'];?>" readonly>
						</div>
					</div>
                    
                    <div class="control-group">
						<label class="control-label" for="email">Nama Pemilik</label>
						<div class="controls">
							<input type="text" class="input-xlarge" id="email" name="nama_pemilik" value="<?php echo ucwords($rows_pentadbir['nama']);?>" required readonly/>
						</div>
					</div>
                    
                    <div class="control-group">
						<label class="control-label" for="name">Alamat</label>
						<div class="controls">
							<textarea class="input-xlarge" id="description" rows="3" name="alamat" required readonly><?php echo ucwords($rows_pentadbir['alamat']);?></textarea>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="email">Poskod</label>
						<div class="controls">
							<input type="text" class="input-xlarge" id="email" name="poskod" required value="<?php echo ucwords($rows_pentadbir['poskod']);?>" readonly/>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="pnohe">No Telefon</label>
						<div class="controls">
							<input type="text" class="input-xlarge" id="phone" name="no_tel" required value="<?php echo ucwords($rows_pentadbir['no_tel']);?>" readonly />
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="city">Email</label>
						<div class="controls">
							<input type="text" class="input-xlarge" id="city" name="email" required value="<?php echo ucwords($rows_pentadbir['email']);?>" readonly />
						</div>
					</div>
					<!-- <div class="control-group">
						<label class="control-label" for="city">Tajuk Iklan</label>
						<div class="controls">
							<input type="text" class="input-xlarge" id="city" name="tajuk" required />
						</div>
					</div> -->	
                    <!-- <div class="control-group">
						<label class="control-label" for="city">Lokasi</label>
						<div class="controls">
							<input type="text" class="input-xlarge" id="city" name="location" required />
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
							<input type="text" class="input-xlarge" id="city" name="jenis" required />
						</div>
					</div>	
                     <div class="control-group">
						<label class="control-label" for="city">Bilangan Bilik Tidur</label>
						<div class="controls">
							<input type="text" class="input-xlarge" id="city" name="bil_bed" required />
						</div>
					</div>	
                     <div class="control-group">
						<label class="control-label" for="city">Bilangan Bilik Mandi</label>
						<div class="controls">
							<input type="text" class="input-xlarge" id="city" name="bil_bath" required />
						</div>
					</div>	
                     <div class="control-group">
						<label class="control-label" for="city">Perabot</label>
						<div class="controls">
							<input type="text" class="input-xlarge" id="city" name="furnished" required />
						</div>
					</div>	
                     <div class="control-group">
						<label class="control-label" for="city">Harga</label>
						<div class="controls">
							<input type="text" class="input-xlarge" id="city" name="harga" required />
						</div>
					</div>	
                     <div class="control-group">
						<label class="control-label" for="city">Keterangan</label>
						<div class="controls">
							<textarea class="input-xlarge" id="description" rows="3" name="desc" required></textarea>
						</div>
					</div>	
				
					
					<div class="form-actions">
						<input type="submit" class="btn btn-success btn-large" value="Daftar Rumah" name="simpan" id="hantar"/> 
						<input type="reset" value="Padam" class="btn"/>
						<button type="button" name="simpan" class="btn" onclick="window.location.href='my-profile.php?id=<?php echo $_SESSION['user_id'];?>'">Batal</button>
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

	<script>
	$(function(){
		$('#hantar').on('click', function(){
			if (confirm('Anda bersetuju untuk mengiklankan iklan anda?')) {

				$('#form_reg').on('submit');
				//return true;
			}
			else
			{
				return false;
			}
		});
	})
	</script>
  </body>
</html>
