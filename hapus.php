<?php
include("koneksi.php");

if (isset($_GET['id_karyawan'])) {

    // Ambil ID dari query string
    $id = $_GET['id_karyawan'];

    // Buat query hapus
    $sql = "DELETE FROM pendaftaran_karyawan WHERE id_karyawan = $id";
    $query = mysqli_query($db, $sql);

    // Cek hasil
    if ($query) {
        header('Location: list_daftar.php');
        exit;
    } else {
        die("Gagal menghapus data: " . mysqli_error($db));
    }

} else {
    die("Akses dilarang...");
}
?>
