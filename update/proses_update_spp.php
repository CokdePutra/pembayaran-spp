<?php
include('../koneksi.php');
$angkatan = $_POST['angkatan'];
$nominal = $_POST['nominal'];

$hasil = mysqli_query($koneksi, "UPDATE tb_spp SET angkatan='$angkatan', nominal='$nominal' WHERE angkatan='$angkatan'");

if (!$hasil) {
    echo "<script>alert('Data gagal di Ubah'); window.location.href='../view-tabel/tb_spp.php?page=spp'</script>";
} else {
    echo "<script>alert('Data berhasil di Ubah'); window.location.href='../view-tabel/tb_spp.php?page=spp'</script>";
}
