<!doctype html>
<html>
<body>
  <h3><?= esc($title ?? ''); ?></h3>
  <table border="1" cellpadding="6">
    <tr><th>NIM</th><th>Nama</th><th>Umur</th></tr>
    <?php if (!empty($getMahasiswa)): ?>
      <?php foreach ($getMahasiswa as $m): ?>
        <tr>
          <td><?= esc($m['nim']); ?></td>
          <td><?= esc($m['nama']); ?></td>
          <td><?= (int)$m['umur']; ?></td>
        </tr>
      <?php endforeach; ?>
    <?php else: ?>
      <tr><td colspan="3">Kosong</td></tr>
    <?php endif; ?>
  </table>
</body>
</html>
