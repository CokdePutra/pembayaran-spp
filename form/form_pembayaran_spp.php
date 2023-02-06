<?php
session_start();
error_reporting(0);
if(!isset($_SESSION['username'])){
    echo "<script>alert('kamuu jangan coba coba');window,location='../login/login.php';</script>";
} else {

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

    // mengambil data dari detail siswa
    $bulan_bayar = $_GET['bulan'];
    $nis = $_GET['nis'];
    $query = "SELECT * FROM tb_siswa WHERE nis='$nis'";
    $hasil = mysqli_query($koneksi, $query);
    $row = mysqli_fetch_assoc($hasil);
        ?>

        <div class="main">
            <div class="biodata">
                <div class="border">
                    <div class="judul">
                        <h3>Masukan Pembayaran</h3>
                    </div>
                    <div class="isi">
                            <?php
                                // mengambil data nominal
                                $hasil_angkatan = mysqli_query($koneksi,"SELECT * from tb_siswa INNER JOIN tb_spp USING(angkatan)");
                                $row_angkatan = mysqli_fetch_assoc($hasil_angkatan);
                            ?>
                        <table>
                            <form action="proses_insert_pembayaran.php" method="POST">
                                <tr>
                                    <th>NIS</th>
                                    <td><input type="text" name="nis" readonly value="<?= $nis?>"></td>
                                </tr>
                                <tr>
                                    <th>Nama Siswa</th>
                                    <td><input type="text" name="nama_siswa" readonly value="<?= $row ['nama_siswa'];?>"></td>
                                </tr>
                                <tr>
                                    <th>Tanggal Bayar</th>
                                    <td><input type="date" nama="tgl_bayar" readonly value="<?= date('Y-m-d')?>"></td>
                                </tr>
                                <tr>
                                    <th>Bulan Yang Akan di Bayarkan</th>
                                    <td><input type="text" name="bulan_bayar" readonly value="<?= $bulan_bayar?>"></td>
                                </tr>
                                <tr>
                                    <th>Angkatan</th>
                                    <td><input type="text" name="angkatan" readonly value="<?= $row_angkatan['angkatan']?>"></td>
                                </tr>
                                <tr>
                                    <th>Jumlah Yang di Bayarkan</th>
                                    <td><input type="text" name="jumlah_bayar" readonly value="<?= $row_angkatan['nominal']?>"></td>
                                </tr>
                                <tr>
                                    <th></th>
                                    <td><input class="btn-bayar" type="submit" name="bayar" value="Bayar"></td>
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
<?php
}
?>