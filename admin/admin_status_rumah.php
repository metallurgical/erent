<?php
include('../config.php');
extract($_REQUEST);

if($jenis=="lulus")
{
	$sta = 1;
}
else if($jenis=="diberhentikan")
{
	$sta = 2;
}
$effectiveDate = date('Y-m-d');
$effectiveDate = date('Y-m-d', strtotime("+5 months", strtotime($effectiveDate)));
		$sql_edit_pelajar = "UPDATE home SET status='$sta', valid_until = '$effectiveDate' WHERE id='$id'";
				
				if($result_edit_pelajar = $connect->query($sql_edit_pelajar))
				{
					
					echo "<script language=javascript>alert('Maklumat rumah berjaya dikemaskini.');window.location='../admin/pemilik_rumah_admin.php';</script>";
				}
				/*else
				{
					echo "<script language=javascript>alert('Maklumat pengguna tidak berjaya dikemaskini. Sila cuba lagi.');window.location='edit.php?id=".$_GET['id']."';</script>";
				}*/

?>