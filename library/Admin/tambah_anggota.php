<?php
include '../koneksi.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $nama_anggota = $_POST['nama_anggota'];
    $alamat = $_POST['alamat'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cekemail = mysqli_query($conn, "SELECT*from anggota WHERE email = '$email'");

    if(mysqli_num_rows($cekemail) >0 ){
        echo "<script>alert('Email Sudah Terdaftar');</script>";
    } else {
        $insert = mysqli_query($conn, "INSERT INTO anggota(Nama_Anggota, Alamat, Jenis_Kelamin, Email, Password) VALUES ('$nama_anggota', '$alamat', '$jenis_kelamin', '$email', '$password')");
        if($insert){
            echo " <script>
            alert('Data Berhasil Dimasukkan');
            window.location.href = 'index.php?page=data_anggota';
            </script>";
        }
        else{
            echo "<script>alert('Data Gagal Ditambahkan');</script>";
        }
    } 
}
?>

<h1 class="mt-4 ms-5 me-3">Tambah Data Anggota</h1>
<div class="breadcrumb mb-4 ms-5 me-3">
    <span class="breadcrumb-item active">Dashboard / Tambah Data Anggota</span>
</div>
<div class="card mb-4 ms-5 me-3">
    <div class="card-header">
        <i class="fas fa-plus me-1"></i>
        Form Tambah Data Anggota 
    </div>
    <div class="card-body">
        <form method="post" action="" enctype="multipart/form-data">
            <div class="form-floating mb-3">
                <input class="form-control" id="inputName" type="text" placeholder="Masukkan Nama" name="nama_anggota" required />
                <label for="inputName">Nama Anggota</label>
            </div>
            <div class="form-floating mb-3">
                <input class="form-control" id="inputAlamat" type="text" placeholder="Masukkan Alamat" name="alamat" required />
                <label for="inputAlamat">Alamat</label>
            </div>
            <div class="form-floating mb-3">
                <select class="form-select" id="inputjenis_kelamin" name="jenis_kelamin">
                    <option value="">====Jenis Kelamin====</option>
                    <option value="Laki-laki">Laki-laki</option>
                    <option value="Perempuan">Perempuan</option>
                </select>
                <label for="inputjenis_kelamin">Jenis Kelamain</label>
            </div>
             <div class="form-floating mb-3">
                <input class="form-control" id="inputEmail" type="email" name="email" placeholder="name@example.com" />
                <label for="inputEmail">Email</label>
            </div>
            <div class="form-floating mb-3">
                <input class="form-control" id="inputPassword" type="password" name="password" placeholder="Create a password" />
                <label for="inputPassword">Password</label>
            </div>
            <div class="mt-4 mb-3">
                <div class="d-flex justify-content-between">
                    <input type="submit" class="btn btn-primary btn-block" value="Tambah Data" href="index.php?page=data_anggota">
                    <input type="reset" class="btn btn-danger btn-block" value="Reset Data">
                </div>
            </div>
        </form>
    </div>
</div>