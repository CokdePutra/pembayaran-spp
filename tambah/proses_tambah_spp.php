<?php
session_start();
include('../koneksi.php');
$tahun_angkatan = $_POST['angkatan'];
$cek_tahun = mysqli_query($koneksi, "SELECT angkatan FROM tb_spp WHERE angkatan='$tahun_angkatan'");
$num_cek = mysqli_num_rows($cek_tahun);
if ($num_cek < 1) {
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
} else {
    echo "<script>
    alert('Maaf Tahun \'$tahun_angkatan\' Angkatan sudah tersedia di Databases')
    document.location.href='../view-tabel/tb_spp.php?page=spp';
    </script>
    ";
}
