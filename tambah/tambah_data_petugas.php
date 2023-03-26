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
    <title>Tabel Petugas</title>
    <link rel="website icon" type="png" href="../image/tb_petugas-logo.png">
    <!-- link CSS -->
    <link rel="stylesheet" href="../css/tabel.css">
    <link rel="stylesheet" href="../css/navbar.css">
</head>

<body>
    <div class="container">

        <?php
        include('../template/navbar.php');
        ?>

        <div class="form-tambah">

            <div class="form-tabel">
                <a href="../view-tabel/tb_petugas.php?page=petugas"><img src="../image/back-logo.png" style="width:25px; height:25px; margin-right:5px;"></a>
                <h2>Masukan Data Petugas</h2>
                <br><br>
                <form action="proses_tambah_petugas.php" method="POST">

                    <table>
                        <tr>
                            <th><label for="username">Username</label></th>
                            <td><input type="text" required name="username" autocomplete="off" placeholder="Masukan Username Petugas"></td>
                        </tr>
                        <tr>
                            <th><label for="password">Password</label></th>
                            <td><input type="password" required name="password" autocomplete="off" placeholder="******"></td>
                        </tr>
                        <tr>
                            <th><label for="nama_petugas">Nama Petugas</label></th>
                            <td><input type="text" required name="nama_petugas" autocomplete="off" placeholder="Masukan Nama Petugas"></td>
                        </tr>
                        <tr>
                            <th><label for="level_user">Level</label></th>
                            <td>
                                <select name="level_user" id="">
                                    <option value="">Pilih Level</option>
                                    <option value="admin">Admin</option>
                                    <option value="petugas">Petugas</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <th><label for="no_telp">No Telp Petugas</label></th>
                            <td><input type="text" required name="no_telp" autocomplete="off" placeholder="08*****"></td>
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