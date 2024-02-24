<?php
include '../koneksi.php';

// Ambil data yang dikirimkan melalui formulir
$id_user = $_POST['id_user']; // asumsikan ada inputan hidden untuk id_user
$id_produk = $_POST['id_produk']; // asumsikan ada inputan hidden untuk id_produk
$total_transaksi = $_POST['total_transaksi'];
$metode_transaksi = $_POST['metode_transaksi'];
$tanggal_transaksi = date('Y-m-d H:i:s'); // Tanggal transaksi, dapat diambil secara otomatis

// Query untuk menambahkan data transaksi ke dalam tabel transaksi
$query = "INSERT INTO transaksi (id_user, id_produk, total_transaksi, metode_transaksi, tanggal_transaksi) 
          VALUES ('$id_user', '$id_produk', '$total_transaksi', '$metode_transaksi', '$tanggal_transaksi')";

// Eksekusi query
$result = mysqli_query($mysqli, $query);

if ($result) {
    // Jika transaksi berhasil ditambahkan, arahkan kembali ke halaman transaction.php
    header("Location: transaction.php");
    exit();
} else {
    // Jika terjadi kesalahan, tampilkan pesan error
    echo "Gagal menambahkan transaksi: " . mysqli_error($mysqli);
}
?>
