<?php
session_start();
error_reporting(0);
if(!isset($_SESSION['username'])){
    echo "<script>alert('kamuu jangan coba coba');window,location='login/login.php';</script>";
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
    <link rel="stylesheet" href="../css/dashboard.css">
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
        $query = "SELECT * FROM tb_siswa WHERE nis='$nis' LIMIT 1";
        $keyword = $_POST['keyword'];
        if(isset($_POST["cari"])){
            $query = "SELECT * FROM tb_siswa WHERE nis like '%$keyword%' or
                                                       nama_siswa like '%$keyword%' LIMIT 1";
        }
        ?>


        <div class="main">
            <div class="content">
                <h2>Halo <?= $_SESSION['level_user']; ?> <?= $_SESSION['nama']; ?></h2>
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
            
            <div class="biodata">
                <div class="border">
                    <div class="judul">
                        <h3>Biodata Siswa</h3>
                    </div>
                    <div class="isi">
                            <?php
                                $hasil = mysqli_query($koneksi, $query);
                                while($row = mysqli_fetch_assoc($hasil)){
                            ?>
                        <table>
                            <tr>
                                <th>NIS</th>
                                <td><?= $row ['nis'];?></td>
                            </tr>
                            <tr>
                                <th>Nama Siswa</th>
                                <td><?= $row ['nama_siswa'];?></td>
                            </tr>
                            <tr>
                                <th>Kelas</th>
                                <td><?= $row ['nama_kelas'];?></td>
                            </tr>
                            <tr>
                                <th>No Telp Orang Tua</th>
                                <td><?= $row ['telp_ortu'];?></td>
                            </tr>
                        </table>
                    </div>
                    <div class="btn-detail">
                        <form action="tabel/detail_siswa.php?nis=<?= $row ['nis'];?>" method="POST">
                            <input type="submit" value="Detail">
                        </form>
                    </div>
                    <?php
                                }
                        ?>
                </div>
            </div>
        </div>

    </div>


    <!-- link Js -->
    <script src="../js/script.js"></script>
</body>
</html>