<?php
include('../koneksi.php');
$id_petugas = $_POST['id_petugas'];
$username = $_POST['username'];
$password = $_POST['password'];
$nama_petugas = $_POST['nama_petugas'];
$level_user = $_POST['level_user'];
$no_telp = $_POST['no_telp'];

$hasil = mysqli_query($koneksi, "UPDATE tb_petugas SET id_petugas='$id_petugas', username='$username', password='$password', nama_petugas='$nama_petugas', level_user='$level_user', no_telp='$no_telp' WHERE id_petugas='$id_petugas'");

if (!$hasil) {
    echo "<script>alert('Data Petugas gagal di Ubah'); window.location.href='../view-tabel/tb_petugas.php?page=petugas'</script>";
} else {
    echo "<script>alert('Data Petugas berhasil di Ubah'); window.location.href='../view-tabel/tb_petugas.php?page=petugas'</script>";
}
