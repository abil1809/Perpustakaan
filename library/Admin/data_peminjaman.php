<?php
include '../koneksi.php';

$query = mysqli_query($conn, "SELECT peminjaman.*, anggota.Nama_Anggota, buku.Judul_Buku FROM peminjaman INNER JOIN anggota ON anggota.Id_Anggota = peminjaman.Id_Anggota INNER JOIN buku ON buku.Id_Buku = peminjaman.Id_Buku WHERE peminjaman.Status IS NULL OR peminjaman.Status != 'Dikembalikan'");
$no = 1;
?>

<h1 class="mt-4 ms-5 me-3">Data Peminjaman Buku Perpustakaan</h1>
<div class="breadcrumb mb-4 ms-5 me-3">
    <span class="breadcrumb-item active">Dashboard / Tampilkan Data Peminjaman</span>
</div>
<div class="card mb-4 ms-5 me-3">
    <div class="card-header">
        <i class="fas fa-table me-1"></i>
        Tabel Data Peminjaman Buku Perpustakaan 
    </div>
    <div class="card-body">
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>No</th>

                    <th>Nama Anggota</th>
                    <th>Buku</th>
                    <th>Tanggal</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($data = mysqli_fetch_assoc($query)) : ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $data['Nama_Anggota']; ?></td>
                    <td><?= $data['Judul_Buku']; ?></td>
                    <td><?= $data['Tanggal_Pinjam']; ?></td>
                    <td>
                        <a href="index.php?page=edit_peminjaman&id=<?= $data['Id_Peminjaman']; ?>" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i> Edit
                        </a>
                        <a href="index.php?page=hapus_peminjaman&id=<?= $data['Id_Peminjaman']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus data ini?')"><i class="fas fa-trash"></i> Hapus
                        </a>
                        <a href="index.php?page=kembali&id=<?= $data['Id_Peminjaman']; ?>" class="btn btn-info btn-sm"><i class="fas fa-undo"></i> Kembali
                        </a>
                    </td>
                </tr>    
                <?php endwhile; ?>
            </tbody>
        </table>