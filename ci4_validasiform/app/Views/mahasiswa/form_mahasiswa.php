<?= $this->extend('layout/site') ?>
<?= $this->section('page_title') ?><?= esc($title) ?><?= $this->endSection() ?>

<?= $this->section('content') ?>
  <h2><?= esc($title) ?></h2>
  <?php $errors = session('errors') ?? []; ?>

  <form action="<?= esc($action) ?>" method="post">
    <?= csrf_field() ?>

    <div style="margin-bottom:8px;">
      <label>NIM</label><br>
      <input type="text" name="nim" value="<?= old('nim', $mhs['nim']) ?>">
      <?php if (isset($errors['nim'])): ?><div style="color:red;"><?= esc($errors['nim']) ?></div><?php endif; ?>
    </div>

    <div style="margin-bottom:8px;">
      <label>Nama</label><br>
      <input type="text" name="nama" value="<?= old('nama', $mhs['nama']) ?>">
      <?php if (isset($errors['nama'])): ?><div style="color:red;"><?= esc($errors['nama']) ?></div><?php endif; ?>
    </div>

    <div style="margin-bottom:8px;">
      <label>Umur</label><br>
      <input type="number" name="umur" value="<?= old('umur', $mhs['umur']) ?>">
      <?php if (isset($errors['umur'])): ?><div style="color:red;"><?= esc($errors['umur']) ?></div><?php endif; ?>
    </div>

    <?php if (isset($errors['general'])): ?>
      <div style="color:red; margin-bottom:8px;"><?= esc($errors['general']) ?></div>
    <?php endif; ?>

    <button type="submit"><?= $isEdit ? 'Update' : 'Simpan' ?></button>
    <a href="<?= site_url('mahasiswa') ?>"><button type="button">Batal</button></a>
  </form>
<?= $this->endSection() ?>
