<?= $this->extend('layout/site') ?>
<?= $this->section('page_title') ?>Data Mahasiswa<?= $this->endSection() ?>

<?= $this->section('content') ?>
  <?php if (session()->getFlashdata('msg')): ?>
    <div class="alert success"><?= esc(session()->getFlashdata('msg')) ?></div>
  <?php endif; ?>

  <div class="toolbar">
    <form method="get" action="<?= site_url('mahasiswa') ?>" class="search">
      <input class="input" type="text" name="q" value="<?= esc($q ?? '') ?>" placeholder="Cari NIM / Nama">
      <button class="btn btn-primary" type="submit">Search</button>
    </form>
    <a href="<?= site_url('mahasiswa/create') ?>" class="btn btn-primary">+ Tambah</a>
  </div>

  <div class="card">
    <table class="table">
      <thead>
        <tr><th>NIM</th><th>Nama</th><th class="center">Umur</th><th class="right">Aksi</th></tr>
      </thead>
      <tbody>
      <?php if (!empty($mahasiswa)): ?>
        <?php foreach ($mahasiswa as $m): ?>
          <tr>
            <td><?= esc($m['nim']) ?></td>
            <td><?= esc($m['nama']) ?></td>
            <td class="center"><?= esc($m['umur']) ?></td>
            <td class="right actions">
              <a class="btn btn-ghost sm" href="<?= site_url('mahasiswa/detail/'.$m['id']) ?>">Detail</a>
              <a class="btn btn-ghost sm" href="<?= site_url('mahasiswa/edit/'.$m['id']) ?>">Edit</a>
              <form action="<?= site_url('mahasiswa/delete/'.$m['id']) ?>" method="post" onsubmit="return confirm('Hapus data ini?')" class="inline">
                <?= csrf_field() ?>
                <button class="btn btn-danger sm" type="submit">Delete</button>
              </form>
            </td>
          </tr>
        <?php endforeach; ?>
      <?php else: ?>
        <tr><td colspan="4" class="center muted">Tidak ada data.</td></tr>
      <?php endif; ?>
      </tbody>
    </table>
  </div>
<?= $this->endSection() ?>
