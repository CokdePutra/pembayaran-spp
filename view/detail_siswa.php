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
    <link rel="stylesheet" href="../css/siswa.css">
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
        $namas = $_POST['nis'];
        $query = "SELECT * FROM tb_siswa WHERE nis='$namas' LIMIT 1";
        $keyword = $_POST['keyword'];
        if(isset($_POST["cari"])){
            $query = "SELECT * FROM tb_siswa WHERE nis like '%$keyword%' or
                                                       nama_siswa like '%$keyword%' LIMIT 1";
        }
        ?>


        <div class="main">
            <div class="content">
                <h2>Tabel Kewajiban Siswa</h2>
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
                                $row = mysqli_fetch_assoc($hasil)
                            ?>
                        <table class="tabel-biodata">
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
                </div>
                <div class="border-tagih">
                    <div class="judul">
                        <h3>Tagihan SPP Siswa</h3>
                    </div>
                    <div class="isi-tagih">
                            <?php
                                $hasil = mysqli_query($koneksi, $query);
                                $row = mysqli_fetch_assoc($hasil)
                            ?>
                        <table class="tabel-tagih">
                            <thead>
                                <th>NO</th>
                                <th>Bulan</th>
                                <th>Jatuh Tempo</th>
                                <th>Tanggal Bayar</th>
                                <th>Jumlah</th>
                                <th>Keterangan</th>
                                <th>Bayar</th>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Juni</td>
                                    <td>2022-06-10</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>
                                        <a href="../form/form_pembayaran_spp.php?bulan=juni">Bayar</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Juli</td>
                                    <td>2022-07-10</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>Agustus</td>
                                    <td>2022-08-10</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td>September</td>
                                    <td>2022-09-10</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>5</td>
                                    <td>Oktober</td>
                                    <td>2022-10-10</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>6</td>
                                    <td>November</td>
                                    <td>2022-11-10</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>7</td>
                                    <td>Desember</td>
                                    <td>2022-12-10</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>8</td>
                                    <td>Januari</td>
                                    <td>2023-01-10</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>9</td>
                                    <td>Februari</td>
                                    <td>2023-02-10</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>10</td>
                                    <td>Maret</td>
                                    <td>2023-03-10</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>11</td>
                                    <td>April</td>
                                    <td>2023-04-10</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>12</td>
                                    <td>Mei</td>
                                    <td>2023-05-10</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
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