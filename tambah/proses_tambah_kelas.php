<?php
session_start();
if (!@$_SESSION['username']) {
    echo "<script>alert('Maaf Anda belum login');location.href='../login/login.php'</script>";
}
$nama_kelas = $_POST['nama_kelas'];
$keterangan = $_POST['keterangan'];

include("../koneksi.php");
$hasil = mysqli_query($koneksi, "INSERT INTO tb_kelas VALUES ('','$nama_kelas','$keterangan')");

if (!$hasil) {
    echo "<script>document.location.href='../tambah/tambah_data_kelas.php?page=kelas'</script>";
} else {
    echo "<script>
        alert('Data SPP Berhasil di Tambahkan')
        document.location.href='../view-tabel/tb_kelas.php?page=kelas';
        </script>
        ";
}
