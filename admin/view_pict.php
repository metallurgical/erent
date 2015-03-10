<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <!-- This file has been downloaded from Bootsnipp.com. Enjoy! -->
    <title>Image Gallery with Fancybox - Bootsnipp.com</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="http://netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css" rel="stylesheet">
    <style type="text/css">
        .gallery
{
    display: inline-block;
    margin-top: 20px;
}
    </style>
    <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
</head>
<body>
<!--####
1) Add jQuery library "<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>"
2) Download fancybox (https://github.com/fancyapps/fancyBox)
3) Add jquery.fancybox.css and jquery.fancybox.js
4) Add fancybox images
####--!>

<!-- References: https://github.com/fancyapps/fancyBox -->
<link rel="stylesheet" href="//frontend.reklamor.com/fancybox/jquery.fancybox.css" media="screen">
<script src="//frontend.reklamor.com/fancybox/jquery.fancybox.js"></script>

<div class="container">
	<div class="row">
		<div class="list-group">
            <div class="col-lg-13">
                <a class="thumbnail fancybox" rel="ligthbox" href="http://placehold.it/300x320.png">
                    <img class="img-responsive" alt="" src="http://placehold.it/320x320" />
                    <div class='text-right'>
                        <small class='text-muted'>Image Title</small>
                    </div> <!-- text-right / end -->
                </a>
            </div> <!-- col-6 / end -->
           
           
           
	</div> <!-- row / end -->
</div> <!-- container / end -->
<script type="text/javascript">
$(document).ready(function(){
    //FANCYBOX
    //https://github.com/fancyapps/fancyBox
    $(".fancybox").fancybox({
        openEffect: "none",
        closeEffect: "none"
    });
});
   
  
</script>
</body>
</html>
