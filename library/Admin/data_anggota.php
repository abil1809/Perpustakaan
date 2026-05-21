    <?php
    include '../koneksi.php';

    $query = mysqli_query($conn, "SELECT * FROM anggota");
    $no = 1;
    ?>

    <h1 class="mt-4 ms-5 me-3">Data Anggota</h1>
    <div class="breadcrumb mb-4 ms-5 me-3">
        <span class="breadcrumb-item active">Dashboard / Tampilkan Data Anggota</span>
    </div>
    <div class="card mb-4 ms-5 me-3">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Tabel Data Anggota
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead class="table-dark">
                    <tr>
                        <th>No</th>

                        <th>Nama Anggota</th>
                        <th>Alamat</th>
                        <th>Jenis Kelamin</th>
                        <th>Email</th>
                        <th>Password</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($data = mysqli_fetch_assoc($query)) : ?>
                    <tr>
                        <td><?= $no++; ?></td>

                        <td><?= $data['Nama_Anggota']; ?></td>
                        <td><?= $data['Alamat']; ?></td>
                        <td><?= $data['Jenis_Kelamin']; ?></td>
                        <td><?= $data['Email']; ?></td>
                        <td><?= $data['Password']; ?></td>
                        <td>
                            <a href="index.php?page=edit_anggota&id=<?= $data['Id_Anggota']; ?>" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i> Edit
                            </a>
                            <a href="index.php?page=hapus_anggota&id=<?= $data['Id_Anggota']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus data ini?')"><i class="fas fa-trash"></i> Hapus
                            </a>
                        </td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
