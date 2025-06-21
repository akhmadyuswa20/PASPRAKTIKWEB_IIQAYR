<?php
include("koneksi.php");

// Ambil data dari database
$result = mysqli_query($db, "SELECT * FROM pendaftaran_karyawan"); // atau tbl_karyawan jika itu nama tabelmu
?>
<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Data Karyawan</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>

<body>
  <!-- Navbar -->
  <nav class="navbar bg-info">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">PT.Bangun Karya Bahagia</a>
    </div>
  </nav>

  <!-- Tombol Tambah -->
  <div class="m-3">
    <a href="daftarBaru.php" class="btn btn-secondary">[+] Tambah Data</a>
  </div>

  <!-- Tabel -->
  <div class="container m-4">
    <table class="table table-bordered ">
      <thead class="table-primary text-center">
        <tr>
          <th>No</th>
          <th>Nama</th>
          <th>NIK</th>
          <th>Tempat, Tanggal Lahir</th>
          <th>Jenis Kelamin</th>
          <th>Agama</th>
          <th>Alamat</th>
          <th>No. HP</th>
          <th>Email</th>
          <th>Jabatan</th>
          <th>Foto</th>
          <th>CV</th>
          <th>Tindakan</th>
        </tr>
      </thead>
      <tbody>
        <?php $i = 1; ?>
        <?php while ($data = mysqli_fetch_assoc($result)) : ?>
          <tr>
            <td><?= $i++; ?></td>
            <td><?= htmlspecialchars($data['nama_lengkap']); ?></td>
            <td><?= htmlspecialchars($data['nik']); ?></td>
            <td><?= htmlspecialchars($data['tempat_lahir'] . ', ' . $data['tanggal_lahir']); ?></td>
            <td><?= $data['jenis_kelamin'] == 'L' ? 'Laki-laki' : 'Perempuan'; ?></td>
            <td><?= htmlspecialchars($data['agama']); ?></td>
            <td><?= htmlspecialchars($data['alamat']); ?></td>
            <td><?= htmlspecialchars($data['no_hp']); ?></td>
            <td><?= htmlspecialchars($data['email']); ?></td>
            <td><?= htmlspecialchars($data['jabatan']); ?></td>
            <td>
              <?php if (!empty($data['foto'])) : ?>
                <img src="file/<?= $data['foto']; ?>" width="80px">
              <?php else : ?>
                <span>-</span>
              <?php endif; ?>
            </td>
            <td>
              <?php if (!empty($data['cv'])) : ?>
                <a href="file/<?= $data['cv']; ?>" target="_blank">Lihat CV</a>
              <?php else : ?>
                <span>-</span>
              <?php endif; ?>
            </td>
            <td>
              <a href="edit.php?id_karyawan=<?= $data['id_karyawan']; ?>" class="btn btn-success btn-sm">Ubah</a>
              <a href="hapus.php?id_karyawan=<?= $data['id_karyawan']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
            </td>
          </tr>
        <?php endwhile; ?>
      </tbody>
    </table>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
