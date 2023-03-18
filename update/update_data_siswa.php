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
    <!-- link CSS -->
    <link rel="stylesheet" href="../css/tabel.css">
    <link rel="stylesheet" href="../css/navbar.css">
</head>

<body>
    <div class="container">

        <?php
        include('../template/navbar.php');
        include('../koneksi.php');
        $nis = $_GET['nis'];
        $hasil = mysqli_query($koneksi, "SELECT * FROM tb_siswa INNER JOIN tb_kelas USING(id_kelas) WHERE nis='$nis'");
        $row_siswa = mysqli_fetch_assoc($hasil);
        ?>

        <div class="form-tambah">

            <div class="form-tabel">
                <a href="../view-tabel/tb_siswa.php?page=siswa"><img src="../image/back-logo.png" style="width:25px; height:25px; margin-right:5px;"></a>
                <h2>Masukan Data Siswa</h2>
                <br><br>
                <form action="proses_update_siswa.php" method="POST">

                    <table>
                        <tr hidden>
                            <th></th>
                            <td><input type="text" name="nis" autocomplete="off" value="<?= $row_siswa['nis'] ?>"></td>
                        </tr>
                        <tr>
                            <th><label for="nisn">NISN</label></th>
                            <td><input type="text" required name="nisn" autocomplete="off" placeholder="Masukan NISN Siswa" value="<?= $row_siswa['nisn'] ?>"></td>
                        </tr>
                        <tr>
                            <th><label for="password">Password</label></th>
                            <td><input type="password" required name="password" autocomplete="off" placeholder="******" value="<?= $row_siswa['password'] ?>"></td>
                        </tr>
                        <tr>
                            <th><label for="nama_siswa">Nama Siswa</label></th>
                            <td><input type="text" required name="nama_siswa" autocomplete="off" placeholder="Masukan Nama Siswa" value="<?= $row_siswa['nama_siswa'] ?>"></td>
                        </tr>
                        <tr>
                            <th><label for="nama_kelas">Nama Kelas</label></th>
                            <td>
                                <?php
                                $hasil_kelas = mysqli_query($koneksi, "SELECT id_kelas, nama_kelas FROM tb_kelas");
                                ?>
                                <select name="id_kelas" id="select">
                                    <option value="<?= $row_siswa['id_kelas'] ?>"><?= $row_siswa['nama_kelas'] ?></option>
                                    <?php
                                    while ($row = mysqli_fetch_assoc($hasil_kelas)) {
                                    ?>
                                        <option value="<?= $row['id_kelas'] ?>"><?= $row['nama_kelas'] ?></option>
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
                                    <option value="<?= $row_siswa['angkatan'] ?>"><?= $row_siswa['angkatan'] ?></option>
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
                            <td><input type="text" required name="alamat" autocomplete="off" placeholder="Jalan" value="<?= $row_siswa['alamat'] ?>"></td>
                        </tr>
                        <tr>
                            <th><label for="telp_ortu">No Telp Orang Tua</label></th>
                            <td><input type="text" required name="telp_ortu" autocomplete="off" placeholder="08*****" value="<?= $row_siswa['telp_ortu'] ?>"></td>
                        </tr>
                        <tr>
                            <th></th>
                            <td><input type="submit" value="Ubah Data"></td>
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