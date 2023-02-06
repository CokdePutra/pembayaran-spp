<?php
session_start();
if(!isset($_SESSION['username'])){
    echo "<script>alert('kamuu jangan coba coba');window,location='../login/login.php';</script>";
}
else {
    
include('../koneksi.php');
$id_petugas = $_SESSION['id_petugas'];
$nis = $_POST['nis'];
$tanggal_bayar = date('Y-m-d');
$bulan = $_POST['bulan_bayar'];
$status = "Lunas";
$jumlah_bayar = $_POST['jumlah_bayar'];
$angkatan = $_POST['angkatan'];

$hasil = mysqli_query($koneksi,"INSERT INTO pembayaran_spp VALUES ('','$id_petugas','$nis','$tanggal_bayar','$bulan','$status','$jumlah_bayar','$angkatan')");

if(!$hasil) {
    echo "<script>
        alert('Gagal Melakukan Transaksi');
        document.location.href='../view/detail_siswa.php';
        </script>
        ";
    die("Gagal Melakukan Transaksi " . mysqli_query($koneksi,"INSERT INTO pembayaran_spp VALUES ('','$id_petugas','$nis','$tanggal_bayar','$bulan','$status','$jumlah_bayar','$angkatan')"));
}

else{
    echo "<script>
        alert('SPP Berhasil di Bayarkan');
        document.location.href='../view/detail_siswa.php?nis=$nis';
        </script>
        ";
}

}



?>