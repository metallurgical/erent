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

$mysqli_db = new mysqli('localhost', 'root', '', 'ihome');

// normal search
$result_tb = "";
if(!empty($_POST['search']) && !empty($_POST['search_value'])) {

   $e = $_POST['search_value'];

  $query = 'SELECT * FROM home WHERE status=1 AND '."location LIKE '%$e%'";
   $query_result = $mysqli_db->query($query);
   //$result_tb = '<table cellspacing="5" cellpadding="5" class="table table-striped table-bordered table-condensed">';
   
   //$result_tb .='</table>';

   $mysqli_db->close();
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
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <style>

.form-wrapper {
    width: 550px;
    padding: 8px;
    margin:  auto;
    overflow: hidden;
    border-width: 1px;
    border-style: solid;
    border-color: #dedede #bababa #aaa #bababa;
    box-shadow: 0 3px 3px rgba(255,255,255,.1), 0 3px 0 #bbb, 0 4px 0 #aaa, 0 5px 5px #444;
    border-radius: 10px;    
    background-color: #f6f6f6;
    background-image: linear-gradient(top, #f6f6f6, #eae8e8);
}

.form-wrapper #search {
    width:400px;
    height: 20px;
    padding: 10px 5px;
    float: left;    
    font: bold 16px 'lucida sans', 'trebuchet MS', 'Tahoma';
    border: 1px solid #ccc;
    box-shadow: 0 1px 1px #ddd inset, 0 1px 0 #fff;
    border-radius: 3px;      
}

.form-wrapper #search:focus {
    outline: 0; 
    border-color: #aaa;
    box-shadow: 0 1px 1px #bbb inset;  
}

.form-wrapper #search::-webkit-input-placeholder {
   color: #999;
   font-weight: normal;
}

.form-wrapper #search:-moz-placeholder {
    color: #999;
    font-weight: normal;
}

.form-wrapper #search:-ms-input-placeholder {
    color: #999;
    font-weight: normal;
} 

.form-wrapper #submit {
    float: right;    
    border: 1px solid #00748f;
    height: 42px;
    width: 100px;
    padding: 0;
    cursor: pointer;
    font: bold 15px Arial, Helvetica;
    color: #fafafa;
    text-transform: uppercase;    
    background-color: #0483a0;
    background-image: linear-gradient(top, #31b2c3, #0483a0);
    -moz-border-radius: 3px;
    -webkit-border-radius: 3px;
    border-radius: 3px;      
    text-shadow: 0 1px 0 rgba(0, 0 ,0, .3);
    box-shadow: 0 1px 0 rgba(255, 255, 255, 0.3) inset, 0 1px 0 #fff;
}
  
.form-wrapper #submit:hover,
.form-wrapper #submit:focus {       
    background-color: #31b2c3;
    background-image: linear-gradient(top, #0483a0, #31b2c3);
}   
  
.form-wrapper #submit:active {
    outline: 0;    
    box-shadow: 0 1px 4px rgba(0, 0, 0, 0.5) inset;    
}
  
.form-wrapper #submit::-moz-focus-inner {
    border: 0;
}
body {
	background-image: url(img/2.png);
}
    </style>
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
				<h1>Carian Rumah <small></small></h1>
			</div>
              <form class="form-wrapper" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
			    <input type="text" id="search" placeholder="Sila Masukkan Kawasan Rumah Yang Ingin Dicari " name="search_value" required>
			   
			    <input type="submit" name="search" value="CARI" id="submit"/>
			</form> 
<br>
<table cellspacing="5" cellpadding="5" class="table table-striped table-bordered table-condensed">

<?php

while ($rows = @$query_result->fetch_assoc()) 
{
      ?>
      <div class="well">
		 <ul class="thumbnails">
		  <li class="span3">
		    <a href="#" class="thumbnail">
		      <img src="upload/<?php echo $rows['gambar_rumah'];?>" alt="">
		    </a>
		  </li>
		  <div class="span5">
			  <span class="badge badge-important">Price :</span> <strong>RM <?php echo $rows['price_rent'];?></strong> 
			  <span class="badge badge-important">Location :</span> <?php echo $rows['location'];?>
			  <div class="well">
	  				<?php echo $rows['descr'];?>
			  </div>
			  <span class="badge badge-info">Bathroom :</span> <?php echo $rows['bath_room'];?><br/>
			  <span class="badge badge-info">Bedroom :</span> <?php echo $rows['bedroom'];?><br/>
			  <span class="badge badge-info">Furnished :</span> <?php echo $rows['furnished'];?><br/>
			  <span class="badge badge-info">Owner :</span> <?php echo $rows['nama_pemilik'];?><br/>
			  <span class="badge badge-info">Address :</span> <?php echo $rows['alamat'];?><br/>
			  <span class="badge badge-info">Zip code :</span> <?php echo $rows['poskod'];?><br/>
		  </div>
		  <div class="span3">
			  <span class="badge badge-warning">Email :</span> <?php echo $rows['email'];?> <br/>
			  <span class="badge badge-warning">Created by :</span> <?php echo $rows['created_by'];?><br/>
			  <span class="badge badge-warning">Tel no :</span> <?php echo $rows['no_tel'];?>
			  
		  </div>
		</ul>
		</div>
      <?php
   }

?>
</table>
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
