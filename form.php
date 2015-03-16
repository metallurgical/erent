<?php
	error_reporting(0);
    $link = mysqli_connect("localhost", "root", "", "erent");
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
     
		echo "<script language=javascript>alert('Data berjaya disimpan.');window.location='login.php';</script>";

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
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

   <title>i-Home Rental System</title>

    <!-- Bootstrap Core CSS -->
    <link href="sb-admin-2/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="sb-admin-2/css/plugins/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="sb-admin-2/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="sb-admin-2/font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
    

        <div id="page-wrapper">
            <div class="row">
           
                <div class="col-lg-12">
                  <!-- <img src="assets/images/E-Rent.png" alt="logo" height="49" width="150"/> -->
                  <h1 class="page-header">Daftar Pengguna</h1>
              </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row"> 
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Borang Pendaftaran Erent</div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <form role="form" method="post" action="form.php">
                                        <div class="form-group">
         
          <label>
           Nama
          </label>
         <input class="form-control" type="text" name="nama" placeholder="Sila Masukkan Nama anda" required>
                                            
             </div>
                                       
                                        <div class="form-group">
                                            <label>No Telefon</label>
                        <input class="form-control" type="tel" name="no_tel" placeholder="Sila Masukkan No Tel anda" required>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label>Daerah</label>
                      <input class="form-control" type="text" name="daerah" placeholder="Sila Masukkan Daerah anda" required>
                                        </div>
                                        
                                       
                                         <div class="form-group">
                                            <label>Username</label>
                       <input class="form-control" type="text" name="username" placeholder="Sila Masukkan Username anda" required>
                                        </div>
                                         <div class="form-group">
                                            <label>Password</label>
                    <input class="form-control" type="text" name="password" placeholder="Sila Masukkan password anda" required>
                                        </div>
                                      
                                        <button type="submit" name="simpan" class="btn btn-success">Daftar</button>
                                        <button type="reset" class="btn btn-primary">Reset </button>
                                        <a href="index.php" class="btn btn-danger">Kembali </a>
                                   
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                                <div class="col-lg-6">
                                   
                                    
                                       
                                             <div class="form-group">
                                            <label>Email</label>
                            <input class="form-control" placeholder="Sila Masukkan Email anda" type="email" name="email" required>
                                        </div>
                                           <div class="form-group">
                                            <label>Alamat</label>
                                 <textarea class="form-control" rows="3" name="alamat" required></textarea>
                                        </div>
                                             <div class="form-group">
                                            <label>Poskod</label>
                          <input class="form-control" placeholder="Sila Masukkan Poskod anda" type="text" name="poskod" required>
                                        </div>
                                          <div class="form-group">
                                            <label>Negeri</label><br>
                                            <?php
											

                                            //query
                                            $sql=mysql_query("SELECT id,nama FROM negeri");
                                            if(mysql_num_rows($sql)){
                                            $select= '<select name="negeri">';
                                            while($rs=mysql_fetch_array($sql)){
                                                  $select.='<option value="'.$rs['nama'].'">'.$rs['nama'].'</option>';
                                              }
                                            }
                                            $select.='</select>';
                                            echo $select;

                                            ?>
                                           
                                        </div>
                                            
                                          <div class="form-group">
                                            <label>Pengguna</label>
                                            <div class="checkbox">
                                                <label>
                                                    <input type="radio" value="penyewa" name="pengguna" required>Penyewa
                                                </label>
                                            </div>
                                            <div class="checkbox">
                                                <label>
                                                    <input type="radio" value="pemilik" name="pengguna" required>Pemilik Rumah
                                                </label>
                                            </div>
                                          
                                        </div>
                                      
                                  
                                    </div>
                                    </form>
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

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
