<?php
session_start();
if (!@$_SESSION['username']) {
    echo "<script>alert('Maaf Anda belum login');location.href='../login/login.php'</script>";
}

include('../koneksi.php');
$nis = $_GET['nis'];

$hasil = mysqli_query($koneksi, "DELETE FROM tb_siswa WHERE nis='$nis'");

if (!$hasil) {
    die("Gagal menghapus data Siswa " . mysqli_error($koneksi, "DELETE FROM tb_siswa WHERE nis='$nis'"));
} else {
    echo "<script>
    alert('Data Siswa berhasil di Hapuskan');
    document.location.href='../view-tabel/tb_siswa.php?page=siswa';
    </script>
    ";
}
