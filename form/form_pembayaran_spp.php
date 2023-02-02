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
    <title>Form Pembayaran</title>
    <!-- link CSS -->
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/navbar.css">
</head>
<body>
    <div class="container">

    <?php
    include('../template/navbar.php');
    include("../koneksi.php");
    $bulan_bayar = $_POST['bulan'];
    $nis = $_POST['nis'];
    $query = "SELECT * FROM tb_siswa WHERE nis='$nis'";
        ?>

        <div class="main">
            <div class="biodata">
                <div class="border">
                    <div class="judul">
                        <h3>Masukan Pembayaran</h3>
                    </div>
                    <div class="isi">
                            <?php
                                $hasil = mysqli_query($koneksi, $query);
                                $row = mysqli_fetch_assoc($hasil)
                            ?>
                        <table>
                            <form action="proses_insert_pembayaran.php" method="POST">
                                <tr>
                                    <th>NIS</th>
                                    <td><input type="text" name="nis" disabled value="<?= $nis?>"></td>
                                </tr>
                                <tr>
                                    <th>Nama Siswa</th>
                                    <td><input type="text" name="nama_siswa" disabled value="<?= $row ['nama_siswa'];?>"></td>
                                </tr>
                                <tr>
                                    <th>Tanggal Bayar</th>
                                    <td><input type="date" nama="tgl_bayar" disabled value="<?= date('Y-m-d')?>"></td>
                                </tr>
                                <tr>
                                    <th>Bulan Yang Akan di Bayarkan</th>
                                    <td><input type="text" name="bulan_bayar" disabled value="<?= $bulan_bayar?>"></td>
                                </tr>
                                <tr>
                                    <th>Angkatan</th>
                                    <td><input type="text" name="angkatan" disabled value="<?= $row['angkatan']?>"></td>
                                </tr>
                                <tr>
                                    <th>Jumlah Yang di Bayarkan</th>
                                    <td><input type="text" name="jumlah_bayar" disabled value="700000"></td>
                                </tr>
                                <tr>
                                    <th></th>
                                    <td class="btn_bayar"><input type="submit" value="Bayar"></td>
                                </tr>
                            </form>
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