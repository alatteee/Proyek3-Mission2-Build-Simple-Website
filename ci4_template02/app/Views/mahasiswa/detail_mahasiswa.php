<?= $this->extend('layout/site') ?>
<?= $this->section('page_title') ?>Detail Mahasiswa<?= $this->endSection() ?>

<?= $this->section('content') ?>
  <h2>Detail Mahasiswa</h2>
  <p><b>ID:</b> <?= esc($mhs['id']) ?></p>
  <p><b>NIM:</b> <?= esc($mhs['nim']) ?></p>
  <p><b>Nama:</b> <?= esc($mhs['nama']) ?></p>
  <p><b>Umur:</b> <?= esc($mhs['umur']) ?></p>
  <a href="<?= site_url('mahasiswa') ?>">&laquo; Kembali</a>
<?= $this->endSection() ?>
