<!doctype html>
<html>
<head><meta charset="utf-8"><title><?= esc($title) ?></title></head>
<body>
  <h2><?= esc($title) ?></h2>

  <form method="post"
        action="<?= $mhs ? site_url('mahasiswa/update/'.$mhs['id'])
                         : site_url('mahasiswa/simpan') ?>">

    <p>NIM: <input type="text" name="nim" value="<?= esc($mhs['nim'] ?? '') ?>" required></p>
    <p>Nama: <input type="text" name="nama" value="<?= esc($mhs['nama'] ?? '') ?>" required></p>
    <p>Umur: <input type="number" name="umur" value="<?= esc($mhs['umur'] ?? '') ?>" required></p>

    <button type="submit">Simpan</button>
    <a href="<?= site_url('mahasiswa') ?>">Batal</a>
  </form>
</body>
</html>
