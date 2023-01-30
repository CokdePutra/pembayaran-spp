<?php
session_start();
session_destroy();
echo "<script>alert('Selamat Anda Berhasil Logout');window.location='login.php';</script>";
?>