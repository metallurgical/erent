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

$sql_pelajar = "SELECT * FROM feedback";
if($result_pelajar = $connect->query($sql_pelajar))
{
	$rows_pelajar = $result_pelajar->fetch_array();
	$total_pelajar = $result_pelajar->num_rows;
	$num_pelajar = 0;
}

if(($_GET['action']=="delete") && ($_GET['id']!=NULL))
{
	$sql_padam_pelajar = "SELECT * FROM user WHERE user_id = ".$_GET['id']."";
	if($result_padam_pelajar = $connect->query($sql_padam_pelajar))
	{
		if($total_padam_pelajar = $result_padam_pelajar->num_rows)
		{
			$sql_padam_pelajar = "DELETE * FROM user WHERE user_id = '".$_GET['id']."'";
			if($result_padam_pelajar = $connect->query($sql_padam_pelajar))
			{
				echo "<script language=javascript>alert('Maklumat berjaya dipadam.');window.location='list_user.php';</script>";
			}
			else
			{
				echo "<script language=javascript>alert('Maklumat tidak berjaya dipadam. Sila cuba lagi.');window.location='list_user.php';</script>";
			}
		}
		else
		{
			echo "<script language=javascript>alert('Maklumat tidak wujud.');window.location='list_user.php';</script>";
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
				<h1>Pengurusan Maklum Balas <small></small></h1>
			</div>
			<table class="table table-striped table-bordered table-condensed">
				<thead>
					<tr>
						<th>ID</th>
						<th>Nama</th>
						<th>E-mail</th>
						<th>Subjek</th>
						<th>Pertanyaan</th>
						<th>Tindakan</th>
					</tr>
				</thead>
				<tbody>
				<?php if($total_pelajar>0) { do { ?>   <tr>
                                  <td><?php echo ++$num;?></td>
                                  <td> <?php echo ucwords($rows_pelajar['nama']);?></td>
                                  <td class="numeric"><?php echo ucwords($rows_pelajar['email']);?></td>
                                  <td class="numeric"><?php echo ucwords($rows_pelajar['subject']);?></td>
                                  <td class="numeric"><?php echo ucwords($rows_pelajar['descr']);?></td>
                                  
                           <td class="numeric"><!--<a href="edit.php?id=<?php echo $rows_pelajar['user_id'];?>">
                                           <span class="badge bg-primary">Kemaskini</span></a>-->
                      <a href="view_contact.php?id=<?php echo $rows_pelajar['id'];?>" title="lihat"> 
                     <i class="icon-resize-full"></i></a>
                          <a href="del_feed.php?id=<?php echo $rows_pelajar['id'];?>" title="padam" onclick="return confirm('Anda Pasti Untuk Padam?')"> 
                   <i class="icon-trash"></i>  </a>
                <!-- <a href="del.php?id=<?php echo $rows_pelajar['user_id'];?>">
                <span class="badge bg-inverse">Padam</span></a>-->
                                          </td>
                              </tr>
                             <?php } while($rows_pelajar = $result_pelajar->fetch_array()); } ?>
				</tbody>
			</table>
			
			
		  </div>
        </div>
      </div>

      <hr>
    </div>

    <script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script>
	$(document).ready(function() {
		$('.dropdown-menu li a').hover(
		function() {
			$(this).children('i').addClass('icon-white');
		},
		function() {
			$(this).children('i').removeClass('icon-white');
		});
		
		if($(window).width() > 760)
		{
			$('tr.list-users td div ul').addClass('pull-right');
		}
	});
	</script>
  </body>
</html>
