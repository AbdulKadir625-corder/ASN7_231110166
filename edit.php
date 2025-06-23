<?php include 'koneksi.php';

$id = $_GET['id'];
$data = mysqli_query($conn, "SELECT * FROM karyawan WHERE id='$id'");
$row = mysqli_fetch_assoc($data);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Data Karyawan</title>
    <style>
        body {
            font-family: Arial;
            background: #f7f9f9;
            padding: 30px;
        }
        form {
            background: white;
            padding: 25px;
            border-radius: 8px;
            width: 400px;
            margin: auto;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        h2 {
            text-align: center;
            color: #2c3e50;
        }
        label {
            display: block;
            margin-top: 10px;
            color: #34495e;
        }
        input[type="text"],
        input[type="email"] {
            width: 100%;
            padding: 8px;
            margin-top: 4px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        input[type="submit"] {
            margin-top: 15px;
            padding: 10px 15px;
            background: #27ae60;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
        }
        a {
            text-decoration: none;
            display: block;
            margin-top: 15px;
            text-align: center;
            color: #2980b9;
        }
    </style>
</head>
<body>
    <form method="POST">
        <h2>Edit Data Karyawan</h2>
        <input type="hidden" name="id" value="<?= $row['id'] ?>">
        <label>NIP:</label>
        <input type="text" name="nip" value="<?= $row['nip'] ?>" required>
        <label>Nama:</label>
        <input type="text" name="nama" value="<?= $row['nama'] ?>" required>
        <label>Jabatan:</label>
        <input type="text" name="jabatan" value="<?= $row['jabatan'] ?>">
        <label>Departemen:</label>
        <input type="text" name="departemen" value="<?= $row['departemen'] ?>">
        <label>Email:</label>
        <input type="email" name="email" value="<?= $row['email'] ?>">
        <label>No. Telepon:</label>
        <input type="text" name="no_telepon" value="<?= $row['no_telepon'] ?>">
        <input type="submit" name="update" value="Update">
        <a href="index.php">← Kembali ke daftar</a>
    </form>

    <?php
    if (isset($_POST['update'])) {
        $nip = $_POST['nip'];
        $nama = $_POST['nama'];
        $jabatan = $_POST['jabatan'];
        $departemen = $_POST['departemen'];
        $email = $_POST['email'];
        $no_telepon = $_POST['no_telepon'];

        $update = mysqli_query($conn, "UPDATE karyawan SET 
            nip='$nip', nama='$nama', jabatan='$jabatan', departemen='$departemen',
            email='$email', no_telepon='$no_telepon' WHERE id='$id'");

        if ($update) {
            echo "<script>alert('Data berhasil diupdate!');window.location='index.php';</script>";
        } else {
            echo "<p style='color:red;'>Gagal mengupdate data.</p>";
        }
    }
    ?>
</body>
</html>
