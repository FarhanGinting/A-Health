<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initialscale=1.0">
    <title>Edit Data Pasien</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <div class="row mt-3">
            <div class="col-4">
                <h3>Edit Data Pasien</h3>
                <?php
                include 'koneksi.php';
                $panggil = $conn->query("SELECT * FROM pasien where idPasien='$_GET[edit]'");
                ?>
                <?php
                while ($row = $panggil->fetch_assoc()) {
                ?>
                    <form action="koneksi.php" method="POST">
                        <div class="form-group">
                            <label for="idPasien">ID Pasien</label>
                            <input type="text" class="form-control mb3" name="idPasien" value="<?= $row['idPasien'] ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="nmPasien">Nama Pasien</label>
                            <input type="text" class="form-control mb3" name="nmPasien" value="<?= $row['nmPasien'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="jk">Jenis Kelamin</label>
                            <div class="form-check">
                            <input type="radio" class="form-check-input" name="jk" value="Perempuan" <?php if (($row['jk']) === "Perempuan") {echo "checked";} ?>>
                            <label class="form-check-label">Perempuan</label>
                            </div>
                        <div class="form-check">
                            <input type="radio" class="form-check-input" name="jk" value="Laki-laki" <?php if (($row['jk']) === "Laki-laki") {echo "checked";} ?>>
                            <label class="form-check-label">Laki-laki</label>
                            </div>
                        </div>
                            <div class="form-group mt-3">
                            <label for="alamat">Alamat</label>
                            <br>
                            <textarea class="formcontrol" name="alamat" id="alamat" cols="44" rows="5" placeholder="Alamat"><?= $row['alamat'] ?></textarea>
                        </div>  
                        <div class="form-group">
                            <label for="laporanVaksi">Laporan Vaksin</label>
                            <div class="form-check">
                            <input type="radio" class="form-check-input" name="laporanVaksi" value="Sudah Vaksin" <?php if (($row['laporanVaksi']) === "Sudah Vaksin") {echo "checked";
                            } ?>> Sudah Vaksin
                        </div>
                            <div class="form-check">
                            <input type="radio" class="form-check-input" name="laporanVaksi" value="Belum Vaksin" <?php if (($row['laporanVaksi']) === "Belum Vaksin") {echo "checked";
                            } ?>> Belum Vaksin
                            </div>
                        </div>
                            <div class="form-group mt-3">
                            <input type="submit" name="edit" value="Edit" class="form-control btn btn-primary">
                            </div>
                        </div>
                    </form>
                <?php } ?>
            </div>
        </div>
    </div>
</body>

</html>