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
    <title>Tabel SPP</title>
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
            $query = "SELECT * FROM tb_spp ORDER BY angkatan ASC";
            $keyword = $_POST['keyword'];
            if (isset($_POST["cari"])) {
                $query = "SELECT * FROM tb_spp WHERE angkatan like '%$keyword%'";
            }
            ?>


            <div class="main">
                <div class="content">
                    <h2>Tabel SPP</h2>
                </div>
                <?php
                if (@$_SESSION['level_user'] == 'admin' || @$_SESSION['level_user'] == 'petugas') {
                ?>
                    <div class="search">
                        <input list="list_nis" type="text" name="keyword" autofocus placeholder="Cari..." autocomplete="off">
                        <button class="search-logo" type="submit" name="cari"><img src="../image/search-logo.png" style="width:15px; height:15px; margin-right:5px;"></button>
                        <datalist id="list_nis">
                            <?php
                            $hasil = mysqli_query($koneksi, "SELECT angkatan FROM tb_spp");
                            while ($row = mysqli_fetch_assoc($hasil)) {
                            ?>
                                <option value="<?= $row['angkatan']; ?>"></option>
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
            <div class="border">
                <div class="isi-tabel">
                    <table>
                        <thead>
                            <tr>
                                <th>Angkatan</th>
                                <th>Nominal</th>
                                <th>
                                    <div class="btn-tambah">
                                        <a class="tambah" href="../tambah/tambah_data_spp.php?page=spp">Tambah Data</a>
                                    </div>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $hasil = mysqli_query($koneksi, $query);
                            while ($row = mysqli_fetch_assoc($hasil)) {
                            ?>
                                <tr>
                                    <td><?= $row['angkatan']; ?></td>
                                    <td>Rp. <?= number_format($row['nominal'], 0, ',', '.'); ?></td>
                                    <td>
                                        <div class="button-aksi">
                                            <a href="../update/update_data_spp.php?angkatan=<?= $row['angkatan']; ?>&page=spp"><img src="../image/edit-logo.png" style="width:25px; height:25px; margin-right:5px;"></a>
                                            <?php
                                            $id_cek = $row['angkatan'];
                                            $hasildelete = mysqli_query($koneksi, "SELECT angkatan FROM tb_spp INNER JOIN tb_siswa USING(angkatan)
                                            WHERE angkatan='$id_cek'");
                                            $cek = mysqli_num_rows($hasildelete);
                                            if ($cek == 0) {
                                            ?>
                                                <a href="../delete/proses_delete_spp.php?angkatan=<?= $row['angkatan']; ?>" onclick="return confirm('Anda yakin mau menghapus data ini ?')"><img src="../image/delete-logo.png" style="width:25px; height:25px; margin-right:5px;"></a>
                                            <?php
                                            } else {
                                            ?>
                                                <a href="#"><img src="../image/cancel-logo.png" style="width:25px; height:25px; margin-right:5px;"></a>
                                            <?php
                                            }
                                            ?>
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