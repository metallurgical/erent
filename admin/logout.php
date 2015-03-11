<?php
session_start();
unset($_SESSION['user_id']);
echo "<script language=javascript>alert('Log keluar berjaya.');window.location='../index.php';</script>";

	?>