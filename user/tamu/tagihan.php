<?php 
session_start();
include 'koneksi.php';
//berfungsi mengecek apakah user sudah login atau belum
if($_SESSION['level_user']==""){
    echo '<script>alert("login terlebih dahulu")</script>';
    echo '<script>window.location="/index.php"</script>';
}

$query = $conn->query("SELECT * FROM tb_room WHERE id_room = '$_REQUEST[tagihan_id]'") or die(mysql_error());
    $k = $query->fetch_array();
?> 
<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="icon" href="image/favicon.png" type="image/png">
        <title>Tagihan - GarudaHotel</title>
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
                    <h2 class="page-cover-tittle">Tagihan</h2>
                    <ol class="breadcrumb">
                        <li><a href="index.html">Beranda</a></li>
                        <li class="active">Tagihan</li>
                    </ol>
                </div>
            </div>
        </section>
        <!--================Breadcrumb Area =================-->

        <section class="accomodation_area section_gap">
            <div class="container">
                <div class="row g-2 mb-3">
                    <div class="col-12">
                        <div class="d-block bg-white rounded shadow p-3">
                            <h3 class="text-center font-weight-bold">Tagihan Anda</h3><br>
                            <?php 

                            $queryc = $conn->query("SELECT * FROM tb_checkin WHERE id_checkin ='$_REQUEST[tagihan_id]'") or die(mysql_error());
                            $c = $queryc->fetch_array();

                            ?>
                                <table  class="table">
                                    <thead>
                                        <tr>
                                            <th>Tanggal</th>
                                            <th>Check IN</th>
                                            <th>Check OUT</th>
                                            <th>Jumlah Orang</th>
                                            <th>Jumlah Kamar</th>
                                            <th>Jumlah Hari</th>
                                            <th>Status</th>
                                        </tr>
                                     
                                <tbody>
                                    
                                    <tr class="table-light" >
                                        <td>2022-03-13</td>
                                        <td><?php echo $c['tanggal_checkin']?></td>
                                        <td><?php echo $c['tanggal_checkout']?></td>
                                        <td><?php echo $c['jml_orang']?> Orang</td>
                                        <td><?php echo $c['jml_kamar']?> Orang</td>
                                        <td><?php echo $c['jml_hari']?> Hari</td>
                                        <td><?php echo $c['status_checkin']?></td>
                                    </tr>

                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="6">Total Tagihan</td>
                                        <td class="table-success">Rp. <?php echo number_format($c['total_pembayaran']) ?></td>
                                    </tr>
                                </tfoot>
                                </thead>
                                </table>
                                <form method="post">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" readonly value="<?php echo $_SESSION['nama'] ?>" class="form-control">
                                </div> 
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" readonly value="<?php echo $_SESSION['telepon'] ?>" class="form-control">
                                </div>
                            </div>
                    </form>
                    <div class = "form-group">
                                <a  href = "pembayaran.php?pembayaran_id=<?php echo $c['id_checkin']?>" class = "btn btn-success form-control">Bayar Sekarang</a>
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