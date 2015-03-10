<?php 



// Create MySQL login values and

// set them to your login information.

$username = "root";

$password = "";

$host = "localhost";

$database = "ihome";


// Make the connect to MySQL or die

// and display an error.

$link = mysql_connect($host, $username, $password);

if (!$link) {

die('Could not connect: ' . mysql_error());

}


// Select your database

mysql_select_db ($database);


// Make sure the user actually

// selected and uploaded a file

if (isset($_FILES['image']) && $_FILES['image']['size'] > 0) {


// Temporary file name stored on the server

$tmpName = $_FILES['image']['tmp_name'];


// Read the file

$fp = fopen($tmpName, 'r');

$data = fread($fp, filesize($tmpName));

$data = addslashes($data);

fclose($fp);



// Create the query and insert

// into our database.

$query = "INSERT INTO test ";

$query .= "(image) VALUES ('$data')";

$results = mysql_query($query, $link);


// Print results

print "Thank you, your file has been uploaded.";


}

else {

print "No image selected/uploaded";

}


// Close our MySQL Link

mysql_close($link);

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>


<form enctype="multipart/form-data" action="test.php" method="post" name="changer">
<input name="MAX_FILE_SIZE" value="102400" type="hidden">
<input name="image" accept="image/jpeg" type="file">
<input value="Hantar" type="submit">
</form>


<?php

$username = "root";
$password = "";
$host = "localhost";
$database = "ihome";

mysql_connect($host, $username, $password) or die("Can not connect to database: ".mysql_error());

mysql_select_db($database) or die("Can not select the database: ".mysql_error());

$id = $_GET['id'];

if(!is_int($id)){
	
     die("Please select your image!");
}else{

$query = mysql_query("SELECT * FROM test WHERE id='".$id."'");
$row = mysql_fetch_array($query);
$content = $row['image'];

header('Content-type: image/jpg');
     echo $content;
}

?>
</body>
</html>