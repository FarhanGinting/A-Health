<?php
session_start();
include 'koneksi.php';

$error = ""; // Inisialisasi pesan kesalahan

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $role = $row['role'];

        if ($role == 'user' || $role == 'admin') {
            $_SESSION['username'] = $username;
            $_SESSION['role'] = $role;
            
            // Redirect ke halaman sesuai level pengguna
            if ($role == 'user') {
                header("Location: HomeUser.php");
            } elseif ($role == 'admin') {
                header("Location: Home.php");
            }
            exit();
        } else {
            $error = "Akun tidak memiliki level yang valid";
        }
    } else {
        $error = "Username atau password salah";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Login Form</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <style>
    body {
      background: url('assets/image/Login.jpg') no-repeat center center fixed;
      background-size: cover;
    }
    .container {
      margin-top: 10%;
    }
    .login-box {
      background-color: #fff;
      padding: 20px;
      border-radius: 5px;
    }
    .signup-link {
      text-align: center;
      margin-top: 10px;
    }
    .error-message {
      color: red;
      margin-top: 10px;
      text-align: center;
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <div class="login-box">
          <h2 class="text-center">Login</h2>
          <form method="POST" action="login.php"> 
            <!-- Tambahkan method POST dan action ke login.php -->
            <div class="form-group">
              <label for="username">Username</label>
              <input type="text" class="form-control" id="username" name="username" placeholder="Enter username" required> <!-- Tambahkan name="username" -->
            </div>
            <div class="form-group">
              <label for="password">Password</label>
              <input type="password" class="form-control" id="password" name="password" placeholder="Enter password" required> <!-- Tambahkan name="password" -->
            </div>
            <button type="submit" class="btn btn-primary btn-block">Login</button>
          </form>
          <div class="signup-link">
            <p>Don't have an account? <a href="SignUp.php">Sign up</a></p>
          </div>
          <div class="error-message">
            <?php echo $error; ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
