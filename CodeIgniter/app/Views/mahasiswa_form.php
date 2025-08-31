<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title><?= esc($title) ?></title>
  <link rel="stylesheet" href="<?= base_url('assets/css/app.css') ?>">
</head>
<body>
  <div class="container">
    <h2><?= esc($title) ?></h2>

    <form method="post"
          action="<?= $mhs ? site_url('mahasiswa/update/'.$mhs['id'])
                           : site_url('mahasiswa/simpan') ?>">

      <p>
        <label for="nim">NIM</label><br>
        <input type="text" id="nim" name="nim" value="<?= esc($mhs['nim'] ?? '') ?>" required>
      </p>

      <p>
        <label for="nama">Nama</label><br>
        <input type="text" id="nama" name="nama" value="<?= esc($mhs['nama'] ?? '') ?>" required>
      </p>

      <p>
        <label for="umur">Umur</label><br>
        <input type="number" id="umur" name="umur" value="<?= esc($mhs['umur'] ?? '') ?>" required>
      </p>

      <p>
        <button class="btn btn-primary" type="submit">Simpan</button>
        <a class="btn btn-secondary" href="<?= site_url('mahasiswa') ?>">Batal</a>
      </p>
    </form>
  </div>
</body>
</html>
