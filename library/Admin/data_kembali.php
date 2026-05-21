<?php
include '../koneksi.php';

$query = mysqli_query($conn, "SELECT peminjaman.*, anggota.Nama_Anggota, buku.Judul_Buku FROM peminjaman INNER JOIN anggota ON anggota.Id_Anggota = peminjaman.Id_Anggota INNER JOIN buku ON buku.Id_Buku = peminjaman.Id_Buku WHERE peminjaman.Status = 'Dikembalikan'");
$no = 1;
?>

<h1 class="mt-4 ms-5 me-3">Data Buku Yang Sudah Dikembalikan</h1>
<div class="breadcrumb mb-4 ms-5 me-3">
    <span class="breadcrumb-item active">Dashboard / Tampilkan Data Buku</span>
</div>
<div class="card mb-4 ms-5 me-3">
    <div class="card-header">
        <i class="fas fa-table me-1"></i>
        Tabel Data Buku Yang Sudah Dikembalikan
    </div>
    <div class="card-body">
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>No</th>

                    <th>Nama Anggota</th>
                    <th>Buku</th>
                    <th>Tanggal Pinjam</th>
                    <th>Tanggal Kembali</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($data = mysqli_fetch_assoc($query)) : ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $data['Nama_Anggota']; ?></td>
                    <td><?= $data['Judul_Buku']; ?></td>
                    <td><?= $data['Tanggal_Pinjam']; ?></td>
                    <td><?= $data['Tanggal_Kembali']; ?></td>
                    <td><?= $data['Status']; ?></td>
                </tr>    
                <?php endwhile; ?>
            </tbody>
        </table>