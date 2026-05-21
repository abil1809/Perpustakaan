<?php
include '../koneksi.php';

if (isset($_GET['id'])) {
    $id_peminjaman = mysqli_real_escape_string($conn, $_GET['id']);
} elseif (isset($_POST['id'])) {
    $id_peminjaman = mysqli_real_escape_string($conn, $_POST['id']);
} else {
    echo "<script>alert('ID tidak ditemukan'); window.location.href='index.php?page=data_peminjaman';</script>";
    exit;
}

$query = mysqli_query($conn, "SELECT peminjaman.*, anggota.Nama_Anggota, buku.Judul_Buku FROM peminjaman INNER JOIN anggota ON anggota.Id_Anggota = peminjaman.Id_Anggota INNER JOIN buku ON buku.Id_Buku = peminjaman.Id_Buku WHERE Id_Peminjaman = '$id_peminjaman'");
$data = mysqli_fetch_assoc($query);

if (!$data) {
    echo "<script>alert('Data peminjaman tidak ditemukan'); window.location.href='index.php?page=data_peminjaman';</script>";
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $tanggal_kembali = mysqli_real_escape_string($conn, $_POST['tanggal_kembali']);
    $status = mysqli_real_escape_string($conn, $_POST['status']);
    $update = mysqli_query($conn, "UPDATE peminjaman SET Tanggal_Kembali = '$tanggal_kembali', Status = '$status' WHERE Id_Peminjaman = '$id_peminjaman'");

    if ($update) {
        echo "<script>
            alert('Buku berhasil dikembalikan');
            window.location.href = 'index.php?page=data_peminjaman';
        </script>";
        exit;
    } else {
        echo "<script>alert('Gagal mengembalikan buku: " . mysqli_error($conn) . "');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengembalian Buku</title>
</head>
<body>
    <h1 class="mt-4 ms-5 me-3">Kembali Buku</h1>
<div class="breadcrumb mb-4 ms-5 me-3">
    <span class="breadcrumb-item active">Dashboard / Pengembalian Buku</span>
</div>
<div class="card mb-4 ms-5 me-3">
    <div class="card-header">
        <i class="fas fa-undo me-1"></i>
        Form Pengembalian Buku
    </div>
    <div class="card-body">
        <form method="post" action="">
            <input type="hidden" name="id" value="<?= htmlspecialchars($id_peminjaman); ?>">

            <div class="form-floating mb-3">
                <input class="form-control" type="text" value="<?= htmlspecialchars($data['Nama_Anggota']); ?>" readonly>
                <label>Nama Anggota</label>
            </div>

            <div class="form-floating mb-3">
                <input class="form-control" type="text" value="<?= htmlspecialchars($data['Judul_Buku']); ?>" readonly>
                <label>Judul Buku</label>
            </div>

            <div class="form-floating mb-3">
                <input class="form-control" type="date" value="<?= htmlspecialchars($data['Tanggal_Pinjam']); ?>" readonly>
                <label>Tanggal Peminjaman</label>
            </div>

            <div class="form-floating mb-3">
                <input class="form-control" type="date" name="tanggal_kembali" required value="<?= htmlspecialchars($data['Tanggal_Kembali'] ?: date('Y-m-d')); ?>">
                <label>Tanggal Kembali</label>
            </div>

            <div class="form-floating mb-3">
                <select class="form-select" id="inputStatus" name="status" required>
                    <option value="">====Pilih Status====</option>
                    <option value="Dipinjam" <?= (isset($data['Status']) && $data['Status'] == 'Dipinjam') ? 'selected' : ''; ?>>Dipinjam</option>
                    <option value="Dikembalikan" <?= (isset($data['Status']) && $data['Status'] == 'Dikembalikan') ? 'selected' : ''; ?>>Dikembalikan</option>
                </select>
                <label for="inputStatus">Status</label>
            </div>

            <div class="mt-4 mb-3">
                <div class="d-flex justify-content-between">
                    <input type="submit" class="btn btn-warning" value="Simpan Perubahan">
                    <a href="index.php?page=data_peminjaman" class="btn btn-secondary">Batal</a>
                </div>
            </div>
        </form>
    </div>
</div>
</body>
</html>