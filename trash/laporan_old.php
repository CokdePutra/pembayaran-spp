<?php
session_start();
error_reporting(0);
if (!isset($_SESSION['username'])) {
    echo "<script>alert('kamuu jangan coba coba');window,location='../login/login.php';</script>";
} elseif (@$_SESSION['level_user'] == 'siswa') {
    echo "<script>alert('Maaf Anda bukan Admin');window,location='../view/dashboard.php?page=dashboard';</script>";
} elseif (@$_SESSION['level_user'] == 'petugas') {
    echo "<script>alert('Maaf Anda bukan Admin');window,location='../view/dashboard.php?page=dashboard';</script>";
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan</title>
    <!-- link CSS -->
    <link rel="stylesheet" href="../css/tabel.css">
    <link rel="stylesheet" href="../css/navbar.css">
</head>

<body>
    <div class="container">

        <?php
        include('../template/navbar.php');
        ?>

        <?php
        include("../koneksi.php");
        // $query = "SELECT * FROM pembayaran_spp INNER JOIN tb_petugas USING(id_petugas) INNER JOIN tb_siswa USING(nis)";

        $list_bulan = $_POST['bulan'];
        $keyword = $_POST['keyword'];
        // $kelas = mysqli_query($koneksi, "SELECT * FROM pembayaran_spp INNER JOIN tb_petugas USING(id_petugas) INNER JOIN tb_siswa USING(nis) WHERE kelas IS NOT NULL");
        if (isset($_POST["cari"])) {
            $query = "SELECT * FROM pembayaran_spp INNER JOIN tb_petugas USING(id_petugas) INNER JOIN tb_siswa USING(nis) WHERE id_bayar like '%$keyword%' or
                                                                                                                                    nama_kelas like '%$keyword%' or
                                                                                                                                    nama_petugas like '%$keyword%' or
                                                                                                                                    nama_siswa like '%$keyword%' or
                                                                                                                                    tanggal_bayar like '%$keyword%' or
                                                                                                                                    bulan like '%$keyword%' or
                                                                                                                                    tahun_bayar like '%$keyword%' ORDER BY id_bayar DESC";
            // if ($_POST['bulan'] == 'all') {
            //     // $hasil = mysqli_query($koneksi, $query);
            // } else {
            //     $query = "SELECT * FROM pembayaran_spp INNER JOIN tb_petugas USING(id_petugas) INNER JOIN tb_siswa USING(nis) WHERE bulan='$list_bulan' AND nama_kelas IS NOT NULL AND nama_kelas like '%$keyword%'";
            //     // $hasil = mysqli_query($koneksi, $query);
            // }
        }
        ?>


        <form action="" method="POST">
            <div class="main">
                <div class="content">
                    <h2>Laporan SPP</h2>
                </div>
                <?php
                if (@$_SESSION['level_user'] == 'admin' || @$_SESSION['level_user'] == 'petugas') {
                ?>
                    <div class="search">
                        <!-- <div class="list-bulan">
                            <select name="bulan">
                                <option value="all">Semua Bulan</option>
                                <option value="Januari">Januari</option>
                                <option value="Februari">Februari</option>
                                <option value="Maret">Maret</option>
                                <option value="April">April</option>
                                <option value="Mei">Mei</option>
                                <option value="Juni">Juni</option>
                                <option value="Juli">Juli</option>
                                <option value="Agustus">Agustus</option>
                                <option value="September">September</option>
                                <option value="Oktober">Oktober</option>
                                <option value="November">November</option>
                                <option value="Desember">Desember</option>
                            </select>
                        </div> -->
                        <input list="list_kelas" type="text" name="keyword" autofocus placeholder="Cari..." autocomplete="off">
                        <button class="search-logo" type="submit" name="cari"><img src="../image/search-logo.png" style="width:15px; height:15px; margin-right:5px;"></button>
                        <datalist id="list_kelas">
                            <?php
                            $hasil = mysqli_query($koneksi, "SELECT nama_kelas FROM tb_kelas");
                            while ($row_kelas = mysqli_fetch_assoc($hasil)) {
                            ?>
                                <option value="<?= $row_kelas['nama_kelas']; ?>"><?= $row_kelas['nama_kelas']; ?></option>
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
            <div class="cetak">
                <form action="print.php" method="POST">
                    <input type="text" name="kode" hidden value="<?= $keyword ?>">
                    <input type="text" name="kelas" hidden value="<?= $list_bulan ?>">
                    <img src="../image/print-logo.png" style="width:20px; height:20px; margin-right:5px;">
                    <input name="cetak" type="submit" value="CETAK">
                </form>
                <!-- <a href="print.php?kode=<?= $keyword; ?>&kelas<?= $list_bulan; ?>">print</a> -->
            </div>
            <!-- <div class="box">
                <div class="kelas">
                    <form action="print.php" method="POST">
                        <img src="../image/print-logo.png" style="width:20px; height:20px; margin-right:5px;"><input name="kelas" type="submit" value="KELAS">
                    </form>
                </div> -->
            <div class="border">
                <div class="isi-tabel">
                    <table>
                        <thead>
                            <tr>
                                <th>NO</th>
                                <th>Nama Petugas</th>
                                <th>Nama Siswa</th>
                                <th>Nama Kelas</th>
                                <th>Tanggal Bayar</th>
                                <th>Bulan Dibayar</th>
                                <th>Tahun Dibayar</th>
                                <th>Jumlah Bayar</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (!$query == '') {
                                for ($i = 1; $i < 2;) {
                                    $hasil = mysqli_query($koneksi, $query);
                                    while ($row = mysqli_fetch_assoc($hasil)) {

                            ?>
                                        <tr>
                                            <td><?= $i++ ?></td>
                                            <td style="width:10rem;"><?= $row['nama_petugas']; ?></td>
                                            <td style="width:10rem;"><?= $row['nama_siswa']; ?></td>
                                            <td style="width:10rem;"><?= $row['nama_kelas']; ?></td>
                                            <td><?= $row['tanggal_bayar']; ?></td>
                                            <td style="text-align:left;"><?= $row['bulan']; ?></td>
                                            <td><?= $row['tahun_bayar']; ?></td>
                                            <td>Rp. <?= number_format($row['jumlah_bayar'], 0, ',', '.') ?></td>
                                        </tr>
                                <?php
                                        $total += $row['jumlah_bayar'];
                                    }
                                }
                            } else {
                                ?>
                                <td colspan="9">Maaf data tidak tersedia</td>
                            <?php
                            }
                            ?>
                            <tr>
                                <td colspan="6" style="text-align:right">Total</td>
                                <td colspan="2">Rp.<?= number_format($total, 0, ',', '.') ?></td>
                            </tr>
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