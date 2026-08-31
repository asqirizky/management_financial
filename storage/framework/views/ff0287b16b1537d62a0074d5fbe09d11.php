<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login Admin Management Financial</title>
  <link rel="shortcut icon" href="admin/assets/media/logos/logo perpus icon.png" />
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
    }

    body {
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      background: #0f1115;
      color: #e5e7eb;
    }

    .login-card {
      display: flex;
      width: 720px;
      background: #171a21;
      border: 1px solid #262b36;
      border-radius: 14px;
      overflow: hidden;
      box-shadow: 0 10px 40px rgba(0, 0, 0, 0.5);
    }

    .welcome {
      flex: 1;
      background: linear-gradient(135deg, #1d2330, #11151c);
      padding: 48px 36px;
      display: flex;
      flex-direction: column;
      justify-content: center;
      border-right: 1px solid #262b36;
    }

    .welcome h1 {
      font-size: 26px;
      font-weight: 600;
      color: #f3f4f6;
      margin-bottom: 12px;
    }

    .welcome p {
      font-size: 14px;
      color: #9ca3af;
      line-height: 1.6;
    }

    .form-side {
      flex: 1;
      padding: 48px 36px;
      display: flex;
      flex-direction: column;
      justify-content: center;
    }

    .form-side h2 {
      text-align: center;
      margin-bottom: 28px;
      font-size: 20px;
      font-weight: 600;
      color: #f3f4f6;
      letter-spacing: 0.5px;
    }

    .form-group {
      margin-bottom: 18px;
    }

    .form-group label {
      display: block;
      font-size: 13px;
      margin-bottom: 6px;
      color: #9ca3af;
    }

    .form-group input {
      width: 100%;
      padding: 11px 13px;
      border-radius: 8px;
      border: 1px solid #2b313c;
      background: #0f1115;
      color: #e5e7eb;
      outline: none;
      transition: border 0.3s, box-shadow 0.3s;
    }

    .form-group input::placeholder {
      color: #5b6370;
    }

    .form-group input:focus {
      border-color: #4b9eff;
      box-shadow: 0 0 0 3px rgba(75, 158, 255, 0.18);
    }

    .btn-login {
      width: 100%;
      margin-top: 6px;
      padding: 11px;
      border: none;
      border-radius: 8px;
      background: #4b9eff;
      color: #fff;
      font-size: 15px;
      font-weight: 600;
      cursor: pointer;
      transition: background 0.2s ease;
    }

    .btn-login:hover {
      background: #3b8ae6;
    }

    .footer-text {
      margin-top: 22px;
      text-align: center;
      font-size: 12px;
      color: #6b7280;
    }

    @media (max-width: 760px) {
      .login-card {
        flex-direction: column;
        width: 340px;
      }
      .welcome {
        border-right: none;
        border-bottom: 1px solid #262b36;
      }
    }
  </style>
</head>
<body>
  <div class="login-card">
    <div class="welcome">
      <h1>Hello, Welcome!</h1>
      <p>Silakan masuk untuk mengelola sistem management financial Anda.</p>
    </div>
    <div class="form-side">
      <form action="<?php echo e(route('login')); ?>" method="POST">
      <?php echo csrf_field(); ?>
      <h2>Login</h2>
      <div class="form-group">
        <label>Username</label>
        <input type="text" placeholder="Username" name="username" class="form-control form-control-lg <?php $__errorArgs = ['username'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" required autocomplete="username" autofocus />

        <?php $__errorArgs = ['username'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
          <span class="invalid-feedback">
            <strong><?php echo e($message); ?></strong>
          </span>
        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
      </div>
      <div class="form-group">
        <label>Password</label>
        <input type="password" placeholder="Password" class="form-control form-control-lg <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="password" id="password" required autocomplete="current-password" />

        <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
        <span class="invalid-feedback">
          <strong><?php echo e($message); ?></strong>
        </span>
        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
      </div>
      <button type="submit" class="btn-login">Masuk</button>
      </form>
      <div class="footer-text">© 2026 create by AsqiRizky</div>
    </div>
  </div>
   <?php if(session('error')): ?>
    <script>
      Swal.fire({
        title: 'Astaghfirullah!',
        text: '<?php echo e(session('error')); ?>',
        icon: 'error',
        confirmButtonText: 'OK',
        customClass: {
          confirmButton: 'btn btn-danger'
        },
        buttonsStyling: false
      });
    </script>
  <?php endif; ?>
</body>
</html>
<?php /**PATH /var/www/html/resources/views/auth/login.blade.php ENDPATH**/ ?>