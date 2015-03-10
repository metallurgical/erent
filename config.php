<?php
$host = "localhost";
$username = "root";
$password = "";
$db_name = "ihome";

$connect = new mysqli($host, $username, $password, $db_name);
if($connect->connect_errno)
{
	echo "Failed to connect to MySQL : ".$connect->error;
}

if(!isset($_SESSION)) 
    { 
        session_start(); 
    }
	
	 $name = isset($_POST['name']) ? $_POST['name'] : '';
		  $email1 = isset($_POST['email']) ? $_POST['email'] : '';
		   $phone = isset($_POST['phone']) ? $_POST['phone'] : '';
		    $subj = isset($_POST['subj']) ? $_POST['subj'] : '';
			  $descr = isset($_POST['descr']) ? $_POST['descr'] : '';
			
			   $username = isset($_POST['username']) ? $_POST['username'] : '';
  $password = isset($_POST['password']) ? $_POST['password'] : '';
  $ic_user = isset($_POST['ic']) ? $_POST['ic'] : '';
    $nama = isset($_POST['nama']) ? $_POST['nama'] : '';
	 $email = isset($_POST['email']) ? $_POST['email'] : '';
	  $no_tel = isset($_POST['no_tel']) ? $_POST['no_tel'] : '';
	  $alamat = isset($_POST['alamat']) ? $_POST['alamat'] : '';
	 $ic = isset($_POST['ic']) ? $_POST['ic'] : '';
	  $jantina = isset($_POST['jantina']) ? $_POST['jantina'] : '';
   $gambar = isset($_POST['gambar']) ? $_POST['gambar'] : '';
  $kandungan = isset($_POST['kandungan']) ? $_POST['kandungan'] : '';
  $tajuk = isset($_POST['tajuk']) ? $_POST['tajuk'] : '';
  
  $nama_pemilik = isset($_POST['nama_pemilik']) ? $_POST['nama_pemilik'] : '';
  $alamat_edit = isset($_POST['alamat_edit']) ? $_POST['alamat_edit'] : '';
  $poskod_edit = isset($_POST['poskod_edit']) ? $_POST['poskod_edit'] : '';
  $no_tel_edit = isset($_POST['no_tel_edit']) ? $_POST['no_tel_edit'] : '';
  $email3_edit = isset($_POST['email3_edit']) ? $_POST['email3_edit'] : '';
  $location_edit = isset($_POST['location_edit']) ? $_POST['location_edit'] : '';
  $jenis_edit = isset($_POST['jenis_edit']) ? $_POST['jenis_edit'] : '';
  $bil_bed_edit = isset($_POST['bil_bed_edit']) ? $_POST['bil_bed_edit'] : '';
  $bil_bath_edit = isset($_POST['bil_bath_edit']) ? $_POST['bil_bath_edit'] : '';
  $furnished_edit = isset($_POST['furnished_edit']) ? $_POST['furnished_edit'] : '';
  $harga_edit = isset($_POST['harga_edit']) ? $_POST['harga_edit'] : '';
  $desc_edit = isset($_POST['desc_edit']) ? $_POST['desc_edit'] : '';
    $nama_user = isset($_POST['nama_user']) ? $_POST['nama_user'] : '';
	$status_bayaran = isset($_POST['status_bayaran']) ? $_POST['status_bayaran'] : '';
	$updated_by = isset($_POST['nama_user']) ? $_POST['nama_user'] : '';
	
  
  $name_edit = isset($_POST['name_edit']) ? $_POST['name_edit'] : '';
  $email_edit = isset($_POST['email_edit']) ? $_POST['email_edit'] : '';
  $no_tel_edit1 = isset($_POST['no_tel_edit1']) ? $_POST['no_tel_edit1'] : '';
  $alamat_edit1 = isset($_POST['alamat_edit1']) ? $_POST['alamat_edit1'] : '';
  $daerah_edit1 = isset($_POST['daerah_edit1']) ? $_POST['daerah_edit1'] : '';
  $poskod_edit1 = isset($_POST['poskod_edit1']) ? $_POST['poskod_edit1'] : '';
  $negeri_edit = isset($_POST['negeri_edit']) ? $_POST['negeri_edit'] : '';
  $username_edit = isset($_POST['username_edit']) ? $_POST['username_edit'] : '';
  $password_edit = isset($_POST['password_edit']) ? $_POST['password_edit'] : '';
 

  
    
if ($username != '' && $password != '' && $ic_user != '' && $nama != ''&& $email != ''&& $no_tel != ''&& $alamat != ''&& $ic != ''&& $jantina != ''&& $gambar != ''&& $kandungan != ''&& $tajuk != '' && $name != '' && $ic1 != '' && $created != '' && $type != '' && $kg != '' && $price != '' && $date != '' && $status != '' && $name1 != '' && $email1 != '' && $phone != '' && $comment != '' && $descr != '' && $subj != '' && $alamat_edit != '' && $poskod_edit != ''  && $no_tel_edit != '' && $email3_edit != '' && $location_edit != '' && $jenis_edit != '' && $bil_bed_edit != '' && $bil_bath_edit != '' && $furnished_edit != '' && $harga_edit != '' && $desc_edit != '' && $nama_user != '')
 {
	 
$username = $connect->real_escape_string(stripslashes($_POST['username']));
$password = $connect->real_escape_string(stripslashes($_POST['password']));
$ic_user = $connect->real_escape_string(stripslashes($_POST['ic']));
$nama = $connect->real_escape_string(stripslashes($_POST['nama']));
$email = $connect->real_escape_string(stripslashes($_POST['email']));
$no_tel = $connect->real_escape_string(stripslashes($_POST['no_tel']));
$alamat = $connect->real_escape_string(stripslashes($_POST['alamat']));
$ic = $connect->real_escape_string(stripslashes($_POST['ic']));
$jantina = $connect->real_escape_string(stripslashes($_POST['jantina']));
$gambar = $connect->real_escape_string(stripslashes($_FILES['gambar']['name']));
$target = "../images/user/";
$target = $target.basename($gambar);
$kandungan = $connect->real_escape_string(stripslashes($_POST['kandungan']));
$tajuk = $connect->real_escape_string(stripslashes($_POST['tajuk']));


$name = $connect->real_escape_string(stripslashes($_POST['name']));
$email1 = $connect->real_escape_string(stripslashes($_POST['email']));
$phone = $connect->real_escape_string(stripslashes($_POST['phone']));
$subj = $connect->real_escape_string(stripslashes($_POST['subj']));
$descr = $connect->real_escape_string(stripslashes($_POST['descr']));

		$alamat_edit = $connect->real_escape_string(stripslashes($_POST['alamat_edit']));
		$poskod_edit = $connect->real_escape_string(stripslashes($_POST['poskod_edit']));
		$no_tel_edit = $connect->real_escape_string(stripslashes($_POST['no_tel_edit']));
		$email3_edit = $connect->real_escape_string(stripslashes($_POST['email3_edit']));
		$location_edit = $connect->real_escape_string(stripslashes($_POST['location_edit']));
		$jenis_edit = $connect->real_escape_string(stripslashes($_POST['jenis_edit']));
		$bil_bed_edit = $connect->real_escape_string(stripslashes($_POST['bil_bed_edit']));
		$bil_bath_edit = $connect->real_escape_string(stripslashes($_POST['bil_bath_edit']));
		$furnished_edit = $connect->real_escape_string(stripslashes($_POST['furnished_edit']));
		$harga_edit = $connect->real_escape_string(stripslashes($_POST['harga_edit']));
		$desc_edit = $connect->real_escape_string(stripslashes($_POST['desc_edit']));
		$nama_user = $connect->real_escape_string(stripslashes($_POST['nama_user']));
	
		
 }
?>