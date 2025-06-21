<?php
include("koneksi.php");

// jika tidak ada ID
if (!isset($_GET['id'])) {
    header('Location: pendaftaran.php');
    exit;
}

$id = $_GET['id'];

// ambil data dari database
$sql = "SELECT * FROM pendaftaran_karyawan WHERE id_karyawan=$id";
$query = mysqli_query($db, $sql);
$karyawan = mysqli_fetch_assoc($query);

// cek jika data tidak ditemukan
if (mysqli_num_rows($query) < 1) {
    die("Data tidak ditemukan");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Edit Data Karyawan</title>
  <link rel="stylesheet" href="daftar.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>

<body>
  <nav class="navbar bg-info">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">PT.Bangun Karya Bahagian</a>
    </div>
  </nav>

  <div class="card w-100">
    <div class="card-body">
      <form action="proses_edit.php" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="id_karyawan" value="<?= $karyawan['id_karyawan']; ?>">

        <div class="mb-3">
          <label class="form-label">Nama Lengkap</label>
          <input type="text" class="form-control" name="nama_lengkap" value="<?= $karyawan['nama_lengkap']; ?>">
        </div>

        <div class="mb-3">
          <label class="form-label">NIK</label>
          <input type="text" class="form-control" name="nik" value="<?= $karyawan['nik']; ?>">
        </div>

        <div class="mb-3">
          <label class="form-label">Tempat Lahir</label>
          <input type="text" class="form-control" name="tempat_lahir" value="<?= $karyawan['tempat_lahir']; ?>">
        </div>

        <div class="mb-3">
          <label class="form-label">Tanggal Lahir</label>
          <input type="date" class="form-control" name="tanggal_lahir" value="<?= $karyawan['tanggal_lahir']; ?>">
        </div>

        <div class="mb-3">
          <label class="form-label">Jenis Kelamin</label><br>
          <label><input type="radio" name="jenis_kelamin" value="L" <?= $karyawan['jenis_kelamin'] == 'L' ? 'checked' : ''; ?>> Laki-laki</label>
          <label><input type="radio" name="jenis_kelamin" value="P" <?= $karyawan['jenis_kelamin'] == 'P' ? 'checked' : ''; ?>> Perempuan</label>
        </div>

        <div class="mb-3">
          <label class="form-label">Agama</label>
          <select name="agama" class="form-select">
            <option value="Islam" <?= $karyawan['agama'] == 'Islam' ? 'selected' : ''; ?>>Islam</option>
            <option value="Kristen" <?= $karyawan['agama'] == 'Kristen' ? 'selected' : ''; ?>>Kristen</option>
            <option value="Hindu" <?= $karyawan['agama'] == 'Hindu' ? 'selected' : ''; ?>>Hindu</option>
            <option value="Budha" <?= $karyawan['agama'] == 'Budha' ? 'selected' : ''; ?>>Budha</option>
          </select>
        </div>

        <div class="mb-3">
          <label class="form-label">Alamat</label>
          <textarea class="form-control" name="alamat"><?= $karyawan['alamat']; ?></textarea>
        </div>

        <div class="mb-3">
          <label class="form-label">No HP</label>
          <input type="text" class="form-control" name="no_hp" value="<?= $karyawan['no_hp']; ?>">
        </div>

        <div class="mb-3">
          <label class="form-label">Email</label>
          <input type="email" class="form-control" name="email" value="<?= $karyawan['email']; ?>">
        </div>

        <div class="mb-3">
          <label class="form-label">Jabatan</label>
          <input type="text" class="form-control" name="jabatan" value="<?= $karyawan['jabatan']; ?>">
        </div>

        <div class="mb-3">
          <label class="form-label">Pas Foto</label>
          <input class="form-control" type="file" name="foto">
          <small>Foto saat ini: <?= $karyawan['foto']; ?></small>
        </div>

        <div class="mb-3">
          <label class="form-label">Upload CV</label>
          <input class="form-control" type="file" name="cv">
          <small>CV saat ini: <?= $karyawan['cv']; ?></small>
        </div>

        <div class="text-center">
          <button class="btn btn-primary" type="submit" name="simpan">Simpan Perubahan</button>
        </div>
      </form>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
