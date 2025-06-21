<?php
include("koneksi.php");

if (isset($_POST['simpan'])) {

    // Ambil data dari form
    $id             = $_POST['id_karyawan'];
    $nama_lengkap   = $_POST['nama_lengkap'];
    $nik            = $_POST['nik'];
    $tempat_lahir   = $_POST['tempat_lahir'];
    $tanggal_lahir  = $_POST['tanggal_lahir'];
    $jenis_kelamin  = $_POST['jenis_kelamin'];
    $agama          = $_POST['agama'];
    $alamat         = $_POST['alamat'];
    $no_hp          = $_POST['no_hp'];
    $email          = $_POST['email'];
    $jabatan        = $_POST['jabatan'];

    // Handle upload foto
    if (!empty($_FILES['foto']['name'])) {
        $foto_name = $_FILES['foto']['name'];
        $foto_tmp = $_FILES['foto']['tmp_name'];
        $foto_path = "file/" . $foto_name;
        move_uploaded_file($foto_tmp, $foto_path);
    } else {
        // Ambil dari hidden input jika tidak upload baru
        $foto_path = $_POST['foto_lama'] ?? '';
    }

    // Handle upload cv
    if (!empty($_FILES['cv']['name'])) {
        $cv_name = $_FILES['cv']['name'];
        $cv_tmp = $_FILES['cv']['tmp_name'];
        $cv_path = "file/" . $cv_name;
        move_uploaded_file($cv_tmp, $cv_path);
    } else {
        $cv_path = $_POST['cv_lama'] ?? '';
    }

    // Query update
    $sql = "UPDATE pendaftaran_karyawan SET 
                nama_lengkap='$nama_lengkap',
                nik='$nik',
                tempat_lahir='$tempat_lahir',
                tanggal_lahir='$tanggal_lahir',
                jenis_kelamin='$jenis_kelamin',
                agama='$agama',
                alamat='$alamat',
                no_hp='$no_hp',
                email='$email',
                jabatan='$jabatan',
                foto='$foto_path',
                cv='$cv_path'
            WHERE id_karyawan=$id";

    $query = mysqli_query($db, $sql);

    // Cek hasil
    if ($query) {
        header('Location: list_daftar.php');
    } else {
        die("Gagal menyimpan perubahan: " . mysqli_error($db));
    }

} else {
    die("Akses tidak valid.");
}
?>
