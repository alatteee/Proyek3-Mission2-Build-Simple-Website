<!doctype html>
<html>
<head><meta charset="utf-8"><title><?= esc($title) ?></title></head>
<body>
  <h2><?= esc($title) ?></h2>
  <?php if ($mhs): ?>
    <p><b>NIM:</b> <?= esc($mhs['nim']) ?></p>
    <p><b>Nama:</b> <?= esc($mhs['nama']) ?></p>
    <p><b>Umur:</b> <?= (int)$mhs['umur'] ?></p>
  <?php else: ?>
    <p>Data tidak ditemukan.</p>
  <?php endif; ?>
  <p><a href="<?= site_url('mahasiswa') ?>">Kembali</a></p>
</body>
</html>
