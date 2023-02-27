<?php
session_start();
if (!@$_SESSION['username']) {
    echo "<script>alert('Maaf Anda belum login');location.href='../login/login.php'</script>";
}

include('../koneksi.php');
$angkatan = $_GET['angkatan'];
$hasil = mysqli_query($koneksi, "DELETE FROM tb_spp WHERE angkatan ='$angkatan'");

if (!$hasil) {
    die("Gagal menghapus data SPP " . mysqli_error($koneksi, $query));
} else {
    echo "<script>
        alert('Data SPP berhasil di Hapuskan')
        document.location.href='../view-tabel/tb_spp.php?page=spp';
        </script>
        ";
}
