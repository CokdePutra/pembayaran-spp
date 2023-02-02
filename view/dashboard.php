<?php
session_start();
error_reporting(0);
if(!isset($_SESSION['username'])){
    echo "<script>alert('kamuu jangan coba coba');window,location='../login/login.php';</script>";
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <!-- link CSS -->
    <link rel="stylesheet" href="../css/dashboard.css">
    <link rel="stylesheet" href="../css/navbar.css">
</head>
<body>
    <div class="container">

    <?php
    include('../template/navbar.php');
    ?>
        
        <form action="" method="POST">
        <?php
        include("../koneksi.php");
        $nis = $_SESSION['username'];
        $query = "SELECT * FROM tb_siswa WHERE nis='$nis' LIMIT 1";
        ?>


        <div class="main">
            <div class="content">
                <h2>Halo <?= $_SESSION['level_user']; ?> <?= $_SESSION['nama']; ?></h2>
            </div>
            </form>
            
            <div class="biodata">
                <div class="border">
                    <div class="isi">
                            <div class="total-siswa">
                                <h3>Total Siswa</h3>
                                <a href="">3027</a>
                            </div>
                            <div class="total-petugas">
                                <h3>Total Petugas</h3>
                            </div>
                            <div class="total-transaksi">
                                <h3>Total Pembayaran Bulan Ini</h3>
                            </div>
                    </div>
                </div>
            </div>
        </div>

    </div>


    <!-- link Js -->
    <script src="../js/script.js"></script>
</body>
</html>