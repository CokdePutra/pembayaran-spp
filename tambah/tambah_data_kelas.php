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
    <title>Tabel Kelas</title>
    <!-- link CSS -->
    <link rel="stylesheet" href="../css/tabel.css">
    <link rel="stylesheet" href="../css/navbar.css">
</head>

<body>
    <div class="container">

        <?php
        include('../template/navbar.php');
        ?>

        <div class="form-tambah">

            <div class="form-tabel">
                <a href="../view-tabel/tb_kelas.php?page=kelas"><img src="../image/back-logo.png" style="width:25px; height:25px; margin-right:5px;"></a>
                <h2>Masukan Data Kelas</h2>
                <br><br>
                <form action="proses_tambah_kelas.php" method="POST">
                    <table>
                        <tr>
                            <th><label for="nama_kelas">Nama Kelas</label></th>
                            <td><input type="text" required name="nama_kelas" autocomplete="off" placeholder="Masukan Nama Kelas"></td>
                        </tr>
                        <tr>
                            <th><label for="keterangan">Keterangan</label></th>
                            <td><input type="text" required name="keterangan" autocomplete="off" placeholder="Masukan Keterangan"></td>
                        </tr>
                        <tr>
                            <th></th>
                            <td><input type="submit" value="Tambahkan Data"></td>
                        </tr>
                    </table>
                    <!-- <button class="btn-bayar">Tambahkan Data</button> -->
                </form>
            </div>
        </div>


    </div>


    <!-- link Js -->
    <script src="../js/script.js"></script>
</body>

</html>