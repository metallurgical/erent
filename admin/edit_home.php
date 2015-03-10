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
$con=mysqli_connect("localhost","root","","ihome");
		// Check connection
		if (mysqli_connect_errno())
		  {
		  echo "Failed to connect to MySQL: " . mysqli_connect_error();
		  }
		$allowedExts = array("gif", "jpeg", "jpg", "png", "bmp");
		$temp = explode(".", $_FILES["file"]["name"]);
		$extension = end($temp);
		$alamat = mysqli_real_escape_string($con, $_POST['alamat']);
		$poskod = mysqli_real_escape_string($con, $_POST['poskod']);
		$no_tel = mysqli_real_escape_string($con, $_POST['no_tel']);
		$email3 = mysqli_real_escape_string($con, $_POST['email']);
		$location = mysqli_real_escape_string($con, $_POST['location']);
		$jenis = mysqli_real_escape_string($con, $_POST['jenis']);
		$bil_bed = mysqli_real_escape_string($con, $_POST['bil_bed']);
		$bil_bath = mysqli_real_escape_string($con, $_POST['bil_bath']);
		$furnished = mysqli_real_escape_string($con, $_POST['furnished']);
		$harga = mysqli_real_escape_string($con, $_POST['harga']);
		$desc = mysqli_real_escape_string($con, $_POST['desc']);
		$nama_user = mysqli_real_escape_string($con, $_POST['nama_user']);
		$file=$_FILES["file"]["name"];
		$size= $_FILES["file"]["size"];

	if($size >400000)
	{
		//echo "<label class='err'> Image size must not greater than 40kb </label>";
		echo "<script language=javascript>alert('Image size must not greater than 40kb.');</script>";
	}
		if ((($_FILES["file"]["type"] == "image/gif")
		|| ($_FILES["file"]["type"] == "image/jpeg")
		|| ($_FILES["file"]["type"] == "image/jpg")
		|| ($_FILES["file"]["type"] == "image/pjpeg")
		|| ($_FILES["file"]["type"] == "image/x-png")
		|| ($_FILES["file"]["type"] == "image/bmp")
		|| ($_FILES["file"]["type"] == "image/png"))
		&& ($_FILES["file"]["size"] < 400000)
		&& in_array($extension, $allowedExts)) 
		{
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
				  mysqli_query($con,"INSERT INTO home (gambar_rumah,alamat,poskod,no_tel,email,location,type_properties,bedroom,  bath_room,furnished,price_rent,descr,created_by,created_dt)
					VALUES ('$file','$alamat','$poskod','$no_tel','$email3','$location','$jenis','$bil_bed','$bil_bath','$furnished','$harga','$desc','$nama_user',now())");
				//echo "Data Entered Successfully Saved!";
				echo "<script language=javascript>alert('Data Entered Successfully Saved!');</script>";
    			}

		}
	mysqli_close($con);
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
          <a class="brand" href="#">i-Home Web</a>
          <div class="btn-group pull-right">
			<a class="btn" href="my-profile.html"><i class="icon-user"></i> Admin</a>
            <a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
              <span class="caret"></span>
            </a>
            <ul class="dropdown-menu">
			  <li><a href="my-profile.html">Profile</a></li>
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
            <ul class="nav nav-list">
              <li class="nav-header"><i class="icon-wrench"></i> Admin</li>
              <li class="active"><a href="index.php">Admin</a></li>
              <li><a href="user.php">Pengurusan Pengguna</a></li>
              <li><a href="home.php">Pengurusan Rumah Sewa</a></li>
              <li><a href="list_contact.php">Pengurusan Pertanyaan</a></li>
              <li><a href="newuser.php">Pentadbir Baru</a></li>
               <li><a href="">Laporan</a></li>
               
               <li class="nav-header"><i class="icon-home"></i> Penyewa</li>
              <li class="active"><a href="">Penyewa</a></li>
              <li><a href="search.php">Carian Rumah</a></li>
               <li class="nav-header"><i class="icon-user"></i> Pemilik Rumah</li>
              <li class="active"><a href="">Pemilik Rumah</a></li>
             <li><a href="my-profile.html">Profile</a></li>
              <li><a href="home_reg.php">Daftar Rumah</a></li>
               <li><a href="contact_admin.php">Pertanyaan/Maklum Balas Admin</a></li>
            <!--  <li class="nav-header"><i class="icon-signal"></i> Statistics</li>
              <li><a href="stats.html">General</a></li>
              <li><a href="user-stats.html">Users</a></li>
              <li><a href="visitor-stats.html">Visitors</a></li> -->
              <li class="nav-header"><i class="icon-tasks"></i> Profile</li>
              <li><a href="my-profile.html">My profile</a></li>
        <!--      <li><a href="#">Settings</a></li> -->
			   <li><a href="../index.php">Logout</a></li> 
            </ul>
          </div>
        </div>
        <div class="span9">
		  <div class="row-fluid">
			<div class="page-header">
				<h1>Pendaftaran Rumah Untuk Sewaan <small></small></h1>
			</div>
            <form action="home_reg.php" method="post" enctype="multipart/form-data" class="form-horizontal">
				<fieldset>
					<div class="control-group">
						<label class="control-label" for="name">Gambar Rumah</label>
						<div class="controls">
							<input type="file" class="input-xlarge" id="name" name="file" required/><br>
                            <input type="hidden" name="nama_user" value="<?php echo ucwords($rows_pentadbir ['username']);?>" readonly>
						</div>
					</div>
                    <div class="control-group">
						<label class="control-label" for="name">Alamat</label>
						<div class="controls">
							<textarea class="input-xlarge" id="description" rows="3" name="alamat" required></textarea>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="email">Poskod</label>
						<div class="controls">
							<input type="text" class="input-xlarge" id="email" name="poskod" required/>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="pnohe">No Telefon</label>
						<div class="controls">
							<input type="text" class="input-xlarge" id="phone" name="no_tel" required />
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="city">Email</label>
						<div class="controls">
							<input type="text" class="input-xlarge" id="city" name="email" required />
						</div>
					</div>	
                    <div class="control-group">
						<label class="control-label" for="city">Location</label>
						<div class="controls">
							<input type="text" class="input-xlarge" id="city" name="location" required />
						</div>
					</div>	
                     <div class="control-group">
						<label class="control-label" for="city">Jenis Perumahan</label>
						<div class="controls">
							<input type="text" class="input-xlarge" id="city" name="jenis" required />
						</div>
					</div>	
                     <div class="control-group">
						<label class="control-label" for="city">Bil Bedroom</label>
						<div class="controls">
							<input type="text" class="input-xlarge" id="city" name="bil_bed" required />
						</div>
					</div>	
                     <div class="control-group">
						<label class="control-label" for="city">Bil Bathroom</label>
						<div class="controls">
							<input type="text" class="input-xlarge" id="city" name="bil_bath" required />
						</div>
					</div>	
                     <div class="control-group">
						<label class="control-label" for="city">Furnished</label>
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
						<input type="submit" class="btn btn-success btn-large" value="Daftar Rumah" name="simpan"/> <a class="btn" href="users.html"></a>
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
