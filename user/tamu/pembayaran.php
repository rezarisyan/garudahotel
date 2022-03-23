<?php 
session_start();
include 'koneksi.php';
//berfungsi mengecek apakah user sudah login atau belum
if($_SESSION['level_user']==""){
    echo '<script>alert("login terlebih dahulu")</script>';
    echo '<script>window.location="/index.php"</script>';
}
  

// mendapatkan id_checkin dari url
$idc = $_GET['pembayaran_id'];
$ambil = $conn->query("SELECT * FROM tb_checkin WHERE id_checkin='$idc' ");
$detc = $ambil->fetch_assoc();

$id_room = $detc['id_room'];

// mengambil data room berdasarkan id_pembayaran
$ambil2 = $conn->query("SELECT * FROM tb_room WHERE id_room='$id_room'");
$detail2 = $ambil2->fetch_assoc();



// mendapatkan id_tamu yang check-in
$id_tamu_checkin = $detc['id_tamu'];
// mendapatkan id_pelanggan yang login
$id_tamu_login = $_SESSION['id_tamu'];

if ($id_tamu_login !== $id_tamu_checkin) 
{

    exit();
}

?> 
<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="icon" href="image/favicon.png" type="image/png">
        <title>Pembayaran - GarudaHotel</title>
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
                    <h2 class="page-cover-tittle">Pembayaran</h2>
                    <ol class="breadcrumb">
                        <li><a href="index.html">Beranda</a></li>
                        <li class="active">Pembayaran</li>
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
                            <h3 class="text-center font-weight-bold">Pembayaran Anda</h3><br>

                                <table  class="table">
                                    <thead>
                                        <tr>
                                            <th>Tanggal</th>
                                            <th>Check IN</th>
                                            <th>Check OUT</th>
                                            <th>Jumlah</th>
                                            <th>Hari</th>
                                            <th>Status</th>
                                        </tr>
                                    
                                <tbody>
                                    
                                    <tr class="table-light" >
                                        <td>2022-03-13</td>
                                        <td><?php echo $detc['tanggal_checkin'] ?></td>
                                        <td><?php echo $detc['tanggal_checkout'] ?></td>
                                        <td><?php echo $detc['jml_orang'] ?> Orang</td>
                                        <td>2 Hari</td>
                                        <td><?php echo $detc['status_checkin'] ?></td>
                                    </tr>

                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="5">Total Tagihan</td>
                                        <td>Rp. <?php echo number_format($detc['total_pembayaran']) ?></td>
                                    </tr>
                                </tfoot>
                                </thead>
                                </table>
                                <form method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" name="nama" readonly value="<?php echo $_SESSION['nama'] ?>" class="form-control">
                                </div> 
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" readonly value="<?php echo $_SESSION['telepon'] ?>" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <h4>Jumlah Pembayaran</h4>
                                    <div class="alert alert-success" role="alert">
                                      Rp. <?php echo number_format($detc['total_pembayaran']) ?>
 
                                    </div>
                                    <input type="text" name="jumlah" class="form-control" value="<?php echo $detc['total_pembayaran'] ?>">
                                </div> 
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <h4>Masukan Jenis Bank</h4>
                                    <input type="text" name="bank" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <h4>Kirim Bukti Pembayaran</h4>
                            <div class="input-group mb-3">
                              <input type="file" class="form-control" name="bukti" >
                              <label class="input-group-text" for="inputGroupFile02"></label>
                            </div>

                    
                                <div class = "form-group">
                            <button class=" btn btn-info form-control" name="bayar">Bayar Sekarang</button>
                                </form>

                                <?php
                                // jika ada tombol kirim
                                if (isset($_POST['bayar'])) 
                                {
                                    // Upload foto bukti
                                    $namabukti = $_FILES['bukti']['name'];
                                    $lokasibukti = $_FILES['bukti']['tmp_name'];
                                    $namafiks = date("YmdHis").$namabukti;
                                    move_uploaded_file($lokasibukti, "buktipembayaran/$namafiks");

                                    $nama = $_POST['nama'];
                                    $bank = $_POST['bank'];
                                    $jumlah = $_POST['jumlah'];
                                    $tanggal = date("Y-m-d");
                                    $id_room1 = $detail2['id_room'];

                                    // simpan pembayaran
                                    $conn->query("INSERT INTO tb_pembayaran(id_checkin,nama,bank,jumlah,tanggal,bukti)
                                        VALUES ('$idc','$nama','$bank','$jumlah','$tanggal','$namafiks') ");

                                    // update data pembeliannya dari pending menjadi sudah kirim pembayaran
                                    $conn->query("UPDATE tb_checkin SET status_checkin='tunggu-konfimasi-admin'
                                        WHERE id_checkin='$idc'");

                                    $conn->query("UPDATE tb_room SET status_hotel='Dipesan'
                                    WHERE id_room='$id_room1'");

                                    echo '<script>alert("Terimakasih sudah mengirimkan bukti pembayaran")</script>';
                                    echo '<script>window.location="riwayat.php"</script>';
                                }
                                ?>

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