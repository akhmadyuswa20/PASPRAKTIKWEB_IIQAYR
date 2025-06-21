<?php
include("koneksi.php");

// cek apakah tombol daftar sudah diklik
if (isset($_POST['daftar'])) {

    // ambil data dari form
    $nama_lengkap   = mysqli_real_escape_string($db, $_POST['nama_lengkap']);
    $nik            = mysqli_real_escape_string($db, $_POST['nik']);
    $tempat_lahir   = mysqli_real_escape_string($db, $_POST['tempat_lahir']);
    $tanggal_lahir  = mysqli_real_escape_string($db, $_POST['tanggal_lahir']);
    $jenis_kelamin  = mysqli_real_escape_string($db, $_POST['jenis_kelamin']);
    $agama          = mysqli_real_escape_string($db, $_POST['agama']);
    $alamat         = mysqli_real_escape_string($db, $_POST['alamat']);
    $no_hp          = mysqli_real_escape_string($db, $_POST['no_hp']);
    $email          = mysqli_real_escape_string($db, $_POST['email']);
    $jabatan        = mysqli_real_escape_string($db, $_POST['jabatan']);

    // Upload Foto
    $foto       = $_FILES['foto']['name'];
    $foto_tmp   = $_FILES['foto']['tmp_name'];

    // Upload CV
    $cv         = $_FILES['cv']['name'];
    $cv_tmp     = $_FILES['cv']['tmp_name'];

    $folder     = "file/";

    // Simpan file ke folder
    move_uploaded_file($foto_tmp, $folder . $foto);
    move_uploaded_file($cv_tmp, $folder . $cv);

    // Query insert ke database
    $sql = "INSERT INTO pendaftaran_karyawan 
            (nama_lengkap, nik, tempat_lahir, tanggal_lahir, jenis_kelamin, agama, alamat, no_hp, email, jabatan, foto, cv)
            VALUES 
            ('$nama_lengkap', '$nik', '$tempat_lahir', '$tanggal_lahir', '$jenis_kelamin', '$agama', '$alamat', '$no_hp', '$email', '$jabatan', '$foto', '$cv')";

    $query = mysqli_query($db, $sql);

    if ($query) {
        echo "<script>alert('Pendaftaran berhasil!'); window.location='list_daftar.php';</script>";
    } else {
        echo "Pendaftaran gagal: " . mysqli_error($db);
    }
}
?>
