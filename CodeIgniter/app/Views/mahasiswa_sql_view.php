<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <title><?= esc($title) ?></title>
  </head>
  <body>
    <h2><?= esc($title) ?></h2>
    <table border="1" cellpadding="6" cellspacing="0">
      <tr>
        <th>No</th>
        <th>NIM</th>
        <th>Nama</th>
        <th>Umur</th>
      </tr>
      <?php if (!empty($mahasiswa)): ?>
        <?php $no=1; foreach ($mahasiswa as $m): ?>
          <tr>
            <td><?= $no++ ?></td>
            <td><?= esc($m['nim']) ?></td>
            <td><?= esc($m['nama']) ?></td>
            <td><?= esc($m['umur']) ?></td>
          </tr>
        <?php endforeach ?>
      <?php else: ?>
        <tr>
          <td colspan="4" align="center">Data tidak ada</td>
        </tr>
      <?php endif ?>
    </table>
  </body>
</html>
