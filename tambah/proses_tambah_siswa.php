<?php
session_start();
if (!@$_SESSION['username']) {
    echo "<script>alert('Maaf Anda belum login');location.href='../login/login.php'</script>";
} else {

    $nisn = $_POST['nisn'];
    $password = $_POST['password'];
    $nama_siswa = $_POST['nama_siswa'];
    $id_kelas = $_POST['nama_kelas'];
    $angkatan = $_POST['angkatan'];
    $alamat = $_POST['alamat'];
    $no_telp = $_POST['telp_ortu'];

    include('../koneksi.php');
    $hasil = mysqli_query($koneksi, "INSERT INTO tb_siswa (`nisn`, `password`, `nama_siswa`, `id_kelas`, `angkatan`, `alamat`, `telp_ortu`) VALUES ('$nisn', '$password', '$nama_siswa', '$id_kelas', '$angkatan', '$alamat', '$no_telp')");

    if (!$hasil) {
        // die("Gagal memasukan data SPP " . mysqli_query($koneksi, "INSERT INTO tb_siswa VALUES ('$angkatan','$nominal')"));
        echo "<script>document.location.href='../tambah/tambah_data_spp.php'</script>";
        // die("Gagal Melakukan Transaksi " . mysqli_query($koneksi, "INSERT INTO pembayaran_spp VALUES ('','$id_petugas','$nis','$tanggal_bayar','$bulan','$status','$jumlah_bayar','$angkatan')"));
    } else {
        echo "<script>
        alert('Data Siswa Berhasil di Tambahkan')
        document.location.href='../view-tabel/tb_siswa.php?page=siswa';
        </script>
        ";
    }
}
