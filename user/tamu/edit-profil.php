<?php 
session_start();
include 'koneksi.php';
//berfungsi mengecek apakah user sudah login atau belum
if($_SESSION['level_user']==""){
    echo '<script>alert("login terlebih dahulu")</script>';
    echo '<script>window.location="/index.php"</script>';
}

?>  
<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="icon" href="image/favicon.png" type="image/png">
        <title>Pengaturan - GarudaHotel</title>
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="vendors/linericon/style.css">
        <link rel="stylesheet" href="css/font-awesome.min.css">
        <link rel="stylesheet" href="vendors/bootstrap-datepicker/bootstrap-datetimepicker.min.css">
        <link rel="stylesheet" href="vendors/nice-select/css/nice-select.css">
        <link rel="stylesheet" href="vendors/owl-carousel/owl.carousel.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
        <!-- main css -->
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/responsive.css">
        <link rel="stylesheet" type="text/css" href="css/pengaturan.css">
    </head>
    <body>
        <!-- Memasukan Header -->
    <?php include('header.php') ?>
        
        <!--================Breadcrumb Area =================-->
        <section class="breadcrumb_area">
            <div class="overlay bg-parallax" data-stellar-ratio="0.8" data-stellar-vertical-offset="0" data-background=""></div>
            <div class="container">
                <div class="page-cover text-center">
                    <h2 class="page-cover-tittle">Pengaturan</h2>
                    <ol class="breadcrumb">
                        <li><a href="index.html">Beranda</a></li>
                        <li class="active">Pengaturan</li>
                    </ol>
                </div>
            </div>
        </section>
        <!--================Breadcrumb Area =================-->
        
        <div class="row py-5 px-4">
    <div class="col-md-5 mx-auto">
        <!-- Profile widget -->
        <div class="bg-white shadow rounded overflow-hidden">
            <div class="px-4 pt-0 pb-4 cover">
                <div class="media align-items-end profile-head">
                    <div class="profile mr-3"><img src="/hotelrezar/user/tamu/profiluser/<?php echo $_SESSION['foto']; ?>" alt="..." width="130" class="rounded mb-2 img-thumbnail">
                        <a href="ubah-foto-profil.php" class="btn btn-outline-dark btn-sm btn-block">Ubah Foto Profil</a></div>
                    <div class="media-body mb-5 text-white">
                        <h4 class="mt-0 mb-0"><?php echo $_SESSION['nama']; ?></h4>
                        <p class="small mb-4"> <i class="fas fa-map-marker-alt mr-2"></i><?php echo $_SESSION['alamat']; ?></p>
                    </div>
                </div>
            </div>
            <div class=" p-4 d-flex justify-content-end text-center">
                
            </div>
            <br>
            <br>
            <div class="px-4 py-3">
                <h5 class="mb-0">Ubah Profil</h5>
                <br>
                <form action="ubah-profil.php" method="POST">
                <div class="p-4 rounded shadow-sm bg-light">
                    <div class="form-group">
                        <label for="firstname">Nama</label>
                        <input type="text" name="nama" class="form-control" placeholder="<?php echo $_SESSION['nama']; ?>" required />
                    </div>
                    <div class="form-group">
                        <label for="firstname">Username</label>
                        <input type="text" name="username" class="form-control" placeholder="<?php echo $_SESSION['username']; ?>" required />
                    </div>
                    <div class="form-group">
                    <label for="inputEmail4">Email</label>
                    <input type="email" class="form-control" name="email" placeholder="<?php echo $_SESSION['email']; ?>" required />
                    </div>
                    <div class="form-group">
                    <label for="inputAddress5">Alamat</label>
                    <input type="text" class="form-control" name="alamat" placeholder="<?php echo $_SESSION['alamat']; ?>" required />
                    </div>
                    <div class="form-group">
                        <label for="inputCompany5">Telepon</label>
                        <input type="text" class="form-control" name="telepon" placeholder="<?php echo $_SESSION['telepon']; ?>" required />
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
</div>
</div>

        
        <!-- Memasukan Footer -->
        <?php include('footer.php') ?> 

       
       <!--================Contact Success and Error message Area =================-->
        <div id="success" class="modal modal-message fade" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <i class="fa fa-close"></i>
                        </button>
                        <h2>Thank you</h2>
                        <p>Your message is successfully sent...</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modals error -->

        <div id="error" class="modal modal-message fade" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <i class="fa fa-close"></i>
                        </button>
                        <h2>Sorry !</h2>
                        <p> Something went wrong </p>
                    </div>
                </div>
            </div>
        </div>
        <!--================End Contact Success and Error message Area =================-->
        
        
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="js/jquery-3.2.1.min.js"></script>
        <script src="js/popper.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="vendors/owl-carousel/owl.carousel.min.js"></script>
        <script src="js/jquery.ajaxchimp.min.js"></script>
        <script src="vendors/bootstrap-datepicker/bootstrap-datetimepicker.min.js"></script>
        <script src="vendors/nice-select/js/jquery.nice-select.js"></script>
        <script src="js/mail-script.js"></script>
        <script src="js/stellar.js"></script>
        <script src="vendors/imagesloaded/imagesloaded.pkgd.min.js"></script>
        <script src="vendors/isotope/isotope-min.js"></script>
        <script src="js/stellar.js"></script>
        <script src="vendors/lightbox/simpleLightbox.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <!--gmaps Js-->
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjCGmQ0Uq4exrzdcL6rvxywDDOvfAu6eE"></script>
        <script src="js/gmaps.min.js"></script>
        <!-- contact js -->
        <script src="js/jquery.form.js"></script>
        <script src="js/jquery.validate.min.js"></script>
        <script src="js/contact.js"></script>
        <script src="js/custom.js"></script>
    </body>
</html>