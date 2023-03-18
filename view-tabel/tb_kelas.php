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
    <title>Tabel Kelas</title>
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
            $query = "SELECT * FROM tb_kelas ORDER BY id_kelas DESC";
            $keyword = $_POST['keyword'];
            if (isset($_POST["cari"])) {
                $query = "SELECT * FROM tb_kelas WHERE nama_kelas like '%$keyword%'";
            }
            ?>


            <div class="main">
                <div class="content">
                    <h2>Tabel Kelas</h2>
                </div>
                <?php
                if (@$_SESSION['level_user'] == 'admin' || @$_SESSION['level_user'] == 'petugas') {
                ?>
                    <div class="search">
                        <input list="list_nis" type="text" name="keyword" autofocus placeholder="Cari..." autocomplete="off">
                        <button class="search-logo" type="submit" name="cari"><img src="../image/search-logo.png" style="width:15px; height:15px; margin-right:5px;"></button>
                        <datalist id="list_nis">
                            <?php
                            $hasil = mysqli_query($koneksi, "SELECT nama_kelas FROM tb_kelas");
                            while ($row = mysqli_fetch_assoc($hasil)) {
                            ?>
                                <option value="<?= $row['nama_kelas']; ?>"></option>
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
                                <th>Nama Kelas</th>
                                <th>Keterangan</th>
                                <th>
                                    <div class="btn-tambah">
                                        <a class="tambah" href="../tambah/tambah_data_kelas.php?page=kelas">Tambah Data</a>
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
                                    <td><?= $row['nama_kelas']; ?></td>
                                    <td><?= $row['keterangan']; ?></td>
                                    <td>
                                        <div class="button-aksi">
                                            <?php
                                            $id_cek = $row['id_kelas'];
                                            $hasildelete = mysqli_query($koneksi, "SELECT id_kelas FROM tb_kelas INNER JOIN tb_siswa USING(id_kelas)
                                            WHERE id_kelas='$id_cek'");
                                            $cek = mysqli_num_rows($hasildelete);
                                            if ($cek == 0) {
                                            ?>
                                                <a href="../delete/proses_delete_kelas.php?id=<?= $row['id_kelas']; ?>" onclick="return confirm('Anda yakin mau menghapus data ini ?')"><img src="../image/delete-logo.png" style="width:25px; height:25px; margin-right:5px;"></a>
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