<?= $this->extend('layout/site') ?>
<?= $this->section('page_title') ?><?= esc($title) ?><?= $this->endSection() ?>

<?= $this->section('content') ?>
  <div class="card">
    <h2 class="card-title"><?= esc($title) ?></h2>
    <?php $errors = session('errors') ?? []; ?>

    <form action="<?= esc($action) ?>" method="post" class="form">
      <?= csrf_field() ?>

      <div class="field">
        <label>NIM</label>
        <input class="input" type="text" name="nim" value="<?= old('nim', $mhs['nim']) ?>">
        <?php if (isset($errors['nim'])): ?><div class="help error"><?= esc($errors['nim']) ?></div><?php endif; ?>
      </div>

      <div class="field">
        <label>Nama</label>
        <input class="input" type="text" name="nama" value="<?= old('nama', $mhs['nama']) ?>">
        <?php if (isset($errors['nama'])): ?><div class="help error"><?= esc($errors['nama']) ?></div><?php endif; ?>
      </div>

      <div class="field">
        <label>Umur</label>
        <input class="input" type="number" name="umur" value="<?= old('umur', $mhs['umur']) ?>">
        <?php if (isset($errors['umur'])): ?><div class="help error"><?= esc($errors['umur']) ?></div><?php endif; ?>
      </div>

      <?php if (isset($errors['general'])): ?>
        <div class="alert error"><?= esc($errors['general']) ?></div>
      <?php endif; ?>

      <div class="actions">
        <button class="btn btn-primary" type="submit"><?= $isEdit ? 'Update' : 'Simpan' ?></button>
        <a href="<?= site_url('mahasiswa') ?>" class="btn btn-ghost">Batal</a>
      </div>
    </form>
  </div>
<?= $this->endSection() ?>
