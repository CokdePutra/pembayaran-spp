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
    <title>Form Pembayaran</title>
    <!-- link CSS -->
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/navbar.css">
</head>
<body>
    <div class="container">

    <?php
    include('../template/navbar.php');
    include("../koneksi.php");
    $bulan_bayar = $_GET['bulan'];
    $query = "SELECT * FROM tb_siswa WHERE nis='$nis'";
        ?>

        <div class="main">
            <div class="biodata">
                <div class="border">
                    <div class="judul">
                        <h3>Masukan Pembayaran</h3>
                    </div>
                    <div class="isi">
                            <?php
                                $hasil = mysqli_query($koneksi, $query);
                                $row = mysqli_fetch_assoc($hasil)
                            ?>
                        <table>
                            <tr>
                                <th>NIS</th>
                                <td name="nis"><?= $row ['nis'];?></td>
                            </tr>
                            <tr>
                                <th>Nama Siswa</th>
                                <td><?= $row ['nama_siswa'];?></td>
                            </tr>
                            <tr>
                                <th>Tanggal Bayar</th>
                                <td><?= date('Y-m-d')?></td>
                            </tr>
                            <tr>
                                <th>Bulan Yang Akan di Bayarkan</th>
                                <td><?= $bulan_bayar?></td>
                            </tr>
                            <tr>
                                <th>No Telp Orang Tua</th>
                                <td><?= $row ['telp_ortu'];?></td>
                            </tr>
                        </table>
                    </div>
                    <div class="btn-detail">
                        <form action="detail_siswa.php" method="POST">
                            <input type="submit" value="Detail">
                            <input type="text" hidden name="nis" value="<?= $row ['nis'];?>">
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>


    <!-- link Js -->
    <script src="../js/script.js"></script>
</body>
</html>