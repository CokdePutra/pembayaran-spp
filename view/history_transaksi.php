<?php
session_start();
error_reporting(0);
if (!isset($_SESSION['username'])) {
    echo "<script>alert('kamuu jangan coba coba');window,location='../login/login.php';</script>";
} elseif (@$_SESSION['level_user'] == 'siswa') {
    echo "<script>alert('Maaf Anda bukan Admin');window,location='../view/dashboard.php?page=dashboard';</script>";
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>History Transaksi</title>
    <!-- link CSS -->
    <link rel="stylesheet" href="../css/tabel.css">
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
            $query = "SELECT * FROM pembayaran_spp INNER JOIN tb_petugas USING(id_petugas) INNER JOIN tb_siswa USING(nis) ORDER BY id_bayar DESC";
            $keyword = $_POST['keyword'];
            if (isset($_POST["cari"])) {
                $query = "SELECT * FROM pembayaran_spp INNER JOIN tb_petugas USING(id_petugas) INNER JOIN tb_siswa USING(nis) WHERE id_bayar like '%$keyword%' or
                                                       nama_petugas like '%$keyword%' or
                                                       nama_siswa like '%$keyword%' or
                                                       tanggal_bayar like '%$keyword%' or
                                                       bulan like '%$keyword%' or
                                                       tahun_bayar like '%$keyword%' ORDER BY id_bayar DESC";
            }
            ?>


            <div class="main">
                <div class="content">
                    <h2>History Transaksi</h2>
                </div>
                <?php
                if (@$_SESSION['level_user'] == 'admin' || @$_SESSION['level_user'] == 'petugas') {
                ?>
                    <div class="search">
                        <input list="list_nis" type="text" name="keyword" autofocus placeholder="Cari..." autocomplete="off">
                        <button class="search-logo" type="submit" name="cari"><img src="../image/search-logo.png" style="width:15px; height:15px; margin-right:5px;"></button>
                        <datalist id="list_nis">
                            <?php
                            $hasil = mysqli_query($koneksi, "SELECT bulan FROM pembayaran_spp");
                            while ($row = mysqli_fetch_assoc($hasil)) {
                            ?>
                                <option value="<?= $row['bulan']; ?>"><?= $row['bulan'] ?></option>
                            <?php
                            }
                            ?>
                        </datalist>
                    </div>
                <?php
                }
                ?>
        </form>

        <div class="box">
            <div class="border">
                <div class="isi-tabel">
                    <table>
                        <thead>
                            <tr>
                                <th>ID Transaksi</th>
                                <th>Nama Petugas</th>
                                <th>Nama Siswa</th>
                                <th>Tanggal Bayar</th>
                                <th>Bulan Dibayar</th>
                                <th>Tahun Dibayar</th>
                                <th>Jumlah Bayar</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $hasil = mysqli_query($koneksi, $query);
                            while ($row = mysqli_fetch_assoc($hasil)) {
                            ?>
                                <tr>
                                    <td><?= $row['id_bayar']; ?></td>
                                    <td style="width:10rem;"><?= $row['nama_petugas']; ?></td>
                                    <td style="width:10rem;"><?= $row['nama_siswa']; ?></td>
                                    <td><?= $row['tanggal_bayar']; ?></td>
                                    <td style="text-align:left;"><?= $row['bulan']; ?></td>
                                    <td><?= $row['tahun_bayar']; ?></td>
                                    <td><?= $row['jumlah_bayar']; ?></td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    </div>


    <!-- link Js -->
    <script src="../js/script.js"></script>
</body>

</html>