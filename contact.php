<?php 
	
	require 'database.php';

	if ( !empty($_POST)) {
		// keep track validation errors
		$nameError = null;
		$emailError = null;
		$subjectError = null;
		$messageError = null;
		
		// keep track post values
		$name = $_POST['name'];
		$email = $_POST['email'];
		$subject = $_POST['subject'];
			$message = $_POST['message'];
		
		// validate input
		$valid = true;
		if (empty($name)) {
			$nameError = 'Please enter Name';
			$valid = false;
		}
		
		if (empty($email)) {
			$emailError = 'Please enter Email Address';
			$valid = false;
		} else if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) {
			$emailError = 'Please enter a valid Email Address';
			$valid = false;
		}
		
		if (empty($subject)) {
			$subjectError = 'Please enter subject';
			$valid = false;
		}
		if (empty($message)) {
			$messageError = 'Please enter Message';
			$valid = false;
		}
		
		// insert data
		if ($valid) {
			$pdo = Database::connect();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql = "INSERT INTO feedback (nama,email,subject,descr,date_send) values(?, ?, ?,?,now())";
			$q = $pdo->prepare($sql);
			$q->execute(array($name,$email,$subject,$message));
			Database::disconnect();
			echo "<script language=javascript>alert('Data berjaya disimpan.');window.location='index.php';</script>";
			//header("Location: index.php");
		}
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1" />
<meta name="author" content="DesignForLife" />
<meta name="description" content="A Multi Purpose Responsive Template - Created by DesignForLife" />
<title>E-Rent </title>
<link rel="stylesheet" type="text/css" href="assets/css/style.css" />
<!--[if lte IE 8]>
	<link rel="stylesheet" type="text/css" href="assets/css/ie8.css" />
<![endif]-->

</head>
<body>
<!-- container full -->
<div class="container_full">
	<!-- header -->
	<div id="header_wrapper">
	<!-- menu -->
	<div id="header">
		<!-- logo -->
		<div id="logo"><a href="index.php"><img src="assets/images/E-Rent.png" alt="logo" height="30" width="150"/></a></div>
		<!-- logo end -->
		<!-- main menu -->
			<ul id="mainmenu">
		    <li class="home_icon"><span class="circle_effect"></span><a href="index.php">Home</a></li>
		    <li>
		    	<a href="index.php" >Laman Utama</a>
		    	<ul>
		    		
	    	  </ul>
		    </li>
		    <li>
		    	<a href="carian.php" alt="Carian untuk sewa">Carian Sewa</a>
		    	
		    </li>
               <li>
		    	<a href="contact.php" class="active">Hubungi</a>
		    	
		    </li>
		    
		    <li class="contact_icon"><span class="circle_effect"></span><a href="contact.php">Contact</a></li>
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
			<div class="divider_page"><h2>Hubungi Kami</h2></div>
			<p>Test.</p>
			<!-- tabs -->
			 <div class="content right grid_9">
			<div class="divider_page"><h4>Pertanyaan</h4></div>
			<p>Test</p>
			<div class="contact_form">
				<form action="contact.php" method="post" name="messageform">
					<div class="grid_3 alpha">
						<input name="name" type="text" value="Nama:" class="input-text" required />
					</div>
					<div class="grid_3 lambda">
						<input name="email" type="text" value="E-Mail:" class="input-text" required />
					</div>
					<div class="grid_3 omega">
						<input name="subject" type="text" value="Subjek:" class="input-text" required />
					</div>
					<div class="grid_9 alpha omega">
						<textarea name="message" class="text-area" required>Pertanyaan:</textarea>
						<div class="alert-contact"></div>
						
                        <button type="submit" class="send-message sc_button medium">Hantar</button>
					</div>
				</form>
			</div>
		</div>
		<!-- container with sidebar end -->
		<!-- sidebar left -->
		<div class="sidebar left grid_3">
			<div class="divider_page"><h4>Hubungi</h4></div>
			<p><b>Alamat:</b><br><br><b>No.Telefon:</b><br><br><b>Faks:</b><br></p>
			
			<!-- tabs end -->
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
</body>
</html>