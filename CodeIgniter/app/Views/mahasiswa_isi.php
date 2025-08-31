<!doctype html>
<html>
<head><meta charset="utf-8"><title><?= esc($title) ?></title></head>
<body>
  <h2 style="text-align:center;"><?= esc($title) ?></h2>

  <?php if (!empty($mhs)): ?>
    <table border="1" cellpadding="6" cellspacing="0" width="50%" align="center">
      <tr><th align="left" width="30%">NIM</th><td><?= esc($mhs['nim']) ?></td></tr>
      <tr><th align="left">Nama</th><td><?= esc($mhs['nama']) ?></td></tr>
      <tr><th align="left">Umur</th><td><?= (int)$mhs['umur'] ?></td></tr>
    </table>
  <?php else: ?>
    <p style="text-align:center;">Data tidak ditemukan.</p>
  <?php endif; ?>

  <p style="text-align:center;margin-top:12px;">
    <a href="<?= base_url('mahasiswa') ?>">Kembali ke Daftar</a>
  </p>
</body>
</html>
