<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_a-helth";

// Membuat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Memeriksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

if (isset($_POST['simpan'])){
    $idPasien = $_POST['idPasien'];
    $nmPasien = $_POST['nmPasien'];
    $jk = $_POST['jk'];
    $alamat = $_POST['alamat'];
    $laporanVaksin = $_POST['laporanVaksi'];
    $conn->query("INSERT INTO pasien (idPasien, nmPasien, jk, alamat, laporanVaksi) values ('$idPasien', '$nmPasien', '$jk', '$alamat', '$laporanVaksin');");

    header('location:Home.php');
    
}
if (isset($_GET['idPasien'])){
    $idPasien = $_GET['idPasien'];
    $conn->query("DELETE FROM pasien where idPasien = '$idPasien'");

    header("location:Home.php");
}

if (isset($_POST['edit'])) {
    $idPasien = $_POST['idPasien'];
    $nmPasien = $_POST['nmPasien'];
    $jk = $_POST['jk'];
    $alamat = $_POST['alamat'];
    $laporanVaksi = $_POST['laporanVaksi']; 

    $conn->query("UPDATE pasien SET nmPasien='$nmPasien', jk='$jk', alamat='$alamat', laporanVaksi='$laporanVaksi' WHERE idPasien='$idPasien'");
    
    header("location: Home.php");
}


?>
