<?php
include('../koneksi.php');
$nis = $_POST['nis'];
$nisn = $_POST['nisn'];
$password = $_POST['password'];
$nama_siswa = $_POST['nama_siswa'];
$id_kelas = $_POST['id_kelas'];
$angkatan = $_POST['angkatan'];
$alamat = $_POST['alamat'];
$no_telp = $_POST['telp_ortu'];

$cek_nisn = mysqli_num_rows(mysqli_query($koneksi, "SELECT nisn FROM tb_siswa WHERE nisn='$nisn'"));

if ($cek_nisn < 1) {
    $hasil = mysqli_query($koneksi, "UPDATE tb_siswa SET nis='$nis', nisn='$nisn', password='$password', nama_siswa='$nama_siswa', id_kelas='$id_kelas', angkatan='$angkatan', alamat='$alamat', telp_ortu='$no_telp' WHERE nis='$nis'");

    if (!$hasil) {
        echo "<script>alert('Data Siswa gagal di Ubah'); window.location.href='../view-tabel/tb_siswa.php?page=siswa'</script>";
    } else {
        echo "<script>alert('Data Siswa berhasil di Ubah'); window.location.href='../view-tabel/tb_siswa.php?page=siswa'</script>";
    }
} else {
    echo "<script>alert('Maaf NISN Sudah Terpakai');window.location.href='../view-tabel/tb_siswa.php?page=siswa';</script>";
}
