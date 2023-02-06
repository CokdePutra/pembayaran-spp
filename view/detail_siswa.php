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
    <title>Dashboard</title>
    <!-- link CSS -->
    <link rel="stylesheet" href="../css/siswa.css">
    <link rel="stylesheet" href="../css/navbar.css">
</head>
<body>
    <div class="container">

    <?php
    include('../template/navbar.php');
    ?>
        
        
        <?php
        include("../koneksi.php");
        // $nis = $_SESSION['username'];
        
        $nis = $_POST['nis'];
        $_SESSION['nis'] = $nis;
        $nis_baru = $_SESSION['nis'];
        $query = "SELECT * FROM tb_siswa WHERE nis='$nis'";
        $keyword = $_GET['keyword'];
        if(isset($_GET["keyword"])){
            $query = "SELECT * FROM tb_siswa WHERE nis like '%$keyword%' or
                                                       nama_siswa like '%$keyword%'";
        }
        ?>

        <form action="" method="GET">
        <div class="main">
            <div class="content">
                <h2>Tabel Kewajiban Siswa</h2>
            </div>
            <?php
            if(@$_SESSION['level_user'] == 'admin'){
            ?>
            <div class="search">
                <input list="list_nis" type="text" name="keyword" placeholder="Cari..." autocomplete="off">
                <button type="submit">Cari</button>
                <datalist id="list_nis">
                        <?php
                        $hasil = mysqli_query($koneksi, "SELECT nis FROM tb_siswa");
                        while($row = mysqli_fetch_assoc($hasil)){
                        ?>
                            <option value="<?= $row['nis'];?>"></option>
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
                                <td><?= $row ['nis'];?></td>
                            </tr>
                            <tr>
                                <th>Nama Siswa</th>
                                <td><?= $row ['nama_siswa'];?></td>
                            </tr>
                            <tr>
                                <th>Kelas</th>
                                <td><?= $row ['nama_kelas'];?></td>
                            </tr>
                            <tr>
                                <th>No Telp Orang Tua</th>
                                <td><?= $row ['telp_ortu'];?></td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="border-tagih">
                    <div class="judul">
                        <h3>Tagihan SPP Siswa</h3>
                    </div>
                    <div class="isi-tagih">
                        <table class="tabel-tagih">
                            <thead>
                                <th>NO</th>
                                <th>Bulan</th>
                                <th>Jatuh Tempo</th>
                                <th>Tanggal Bayar</th>
                                <th>Jumlah</th>
                                <th>Keterangan</th>
                                <th>Bayar</th>
                            </thead>
                            <tbody>
                                <?php $nis_global = $row ['nis']; ?>
                                <form action="../form/form_pembayaran_spp.php" method="GET">

                                
                                    <?php
                                    
                                    

                                    $awaltempo = date("Y-06-d");
                                    $bulanIndo =[
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


                                    for ($i=1;$i<13;$i++){
                                        $jatuhtempo = date("Y-m-d" , strtotime("+$i month" , strtotime($awaltempo)));
                                        
                                        $bulan = $bulanIndo[date('m' ,strtotime($jatuhtempo))];
                                        $hasil_bulan = mysqli_query($koneksi,"SELECT * FROM pembayaran_spp WHERE bulan='$bulan' AND nis='$nis_global'");
                                        $row_bulan = mysqli_fetch_assoc($hasil_bulan);
                                        ?>
                                        <tr>
                                            <td><?=$i?></td>
                                            <td><?=$bulan?></td>
                                            <td>2022-<?=date('m', strtotime("+$i month" , strtotime($awaltempo)));?>-10</td>
                                            <td><?= $row_bulan['tanggal_bayar']?></td>
                                            <td><?= $row_bulan['jumlah_bayar']?></td>
                                            <td><?= $row_bulan['status']?></td>
                                            <td>
                                                <?php
                                                    $cek_bulan = mysqli_num_rows($hasil_bulan);
                                                    if(!$cek_bulan > 0){
                                                ?>
                                                <a class="btn-bayar" href="../form/form_pembayaran_spp.php?bulan=<?=$bulan?>&nis=<?=$row['nis']?>">BAYAR</a>
                                                <input type="text" hidden name="bulan" value="<?=$bulan?>">
                                                <input type="text" hidden name="nis" value="<?=$row ['nis']; ?>">                                        
                                                <?php
                                                    } else {
                                                        ?>
                                                        <input class="btn-bayar-disable"  disabled type="submit" value="BAYAR">
                                                        <?php
                                                    }
                                                ?>
                                            </td>
                                        </tr>
                                    <?php             
                                    }
                                    ?>
                                    
                                </form>
                                    
                                



                                
                                
                                    
                                
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