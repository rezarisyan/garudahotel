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
        <title>Nota - GarudaHotel</title>

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
                    <h2 class="page-cover-tittle">Nota</h2>
                    <ol class="breadcrumb">
                        <li><a href="index.html">Beranda</a></li>
                        <li class="active">Nota</li>
                    </ol>
                </div>
            </div>
        </section>
        <!--================Breadcrumb Area =================-->

        <section class="accomodation_area section_gap">
            <div class="container">
                <a href="riwayat.php" class="btn btn-info" style="float:right;"><i class="fas fa-backward"></i></a>
                <h2 class="text-center" style="color:black;">NOTA Anda</h2>
                <br><br>
                <?php
                $ambil = $conn->query("SELECT * FROM tb_checkin JOIN tb_tamu
                    ON tb_checkin.id_tamu=tb_tamu.id_tamu
                    WHERE tb_checkin.id_checkin='$_GET[id]' ");
                $detail = $ambil->fetch_assoc();
                ?>

                <!-- Jika pelanggan yang beli tidak sama dengan pelanggan yang login, maka dilarukan ke riwayat.php
                karena dia tidak berhak melihat nota orang lain -->
                <!-- pelanggan yang beli harus pelanggan yang beli -->
                <?php
                // mendapatkan id_pelanggan yang beli
                $idpelangganyangbeli = $detail['id_tamu'];

                // mendapatkan id_pelanggan yang login
                $idpelangganyanglogin = $_SESSION['tamu']['id_tamu'];

                if ($idpelangganyangbeli!==$idpelangganyanglogin)
                {
                    echo '<script>alert("Bukan Nota Anda")</script>';
                    echo "<script>window.location='riwayat.php';</script>";
                    exit();
                }
                ?> 
                <div class="row">
                    <div class="col-md-6">
                        <h3>Pembayaran</h3>
                        <strong>No. Check IN: <?php echo $detail['id_checkin']; ?> </strong><br>
                        Tanggal:<?php echo $detail['tanggal']; ?> <br>
                        Total: <?php echo number_format($detail['total_pembayaran']); ?>
                    </div>
                    <div class="col-md-6">
                        <h3>Tamu</h3>
                        <strong><?php echo $detail['nama']; ?></strong><br>
                        <?php echo $detail['telepon']; ?><br>
                        <?php echo $detail['email']; ?>
                    </div>
                </div>
                <br>

                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Tanggal Pemesanan</th>
                            <th>Tanggal Check IN</th>
                            <th>Tanggal Check OUT</th>
                            <th>Jumlah Kamar</th>
                            <th>Jumlah Orang</th>
                            <th>Jumlah Hari</th>
                            <th>Jumlah</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no=1; ?>
                        <?php $ambil=$conn->query("SELECT * FROM tb_checkin WHERE id_checkin='$_GET[id]' "); ?>
                        <?php while ($pecah=$ambil->fetch_assoc()) { ?>
                            <tr>
                                <td><?php echo $no; ?></td>
                                <td><?php echo $pecah['tanggal']; ?></td>
                                <td><?php echo $pecah['tanggal_checkin']; ?></td>
                                <td><?php echo $pecah['tanggal_checkin']; ?></td>
                                <td><?php echo $pecah['jml_kamar']; ?></td>
                                <td><?php echo $pecah['jml_orang']; ?></td>
                                <td><?php echo $pecah['jml_hari']; ?></td>
                                <td>Rp, <?php echo number_format($pecah['total_pembayaran']); ?></td>
                                <?php $no++; ?>
                                          
                        </tr>
                    </tbody>
                </table>


                <div class="row">
                    <div class="col-md-7">
                        <?php  if ($detail['status_checkin']=="pending"): ?>
                        <div class="alert alert-info">
                            <p>
                                Silahkan melakukan pembayaran Rp. <?php echo number_format($detail['total_pembayaran']); ?>
                                
                            </p>
                        </div>
                        
                        <a href="pembayaran.php?pembayaran_id=<?php echo $pecah['id_checkin']; ?>" class="btn btn-info">Bayar</a>
                        <?php endif ?>
                        <?php } ?>
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