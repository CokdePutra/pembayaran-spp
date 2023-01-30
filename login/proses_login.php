<?php
session_start();
include("../koneksi.php");

$username = $_POST['username'];
$nis = $_POST['username'];
$password = $_POST['password'];

$query_petugas = "SELECT * FROM tb_petugas WHERE username='$username' AND password = '$password'";
$hasil_petugas = mysqli_query($koneksi,$query_petugas);
$cek_petugas = mysqli_num_rows($hasil_petugas);
$baris_petugas = mysqli_fetch_assoc($hasil_petugas);

$query_siswa = "SELECT * FROM tb_siswa WHERE nis='$nis' AND password = '$password'";
$hasil_siswa = mysqli_query($koneksi,$query_siswa);
$cek_siswa = mysqli_num_rows($hasil_siswa);
$baris_siswa = mysqli_fetch_assoc($hasil_siswa);

if($cek_petugas > 0){
    $_SESSION['username'] = $username;
    $_SESSION['password'] = $password;
    $_SESSION['nama'] = $baris_petugas['nama_petugas'];
    $_SESSION['level_user'] = $baris_petugas['level_user'];

    header("location:../dashboard.php");
}
 elseif ($cek_siswa > 0) {
    $_SESSION['username'] = $nis;
    $_SESSION['password'] = $password;
    $_SESSION['nama'] = $baris_siswa['nama_siswa'];
    $_SESSION['level_user'] = "siswa";

    
    header("location:../dashboard.php");
} 

else {
    echo "<script>alert('Maaf Password atau Username Anda salah')</script>";
}



?>