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
    <title>Pembayaran SPP</title>
    <!-- link CSS -->
    <link rel="stylesheet" href="../css/siswa.css">
    <link rel="stylesheet" href="../css/navbar.css">
</head>

<body>
    <div class="container">

        <?php
        include('../template/navbar.php');
        include("../koneksi.php");
        // $nis = $_SESSION['username'];
        $nis = $_POST['nis'];
        if (!$_POST['nis']) {
            $nis = $_GET['nis'];
        }
        $query = "SELECT * FROM tb_siswa INNER JOIN tb_kelas USING(id_kelas)  WHERE nis='$nis'";
        $keyword = $_POST['keyword'];
        if (isset($_POST["keyword"])) {
            $query = "SELECT * FROM tb_siswa INNER JOIN tb_kelas USING(id_kelas)  WHERE nis like '%$keyword%'";
        }
        ?>

        <form action="" method="POST">
            <div class="main">
                <div class="content">
                    <h2>Tabel Kewajiban Siswa</h2>
                </div>
                <?php
                if (@$_SESSION['level_user'] == 'admin' || @$_SESSION['level_user'] == 'petugas') {
                ?>
                    <div class="search">
                        <input list="list_nis" type="text" name="keyword" autofocus placeholder="Cari..." autocomplete="off">
                        <button class="search-logo" type="submit" name="cari"><img src="../image/search-logo.png" style="width:15px; height:15px; margin-right:5px;"></button>
                        <datalist id="list_nis">
                            <?php
                            $hasil = mysqli_query($koneksi, "SELECT nis,nama_siswa FROM tb_siswa");
                            while ($row = mysqli_fetch_assoc($hasil)) {
                            ?>
                                <option value="<?= $row['nis']; ?>"><?= $row['nama_siswa']; ?></option>
                            <?php
                            }
                            ?>
                        </datalist>
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
                            <td><?= $row['nis']; ?></td>
                        </tr>
                        <tr>
                            <th>Nama Siswa</th>
                            <td><?= $row['nama_siswa']; ?></td>
                        </tr>
                        <tr>
                            <th>Angkatan</th>
                            <td><?= $row['angkatan']; ?></td>
                        </tr>
                        <tr>
                            <th>Kelas</th>
                            <td><?= $row['nama_kelas']; ?></td>
                        </tr>
                        <tr>
                            <th>No Telp Orang Tua</th>
                            <td><?= $row['telp_ortu']; ?></td>
                        </tr>
                    </table>
                </div>
            </div>
            <!-- search tahun -->
            <!-- <div class="search-tahun">
                <input list="list-tahun" type="text" name="tahun" placeholder="Cari..." autocomplete="off">
                <button class="search-logo" type="submit" name="cari"><img src="../image/search-logo.png" style="width:15px; height:15px; margin-right:5px;"></button>
                <datalist id="list-tahun">
                    <option value="2023">2023</option>
                    <option value="2024">2024</option>
                </datalist>
            </div> -->
            <!-- end search tahun -->
            <div class="border-tagih">
                <div class="judul">
                    <h3>Tagihan SPP Siswa</h3>
                </div>
                <div class="isi-tagih">
                    <table class="tabel-tagih">
                        <thead>
                            <tr>
                                <th>NO</th>
                                <th>Bulan</th>
                                <th>Jatuh Tempo</th>
                                <th>Tahun Yang akan Dibayar</th>
                                <th>Tanggal Bayar</th>
                                <th>Jumlah</th>
                                <th>Keterangan</th>
                                <th>Bayar</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $nis_global = $row['nis']; ?>
                            <form action="../tambah/tambah_pembayaran_spp.php" method="GET">

                                <?php
                                $awaltempo = date("Y-00-d");
                                $bulanIndo = [
                                    '01' => 'Januari',
                                    '02' => 'Februari',
                                    '03' => 'Maret',
                                    '04' => 'April',
                                    '05' => 'Mei',
                                    '06' => 'Juni',
                                    '07' => 'Juli',
                                    '08' => 'Agustus',
                                    '09' => 'September',
                                    '10' => 'Oktober',
                                    '11' => 'November',
                                    '12' => 'Desember',
                                ];

                                for ($i = 1; $i < 13; $i++) {
                                    $jatuhtempo = date("Y-m-d", strtotime("+$i month", strtotime($awaltempo)));
                                    $tahun_now = $row['angkatan'];
                                    $tahun_global = $row['angkatan'];
                                    // $tahun_skrng = date('Y');

                                    // menentukan tahun
                                    if (!@$_POST['thn4'] && !@$_POST['thn3'] && !@$_POST['thn2'] || @$_POST['thn1']) {
                                        $bulan = $bulanIndo[date('m', strtotime($jatuhtempo))];
                                        $hasil_bulan = mysqli_query($koneksi, "SELECT * FROM pembayaran_spp WHERE bulan='$bulan' AND nis='$nis_global' AND tahun_bayar='$tahun_now'");
                                        $row_bulan = mysqli_fetch_assoc($hasil_bulan);
                                ?>
                                        <tr>
                                            <td><?= $i ?></td>
                                            <td><?= $bulan ?></td>
                                            <td class="jatuh-tempo">10-<?= $bulan ?></td>
                                            <?php
                                            if ($i < 13) {
                                            ?>
                                                <td>
                                                    <?php
                                                    echo $tahun_now;
                                                    ?>
                                                </td>
                                            <?php
                                            }
                                            // tutup menentukan tahun
                                            if ($i < 7) {
                                            ?>
                                                <td colspan="4">Tidak ada data</td>
                                            <?php
                                            } else {
                                            ?>
                                                <td><?= $row_bulan['tanggal_bayar'] ?></td>
                                                <td>
                                                    <?php
                                                    if (isset($row_bulan)) {
                                                    ?>
                                                        Rp. <?= number_format($row_bulan['jumlah_bayar'], 0, ',', '.'); ?>
                                                    <?php
                                                    }
                                                    ?>
                                                </td>
                                                <td><?= $row_bulan['status'] ?></td>
                                                <td>
                                                    <?php
                                                }
                                                $cek_bulan = mysqli_num_rows($hasil_bulan);
                                                if (@$_SESSION['level_user'] == 'admin' || @$_SESSION['level_user'] == 'petugas') {
                                                    if (!$cek_bulan > 0) {
                                                        if (!$nis_global == 0) {
                                                            if ($i > 6) {
                                                    ?>
                                                                <a class="btn-bayar" href="../tambah/tambah_pembayaran_spp.php?bulan=<?= $bulan ?>&nis=<?= $row['nis'] ?>&tahun=<?= $tahun_now ?>&page=pembayaran" onclick="return confirm('Apakah Anda yakin mau melakukan transaksi ini?')">BAYAR</a>
                                                                <input type="text" hidden name="bulan" value="<?= $bulan ?>">
                                                                <input type="text" hidden name="nis" value="<?= $row['nis']; ?>">
                                                        <?php
                                                            }
                                                        }
                                                    } else {
                                                        ?>
                                                        <!-- <input class="btn-bayar-batal" type="submit" value="BATALKAN"> -->
                                                        <a class="btn-batal" disabled>TERBAYAR</a>

                                                <?php
                                                    }
                                                }
                                            }
                                            // menentukan tahun
                                            elseif (@$_POST['thn2']) {
                                                $bulan = $bulanIndo[date('m', strtotime($jatuhtempo))];
                                                $tahun_now = $tahun_now + 1;
                                                $hasil_bulan = mysqli_query($koneksi, "SELECT * FROM pembayaran_spp WHERE bulan='$bulan' AND nis='$nis_global' AND tahun_bayar='$tahun_now'");
                                                $row_bulan = mysqli_fetch_assoc($hasil_bulan);
                                                ?>
                                        <tr>
                                            <td><?= $i ?></td>
                                            <td><?= $bulan ?></td>
                                            <td class="jatuh-tempo">10-<?= $bulan ?></td>
                                            <?php
                                                if ($i < 13) {
                                            ?>
                                                <td>
                                                    <?php
                                                    echo $tahun_now;
                                                    ?>
                                                </td>
                                            <?php
                                                }
                                                // tutup menentukan tahun
                                            ?>
                                            <td><?= $row_bulan['tanggal_bayar'] ?></td>
                                            <td>
                                                <?php
                                                if (isset($row_bulan)) {
                                                ?>
                                                    Rp. <?= $row_bulan['jumlah_bayar']; ?>
                                                <?php
                                                }
                                                ?>
                                            </td>
                                            <td><?= $row_bulan['status'] ?></td>
                                            <td>
                                                <?php
                                                $cek_bulan = mysqli_num_rows($hasil_bulan);
                                                if (@$_SESSION['level_user'] == 'admin' || @$_SESSION['level_user'] == 'petugas') {
                                                    if (!$cek_bulan > 0) {
                                                        if (!$nis_global == 0) {
                                                ?>
                                                            <a class="btn-bayar" href="../tambah/tambah_pembayaran_spp.php?bulan=<?= $bulan ?>&nis=<?= $row['nis'] ?>&tahun=<?= $tahun_now ?>&page=pembayaran" onclick="return confirm('Apakah Anda yakin mau melakukan transaksi ini?')">BAYAR</a>
                                                            <input type="text" hidden name="bulan" value="<?= $bulan ?>">
                                                            <input type="text" hidden name="nis" value="<?= $row['nis']; ?>">
                                                        <?php

                                                        }
                                                    } else {
                                                        ?>
                                                        <!-- <input class="btn-bayar-batal" type="submit" value="BATALKAN"> -->
                                                        <a class="btn-batal" disabled>TERBAYAR</a>
                                                <?php
                                                    }
                                                }
                                            }
                                            // menentukan tahun
                                            elseif (@$_POST['thn3']) {
                                                $bulan = $bulanIndo[date('m', strtotime($jatuhtempo))];
                                                $tahun_now = $tahun_now + 2;
                                                $hasil_bulan = mysqli_query($koneksi, "SELECT * FROM pembayaran_spp WHERE bulan='$bulan' AND nis='$nis_global' AND tahun_bayar='$tahun_now'");
                                                $row_bulan = mysqli_fetch_assoc($hasil_bulan);
                                                ?>
                                        <tr>
                                            <td><?= $i ?></td>
                                            <td><?= $bulan ?></td>
                                            <td class="jatuh-tempo">10-<?= $bulan ?></td>
                                            <?php
                                                if ($i < 13) {
                                            ?>
                                                <td>
                                                    <?php
                                                    echo $tahun_now;
                                                    ?>
                                                </td>
                                            <?php
                                                }
                                                // tutup menentukan tahun
                                            ?>
                                            <td><?= $row_bulan['tanggal_bayar'] ?></td>
                                            <td>
                                                <?php
                                                if (isset($row_bulan)) {
                                                ?>
                                                    Rp. <?= $row_bulan['jumlah_bayar']; ?>
                                                <?php
                                                }
                                                ?>
                                            </td>
                                            <td><?= $row_bulan['status'] ?></td>
                                            <td>
                                                <?php
                                                $cek_bulan = mysqli_num_rows($hasil_bulan);
                                                if (@$_SESSION['level_user'] == 'admin' || @$_SESSION['level_user'] == 'petugas') {
                                                    if (!$cek_bulan > 0) {
                                                        if (!$nis_global == 0) {
                                                ?>
                                                            <a class="btn-bayar" href="../tambah/tambah_pembayaran_spp.php?bulan=<?= $bulan ?>&nis=<?= $row['nis'] ?>&tahun=<?= $tahun_now ?>&page=pembayaran" onclick="return confirm('Apakah Anda yakin mau melakukan transaksi ini?')">BAYAR</a>
                                                            <input type="text" hidden name="bulan" value="<?= $bulan ?>">
                                                            <input type="text" hidden name="nis" value="<?= $row['nis']; ?>">
                                                        <?php

                                                        }
                                                    } else {
                                                        ?>
                                                        <!-- <input class="btn-bayar-batal" type="submit" value="BATALKAN"> -->
                                                        <a class="btn-batal" disabled>TERBAYAR</a>
                                                <?php
                                                    }
                                                }
                                            }
                                            // menentukan tahun
                                            elseif (@$_POST['thn4']) {
                                                $bulan = $bulanIndo[date('m', strtotime($jatuhtempo))];
                                                $tahun_now = $tahun_now + 3;
                                                $hasil_bulan = mysqli_query($koneksi, "SELECT * FROM pembayaran_spp WHERE bulan='$bulan' AND nis='$nis_global' AND tahun_bayar='$tahun_now'");
                                                $row_bulan = mysqli_fetch_assoc($hasil_bulan);
                                                ?>
                                        <tr>
                                            <td><?= $i ?></td>
                                            <td><?= $bulan ?></td>
                                            <td class="jatuh-tempo">10-<?= $bulan ?></td>
                                            <?php
                                                if ($i < 13) {
                                            ?>
                                                <td>
                                                    <?php
                                                    echo $tahun_now;
                                                    ?>
                                                </td>
                                            <?php
                                                }
                                                // tutup menentukan tahun
                                                if ($i > 6) {
                                            ?>
                                                <td colspan="4">Tidak ada data</td>
                                            <?php
                                                } else {
                                            ?>
                                                <td><?= $row_bulan['tanggal_bayar'] ?></td>
                                                <td>
                                                    <?php
                                                    if (isset($row_bulan)) {
                                                    ?>
                                                        Rp. <?= $row_bulan['jumlah_bayar']; ?>
                                                    <?php
                                                    }
                                                    ?>
                                                </td>
                                                <td><?= $row_bulan['status'] ?></td>
                                                <td>
                                                    <?php
                                                }
                                                $cek_bulan = mysqli_num_rows($hasil_bulan);
                                                if (@$_SESSION['level_user'] == 'admin' || @$_SESSION['level_user'] == 'petugas') {
                                                    if (!$cek_bulan > 0) {
                                                        if (!$nis_global == 0) {
                                                            if ($i < 7) {
                                                    ?>
                                                                <a class="btn-bayar" href="../tambah/tambah_pembayaran_spp.php?bulan=<?= $bulan ?>&nis=<?= $row['nis'] ?>&tahun=<?= $tahun_now ?>&page=pembayaran" onclick="return confirm('Apakah Anda yakin mau melakukan transaksi ini?')">BAYAR</a>
                                                                <input type="text" hidden name="bulan" value="<?= $bulan ?>">
                                                                <input type="text" hidden name="nis" value="<?= $row['nis']; ?>">
                                                        <?php
                                                            }
                                                        }
                                                    } else {
                                                        ?>
                                                        <!-- <input class="btn-bayar-batal" type="submit" value="BATALKAN"> -->
                                                        <a class="btn-batal" disabled>TERBAYAR</a>
                                        <?php
                                                    }
                                                }
                                            }
                                        }

                                        ?>
                                                </td>
                                        </tr>

                            </form>
                        </tbody>
                    </table>
                    <form class="tahun-global" style="text-align: center;" action="?page=pembayaran&nis=<?= $nis ?>" method="POST">
                        <h3 style="text-align: center; padding-top:1.8rem;">Pilih Tahun :</h3>
                        <input type="submit" name="thnl" value="<?= $tahun_global ?>">
                        <input type="submit" name="thn2" value="<?= $tahun_global + 1 ?>">
                        <input type="submit" name="thn3" value="<?= $tahun_global + 2 ?>">
                        <input type="submit" name="thn4" value="<?= $tahun_global + 3 ?>">
                        <!-- <input type="submit" name="next" value="Selanjutnya"> -->
                    </form>
                </div>
            </div>
        </div>
    </div>

    </div>


    <!-- link Js -->
    <script src="../js/script.js"></script>
</body>

</html>