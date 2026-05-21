<?php
include '../koneksi.php';
if (isset($_GET['id'])) {
    $id = mysqli_real_escape_string($conn, $_GET['id']);
} elseif (isset($_POST['id'])) {
    $id = mysqli_real_escape_string($conn, $_POST['id']);
} else {
    echo "<script>alert('ID tidak ditemukan'); window.location.href='index.php?page=data_peminjaman';</script>";
    exit;
}

$query_anggota = "SELECT * FROM anggota";
$result_anggota = mysqli_query($conn, $query_anggota);
$query_buku = "SELECT * FROM buku";
$result_buku = mysqli_query($conn, $query_buku);
$q = mysqli_query($conn, "SELECT * FROM peminjaman WHERE Id_Peminjaman='$id'") or die(mysqli_error($conn));
$peminjaman_data = mysqli_fetch_assoc($q);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = mysqli_real_escape_string($conn, $_POST['id']);
    $id_anggota = mysqli_real_escape_string($conn, $_POST['id_anggota']);
    $id_buku = mysqli_real_escape_string($conn, $_POST['id_buku']);
    $tanggal_pinjam = mysqli_real_escape_string($conn, $_POST['tanggal_pinjam']);

    $update_query = "UPDATE peminjaman SET Id_Anggota='$id_anggota', Id_Buku='$id_buku', Tanggal_Pinjam='$tanggal_pinjam' WHERE Id_Peminjaman='$id'";
    $update_result = mysqli_query($conn, $update_query);

    if ($update_result) {
        echo "<script>
            alert('Data Berhasil Diubah');
            window.location.href = 'index.php?page=data_peminjaman';
            </script>";
        exit;
    } else {
        echo "<script>alert('Data Gagal Diubah: " . mysqli_error($conn) . "');</script>";
    }
}
?>

<h1 class="mt-4 ms-5 me-3">
    <center>Form Edit Peminjaman Buku</center>
</h1>

<br>

<div class="card mb-4 ms-5 me-3">
    <div class="card-header">
        <i class="fas fa-plus me-1"></i>
        Edit Data Buku Yang Dipinjam
    </div>

    <div class="card-body">

        <form method="post" action="">
            <input type="hidden" name="id" value="<?= htmlspecialchars($id); ?>">

            <div class="form-floating mb-3">
                <select class="form-select" name="id_anggota" required>
                    <option value="">== Pilih Anggota ==</option>

                    <?php while($anggota = mysqli_fetch_assoc($result_anggota)) { ?>
                        <option value="<?= $anggota['Id_Anggota']; ?>" <?= ($anggota['Id_Anggota'] == $peminjaman_data['Id_Anggota']) ? 'selected' : ''; ?>>
                            <?= $anggota['Nama_Anggota']; ?>
                        </option>
                    <?php } ?>

                </select>
                <label>Nama Anggota</label>
            </div>

            <div class="form-floating mb-3">
                <select class="form-select" name="id_buku" required>
                    <option value="">== Pilih Buku ==</option>

                    <?php while($buku = mysqli_fetch_assoc($result_buku)) { ?>
                        <option value="<?= $buku['Id_Buku']; ?>" <?= ($buku['Id_Buku'] == $peminjaman_data['Id_Buku']) ? 'selected' : ''; ?>>
                            <?= $buku['Judul_Buku']; ?>
                        </option>
                    <?php } ?>

                </select>
                <label>Judul Buku</label>
            </div>

            <div class="form-floating mb-3">
                <input class="form-control" type="date" 
                name="tanggal_pinjam" required value="<?= htmlspecialchars($peminjaman_data['Tanggal_Pinjam']); ?>">
                <label>Tanggal Peminjaman</label>
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