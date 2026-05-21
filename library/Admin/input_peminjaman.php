<?php
include '../koneksi.php';

$query_anggota = "SELECT * FROM anggota";
$result_anggota = mysqli_query($conn, $query_anggota);
$query_buku = "SELECT * FROM buku";
$result_buku = mysqli_query($conn, $query_buku);
$query_peminjaman = mysqli_query($conn, "SELECT peminjaman.*, anggota.Nama_Anggota, buku.Judul_Buku FROM peminjaman INNER JOIN anggota ON anggota.Id_Anggota = peminjaman.Id_Anggota INNER JOIN buku ON buku.Id_Buku = peminjaman.Id_Buku");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_anggota = $_POST['id_anggota'];
    $id_buku = $_POST['id_buku'];
    $tanggal_pinjam = $_POST['tanggal_pinjam'];

    $insert_query = "INSERT INTO peminjaman (Id_Anggota, Id_Buku, Tanggal_Pinjam) VALUES ('$id_anggota', '$id_buku', '$tanggal_pinjam')";
    $insert_result = mysqli_query($conn, $insert_query);

    if ($insert_result) {
        echo "<script>
            alert('Data Berhasil Dimasukkan');
            window.location.href = 'index.php?page=data_peminjaman';
            </script>";
    } else {
        echo "<script>alert('Data Gagal Ditambahkan: " . mysqli_error($conn) . "');</script>";
    }
}
?>

<h1 class="mt-4 ms-5 me-3">
    <center>Form Input Peminjaman Buku</center>
</h1>

<br>

<div class="card mb-4 ms-5 me-3">
    <div class="card-header">
        <i class="fas fa-plus me-1"></i>
        Tambah Data Buku Yang Dipinjam 
    </div>

    <div class="card-body">

        <form method="post" action="">

            <div class="form-floating mb-3">
                <select class="form-select" name="id_anggota" required>
                    <option value="">== Pilih Anggota ==</option>

                    <?php while($anggota = mysqli_fetch_assoc($result_anggota)) { ?>
                        <option value="<?= $anggota['Id_Anggota']; ?>">
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
                        <option value="<?= $buku['Id_Buku']; ?>">
                            <?= $buku['Judul_Buku']; ?>
                        </option>
                    <?php } ?>

                </select>
                <label>Judul Buku</label>
            </div>

            <div class="form-floating mb-3">
                <input class="form-control" type="date" 
                name="tanggal_pinjam" required>
                <label>Tanggal Peminjaman</label>
            </div>

            <div class="mt-4 mb-3">
                <div class="d-flex justify-content-between">
                    <input type="submit" class="btn btn-primary" value="Tambah Data">
                    <input type="reset" class="btn btn-danger" value="Reset Data">
                </div>
            </div>

        </form>
    </div>
</div>