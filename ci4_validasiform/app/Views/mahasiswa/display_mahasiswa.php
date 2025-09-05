<?= $this->extend('layout/site') ?>
<?= $this->section('page_title') ?>Data Mahasiswa<?= $this->endSection() ?>

<?= $this->section('content') ?>
  <?php if (session()->getFlashdata('msg')): ?>
    <div style="margin-bottom:10px;"><?= esc(session()->getFlashdata('msg')) ?></div>
  <?php endif; ?>

  <div style="margin-bottom:12px; display:flex; gap:8px; align-items:center;">
    <form method="get" action="<?= site_url('mahasiswa') ?>">
      <input type="text" name="q" value="<?= esc($q ?? '') ?>" placeholder="Cari NIM/Nama">
      <button type="submit">Search</button>
    </form>
    <a href="<?= site_url('mahasiswa/create') ?>"><button type="button">+ Tambah</button></a>
  </div>

  <table>
    <tr><th>NIM</th><th>Nama</th><th>Umur</th><th>Aksi</th></tr>
    <?php if (!empty($mahasiswa)): ?>
      <?php foreach ($mahasiswa as $m): ?>
        <tr>
          <td><?= esc($m['nim']) ?></td>
          <td><?= esc($m['nama']) ?></td>
          <td class="center"><?= esc($m['umur']) ?></td>
          <td>
            <a href="<?= site_url('mahasiswa/detail/'.$m['id']) ?>">Detail</a> |
            <a href="<?= site_url('mahasiswa/edit/'.$m['id']) ?>">Edit</a> |
            <form action="<?= site_url('mahasiswa/delete/'.$m['id']) ?>" method="post" style="display:inline" onsubmit="return confirm('Hapus data ini?')">
              <?= csrf_field() ?>
              <button type="submit">Delete</button>
            </form>
          </td>
        </tr>
      <?php endforeach; ?>
    <?php else: ?>
      <tr><td colspan="4" class="center">Tidak ada data.</td></tr>
    <?php endif; ?>
  </table>
<?= $this->endSection() ?>
