<?php
session_start();
if (!@$_SESSION['username']) {
    echo "<script>alert('Maaf Anda belum login');location.href='../login/login.php'</script>";
}

include('../koneksi.php');
$id = $_GET['id'];
$hasil = mysqli_query($koneksi, "DELETE FROM tb_petugas WHERE id_petugas ='$id'");

if (!$hasil) {
    die("Gagal menghapus data Petugas " . mysqli_error($koneksi, "DELETE FROM tb_petugas WHERE id_petugas ='$id'"));
} else {
    echo "<script>
        alert('Data Petugas berhasil di Hapuskan')
        document.location.href='../view-tabel/tb_petugas.php?page=petugas';
        </script>
        ";
}
