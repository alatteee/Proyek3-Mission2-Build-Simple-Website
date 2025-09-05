<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= $this->renderSection('page_title') ?: 'Website SMA XYZ' ?></title>
  <link rel="stylesheet" href="<?= base_url('css/style.css') ?>">
</head>
<body>
  <div class="layout">
    <!-- TOPBAR -->
    <header class="topbar">
      <div class="brand">WEBSITE SMA XYZ</div>

      <nav class="tabs">
        <?php $seg1 = service('uri')->getSegment(1) ?: ''; ?>
        <a href="<?= site_url('/') ?>" class="tab <?= $seg1==='' ? 'active' : '' ?>">Home</a>
        <a href="<?= site_url('mahasiswa') ?>" class="tab <?= $seg1==='mahasiswa' ? 'active' : '' ?>">Data Mahasiswa</a>
      </nav>

      <div class="user">
        <?php if (session()->get('isLoggedIn')): ?>
          <span class="hello">Halo, <b><?= esc(session('name')) ?></b></span>
          <a class="btn btn-ghost" href="<?= site_url('logout') ?>">Logout</a>
        <?php else: ?>
          <a class="btn btn-primary" href="<?= site_url('login') ?>">Login</a>
        <?php endif; ?>
      </div>
    </header>

    <main class="container">
      <?= $this->renderSection('content') ?>
    </main>

    <footer class="footer">Bandung · Jawa Barat</footer>
  </div>
</body>
</html>
