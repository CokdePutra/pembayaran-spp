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
    <title>Tabel SPP</title>
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
                <a href="../view-tabel/tb_spp.php?page=spp"><img src="../image/back-logo.png" style="width:25px; height:25px; margin-right:5px;"></a>
                <h2>Masukan Data SPP</h2>
                <br><br>
                <form action="proses_tambah_spp.php" method="POST">
                    <table>
                        <tr>
                            <th><label for="angkatan">Angkatan</label></th>
                            <td>
                                <input style="width:16.5rem;" readonly type="text" id="number" name="angkatan" autocomplete="off" value="<?= $row['angkatan'] + 1 ?>">
                                <button id="plusButton" style="background-color:rgb(244, 244, 244);"><img onclick="incrementValue()" src="../image/plus-logo.png" style="width:15px; height:15px; margin-right:5px; background-color:rgb(244, 244, 244);"></button>
                                <button id="minusButton" style="background-color:rgb(244, 244, 244);"><img onclick="decrementValue()" src="../image/minus-logo.png" style="width:15px; height:15px; margin-right:5px; background-color:rgb(244, 244, 244);"></button>
                            </td>
                        </tr>
                        <tr>
                            <th><label for="nominal">Nominal</label></th>
                            <td><input type="text" required name="nominal" autocomplete="off" placeholder="Rp." value=""></td>
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