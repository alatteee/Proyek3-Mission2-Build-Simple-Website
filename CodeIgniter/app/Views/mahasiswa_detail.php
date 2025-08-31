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

    <?php if ($mhs): ?>
      <table>
        <tr><th>NIM</th><td><?= esc($mhs['nim']) ?></td></tr>
        <tr><th>Nama</th><td><?= esc($mhs['nama']) ?></td></tr>
        <tr><th>Umur</th><td><?= (int)$mhs['umur'] ?></td></tr>
      </table>
    <?php else: ?>
      <p>Data tidak ditemukan.</p>
    <?php endif; ?>

    <p>
      <a class="btn btn-secondary" href="<?= site_url('mahasiswa') ?>">← Kembali</a>
      <?php if ($mhs): ?>
        <a class="btn btn-primary" href="<?= site_url('mahasiswa/edit/'.$mhs['id']) ?>">Edit</a>
        <a class="btn btn-danger" 
           onclick="return confirm('Hapus data ini?')"
           href="<?= site_url('mahasiswa/hapus/'.$mhs['id']) ?>">Delete</a>
      <?php endif; ?>
    </p>
  </div>
</body>
</html>
