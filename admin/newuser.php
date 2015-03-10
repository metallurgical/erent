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

$sql_pelajar = "SELECT * FROM user WHERE user_id = '".$_SESSION['user_id']."'";
if($result_pelajar = $connect->query($sql_pelajar))
{
	$rows_pelajar = $result_pelajar->fetch_array();
	$total_pelajar = $result_pelajar->num_rows;
}


    $link = mysqli_connect("localhost", "root", "", "ihome");

     

    // Check connection

    if($link === false){

        die("ERROR: Could not connect. " . mysqli_connect_error());

    }

     

    // Escape user inputs for security

	$nama = mysqli_real_escape_string($link, $_POST['nama']);
	$no_tel = mysqli_real_escape_string($link, $_POST['no_tel']);
	$daerah = mysqli_real_escape_string($link, $_POST['daerah']);
	 $username = mysqli_real_escape_string($link, $_POST['username']);
	$password = mysqli_real_escape_string($link, $_POST['password']);
	 $email = mysqli_real_escape_string($link, $_POST['email']);
	$alamat = mysqli_real_escape_string($link, $_POST['alamat']);
	 $poskod = mysqli_real_escape_string($link, $_POST['poskod']);
	$negeri = mysqli_real_escape_string($link, $_POST['negeri']);
	 $pengguna = mysqli_real_escape_string($link, $_POST['pengguna']);
		
				
if(isset($_POST['simpan']))
{
     

    // attempt insert query execution

    $sql = "INSERT INTO user (nama,email,no_tel,alamat,daerah,poskod,negeri,username,password,role,date_register) VALUES ('$nama', '$email', '$no_tel', '$alamat', '$daerah', '$poskod', '$negeri', '$username', '$password', '$pengguna',now())";

    if(mysqli_query($link, $sql)){
     
		echo "<script language=javascript>alert('Data berjaya disimpan.');window.location='edit_delete_user.php';</script>";

    } else{

        echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);

    }
}
     

    // close connection

    mysqli_close($link);

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
				<h1>Pendaftaran Pentadbir Baru <small></small></h1>
			</div>
			<form class="form-horizontal" method="post" action="newuser.php">
				<fieldset>
					<div class="control-group">
						<label class="control-label" for="name">Name</label>
						<div class="controls">
							<input type="text" class="input-xlarge" id="name"  name="nama" required/>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="email">E-mail</label>
						<div class="controls">
							<input type="email" class="input-xlarge" id="email" name="email" required />
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="pnohe">No Telefon</label>
						<div class="controls">
							<input type="text" class="input-xlarge" id="phone" name="no_tel" required />
						</div>
					</div>
                    <div class="control-group">
						<label class="control-label" for="description">Alamat</label>
						<div class="controls">
							<textarea class="input-xlarge" id="description" rows="3" name="alamat" required></textarea>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="city">Daerah</label>
						<div class="controls">
							<input type="text" class="input-xlarge" id="city" name="daerah" required />
						</div>
					</div>
                    <div class="control-group">
						<label class="control-label" for="city">Poskod</label>
						<div class="controls">
							<input type="text" class="input-xlarge" id="city" name="poskod" required />
						</div>
					</div>	
                    	
                    <div class="form-group">
                                            <label class="control-label">Negeri</label>
                                            <div class="controls">
                                            <?php
											error_reporting(0);
mysql_connect("localhost","root","");
mysql_select_db("ihome");

//query
$sql=mysql_query("SELECT id,nama FROM negeri");
if(mysql_num_rows($sql)){
$select= '<select name="negeri">';
while($rs=mysql_fetch_array($sql)){
      $select.='<option value="'.$rs['id'].'">'.$rs['nama'].'</option>';
  }
}
$select.='</select>';
echo $select;

?></div>
                                           
                                        </div><br>
                                          <div class="control-group">
						<label class="control-label" for="city">Nama Pengguna</label>
						<div class="controls">
							<input type="text" class="input-xlarge" id="city"  name="username" required/>
						</div>
					</div>	
                      <div class="control-group">
						<label class="control-label" for="city">Kata Laluan</label>
						<div class="controls">
							<input type="text" class="input-xlarge" id="city" name="password" required />
						</div>
					</div>	
                     
					<div class="control-group">
						<label class="control-label" for="role">Peranan</label>
						<div class="controls">
							<select id="peranan" name="pengguna">
								<option value="admin">Admin</option>
								<option value="staff">Staff</option>
								
							</select>
						</div>
					</div>	
					
					<div class="form-actions">
						<input type="submit" class="btn btn-success btn-large" value="Simpan" name="simpan"/> 
                        <a class="btn  btn-large" href="user.php">Batal</a>
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
