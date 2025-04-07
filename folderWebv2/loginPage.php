<?php
session_start();
$errorsMessage = [];
$successMessage = "";

$formPage = isset($_GET['form']) ? $_GET['form'] : 'signIn';

//proses register
if ($_SERVER["REQUEST_METHOD"] == "POST" && $formPage === 'signUp') {
  $fullName = trim($_POST['full-name'] ?? '');
  $email = trim($_POST['email'] ?? '');
  $dob = $_POST['dob'] ?? '';
  $balance = $_POST['balance'] ?? '';
  $password = $_POST['password'] ?? '';
  $confirmPassword = $_POST['confirm-password'] ?? '';
  $address = trim($_POST['address'] ?? '');

  // Validasi input
  if (empty($fullName)) {
    $errorsMessage['full-name'] = "Nama tidak boleh kosong.";
  }
  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errorsMessage['email'] = "Format email tidak valid.";
  }
  if (strlen($password) < 6) {
    $errorsMessage['password'] = "Password harus minimal 6 karakter.";
  }
  if ($password !== $confirmPassword) {
    $errorsMessage['confirm-password'] = "Password tidak sama.";
  }
  if (empty($dob)) {
    $errorsMessage['dob'] = "Tanggal lahir tidak boleh kosong.";
  }
  if (!isset($balance) || !is_numeric($balance)) {
    $errorsMessage['balance'] = "Saldo tidak boleh kosong.";
  }
  if (empty($address)) {
    $errorsMessage['address'] = "Alamat tidak boleh kosong.";
  } elseif (strlen($address) < 10) {
    $errorsMessage['address'] = "Alamat harus minimal 10 karakter.";
  }

  if (empty($errorsMessage)) {
    if (!isset($_SESSION['users'])) {
      $_SESSION['users'] = [];
    }

    foreach ($_SESSION['users'] as $user) {
      if ($user['email'] === $email) {
        $errorsMessage['email'] = "Email sudah terdaftar.";
        break;
      }
    }

    if (empty($errorsMessage)) {
      $_SESSION['users'][] = [
        'fullName' => $fullName,
        'email' => $email,
        'dob' => $dob,
        'balance' => $balance,
        'password' => password_hash($password, PASSWORD_DEFAULT), // Hash password
        'address' => $address
      ];

      $_SESSION['is_logged_in'] = true;
      $_SESSION['user_email'] = $email;
      $_SESSION['user_name'] = $fullName; // Simpan nama pengguna ke sesi
      $successMessage = "Registrasi berhasil!";
      header("Location: index.php");
      exit();
    }
  }
}
//proses login
if ($_SERVER["REQUEST_METHOD"] == "POST" && $formPage === 'signIn') {
  $loginEmail = trim($_POST['loginEmail'] ?? '');
  $loginPassword = trim($_POST['loginpassword'] ?? '');

  // Validasi input
  if (empty($loginEmail)) {
    $errorsMessage['loginEmail'] = "Email tidak boleh kosong.";
  }
  if (empty($loginPassword)) {
    $errorsMessage['loginPassword'] = "Password tidak boleh kosong.";
  }

  // Periksa apakah akun sudah terdaftar
  if (empty($errorsMessage)) {
    $userFound = false;

    if (isset($_SESSION['users'])) {
      foreach ($_SESSION['users'] as $user) {
        if ($user['email'] === $loginEmail) {
          $userFound = true;

          // Verifikasi password
          if (password_verify($loginPassword, $user['password'])) {
            $_SESSION['is_logged_in'] = true;
            $_SESSION['user_email'] = $loginEmail;
            $_SESSION['user_name'] = $user['fullName']; // Simpan nama pengguna ke sesi
            $successMessage = "Login berhasil!";
            header("Location: index.php");
            exit();
          } else {
            $errorsMessage['loginPassword'] = "Password salah.";
          }
          break;
        }
      }
    }

    if (!$userFound) {
      $errorsMessage['loginEmail'] = "Akun tidak ditemukan. Silakan daftar terlebih dahulu.";
    }
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Item Detail</title>
  <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" href="css/styleLogin.css">
  <link rel="stylesheet" href="css/responsive.css">
</head>

<body>

  <div class="heading_container">
    <div class="heading_left">
      <h1>Bumi Mas Combat</h1>
    </div>
    <div class="heading_right">
      <a href="index.php" class="home_button">Home</a>
    </div>
  </div>

  <!--  login section -->
  <section class="login-section">
    <?php if ($formPage === 'signIn'): ?>
      <div class="form-wrapper sign-in">
        <div class="wrapper">
          <form action="loginPage.php?form=signIn" method="post">
            <h1>Login</h1>

            <div class="input-group">
              <label for="loginEmail">Email</label>
              <input type="text" name="loginEmail" id="loginEmail"
                value="<?php echo htmlspecialchars($loginEmail ?? ''); ?>" required>
            </div>
            <?php if (!empty($errorsMessage['loginEmail'])): ?>
              <div class="error-text"><?php echo htmlspecialchars($errorsMessage['loginEmail']); ?></div>
            <?php endif; ?>

            <div class="input-group">
              <label for="loginpassword">Password</label>
              <input type="password" name="loginpassword" id="loginpassword" required>
            </div>
            <?php if (!empty($errorsMessage['loginPassword'])): ?>
              <div class="error-text"><?php echo htmlspecialchars($errorsMessage['loginPassword']); ?></div>
            <?php endif; ?>

            <button type="submit">Sign In</button>
            <div class="signUp-link">
              <p>Don't have an account? <a href="loginPage.php?form=signUp">Register</a></p>
            </div>
          </form>
        </div>
      </div>

      <!--Register Section-->
    <?php elseif ($formPage === 'signUp'): ?>
      <div class="form-wrapper sign-up">
        <div class="wrapper">
          <form action="loginPage.php?form=signUp" method="post">
            <h1>Register</h1>

            <div class="row">
              <div class="input-group">
                <label for="full-name">Full Name</label>
                <input type="text" name="full-name" id="full-name"
                  value="<?php echo htmlspecialchars($fullName ?? ''); ?>">
                <?php if (!empty($errorsMessage['full-name'])): ?>
                  <div class="register-error-text"><?php echo htmlspecialchars($errorsMessage['full-name']); ?></div>
                <?php endif; ?>
              </div>

              <div class="input-group">
                <label for="email">Email</label>
                <input type="text" name="email" id="email" value="<?php echo htmlspecialchars($email ?? ''); ?>">
                <?php if (!empty($errorsMessage['email'])): ?>
                  <div class="register-error-text"><?php echo htmlspecialchars($errorsMessage['email']); ?></div>
                <?php endif; ?>
              </div>
            </div>


            <div class="row">
              <div class="input-group">
                <label for="dob">Date of Birth</label>
                <input type="date" name="dob" id="dob" value="<?php echo htmlspecialchars($dob ?? ''); ?>" required>

                <?php if (!empty($errorsMessage['dob'])): ?>
                  <div class="register-error-text"><?php echo htmlspecialchars($errorsMessage['dob']); ?></div>
                <?php endif; ?>
              </div>


              <div class="input-group">
                <label for="balance">Balance</label>
                <input type="text" name="balance" id="balance" value="<?php echo htmlspecialchars($balance ?? ''); ?>"
                  required>
                <?php if (!empty($errorsMessage['balance'])): ?>
                  <div class="register-error-text"><?php echo htmlspecialchars($errorsMessage['balance']); ?></div>
                <?php endif; ?>
              </div>
            </div>

            <div class="row">
              <div class="input-group">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" required>
                <?php if (!empty($errorsMessage['password'])): ?>
                  <div class="register-error-text"><?php echo htmlspecialchars($errorsMessage['password']); ?></div>
                <?php endif; ?>
              </div>

              <div class="input-group">
                <label for="confirm-password">Confirm Password</label>
                <input type="password" name="confirm-password" id="confirm-password" required>
                <?php if (!empty($errorsMessage['confirm-password'])): ?>
                  <div class="register-error-text"><?php echo htmlspecialchars($errorsMessage['confirm-password']); ?></div>
                <?php endif; ?>
              </div>
            </div>


            <div class="row">
              <div class="input-group">
                <label for="address">Address</label>
                <input type="text" name="address" id="address" value="<?php echo htmlspecialchars($address ?? ''); ?>"
                  required>

                <?php if (!empty($errorsMessage['address'])): ?>
                  <div class="register-error-text"><?php echo htmlspecialchars($errorsMessage['address']); ?></div>
                <?php endif; ?>
              </div>

              <button type="submit" name="register">Sign up</button>
              <div class="signUp-link">
                <p>Already have an account? <a href="loginPage.php?form=signIn">Login</a></p>
              </div>
          </form>
        </div>
      </div>
    <?php endif; ?>
  </section>

  <script src="js/jquery-3.4.1.min.js"></script>
  <script src="js/bootstrap.js"></script>
  <script src="js/formatBalance.js"></script>
  <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>

</html>