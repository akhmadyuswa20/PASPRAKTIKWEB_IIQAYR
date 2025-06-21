<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Daftar Baru</title>

  <link rel="stylesheet" href="daftar.css" />

  <!-- link bosstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
</head>

<body>
  <nav class="navbar bg-info">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">PT.Bangun Karya Bahagian</a>
    </div>
  </nav>

  <div class="card w-100">
    <div class="card-body">
      <form action="daftar.php" method="POST" enctype="multipart/form-data">
    <div class="mb-3">
      <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
      <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" required>
    </div>

    <div class="mb-3">
      <label for="nik" class="form-label">NIK</label>
      <input type="text" class="form-control" id="nik" name="nik" maxlength="16" required>
    </div>

    <div class="mb-3">
      <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
      <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" required>
    </div>

    <div class="mb-3">
      <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
      <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" required>
    </div>

    <div class="mb-3">
      <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
      <select class="form-select" id="jenis_kelamin" name="jenis_kelamin" required>
        <option value="">Pilih Jenis Kelamin</option>
        <option value="L">Laki-laki</option>
        <option value="P">Perempuan</option>
      </select>
    </div>

    <div class="mb-3">
      <label for="agama" class="form-label">Agama</label>
      <select class="form-select" id="agama" name="agama" required>
        <option value="">Pilih Agama</option>
        <option value="Islam">Islam</option>
        <option value="Kristen">Kristen</option>
        <option value="Katolik">Katolik</option>
        <option value="Hindu">Hindu</option>
        <option value="Buddha">Buddha</option>
        <option value="Konghucu">Konghucu</option>
        <option value="Lainnya">Lainnya</option>
      </select>
    </div>

    <div class="mb-3">
      <label for="alamat" class="form-label">Alamat</label>
      <textarea class="form-control" id="alamat" name="alamat" rows="3" required></textarea>
    </div>

    <div class="mb-3">
      <label for="no_hp" class="form-label">No. HP</label>
      <input type="text" class="form-control" id="no_hp" name="no_hp">
    </div>

    <div class="mb-3">
      <label for="email" class="form-label">Email</label>
      <input type="email" class="form-control" id="email" name="email">
    </div>

    <div class="mb-3">
      <label for="jabatan" class="form-label">Jabatan</label>
      <input type="text" class="form-control" id="jabatan" name="jabatan">
    </div>

    <div class="mb-3">
      <label for="foto" class="form-label">Upload Foto</label>
      <input class="form-control" type="file" id="foto" name="foto" accept="image/*" required>
    </div>

    <div class="mb-3">
      <label for="cv" class="form-label">Upload CV</label>
      <input class="form-control" type="file" id="cv" name="cv" accept=".pdf,.doc,.docx" required>
    </div>
        <div class="button d-grid gap-1 col-2 mx-auto">
          <button class="btn btn-info" type="submit" name="daftar">
            Daftar
          </button>
        </div>
      </form>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>