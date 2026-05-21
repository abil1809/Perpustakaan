<?php
include '../koneksi.php';

$id = $_GET['id'];

$query = mysqli_query($conn, "SELECT Foto FROM buku WHERE Id_Buku = '$id'");
$data = mysqli_fetch_assoc($query);

if (!empty($data['Foto']) && file_exists("../images/admin/cover/" . $data['Foto'])) {
    unlink("../images/admin/cover/" . $data['Foto']);
}

$hapus = mysqli_query($conn, "DELETE FROM buku WHERE Id_Buku = '$id'");

if ($hapus) {
    echo "<script>
        alert('Data berhasil dihapus');
        window.location.href = 'index.php?page=tampil_buku';
    </script>";
} else {
    echo "<script>
        alert('Gagal menghapus data: " . mysqli_error($conn) . "');
        window.location.href = 'index.php?page=tampil_buku';
    </script>";
}
?>
