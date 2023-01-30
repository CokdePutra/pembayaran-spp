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
    <link rel="stylesheet" href="../css/pembayaran.css">
    <link rel="stylesheet" href="../css/navbar.css">
</head>
<body>
    <div class="container">

        <!-- sidebar -->
        <?php
            if(@$_SESSION['level_user'] == 'admin'){
            ?>
        <nav class="navbar">
            <div class="sidebar">
                <div class="logo">
                    <img src="../image/logo.png">
                </div>

                <!-- isi sidebar -->
                <div class="isi">
                    <ul>
                        <li><a href="../dashboard.php"><b>Halaman Utama</b></a></li>
                        <li><a href=""><b>Tabel Siswa</b></a></li>
                        <li><a href=""><b>Tabel Petugas</b></a></li>
                        <li><a href=""><b>Tabel SPP</b></a></li>
                        <li><a href="pembayaran_spp.php"><b>Pembayaran SPP</b></a></li>
                        <li><a href=""><b>History Transaksi</b></a></li>
                        <li><a href=""><b>Laporan</b></a></li>
                    </ul>
                </div>
                <div class="logout">
                    <a href="login/logout.php"><b>KELUAR</b></a>
                </div>            
            </div>
        </nav>
        <?php
            }
        ?>
        
        <!-- navbar -->
        <div class="nav-profile">

            <div class="hamburger-menu">
                    <?php
                        if(@$_SESSION['level_user'] == 'admin'){
                    ?>
                <a href="#" id="hamburger-menu"><img src="../image/menu.png" width="40px" height="40px"></a>
                    <?php
                    }
                    ?>
                    <?php
                        if(@$_SESSION['level_user'] == 'siswa'){
                    ?>
            <div class="out">
                <a href="login/logout.php"><img src="../image/logout.png" width="40px" height="40px"></a>
            </div>
                    <?php
                        }
                    ?>
            </div>

            <div class="profile">
                <a href="#" id="profile-menu"><img src="../image/profile.png" width="35px" height="35px"></a>
            </div>
        </div>
        <!-- tutup navbar -->
        <form action="" method="POST">
        <?php
        include("../koneksi.php");
        $query = "SELECT * FROM pembayaran_spp INNER JOIN tb_siswa USING(nis) INNER JOIN tb_petugas USING(id_petugas)  ORDER BY id_bayar ASC";
        $keyword = $_POST['keyword'];
        if(isset($_POST["cari"])){
            $query = "SELECT * FROM pembayaran_spp INNER JOIN tb_siswa USING(nis) INNER JOIN tb_petugas USING(id_petugas)  WHERE id_bayar like '%$keyword%' or
                                                       nama_petugas like '%$keyword%' or
                                                       nama_siswa like '%$keyword%' or
                                                       tanggal_bayar like '%$keyword%' or
                                                       bulan like '%$keyword%'or
                                                       status like '%$keyword%'";
        }
        ?>


        <div class="main">
            <div class="content">
                <h2>Tabel Pembayaran SPP</h2>
            </div>
            <?php
            if(@$_SESSION['level_user'] == 'admin'){
            ?>
            <div class="search">
                <input type="text" name="keyword" placeholder="Cari..." autocomplete="off">
                <button type="submit" name="cari">Cari</button>
            </div>
            <?php
            }
            ?>
            </form>
            
            <div class="pembayaran">
                <div class="border">
                    <div class="isi-pembayaran">
                        <table>
                            <thead>
                                <tr>
                                    <th>ID Bayar</th>
                                    <th>Nama Petugas</th>
                                    <th>Nama Siswa</th>
                                    <th>Tanggal Bayar</th>
                                    <th>Bulan</th>
                                    <th>Status</th>
                                    <th>Nominal</th>
                                    <th>                
                                        <div class="btn-tambah">
                                            <a href=""><button class="tambah">Tambah Data</button></a>
                                        </div>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $hasil = mysqli_query($koneksi, $query);
                                    while($row = mysqli_fetch_assoc($hasil)){
                                ?>
                                <tr>
                                    <td><?= $row ['id_bayar']; ?></td>
                                    <td><?= $row ['nama_petugas']; ?></td>
                                    <td><?= $row ['nama_siswa']; ?></td>
                                    <td><?= $row ['tanggal_bayar']; ?></td>
                                    <td><?= $row ['bulan']; ?></td>
                                    <td><?= $row ['status']; ?></td>
                                    <td><?= $row ['angkatan']; ?></td>
                                    <td>
                                        <div class="button-aksi">
                                                <a href=""><button class="edit">Edit</button></a>
                                                <a href=""><button class="delete">Delete</button></a>
                                        </div>
                                    </td>
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