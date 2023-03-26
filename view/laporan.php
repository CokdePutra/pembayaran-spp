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
    <link rel="website icon" type="png" href="../image/receipt-logo.png">
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

        $list_bulan = $_POST['bulan'];
        $keyword = $_POST['keyword'];
        if (isset($_POST["cari"])) {

            if ($list_bulan == 'all') {
                $query = "SELECT * FROM pembayaran_spp INNER JOIN tb_petugas USING(id_petugas) INNER JOIN tb_siswa USING(nis) INNER JOIN tb_kelas ON tb_siswa.id_kelas=tb_kelas.id_kelas WHERE     
                    nama_kelas like '%$keyword%' or
                    nama_petugas like '%$keyword%' or
                    nama_siswa like '%$keyword%' or
                    tanggal_bayar like '%$keyword%' or
                    bulan like '%$keyword%' or
                    tahun_bayar like '%$keyword%' ORDER BY id_bayar DESC";
                // $hasil = mysqli_query($koneksi, $query);
            } else {
                $query = "SELECT * FROM tb_siswa INNER JOIN tb_kelas USING(id_kelas) WHERE nama_kelas like '%$keyword%'";
                // $hasil = mysqli_query($koneksi, $query);
            }
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
                    <div class="search print">
                        <div class="list-bulan">
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
                        </div>
                        <input list="list_kelas" type="text" name="keyword" autofocus placeholder="Cari..." autocomplete="off">
                        <!-- <input type="text" name="page" hidden value="laporan"> -->
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
            <div class="cetak print">
                <form action="" method="POST">
                    <img src="../image/print-logo.png" style="width:20px; height:20px; margin-right:5px;">
                    <input onclick="printPage()" name="cetak" type="submit" value="CETAK">
                </form>
            </div>
            <div class="border">
                <div class="isi-tabel">
                    <table>
                        <thead>
                            <tr>
                                <th>NO</th>
                                <?php
                                // var_dump($query);
                                $take_bulan = $_POST['bulan'] == 'all';
                                if ($take_bulan) {
                                ?>
                                    <th>Nama Petugas</th>
                                <?php
                                }
                                ?>
                                <th>Nama Siswa</th>
                                <th>Nama Kelas</th>
                                <th>Tanggal Bayar</th>
                                <th>Bulan Dibayar</th>
                                <th>
                                    <?php
                                    if ($take_bulan) {
                                        echo "Tahun Dibayar";
                                    } else {
                                        echo "Status";
                                    }
                                    ?>
                                </th>
                                <th>Jumlah Bayar</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if ($query == null) {
                            ?>
                                <tr>
                                    <td colspan="9">Cari Data Terlebih Dahulu</td>
                                </tr>
                                <?php
                            } else {
                                $hasil = mysqli_query($koneksi, $query);
                                $cek_query = mysqli_num_rows($hasil);
                                $i = 1;
                                if ($cek_query < 1) {
                                ?>
                                    <tr>
                                        <td colspan="9">Data Tidak Ditemukan</td>
                                    </tr>
                                    <?php
                                } else {
                                    while ($row = mysqli_fetch_assoc($hasil)) {
                                        $nama_siswa = $row['nama_siswa'];
                                        $cek_tahun = date('Y');
                                        $hasil_bulan = mysqli_query($koneksi, "SELECT tanggal_bayar, jumlah_bayar,id_bayar FROM pembayaran_spp INNER JOIN tb_siswa USING(nis) WHERE nama_siswa='$nama_siswa' AND bulan='$list_bulan' AND tahun_bayar='$cek_tahun'");
                                        $row_bulan = mysqli_fetch_assoc($hasil_bulan);
                                    ?>
                                        <tr>
                                            <td><?= $i++ ?></td>
                                            <?php
                                            if ($take_bulan) {
                                            ?>
                                                <td style="width:10rem;"><?= $row['nama_petugas']; ?></td>
                                            <?php
                                            }
                                            ?>
                                            <td style="width:10rem;"><?= $row['nama_siswa']; ?></td>
                                            <td style="width:10rem;"><?= $row['nama_kelas']; ?></td>

                                            <td>
                                                <?php
                                                if ($take_bulan) {
                                                    echo $row['tanggal_bayar'];
                                                } else {
                                                    echo $row_bulan['tanggal_bayar'];
                                                }
                                                ?>
                                            </td>
                                            <td style="text-align:center;">
                                                <?php
                                                if ($take_bulan) {
                                                    echo $row['bulan'];
                                                } else {
                                                    echo $list_bulan;
                                                }
                                                ?>
                                            </td>
                                            <?php
                                            if ($take_bulan) {
                                            } else {
                                            ?>
                                                <td>
                                                    <?php
                                                    if (@$row_bulan) {
                                                        echo "Lunas";
                                                    } else {
                                                        echo "Belum Lunas";
                                                    }
                                                    ?>
                                                </td>
                                            <?php
                                            }
                                            ?>
                                            <?php
                                            if ($take_bulan) {
                                            ?>
                                                <td><?= $row['tahun_bayar'] ?></td>
                                            <?php
                                            }
                                            ?>
                                            <td>Rp.
                                                <?php
                                                if ($take_bulan) {
                                                    echo number_format($row['jumlah_bayar'], 0, ',', '.');
                                                } else {
                                                    echo number_format($row_bulan['jumlah_bayar'], 0, ',', '.');
                                                }
                                                ?>
                                            </td>
                                        </tr>
                                <?php
                                        if ($take_bulan) {
                                            $total += $row['jumlah_bayar'];
                                        } else {
                                            $total += $row_bulan['jumlah_bayar'];
                                        }
                                    }
                                }
                                ?>
                                <tr>
                                    <?php
                                    if ($take_bulan) {
                                    ?>
                                        <td colspan="6" style="text-align:right">Total Yang Sudah Bayar</td>
                                        <td colspan="2">Rp.<?= number_format($total, 0, ',', '.') ?></td>

                                    <?php
                                    } else {
                                    ?>
                                        <td colspan="5" style="text-align:right">Total Yang Sudah Bayar</td>
                                        <td colspan="2">Rp.<?= number_format($total, 0, ',', '.') ?></td>

                                </tr>
                        <?php
                                    }
                                }
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="ttd">
                <h5>Yth Kepala Sekolah,</h5>
                <p></p>
            </div>
        </div>
    </div>

    </div>


    <!-- link Js -->
    <script src="../js/script.js"></script>
</body>

</html>