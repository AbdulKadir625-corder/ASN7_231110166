<?php include 'koneksi.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Tambah Data Karyawan</title>
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
            background: #3498db;
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
    <form method="POST" action="">
        <h2>Tambah Data Karyawan</h2>
        <label>NIP:</label>
        <input type="text" name="nip" required>
        <label>Nama:</label>
        <input type="text" name="nama" required>
        <label>Jabatan:</label>
        <input type="text" name="jabatan">
        <label>Departemen:</label>
        <input type="text" name="departemen">
        <label>Email:</label>
        <input type="email" name="email">
        <label>No. Telepon:</label>
        <input type="text" name="no_telepon">
        <input type="submit" name="submit" value="Simpan">
        <a href="index.php">← Kembali ke daftar</a>
    </form>

    <?php
    if (isset($_POST['submit'])) {
        $nip = $_POST['nip'];
        $nama = $_POST['nama'];
        $jabatan = $_POST['jabatan'];
        $departemen = $_POST['departemen'];
        $email = $_POST['email'];
        $no_telepon = $_POST['no_telepon'];

        $insert = mysqli_query($conn, "INSERT INTO karyawan (nip, nama, jabatan, departemen, email, no_telepon)
                                       VALUES ('$nip', '$nama', '$jabatan', '$departemen', '$email', '$no_telepon')");

        if ($insert) {
            echo "<script>alert('Data berhasil disimpan!');window.location='index.php';</script>";
        } else {
            echo "<p style='color:red;'>Gagal menyimpan data.</p>";
        }
    }
    ?>
</body>
</html>
