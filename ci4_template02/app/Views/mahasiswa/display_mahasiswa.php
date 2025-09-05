<?= $this->extend('layout/site') ?>
<?= $this->section('page_title') ?>Data Mahasiswa<?= $this->endSection() ?>

<?= $this->section('content') ?>
  <h1>Daftar Mahasiswa</h1>
  <table>
    <tr>
      <th>Nim</th>
      <th>Nama</th>
      <th>Umur</th>
      <th>Detail</th>
    </tr>

    <?php if (!empty($mahasiswa)): ?>
      <?php foreach ($mahasiswa as $m): ?>
        <tr>
          <td><?= esc($m['nim']) ?></td>
          <td><?= esc($m['nama']) ?></td>
          <td class="center"><?= esc($m['umur']) ?></td>
          <td>
            <a href="<?= site_url('mahasiswa/detail/'.$m['id']) ?>">
              <button type="button">lihat detail</button>
            </a>
          </td>
        </tr>
      <?php endforeach; ?>
    <?php else: ?>
      <tr><td colspan="4" class="center">Tidak ada data mahasiswa.</td></tr>
    <?php endif; ?>
  </table>
<?= $this->endSection() ?>
