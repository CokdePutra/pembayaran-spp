<?php
session_start();
if (!@$_SESSION['username']) {
    echo "<script>alert('Maaf Anda belum login');location.href='../login/login.php'</script>";
}

include('../koneksi.php');
$id = $_GET['id'];
$hasil = mysqli_query($koneksi, "DELETE FROM tb_kelas WHERE id_kelas ='$id'");

if (!$hasil) {
    die("Gagal menghapus data Kelas " . mysqli_error($koneksi, "DELETE FROM tb_kelas WHERE id_kelas ='$id'"));
} else {
    echo "<script>
        alert('Data Kelas berhasil di Hapuskan')
        document.location.href='../view-tabel/tb_kelas.php?page=kelas';
        </script>
        ";
}
