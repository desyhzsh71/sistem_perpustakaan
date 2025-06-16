<?php
session_start();
include 'koneksi.php';

// Menangani form login
if (isset($_POST['username']) && isset($_POST['password'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];

  // Memasukkan data login ke dalam variabel
  $sql = "SELECT * FROM login WHERE username='$username' AND password='$password'";
  $result = mysqli_query($koneksi, $sql);

  // Mengecek apakah user ditemukan
  if (mysqli_num_rows($result) > 0) {
    // Login berhasil
    $row = mysqli_fetch_assoc($result);
    $_SESSION['username'] = $username;
    $_SESSION['level'] = $row['level']; 
    if ($row['level'] == 'admin') {
      header("Location: data.php");
    } elseif ($row['level'] == 'user') {
      header("Location: hal_user.php");
    }
  } else {
    // Login gagal
    $error = "Username atau password salah";
  }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>
  <style>
    @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap");

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: "Poppins", "sans-serif";
}

body {
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
    background: #fff;
}

.form {
    width: 420px;
    background: #fbcab3;
    color: #333;
    border-radius: 10px;
    padding: 30px 40px;
}

.form h1 {
    font-size: 36px;
    text-align: center;
}

.form .form-group {
    position: relative;
    width: 100%;
    height: 50px;
    margin: 30px 0;
}

.form-group input {
    width: 100%;
    height: 100%;
    background: #fff;
    border: none;
    outline: none;
    border: 2px solid rgba(32, 30, 30, 0.2);
    border-radius: 40px;
    font-size: 16px;
    color: black;
    padding: 20px 45px 20px 20px;
}

.form-group input::placeholder {
    color: black;
}

.form-group i {
    position: absolute;
    right: 20px;
    top: 90%;
    transform: translateY(-50%);
    font-size: 20px;
}

.form .login {
    display: flex;
    justify-content: space-between;
    font-size: 14.5px;
    margin: -15px 0 15px;
}
.login .btn {
    width: 100%;
    height: 45px;
    background: #fff;
    border: none;
    outline: none;
    border-radius: 40px;
    box-shadow: 0 0 10px rgba(0, 0, 0, .1);
    cursor: pointer;
    font-size: 16px;
    color: black;
    font-weight: 600;
    margin-top: 35px;
}
  </style>

  <div class="form">
      <h1>LOGIN</h1>
      <?php if (isset($error)): ?>
      <p style="color: red;"><?php echo $error; ?></p>
    <?php endif; ?>
    <form action="login.php" method="POST" name="form_input">
      <div class="form-group">
        <label for="username">Username</label>
        <input type="text" name="username" placeholder="Masukkan Username" required>
        <i class='bx bxs-user'></i>
      </div>
      <div class="form-group">
        <label for="password">Password</label>
        <input type="password" name="password" placeholder="Masukkan Password" required>
        <i class='bx bxs-lock-alt'></i>
      </div>
      <div class="login">
        <button type="submit" class="btn btn-primary">Login</button>
      </div>
    </form>
  </div>
</body>

</html>