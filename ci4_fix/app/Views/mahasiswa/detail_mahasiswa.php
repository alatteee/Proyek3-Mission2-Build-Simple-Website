<?= $this->extend('layout/site') ?>
<?= $this->section('page_title') ?>Detail Mahasiswa<?= $this->endSection() ?>

<?= $this->section('content') ?>
  <div class="card">
    <h2 class="card-title">Detail Mahasiswa</h2>
    <div class="dl">
      <div><span>ID</span><b><?= esc($mhs['id']) ?></b></div>
      <div><span>NIM</span><b><?= esc($mhs['nim']) ?></b></div>
      <div><span>Nama</span><b><?= esc($mhs['nama']) ?></b></div>
      <div><span>Umur</span><b><?= esc($mhs['umur']) ?></b></div>
    </div>
    <a href="<?= site_url('mahasiswa') ?>" class="btn btn-ghost">« Kembali</a>
  </div>
<?= $this->endSection() ?>
