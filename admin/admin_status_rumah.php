<?php
include('../config.php');
extract($_REQUEST);

if($jenis=="lulus")
{
	$sta = 1;
	
	$effectiveDate = date('Y-m-d');
	$effectiveDate = date('Y-m-d', strtotime("+5 months", strtotime($effectiveDate)));
	$not = 'Tiada Notis';
	$sql_edit_pelajar = "UPDATE home SET status='$sta', valid_until = '$effectiveDate',notis='$not' WHERE id='$id'";
}
else if($jenis=="diberhentikan")
{
	$sta = 2;
	$effectiveDate = date('Y-m-d');
	$effectiveDate = date('Y-m-d', strtotime("+5 months", strtotime($effectiveDate)));
	$sql_edit_pelajar = "UPDATE home SET status='$sta', valid_until = '$effectiveDate' WHERE id='$id'";
}
else if($jenis=="notis")
{
	$not = "Sila jelaskan bayaran anda untuk menyambung servis. Bayaran dikenakan sebanyak RM10/Sebulan dari tempoh iklan anda diberhenti.";
	$sql_edit_pelajar = "UPDATE home SET notis='$not' WHERE id='$id'";
}
				
				
				if($result_edit_pelajar = $connect->query($sql_edit_pelajar))
				{
					
					echo "<script language=javascript>alert('Maklumat rumah berjaya dikemaskini.');window.location='../admin/pemilik_rumah_admin.php';</script>";
				}
				

?>