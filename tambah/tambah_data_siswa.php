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
    <title>Tabel Siswa</title>
    <link rel="website icon" type="png" href="../image/tb_siswa-logo.png">
    <!-- link CSS -->
    <link rel="stylesheet" href="../css/tabel.css">
    <link rel="stylesheet" href="../css/navbar.css">
</head>

<body>
    <div class="container">

        <?php
        include('../template/navbar.php');
        include('../koneksi.php');
        $hasil = mysqli_query($koneksi, "SELECT angkatan FROM tb_spp ORDER BY angkatan DESC");
        $row = mysqli_fetch_assoc($hasil)
        ?>

        <div class="form-tambah">

            <div class="form-tabel">
                <a href="../view-tabel/tb_siswa.php?page=siswa"><img src="../image/back-logo.png" style="width:25px; height:25px; margin-right:5px;"></a>
                <h2>Masukan Data Siswa</h2>
                <br><br>
                <form action="proses_tambah_siswa.php" method="POST">

                    <table>
                        <tr>
                            <th><label for="nisn">NISN</label></th>
                            <td><input type="text" required name="nisn" autocomplete="off" placeholder="Masukan NISN Siswa"></td>
                        </tr>
                        <tr>
                            <th><label for="password">Password</label></th>
                            <td><input type="password" required name="password" autocomplete="off" placeholder="******"></td>
                        </tr>
                        <tr>
                            <th><label for="nama_siswa">Nama Siswa</label></th>
                            <td><input type="text" required name="nama_siswa" autocomplete="off" placeholder="Masukan Nama Siswa"></td>
                        </tr>
                        <tr>
                            <th><label for="nama_kelas">Nama Kelas</label></th>
                            <td>
                                <?php
                                $hasil_kelas = mysqli_query($koneksi, "SELECT id_kelas,nama_kelas FROM tb_kelas");
                                ?>
                                <select name="nama_kelas" id="select">
                                    <option value="">Pilih Kelas</option>
                                    <?php
                                    while ($row_kelas = mysqli_fetch_assoc($hasil_kelas)) {
                                    ?>
                                        <option value="<?= $row_kelas['id_kelas'] ?>"><?= $row_kelas['nama_kelas'] ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                                <?php
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <th><label for="angkatan">Angkatan</label></th>
                            <td>
                                <?php
                                $hasil_angkatan = mysqli_query($koneksi, "SELECT angkatan FROM tb_spp");
                                ?>
                                <select name="angkatan" id="select">
                                    <option value="">Pilih Angkatan</option>
                                    <?php
                                    while ($row = mysqli_fetch_assoc($hasil_angkatan)) {
                                    ?>
                                        <option value="<?= $row['angkatan'] ?>"><?= $row['angkatan'] ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <th><label for="alamat">Alamat</label></th>
                            <td><input type="text" required name="alamat" autocomplete="off" placeholder="Jalan"></td>
                        </tr>
                        <tr>
                            <th><label for="telp_ortu">No Telp Orang Tua</label></th>
                            <td><input type="text" required name="telp_ortu" autocomplete="off" placeholder="08*****"></td>
                        </tr>
                        <tr>
                            <th></th>
                            <td><input type="submit" value="Tambahkan Data"></td>
                        </tr>
                    </table>
                    <!-- <button class="btn-bayar">Tambahkan Data</button> -->
                </form>
            </div>
        </div>



    </div>


    <!-- link Js -->
    <script src="../js/script.js"></script>
</body>

</html>