<?php
include 'koneksi.php';

$id = $_GET['id'];
$hapus = mysqli_query($conn, "DELETE FROM karyawan WHERE id='$id'");

if ($hapus) {
    echo "<script>alert('Data berhasil dihapus!');window.location='index.php';</script>";
} else {
    echo "Gagal menghapus data.";
}
?>
