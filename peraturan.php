<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1" />
<meta name="author" content="DesignForLife" />
<meta name="description" content="A Multi Purpose Responsive Template - Created by DesignForLife" />
<title>Erent System</title>
<link rel="stylesheet" type="text/css" href="assets/css/style.css" />

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
	background-image: url(admin/img/2.png);
	background-color: #09F;
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
		<div id="logo"><a href="index.php"><img src="assets/images/E-Rent.png" alt="logo" height="30" width="150"/></a></div>
		<!-- logo end -->
		<!-- main menu -->
		<ul id="mainmenu">
		    <?php include('main_menu.php');?>		    
		</ul>
		<!-- main menu end -->
		<!-- search bar -->
		
		<!-- search bar end -->
	</div>
    

	</div>
	<!-- header end -->
	<div class="clearfix"></div>
	<!-- header text -->
	<div class="header_text">
		<div class="container_12">
			<div class="grid_9">
				<h1>Peraturan & Syarat.</h1>
            <p>Bagi Pemilik.</p>
             <ul>   
            	<li>Setiap iklan akan dikenakan bayaran sebelum iklan dipamerkan.</li>
            	<li>Iklan akan diberhentikan sekiranya bayaran iklan tidak dilunaskan selepas sebulan tarikh notis dikeluarkan.</li>
            	<li>Iklan akan diluluskan selepas pemantauan dibuat.</li>            	
		    </ul>
		    <p>Bagi Penyewa.</p>
             <ul>   
            	<li>Iklan boleh didapati di menu carian.</li>
            	<li>Sebarang pertanyaan mengenai iklan, anda boleh berhubung dengan pemilik(melalui no. telefon). Pihak pentadbir tiada kena mengena dengan iklan pemilik.</li>
            	<li>Sebarang aduan mengenai iklan, anda boleh berhubung dengan pemilik menggunakan mana-mana alat komunikasi yang sesuai.</li>           	
		    </ul>
			</div>
			<div class="grid_3 align_right"></div>
		</div>
	</div>
	<!-- header text end -->
	<!-- container 12 -->
	<div class="container_12">
		<!-- features boxes -->
	  <div class="grid_12">
		
	  </div>
		<!-- features boxes end -->
		
		
		<!-- recent works end -->
		<div class="clearfix"></div>
        
		<!-- popular blog post and testiomonials -->
		<div class="container_12">
        
		<br>
        
        <div class="clearfix"></div>
        	<!-- blockquotes, testimonial and info box examples -->
		
		<!-- blockquotes, testimonial and info box examples end -->
		<hr class="grid_12">
			<!-- popular blog post end -->
			<!-- testimonials -->
			<!-- testimonials end -->
		</div>
        
		<!-- popular blog post and testiomonials end -->
		<!-- our clients -->
		
		<!-- our clients end -->
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
					<div class="footer_text">Copyright  &copy;  <?php echo date("Y") ?> -- Erent</div>
				</div>
				
			</div>
		</div>
		<!-- footer bottom end -->
	</div>
	<!-- footer end -->
</div>
<!-- container full end -->

<script src="assets/js/jquery-1.9.0.min.js" type="text/javascript"></script>
<script src="assets/js/jquery.components.js" type="text/javascript"></script>
<script src="assets/js/custom.js" type="text/javascript"></script>


</body>
</html>