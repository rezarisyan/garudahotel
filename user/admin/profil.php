<?php 
session_start();

//berfungsi mengecek apakah user sudah login atau belum
if($_SESSION['level_user']==""){
    echo '<script>alert("login terlebih dahulu")</script>';
    echo '<script>window.location="/hotelrezar/login-admin.php"</script>';
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Profil - GarudaHotel</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.png" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <!-- Memasukan Header -->
    <?php include('header.php') ?>
<main>
<div class="container">
<div class="row justify-content-center">
    <div class="col-12 col-lg-10 col-xl-8 mx-auto">
        <h2 class="h3 mb-4 page-title">Pengaturan</h2>
        <div class="my-4">
            <ul class="nav nav-tabs mb-4" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="false">Profil</a>
                </li>
            </ul>
            <form action="ubah-profil.php" method="POST">
                <div class="row mt-5 align-items-center">
                    <div class="col-md-3 text-center mb-5">
                        <div class="avatar avatar-xl">
                            <img src="./profiladmin/<?php echo $_SESSION['foto1']; ?>" class="avatar-img rounded-circle" style="width: 100px; height: 100px;" />
                        </div>
                    </div>
                    <div class="col">
                        <div class="row align-items-center">
                            <div class="col-md-7">
                                <h4 class="mb-1"><?php echo $_SESSION['nama1']; ?></h4>
                                <p class="small mb-3"><span><?php echo $_SESSION['alamat1']; ?></span></p>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-md-7">
                                <p class="text-muted">
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris blandit nisl ullamcorper, rutrum metus in, congue lectus. In hac habitasse platea dictumst. Cras urna quam, malesuada vitae risus at,
                                    pretium blandit sapien.
                                </p>
                            </div>
                            <div class="col">
                                <p class="small mb-0 text-muted"></p>
                                <p class="small mb-0 text-muted"></p>
                                <p class="small mb-0 text-muted"></p>
                            </div>
                        </div>
                    </div>
                </div>
                <hr class="my-4" />
                <div class="form-row">
                    <div class="form-group">
                        <label for="firstname">Nama</label>
                        <input type="text" name="nama" class="form-control" placeholder="<?php echo $_SESSION['nama1']; ?>" required />
                    </div>
                </div>
                <div class="form-group">
                        <label for="firstname">Username</label>
                        <input type="text" name="username" class="form-control" placeholder="<?php echo $_SESSION['username1']; ?>" required />
                    </div>
                <div class="form-group">
                    <label for="inputEmail4">Email</label>
                    <input type="email" class="form-control" name="email" placeholder="<?php echo $_SESSION['email1']; ?>" required />
                </div>
                <div class="form-group">
                    <label for="inputAddress5">Alamat</label>
                    <input type="text" class="form-control" name="alamat" placeholder="<?php echo $_SESSION['alamat1']; ?>" required />
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label for="inputCompany5">Telepon</label>
                        <input type="text" class="form-control" name="telepon" placeholder="<?php echo $_SESSION['telepon1']; ?>" required />
                    </div>
                </div>
                <br>
                <button type="submit" name="submit" class="btn btn-primary">Ubah</button>
                </form>
              	<form action="ubah-katasandi.php" method="POST">
                <hr class="my-4" />
                <div class="row mb-4">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="inputPassword4">Kata sandi Lama</label>
                            <input type="password" class="form-control" name="passlama" />
                        </div>
                        <div class="form-group">
                            <label for="inputPassword5">Kata sandi Baru</label>
                            <input type="password" class="form-control" name="pass1" />
                        </div>
                        <div class="form-group">
                            <label for="inputPassword6">Konfirmasi kata sandi</label>
                            <input type="password" class="form-control" name="pass2" />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <p class="mb-2">Persyaratan kata sandi</p>
                        <p class="small text-muted mb-2">Untuk membuat kata sandi baru, Anda harus memenuhi semua persyaratan berikut:</p>
                        <ul class="small text-muted pl-4 mb-0">
                            <li>Minimal 8 karakter</li>
                            <li>Setidaknya satu karakter khusus</li>
                            <li>Setidaknya satu nomor</li>
                            <li>Tidak boleh sama dengan password sebelumnya</li>
                        </ul>
                    </div>
                </div>
                <button type="submit" name="ubah_password" class="btn btn-primary">Ubah</button>
            </form>
 			
        </div>
    </div>
</div>

</div>
</main>
<!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/chart/chart.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>