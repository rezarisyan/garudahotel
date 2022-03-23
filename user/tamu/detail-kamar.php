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
        <title>Detail Kamar - GarudaHotel</title>
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
                    <h2 class="page-cover-tittle">Detail Kamar</h2>
                    <ol class="breadcrumb">
                        <li><a href="index.html">Beranda</a></li>
                        <li class="active">Detail Kamar</li>
                    </ol>
                </div>
            </div>
        </section>
        <!--================Breadcrumb Area =================-->

        <section class="accomodation_area section_gap">
            <div class="container">
                <strong><h2 class="title_color">Booking Kamar</h2></strong>
                <br />
                <?php 
                    $query = $conn->query("SELECT * FROM tb_room JOIN tb_kelas ON tb_room.id_kelas=tb_kelas.id_kelas WHERE id_room = '$_REQUEST[room_id]'") or die(mysql_error());
                    $k = $query->fetch_array();
                ?>
                <img src="/hotelrezar/user/admin/image/<?php echo $k['gambar_hotel']?>" class="img-thumbnail" alt="..." height = "650" width = "750">
                <div class = "well col-md-4" style="float:right; border:1px solid #ccc; background-color:  #1b3771;">
                    <br>
                    <?php  if ($k['status_hotel']=="Tersedia"): ?> 
                    <form method = "POST" enctype = "multipart/form-data">
                        <h3 style="color:white; text-align: center;">Rp. <?php echo number_format($k['harga_hotel']) ?>/Malam</h3>
                        <h5 style="color:white; text-align: center;"><?php echo $k['status_hotel'] ?></h5>
                        <br>
                        <br>
                        <div class = "form-group">
                            <h5 style="color:white;">CHECK IN</h5>
                            <input name="tgl_checkin" type = "date" class = "form-control" required = "required" />
                        </div>
                        <div class = "form-group">
                            <h5 style="color:white;">CHECK OUT</h5>
                            <input name="tgl_checkout" type = "date" class = "form-control" required = "required" />
                        </div>
                        <div class = "form-group">
                            <h5 style="color:white;">JUMLAH KAMAR</h5>
                            <select name="jmlkamar" class="form-select" aria-label="Default select example">
                            <option selected>Pilih Jumlah Kamar</option>
                             <?php
                             $jml_kamar=array("","1","2","3","4");
                             for ($i=1;$i<=4;$i++)
                             {
                               echo "<option value=".$i.">".$jml_kamar[$i]."</option>";
                             }
                            ?>     
                            </select>
                        </div>
                        <br>
                        <br>
                        <div class = "form-group">
                            <h5 style="color:white;">   </h5>
                            <select name="jmlorang" class="form-select" aria-label="Default select example">
                            <option selected>Pilih Jumlah Orang</option>
                            <?php
                             $jml_orang=array("","1 Orang","2 Orang","3 Orang","4 Orang","5 Orang");
                             for ($i=1;$i<=5;$i++)
                             {
                               echo "<option value=".$i.">".$jml_orang[$i]."</option>";
                             }
                            ?>            
                            </select>
                        </div>
                        <br />
                        <br>
                        <br>
                        <div class = "form-group">
                            <button class=" btn btn-info form-control" name="submit">Submit</button>
                        </div>
                    </form>
                    <?php endif ?>
                    <?php 

                    // jika ada tombol kirim
                    if (isset($_POST['submit']))
                    {
                        $id_tamu = $_SESSION['id_tamu'];
                        $checkin = $_POST['tgl_checkin'];
                        $checkout = $_POST['tgl_checkout'];
                        $jml_kamar = $_POST['jmlkamar'];
                        $jml_orang = $_POST['jmlorang'];
                        $tanggal = date("Y-m-d");

                        $awal  = new DateTime($checkin);
                        $akhir = new DateTime($checkout);
                        $diff  = $awal->diff($akhir);

                        $rentang = $diff->d;


                        // mendapatkan id_produk dari url
                        $id_room = $_GET['room_id']; 


                        $ambil = $conn->query("SELECT * FROM tb_room 
                                WHERE id_room='$id_room'");
                            $pecah = $ambil->fetch_assoc();
                            $total = $pecah["harga_hotel"]*$rentang*$jml_kamar;

                    // simpan pembayaran
                    $conn->query("INSERT INTO tb_checkin (id_tamu,id_room,tanggal_checkin,tanggal_checkout,tanggal,jml_kamar,jml_orang,jml_hari,total_pembayaran)
                        VALUES ('$id_tamu','$id_room','$checkin','$checkout','$tanggal','$jml_kamar','$jml_orang','$rentang','$total') ");

                    // mendapatkan id_pembelian barusan terjadi
                    $id_checkin_barusan = $conn->insert_id;

                    // tampilan dialihkan ke halaman nota, nota dari pembelian yang barusan
                    echo '<script>alert("CheckIn sukses")</script>';
                    echo "<script>window.location='tagihan.php?tagihan_id=$id_checkin_barusan';</script>";

                    } 

                    ?>
                </div>
                <div style = "float:left;">
                    <h3 style= "color:black;"><?php echo $k['kelas_nama']?></h3>
                    <h5><?php echo $k['status_hotel']?></h5>
                    <h5 style="color: black;">Fasilitas In Door</h5>
                    <p><?php echo $k['fasilitas_indoor'] ?></p>
                    <h5 style="color: black;">Fasilitas Out Door</h5>
                    <p><?php echo $k['fasilitas_outdoor'] ?></p>
                </div>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
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