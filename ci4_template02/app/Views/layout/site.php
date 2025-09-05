<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= $this->renderSection('page_title') ?: 'Website SMA XYZ' ?></title>
  <link rel="stylesheet" href="<?= base_url('css/style.css') ?>">
</head>
<body>
  <div class="wrap">
    <div class="header">WEBSITE SMA XYZ</div>
    <div class="nav">
      <?php $seg1 = service('uri')->getSegment(1) ?: ''; ?>
      <a href="<?= site_url('/') ?>" class="<?= $seg1==='' ? 'active' : '' ?>">Home</a>
      <a href="<?= site_url('mahasiswa') ?>" class="<?= $seg1==='mahasiswa' ? 'active' : '' ?>">Data Mahasiswa</a>
    </div>
    <div class="content">
      <?= $this->renderSection('content') ?>
    </div>
    <div class="footer">Bandung - Jawa Barat</div>
  </div>
</body>
</html>
