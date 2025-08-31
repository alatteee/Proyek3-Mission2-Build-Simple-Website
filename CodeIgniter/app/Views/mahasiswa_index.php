<!doctype html>
<html>
<head><meta charset="utf-8"><title><?= esc($title) ?></title></head>
<body>
  <h2><?= esc($title) ?></h2>

  <p><a href="<?= site_url('mahasiswa/tambah') ?>">Tambah Mahasiswa</a></p>

  <form method="get" action="<?= site_url('mahasiswa') ?>">
    <input type="text" name="q" value="<?= esc($q) ?>" placeholder="Cari NIM/Nama/Umur">
    <button type="submit">Cari</button>
    <a href="<?= site_url('mahasiswa') ?>">Reset</a>
  </form>

  <table border="1" cellpadding="6" cellspacing="0">
    <tr><th>No</th><th>NIM</th><th>Nama</th><th>Umur</th><th>Aksi</th></tr>
    <?php if (!empty($mahasiswa)): $no=1; foreach ($mahasiswa as $m): ?>
      <tr>
        <td><?= $no++ ?></td>
        <td><?= esc($m['nim']) ?></td>
        <td><?= esc($m['nama']) ?></td>
        <td><?= (int)$m['umur'] ?></td>
        <td>
          <a href="<?= site_url('mahasiswa/detail/'.$m['id']) ?>">Detail</a> |
          <a href="<?= site_url('mahasiswa/edit/'.$m['id']) ?>">Edit</a> |
          <a href="<?= site_url('mahasiswa/hapus/'.$m['id']) ?>"
             onclick="return confirm('Hapus data ini?')">Delete</a>
        </td>
      </tr>
    <?php endforeach; else: ?>
      <tr><td colspan="5" align="center">Data tidak ada</td></tr>
    <?php endif; ?>
  </table>
</body>
</html>
