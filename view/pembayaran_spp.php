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

    <?php
    include('../template/navbar.php');
    ?>
        
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