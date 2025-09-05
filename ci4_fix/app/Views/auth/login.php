<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login - Website SMA XYZ</title>
  <link rel="stylesheet" href="<?= base_url('css/auth.css') ?>">
</head>
<body>
  <main class="auth">
    <section class="hero">
      <span class="badge">Secure Area</span>
      <h1>Selamat Datang 👋</h1>
      <p class="sub">Masuk untuk mengakses dashboard SMA XYZ.</p>
    </section>

    <section class="card">
      <h2 class="card-title">Login</h2>

      <?php if (!empty($msg)): ?>
        <div class="alert success"><?= esc($msg) ?></div>
      <?php endif; ?>

      <?php $errors = $errors ?? []; if (isset($errors['login'])): ?>
        <div class="alert error"><?= esc($errors['login']) ?></div>
      <?php endif; ?>

      <form action="<?= site_url('login') ?>" method="post" class="form">
        <?= csrf_field() ?>

        <div class="form-group">
          <label for="username">Username</label>
          <div class="control">
            <input id="username" type="text" name="username" value="<?= old('username') ?>" required>
            <span class="icon">👤</span>
          </div>
          <?php if (isset($errors['username'])): ?>
            <div class="alert error small"><?= esc($errors['username']) ?></div>
          <?php endif; ?>
        </div>

        <div class="form-group">
          <label for="password">Password</label>
          <div class="control">
            <input id="password" type="password" name="password" required>
            <span class="icon">🔒</span>
          </div>
          <?php if (isset($errors['password'])): ?>
            <div class="alert error small"><?= esc($errors['password']) ?></div>
          <?php endif; ?>
        </div>

        <button type="submit" class="btn">Masuk</button>
      </form>
    </section>
  </main>
</body>
</html>
