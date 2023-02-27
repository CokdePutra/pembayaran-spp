<?php
session_start();
if (!@$_SESSION['username']) {
    echo "<script>alert('Maaf Anda belum login');location.href='../login/login.php'</script>";
}
$angkatan = $_POST['angkatan'];
$nominal = $_POST['nominal'];

include("../koneksi.php");
$hasil = mysqli_query($koneksi, "INSERT INTO tb_spp VALUES ('$angkatan','$nominal')");

if (!$hasil) {
    // die("Gagal memasukan data SPP " . mysqli_query($koneksi, "INSERT INTO tb_spp VALUES ('$angkatan','$nominal')"));
    echo "<script>document.location.href='../tambah/tambah_data_spp.php'</script>";
} else {
    echo "<script>
        alert('Data SPP Berhasil di Tambahkan')
        document.location.href='../view-tabel/tb_spp.php?page=spp';
        </script>
        ";
}
