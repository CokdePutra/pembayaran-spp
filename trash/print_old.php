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
    <title>Laporan</title>
    <!-- link CSS -->
    <!-- <link rel="stylesheet" href="../css/tabel.css">
    <link rel="stylesheet" href="../css/navbar.css"> -->
    <style>
        @media print {
            .print {
                display: none !important;
            }
        }

        * {
            text-decoration: none;
        }

        .main {
            justify-content: center;
            align-items: center;
            display: block;
            position: absolute;
            width: 90%;
        }


        .main .content {
            margin: 100px;
        }

        .box .isi-tabel {
            flex: 1;
        }

        .box .isi-tabel table {
            border-collapse: collapse;
        }

        .box .isi-tabel table td {
            padding: 1rem 1rem;
        }

        .main .content h2 {
            margin-top: -4rem;
            margin-bottom: 4rem;
            text-align: center;
            position: relative;
        }

        .main .kembali {
            border: 1px solid black;
            margin: 0.5rem 0rem 0.5rem 0rem;
            padding: 0.3rem;
            border-radius: 0.5rem;
            background-color: #fff;
        }

        .main .kembali:hover {

            background-color: rgb(239, 239, 239);
        }

        .main .kembali a {
            color: black;
            position: relative;
            /* float: right; */
        }
    </style>
</head>

<body>
    <div class="container">

        <?php
        include("../koneksi.php");
        $list_bulan = $_POST['bulan'];
        $kode = $_POST['kode'];
        $query = "SELECT * FROM pembayaran_spp INNER JOIN tb_petugas USING(id_petugas) INNER JOIN tb_siswa USING(nis) WHERE id_bayar like '%$kode%' or
                                                                                                                                nama_petugas like '%$kode%' or
                                                                                                                                nama_siswa like '%$kode%' or
                                                                                                                                tanggal_bayar like '%$kode%' or
                                                                                                                                bulan like '%$kode%' or
                                                                                                                                tahun_bayar like '%$kode%' ORDER BY id_bayar DESC";
        // if (@$list_bulan['all']) {
        // } else {
        //     $query = "SELECT * FROM pembayaran_spp INNER JOIN tb_petugas USING(id_petugas) INNER JOIN tb_siswa USING(nis) WHERE bulan='$list_bulan' and nama_kelas like '%$kode%'";
        // }
        ?>
        <form action="" method="POST">
        </form>
        <div class="main">
            <div class="content">
                <h2>Laporan SPP</h2>
            </div>

            <div class="box">
                <div class="border">
                    <div class="isi-tabel">
                        <table border="1px">
                            <thead>
                                <tr>
                                    <th>NO</th>
                                    <th>Nama Petugas</th>
                                    <th>Nama Siswa</th>
                                    <th>Nama Kelas</th>
                                    <th>Tanggal Bayar</th>
                                    <th>Bulan Dibayar</th>
                                    <th>Tahun Dibayar</th>
                                    <th>Jumlah Bayar</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                for ($i = 1; $i < 2;) {
                                    $hasil = mysqli_query($koneksi, $query);
                                    while ($row = mysqli_fetch_assoc($hasil)) {
                                ?>
                                        <tr style="text-align: center;">
                                            <td><?= $i++ ?></td>
                                            <td style="width:8rem;"><?= $row['nama_petugas']; ?></td>
                                            <td style="width:8rem;"><?= $row['nama_siswa']; ?></td>
                                            <td style="width:4.5rem;"><?= $row['nama_kelas']; ?></td>
                                            <td><?= $row['tanggal_bayar']; ?></td>
                                            <td><?= $row['bulan']; ?></td>
                                            <td style="width:2.5rem;"><?= $row['tahun_bayar']; ?></td>
                                            <td>Rp. <?= number_format($row['jumlah_bayar'], 0, ',', '.') ?></td>
                                        </tr>
                                <?php
                                        $total += $row['jumlah_bayar'];
                                    }
                                }
                                ?>
                                <tr>
                                    <td colspan="6" style="text-align:right">Total</td>
                                    <td colspan="2">Rp.<?= number_format($total, 0, ',', '.') ?></td>
                                </tr>
                                <button class="kembali print"><a href="../view/laporan.php">Kembali</a></button>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>


    <!-- link Js -->
    <script>
        window.print();
    </script>
</body>

</html>