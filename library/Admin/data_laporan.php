<style>
    @media print {
        #cetak {
            display: none;
        }
    }
</style>

<h1 class="mt-4">Laporan Data Peminjaman Buku Perpustakaan</h1>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active">Dashboard / Laporan Data Peminjaman</li>
</ol>
<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-table me-1"></i>
        Tabel Laporan Data Peminjaman Buku Perpustakaan
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
                <?php
                    include '../koneksi.php';
                    $query = mysqli_query($conn, "SELECT peminjaman.*, anggota.Nama_Anggota, buku.Judul_Buku FROM peminjaman INNER JOIN anggota ON anggota.Id_Anggota = peminjaman.Id_Anggota INNER JOIN buku ON buku.Id_Buku = peminjaman.Id_Buku");
                    $no = 1;
                ?>

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

        <button id="cetak" class="btn btn-primary mt-3" onclick="window.print()"><i class="fas fa-print"></i> Cetak Laporan</button>
    </div>