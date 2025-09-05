<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login - Website SMA XYZ</title>
  <link rel="stylesheet" href="<?= base_url('css/style.css') ?>">
</head>
<body>
  <div class="wrap">
    <h2>Login</h2>

    <?php if (!empty($msg)): ?>
      <div class="alert success"><?= esc($msg) ?></div>
    <?php endif; ?>

    <?php $errors = $errors ?? []; if (isset($errors['login'])): ?>
      <div class="alert error"><?= esc($errors['login']) ?></div>
    <?php endif; ?>

    <form action="<?= site_url('login') ?>" method="post" style="max-width:360px;">
      <?= csrf_field() ?>

      <div style="margin-bottom:10px;">
        <label>Username</label><br>
        <input type="text" name="username" value="<?= old('username') ?>" style="width:100%;">
        <?php if (isset($errors['username'])): ?>
          <div class="alert error"><?= esc($errors['username']) ?></div>
        <?php endif; ?>
      </div>

      <div style="margin-bottom:10px;">
        <label>Password</label><br>
        <input type="password" name="password" style="width:100%;">
        <?php if (isset($errors['password'])): ?>
          <div class="alert error"><?= esc($errors['password']) ?></div>
        <?php endif; ?>
      </div>

      <button type="submit">Login</button>
    </form>
  </div>
</body>
</html>
