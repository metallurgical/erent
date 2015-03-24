<?php
$mysqli_db = new mysqli('localhost', 'root', '', 'erent');

$result_tb = "";
if(isset($_POST['search'])) {
	echo "<script language=javascript>alert('Sebarang penempahan rumah, anda boleh menghubungi pemilik menggunakan nombor yang tertera di senarai rumah.');</script>";
   //$e = $_POST['search_value'];
   $kawasan_id = $_POST['kawasan_id'];

  //$query = 'SELECT * FROM home WHERE status=1 and ' ."tajuk LIKE '%$e%' and kawasan_id = '$kawasan_id'";
   $query = "SELECT * FROM home WHERE status=1 and kawasan_id = $kawasan_id";
  $query_result = $mysqli_db->query($query);
   


   
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1" />
<meta name="author" content="DesignForLife" />
<meta name="description" content="A Multi Purpose Responsive Template - Created by DesignForLife" />
<title>DreamLife Responsive Multi-Purpose Template</title>
<link rel="stylesheet" type="text/css" href="assets/css/style.css" />
 <link href="css/bootstrap.css" rel="stylesheet">
	<link href="css/site.css" rel="stylesheet">
    <link href="css/bootstrap-responsive.css" rel="stylesheet">
<!--[if lte IE 8]>
	<link rel="stylesheet" type="text/css" href="assets/css/ie8.css" />
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
</style>
</head>
<body>
<!-- container full -->
<div class="container_full">
	<!-- header -->
	<div id="header_wrapper">
	<!-- menu -->
	<div id="header">
		<!-- logo -->
		<div id="logo" style="height:30px"><!-- <a href="index.php"><img src="assets/images/E-Rent.png" alt="logo" height="30" width="150"/></a> --></div>
		<!-- logo end -->
		<!-- main menu -->
			<ul id="mainmenu">
		    <?php include('main_menu.php');?>
		</ul>
		<!-- main menu end -->
		<!-- search bar -->
		
		<!-- search bar end -->
	</div>
	<!-- menu end -->
	</div>
	<!-- header end -->
	<div class="clearfix"></div>
	<!-- header text -->
	
	<!-- header text end -->
	<!-- container 12 --><!-- container 12 end -->
	<!-- container 12 --><!-- container 12 end -->
	<!-- container 12 -->
	<div class="container_12">
		<!-- other services -->
		<div class="grid_12">
			<div class="divider_page"><h2>Hasil Carian</h2></div>
			<p>
            
            <form class="form-wrapper" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <!-- <input type="text" id="search" placeholder="Tajuk Iklan " name="search_value" required> -->
            <input type="submit" name="search" value="CARI" id="submit"/>
            <select name="kawasan_id">
            <option value="">--Sila Pilih Lokasi--</option>
							<?php
							
							$sql_pentadbir1 = "SELECT * FROM kawasan";
							$result_pentadbir1 = $mysqli_db->query($sql_pentadbir1)or die(mysql_error());
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
          	
  </form>
  

            </p>

            <p>
            Hasil Carian : <?php echo @$query_result->num_rows;?>
            </p>
			<table cellspacing="5" cellpadding="5" class="table table-striped table-bordered table-condensed">

<?php

while ($rows = @$query_result->fetch_assoc()) 
{
      ?>
      <div class="well">
		 <ul class="thumbnails">
		  <span class="span3">
		    <a href="#" class="thumbnail">
		      <img src="admin/upload/<?php echo $rows['gambar_rumah'];?>" alt="" width="300" height="250">
		    </a>
		  </span>
		  <div class="span5">
			  <span class="badge badge-important">Price :</span> <strong>RM <?php echo $rows['price_rent'];?></strong> 
			  <span class="badge badge-important">Location :</span> 
			  <?php 

        $sql_pentadbir = "SELECT * FROM kawasan WHERE kawasan_id = '".$rows['kawasan_id']."'";
        $result_pentadbir = $mysqli_db->query($sql_pentadbir);
        $rows_pentadbir = $result_pentadbir->fetch_array();  
        echo $rows_pentadbir['kawasan_name'];?>
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
		</div>
       
	</div>
	<!-- container 12 end -->
	<!-- container 12 -->
	<div class="container_12">
	  <div class="grid_6"></div>
	</div>
	<!-- container 12 end -->
	<!-- footer -->
	<div id="footer">
		<div class="back_top"></div>
		<!-- footer container -->
		
		<!-- footer container end -->
		<div class="clearfix"></div>
		<!-- footer bottom -->
		<div class="footer_bottom">
			<div class="container_12">
				<div class="grid_6">
					<div class="footer_text">Copyright  &copy; <?php echo date("Y") ?> Erent</div>
				</div>
				
			</div>
		</div>
		<!-- footer bottom end -->
	</div>
	<!-- footer end -->
</div>
<!-- container full end -->
<!-- container full end -->
<script src="assets/js/jquery-1.9.0.min.js" type="text/javascript"></script>
<script src="assets/js/jquery.components.js" type="text/javascript"></script>
<script src="assets/js/custom.js" type="text/javascript"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>