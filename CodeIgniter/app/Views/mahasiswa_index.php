<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title><?= esc($title) ?></title>
  <link rel="stylesheet" href="<?= base_url('assets/css/app.css') ?>">
</head>
<body>
  <div class="container">
    <h2><?= esc($title) ?></h2>

    <form method="get" action="<?= site_url('mahasiswa') ?>">
      <input type="text" name="q" value="<?= esc($q) ?>" placeholder="Cari NIM/Nama/Umur">
      <button type="submit" class="btn btn-secondary">Cari</button>
      <a class="btn btn-secondary" href="<?= site_url('mahasiswa') ?>">Reset</a>
    </form>


    <a class="btn btn-primary" href="<?= site_url('mahasiswa/tambah') ?>">+ Tambah Mahasiswa</a>

    <div class="table-wrap">
      <table>
        <thead>
          <tr>
            <th>No</th><th>NIM</th><th>Nama</th><th>Umur</th><th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php if(!empty($mahasiswa)): $no=1; foreach($mahasiswa as $m): ?>
            <tr>
              <td><?= $no++ ?></td>
              <td><?= esc($m['nim']) ?></td>
              <td><?= esc($m['nama']) ?></td>
              <td><?= (int)$m['umur'] ?></td>
              <td>
                <a class="btn btn-secondary" href="<?= site_url('mahasiswa/detail/'.$m['id']) ?>">Detail</a>
                <a class="btn btn-primary" href="<?= site_url('mahasiswa/edit/'.$m['id']) ?>">Edit</a>
                <a class="btn btn-danger"
                   onclick="return confirm('Hapus data ini?')"
                   href="<?= site_url('mahasiswa/hapus/'.$m['id']) ?>">Delete</a>
              </td>
            </tr>
          <?php endforeach; else: ?>
            <tr><td colspan="5">Data tidak ada</td></tr>
          <?php endif; ?>
        </tbody>
      </table>
    </div>
  </div>
</body>
</html>
