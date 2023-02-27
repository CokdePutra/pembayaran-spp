<?php
session_start();
if (!@$_SESSION['username']) {
    echo "<script>alert('Maaf Anda belum login');location.href='../login/login.php'</script>";
} else {

    $username = $_POST['username'];
    $password = $_POST['password'];
    $nama_petugas = $_POST['nama_petugas'];
    $level_user = $_POST['level_user'];
    $no_telp = $_POST['no_telp'];

    include('../koneksi.php');
    $hasil = mysqli_query($koneksi, "INSERT INTO tb_petugas (`username`, `password`, `nama_petugas`, `level_user`, `no_telp`) VALUES ('$username', '$password', '$nama_petugas', '$level_user', '$no_telp')");

    if (!$hasil) {
        echo "<script>document.location.href='../tambah/tambah_data_petugas.php'</script>";
    } else {
        echo "<script>
        alert('Data Siswa Berhasil di Tambahkan')
        document.location.href='../view-tabel/tb_petugas.php?page=petugas';
        </script>
        ";
    }
}
