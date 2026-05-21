<?php 
include "koneksi.php";
session_start();

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $nama_user = $_POST['nama_user'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $role = $_POST['role'];
    $cekemail = mysqli_query($conn, "SELECT*from user WHERE email = '$email'");

    if(mysqli_num_rows($cekemail) >0 ){
        echo "<script>alert('Email Sudah Terdaftar');</script>";
    } else {
        $insert = mysqli_query($conn, "INSERT INTO user(Nama_User, Email, Password, Role) VALUES ('$nama_user', '$email', '$password', '$role')");
        if($insert){
            echo "<script>alert('Data Berhasil Dimasukkan');</script>";
            header('location: login.php');
            exit;
        }
        else{
            echo "<script>alert('Data Gagal Ditambahkan');</script>";
        }
    } 
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Register Anggota</title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-7">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Create User</h3></div>
                                    <div class="card-body">
                                        <form method="POST" action="register_user.php">

                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="inputNama_User" type="text" name="nama_user"/>
                                                <label for="inputNama_User">Nama User</label>
                                            </div>

                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="inputEmail" type="email" name="email" placeholder="name@example.com" />
                                                <label for="inputEmail">Email</label>
                                            </div>

                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="inputPassword" type="password" name="password" placeholder="Create a password" />
                                                        <label for="inputPassword">Password</label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-floating mb-3">
                                                <select class="form-select" id="inputRole" name="role">
                                                  <option value="">====Role====</option>
                                                  <option value="Admin">Admin</option>
                                                  <option value="Petugas">Petugas</option>
                                                </select>
                                                <label for="inputRole">Role</label>
                                            </div>
                                                                                    
                                            <div class="mt-4 mb-0">
                                                <div class="d-grid"> <input type="submit" value="Login" class="btn btn-primary"></div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center py-3">
                                        <div class="small"><a href="login.php">Go to login</a> ||<a href="register.php"> Back</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <div id="layoutAuthentication_footer">
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2023</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>
