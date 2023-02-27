<?php
session_start();
if (!@$_SESSION['username']) {
    echo "<script>alert('Maaf Anda belum login');location.href='../login/login.php'</script>";
}

include('../koneksi.php');
$id_bayar = $_GET['id_bayar'];
$hasil_nis = mysqli_query($koneksi, "SELECT nis FROM pembayaran_spp INNER JOIN tb_siswa USING(nis) WHERE id_bayar = '$id_bayar'");
$row = mysqli_fetch_assoc($hasil_nis);
$nis = $row['nis'];
$hasil = mysqli_query($koneksi, "DELETE FROM pembayaran_spp WHERE id_bayar ='$id_bayar'");


if (!$hasil) {
    die("Gagal membatakan Pembayaran " . mysqli_error($koneksi, "DELETE FROM pembayaran_spp WHERE id_bayar ='$id_bayar'"));
} else {
    echo "<script>
        alert('Pembayaran berhasil di Batalkan')
        document.location.href='../view/detail_siswa.php?nis=$nis&page=pembayaran';
        </script>
        ";
}
