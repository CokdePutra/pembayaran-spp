<?php
session_start();
error_reporting(0);
if (!isset($_SESSION['username'])) {
    echo "<script>alert('kamuu jangan coba coba');window.location='../login/login.php';</script>";
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
    <link rel="stylesheet" href="../css/style.css">
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
            $query = "SELECT * FROM tb_siswa WHERE nis='$nis'";
            ?>
            <div class="main">
                <div class="content">
                    <h2>Halo <?= $_SESSION['level_user']; ?> <?= $_SESSION['nama']; ?></h2>
                </div>
        </form>

        <?php
        if (@$_SESSION['level_user'] == 'admin' || @$_SESSION['level_user'] == 'petugas') {
        ?>
            <div class="border">
                <?php
                $tahun = date('Y');
                $bulanIndo = [
                    '01' => 'Januari',
                    '02' => 'Februari',
                    '03' => 'Maret',
                    '04' => 'April',
                    '05' => 'Mei',
                    '06' => 'Juni',
                    '07' => 'Juli',
                    '08' => 'Agustus',
                    '09' => 'September',
                    '10' => 'Oktober',
                    '11' => 'November',
                    '12' => 'Desember',
                ];
                $bulan = $bulanIndo[date('m')];
                // query total
                $total_siswa = mysqli_query($koneksi, "SELECT COUNT(*) as 'jumlah_siswa' FROM tb_siswa");
                $total_siswa = mysqli_fetch_array($total_siswa);
                // query total pembayaran
                $total_pembayaran = mysqli_query($koneksi, "SELECT COUNT(*) as 'jumlah_pembayaran' FROM pembayaran_spp WHERE bulan='$bulan' AND tahun_bayar='$tahun'");
                $total_pembayaran = mysqli_fetch_array($total_pembayaran);
                // query total petugas
                $total_petugas = mysqli_query($koneksi, "SELECT COUNT(*) as 'jumlah_petugas' FROM tb_petugas");
                $total_petugas = mysqli_fetch_array($total_petugas);
                ?>
                <div class="total-siswa">
                    <h3>Total Siswa</h3>
                    <a href="../view-tabel/tb_siswa.php?page=siswa"><?= $total_siswa['jumlah_siswa'] ?></a>
                </div>
                <div class="total-petugas">
                    <h3>Total Petugas</h3>
                    <a href="../view-tabel/tb_petugas.php?page=petugas"><?= $total_petugas['jumlah_petugas'] ?></a>
                </div>
                <div class="total-transaksi">
                    <h3>Jumlah Transaksi Bulan Ini</h3>
                    <a href="../view/pembayaran_spp.php?page=pembayaran"><?= $total_pembayaran['jumlah_pembayaran'] ?></a>
                </div>
                <div class="belum-bayar">
                    <h3>Siswa Yang Belum Bayar</h3>
                    <?php
                    $siswa = $total_siswa['jumlah_siswa'];
                    $pembayaran = $total_pembayaran['jumlah_pembayaran'];
                    $belum_byr = $siswa - $pembayaran;
                    ?>
                    <a href="pembayaran_spp.php?page=pembayaran"><?= $belum_byr ?></a>
                </div>
            </div>
        <?php
        }
        ?>

        <?php
        if (@$_SESSION['level_user'] == 'siswa') {
        ?>
            <div class="border-siswa">
                <div class="judul">
                    <h3>Biodata Data Siswa</h3>
                </div>
                <div class="isi">
                    <?php
                    $hasil = mysqli_query($koneksi, $query);
                    $row = mysqli_fetch_assoc($hasil)
                    ?>
                    <table>
                        <tr>
                            <th>NIS</th>
                            <td name="nis"><?= $row['nis']; ?></td>
                        </tr>
                        <tr>
                            <th>Nama Siswa</th>
                            <td><?= $row['nama_siswa']; ?></td>
                        </tr>
                        <tr>
                            <th>Kelas</th>
                            <td><?= $row['nama_kelas']; ?></td>
                        </tr>
                        <tr>
                            <th>No Telp Orang Tua</th>
                            <td><?= $row['telp_ortu']; ?></td>
                        </tr>
                    </table>
                </div>
                <div class="btn-detail">
                    <form action="detail_siswa.php" method="POST">
                        <input type="submit" value="Detail">
                        <input type="text" hidden name="nis" value="<?= $row['nis']; ?>">
                    </form>
                </div>
            </div>
        <?php
        }
        ?>

    </div>

    </div>


    <!-- link Js -->
    <script src="../js/script.js"></script>
</body>

</html>