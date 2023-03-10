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
    <title>Pembayaran SPP</title>
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
            $query = "SELECT * FROM tb_siswa INNER JOIN tb_kelas USING(id_kelas)  WHERE nis='$nis' LIMIT 1";
            $keyword = $_POST['keyword'];
            if (isset($_POST["cari"])) {
                $query = "SELECT * FROM tb_siswa INNER JOIN tb_kelas USING(id_kelas)  WHERE nis like '%$keyword%' or
                                                       nama_siswa like '%$keyword%' LIMIT 1";
            }
            ?>



            <div class="main">
                <div class="content">
                    <h2>Halaman Kewajiban Siswa</h2>
                </div>
                <?php
                if (@$_SESSION['level_user'] == 'admin' || @$_SESSION['level_user'] == 'petugas') {
                ?>
                    <div class="search">
                        <input list="list_nis" type="text" name="keyword" autofocus placeholder="Cari..." autocomplete="off">
                        <button class="search-logo" type="submit" name="cari"><img src="../image/search-logo.png" style="width:15px; height:15px; margin-right:5px;"></button>
                        <datalist id="list_nis">
                            <?php
                            $hasil = mysqli_query($koneksi, "SELECT nis, nama_siswa FROM tb_siswa");
                            while ($row = mysqli_fetch_assoc($hasil)) {
                            ?>
                                <option value="<?= $row['nis']; ?>"><?= $row['nama_siswa']; ?></option>
                            <?php
                            }
                            ?>
                        </datalist>
                    </div>
                <?php
                }
                ?>
        </form>

        <div class="biodata">
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
                            <th>Angkatan</th>
                            <td><?= $row['angkatan']; ?></td>
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
                    <form action="detail_siswa.php?page=pembayaran" method="POST">
                        <?php
                        $hasil_detail = mysqli_query($koneksi, $query);
                        $cek_detail = mysqli_num_rows($hasil_detail);
                        if ($cek_detail > 0) {
                        ?>
                            <input type="submit" value="Detail">
                            <input type="text" hidden name="nis" value="<?= $row['nis']; ?>">
                        <?php
                        }
                        ?>
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