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
        $query = "SELECT * FROM tb_siswa ORDER BY nis ASC";
        $keyword = $_POST['keyword'];
        if(isset($_POST["cari"])){
            $query = "SELECT * FROM tb_siswa WHERE nis like '%$keyword%' or
                                                       nisn like '%$keyword%' or
                                                       nama_siswa like '%$keyword%' or
                                                       nama_kelas like '%$keyword%' or
                                                       angkatan like '%$keyword%'or
                                                       alamat like '%$keyword%' or
                                                       telp_ortu like '%$keyword%'";
        }
        ?>


        <div class="main">
            <div class="content">
                <h2>Daftar Siswa</h2>
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
                                    <th>NIS</th>
                                    <th>NISN</th>
                                    <th>Nama Siswa</th>
                                    <th>Kelas</th>
                                    <th>Angkatan</th>
                                    <th>Alamat</th>
                                    <th>Telp</th>
                                    <th>                
                                        <div class="btn-tambah">
                                            <a class="tambah" href="form_bayar.php">Tambah Data</a>
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
                                    <td><?= $row ['nis']; ?></td>
                                    <td><?= $row ['nisn']; ?></td>
                                    <td><?= $row ['nama_siswa']; ?></td>
                                    <td><?= $row ['nama_kelas']; ?></td>
                                    <td><?= $row ['angkatan']; ?></td>
                                    <td><?= $row ['alamat']; ?></td>
                                    <td><?= $row ['telp_ortu']; ?></td>
                                    <td>
                                        <div class="button-aksi">
                                                <a href=""><button class="edit"><b>Edit</b></button></a>
                                                <a href=""><button class="delete"><b>Delete</b></button></a>
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