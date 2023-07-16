<?php
include 'koneksi.php'; // Sertakan file koneksi.php yang berisi koneksi ke database

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $role = "user"; // Ubah nilai role menjadi "user"

    // Buat query untuk menyimpan data ke dalam tabel users
    $sql = "INSERT INTO users (email, username, password, role) VALUES ('$email', '$username', '$password', '$role')";

    if ($conn->query($sql) === TRUE) {
        // Jika penyimpanan data berhasil, redirect ke halaman lain atau tampilkan pesan sukses
        header("Location: Login.php");
        exit();
    } else {
        // Jika terjadi kesalahan dalam penyimpanan data, tampilkan pesan error
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background: url('assets/image/Login.jpg') no-repeat center center fixed;
            background-size: cover;
        }
        .container {
            margin-top: 10%;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card mt-5">
                    <div class="card-body">
                        <h2 class="text-center mb-4">Sign Up</h2>
                        <form method="POST" action="signup.php">
                            <div class="form-group">
                                <label for="email">Email:</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>
                            <div class="form-group">
                                <label for="username">Username:</label>
                                <input type="text" class="form-control" id="username" name="username" required>
                            </div>
                            <div class="form-group">
                                <label for="password">Password:</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                            </div>
                            <input type="hidden" name="role" value="auto user">
                            <button type="submit" class="btn btn-primary btn-block">Sign Up</button>
                        </form>
                        <p class="text-center mt-3">Already have an account? <a href="Login.php">Sign In</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
