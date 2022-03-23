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
        <title>Riwayat - GarudaHotel</title>

        <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="vendors/linericon/style.css">
        <link rel="stylesheet" href="css/font-awesome.min.css">
        <link rel="stylesheet" href="vendors/bootstrap-datepicker/bootstrap-datetimepicker.min.css">
        <link rel="stylesheet" href="vendors/nice-select/css/nice-select.css">
        <link rel="stylesheet" href="vendors/owl-carousel/owl.carousel.min.css">
        <!-- main css -->
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/responsive.css">
    </head>
    <body>
        <!-- Memasukan Header -->
    <?php include('header.php') ?>
        
        <!--================Breadcrumb Area =================-->
        <section class="breadcrumb_area">
            <div class="overlay bg-parallax" data-stellar-ratio="0.8" data-stellar-vertical-offset="0" data-background=""></div>
            <div class="container">
                <div class="page-cover text-center">
                    <h2 class="page-cover-tittle">Riwayat</h2>
                    <ol class="breadcrumb">
                        <li><a href="index.html">Beranda</a></li>
                        <li class="active">Riwayat</li>
                    </ol>
                </div>
            </div>
        </section>
        <!--================Breadcrumb Area =================-->

        <section class="accomodation_area section_gap">
            <div class="container">
                <div class="row g-2">
            <div class="col-12">
                <div class="d-block bg-white rounded shadow p-3">
            <h3 class="text-center" style="color: black;">RIWAYAT CHECK IN <?php echo $_SESSION['nama'] ?></h3>
            <br>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Tanggal Check In</th>
                        <th>Tanggal Check Out</th>
                        <th>Status</th>
                        <th>Total</th>
                        <th>Opsi</th>
                        <th>Print Nota</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no=1;
                    // mendapatkan id_pelanggan yang login dari session
                    $id_tamu = $_SESSION['id_tamu'];

                    $ambil = $conn->query("SELECT * FROM tb_checkin WHERE id_tamu='$id_tamu' ");
                    while($pecah = $ambil->fetch_assoc()){
                    ?>
                    <tr>
                        <td><?php echo $no; ?></td>
                        <td><?php echo $pecah['tanggal'] ?></td>
                        <td><?php echo $pecah['tanggal_checkin'] ?></td>
                        <td><?php echo $pecah['tanggal_checkout'] ?></td>
                        <td>
                            <?php echo $pecah['status_checkin'] ?>
                            </td>
                        <td>Rp, <?php echo number_format($pecah['total_pembayaran']) ?></td>
                        <td>
                            <a href="nota.php?id=<?php echo $pecah['id_checkin'] ?>" class="btn btn-info"><i class="far fa-sticky-note"></i></a>
                             <?php  if ($pecah['status_checkin']=="selesai"): ?>
                             <a href="checkout.php?id=<?php echo $pecah['id_checkin'] ?>" class="btn btn-danger"><i class="fas fa-check-square"></i></a>
                             <?php endif ?> 
                             
                        <?php  if ($pecah['status_checkin']=="pending"): ?>
                            <a href="pembayaran.php?pembayaran_id=<?php echo $pecah['id_checkin']; ?>" class="btn btn-success"><i class="fas fa-money-bill-wave"></i></a>
                        <?php endif ?> 
                        </td>
                        <?php  if ($pecah['status_checkin']=="selesai"): ?>
                        <td><a href=print.php?pid=<?php echo $pecah['id_checkin']; ?> ><button class='btn btn-primary'> <i class='fa fa-print' ></i> Print</button>
                        <?php endif ?> 
                        </td>
                    </tr>
                    <?php $no++; ?> 
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
        </div>
                
            </div>
        </section>

        
       
        <!-- Memasukan Footer -->
        <?php include('footer.php') ?>
        
        
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
        <script src="vendors/lightbox/simpleLightbox.min.js"></script>
        <script src="js/custom.js"></script>
    </body>
</html>