<?php 
session_start();
include 'koneksi.php';

$queryx1 = $conn->query("SELECT * FROM tb_room WHERE status_hotel='Tersedia'");
$queryx2 = $conn->query("SELECT * FROM tb_room");
$queryx3 = $conn->query("SELECT * FROM tb_room WHERE status_hotel='Terisi'");
$queryx4 = $conn->query("SELECT * FROM tb_kritik");
$queryx5 = $conn->query("SELECT * FROM tb_checkin");
$queryx6 = $conn->query("SELECT * FROM tb_checkout");

$jml_kamarterisi = mysqli_num_rows($queryx3);
$jml_kamar = mysqli_num_rows($queryx2);
$jml_kamarkosong = mysqli_num_rows($queryx1);
$jml_kritik = mysqli_num_rows($queryx4);
$jml_checkin = mysqli_num_rows($queryx5);
$jml_checkout = mysqli_num_rows($queryx6);


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
    <title>Dashboard - GarudaHotel</title>
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

            <!-- Sale & Revenue Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fas fa-bed fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">TOTAL KAMAR SELURUHNYA</p>
                                <h6 class="mb-0"><?php echo $jml_kamar ?> Kamar</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fas fa-bed fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">TOTAL KAMAR KOSONG</p>
                                <h6 class="mb-0"><?php echo $jml_kamarkosong ?> Kamar</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fas fa-procedures fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">TOTAL KAMAR TERISI</p>
                                <h6 class="mb-0"><?php echo $jml_kamarterisi ?> Kamar</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fas fa-mail-bulk fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">TOTAL KRITIK & SARAN</p>
                                <h6 class="mb-0"><?php echo $jml_kritik ?> Kritik</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-6">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fas fa-check-circle fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">TOTAL CHECK-IN</p>
                                <h6 class="mb-0"><?php echo $jml_checkin ?> Orang</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-6">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fas fa-money-check fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">TOTAL CHECK-OUT</p>
                                <h6 class="mb-0"><?php echo $jml_checkout ?> Orang</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Sale & Revenue End -->

            


            <!-- Widgets Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    
                    <div class="col-sm-12 col-md-6 col-xl-4">
                        <div class="h-100 bg-light rounded p-4">
                            <div class="d-flex align-items-center justify-content-between mb-4">
                                <h6 class="mb-0">Calender</h6>
                                <a href="">Show All</a>
                            </div>
                            <div id="calender"></div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Widgets End -->


            
        </div>
        <!-- Content End -->

  
        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

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