<?php
error_reporting(0);
session_start();
include('config.php');

if(isset($_POST['login']))
{
	$sql_login_pentadbir = "SELECT * FROM user WHERE username = '".$username."' AND password = '".$password."'";
	if($result_login_pentadbir = $connect->query($sql_login_pentadbir))
	{
		$rows_login_pentadbir = $result_login_pentadbir->fetch_array();
		if($total_login_pentadbir = $result_login_pentadbir->num_rows)
		{
			$_SESSION['user_id'] = $rows_login_pentadbir['user_id'];
			  		  $_SESSION['role'] = $rows_login_pentadbir['role'];
			  	    $_SESSION['nama'] = $rows_login_pentadbir['nama'];
					
		
			
			echo "<script language=javascript>alert('Log masuk berjaya.');window.location='admin/index.php';</script>";
		}
					else
				{
					echo "<script language=javascript>alert('Log masuk tidak berjaya. Sila cuba lagi.');window.location='login.php';</script>";
				}
			}
	
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Log Masuk</title>

    <!-- Bootstrap Core CSS -->
    <link href="sb-admin-2/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="sb-admin-2/css/plugins/metisMenu/metisMenu.min.css" rel="stylesheet" type="text/css">

    <!-- Custom CSS -->
    <link href="sb-admin-2/css/sb-admin-2.css" rel="stylesheet" type="text/css">

    <!-- Custom Fonts -->
    <link href="sb-admin-2/font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <style type="text/css">
    body {
	background-image: url(admin/img/2.png);
}
    #apDiv1 {
	position: absolute;
	width: 242px;
	height: 143px;
	z-index: 1;
	left: 240px;
	top: 30px;
}
    </style>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Log Masuk</h3>
                    </div>
                    <div class="panel-body">
                        <form role="form" method="post">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Sila Masukkan Nama Pengguna" name="username" type="text" autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Sila Masukkan Kata Laluan Anda" name="password" type="password" >
                                </div>
                               
                                <!-- Change this to a button or input when using this as a form -->
                               
                                <button type="submit" name="login" class="btn btn-lg btn-success btn-block">Daftar Masuk</button>
                              <!--  <a href="index.php" class="btn btn-lg btn-primary btn-block">Daftar Masuk </a> -->
                                <a href="index.php" class="btn btn-lg btn-primary btn-block">Kembali </a>
                                
                                
                               
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery Version 1.11.0 -->
    <script src="sb-admin-2/js/jquery-1.11.0.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="sb-admin-2/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="sb-admin-2/js/plugins/metisMenu/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="sb-admin-2/js/sb-admin-2.js"></script>

</body>

</html>
