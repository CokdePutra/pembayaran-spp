<?php
session_start();
error_reporting(0);
if (!isset($_SESSION['username'])) {
    echo "<script>alert('kamuu jangan coba coba');window,location='../login/login.php';</script>";
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabel SPP</title>
    <link rel="website icon" type="png" href="../image/spp-logo.png">
    <!-- link CSS -->
    <link rel="stylesheet" href="../css/tabel.css">
    <link rel="stylesheet" href="../css/navbar.css">
</head>

<body>
    <div class="container">

        <?php
        include('../template/navbar.php');
        include('../koneksi.php');
        $angkatan = $_GET['angkatan'];
        $hasil = mysqli_query($koneksi, "SELECT * FROM tb_spp WHERE angkatan='$angkatan'");
        $row = mysqli_fetch_assoc($hasil);
        ?>

        <div class="form-tambah">

            <div class="form-tabel">
                <a href="../view-tabel/tb_spp.php?page=spp"><img src="../image/back-logo.png" style="width:25px; height:25px; margin-right:5px;"></a>
                <h2>Ubah Data Angkatan <?= $row['angkatan'] ?></h2>
                <br><br>
                <form action="proses_update_spp.php" method="POST">
                    <label for="nominal">Nominal</label>
                    <br>
                    <input type="text" name="nominal" autocomplete="off" value="<?= $row['nominal'] ?>">
                    <br>
                    <input type="submit" class="ubah" value="Ubah Data">
                    <!-- <button class="btn-bayar">Tambahkan Data</button> -->
                </form>
            </div>
        </div>


    </div>


    <!-- link Js -->
    <script src="../js/script.js"></script>
</body>

</html>