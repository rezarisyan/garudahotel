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
        <title>Tentang Kami - GarudaHotel</title>
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
                    <h2 class="page-cover-tittle">Tentang Kami</h2>
                    <ol class="breadcrumb">
                        <li><a href="index.html">Beranda</a></li>
                        <li class="active">Tentang</li>
                    </ol>
                </div>
            </div>
        </section>
        <!--================Breadcrumb Area =================-->
        
        <!--================ visi misi Area  =================-->
        <section class="about_history_area section_gap">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 d_flex align-items-center">
                        <div class="about_content ">
                            <h2 class="title title_color">Tentang kami<br>Misi & Visi</h2>
                            <p>Visi<br>kami Menjadi perusahaan perhotelan yang profesional dan selalu berusaha meningkatkan kualitas pelayanan dengan menjaga kearifan lokal, dan mendiversifikasi risiko bisnis dengan berinvestasi pada perusahaan yang dapat memberikan nilai tambah bagi stakeholders.<br>Misi<br>Selalu berinovasi untuk menciptakan produk hotel yang memiliki karakteristik unik dan memberikan pelayanan internasional. Mengembangkan bisnis Perusahaan ke arah yang lebih baik dengan berinvestasi pada perusahaan yang dapat meningkatkan bisnis Perusahaan secara finansial dan operasional. Menciptakan sumber daya manusia yang profesional dan selalu dapat meningkatkan kinerja Perusahaan.</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <img  style="width: 750px;" src="/hotelrezar/user/admin/img/logo-garuda-hotel.png" alt="img">
                    </div>
                </div>
            </div>
        </section>
        <!--================ visi misi Area  =================-->
        
         <!--================ Facilities Area  =================-->
        <section class="facilities_area section_gap">
            <div class="overlay bg-parallax" data-stellar-ratio="0.8" data-stellar-vertical-offset="0" data-background="">  
            </div>
            <div class="container">
                <div class="section_title text-center">
                    <h2 class="title_w">Garuda Fasilitas</h2>
                    <p>Kami menyediakan berbagai fasilitas .</p>
                </div>
                <div class="row mb_30">
                    <div class="col-lg-6 col-md-6">
                        <div class="facilities_item">
                            <h2 class="title_w">Fasilitas OutDoor</h2>
                            <h4 class="sec_h4"><i class="lnr lnr-dinner" style="color:#00BFFF ;"></i>Restoran</h4>
                            <h4 class="sec_h4"><i class="lnr lnr-bicycle" style="color:#00BFFF ;"></i>Klub olahraga</h4>
                            <h4 class="sec_h4"><i class="lnr lnr-shirt" style="color:#00BFFF ;"></i>Kolam renang</h4>
                            <h4 class="sec_h4"><i class="lnr lnr-car" style="color:#00BFFF ;"></i>Menyewa mobil</h4>
                            <h4 class="sec_h4"><i class="lnr lnr-construction" style="color:#00BFFF ;"></i>Gym</h4>
                            <h4 class="sec_h4"><i class="lnr lnr-coffee-cup" style="color:#00BFFF ;"></i>Bar</h4>
                            <h4 class="sec_h4"><i class="lnr lnr-coffee-cup" style="color:#00BFFF ;"></i>Minimarket</h4>
                            <h4 class="sec_h4"><i class="lnr lnr-coffee-cup" style="color:#00BFFF ;"></i>Atm Mini</h4>
                            <h4 class="sec_h4"><i class="lnr lnr-coffee-cup" style="color:#00BFFF ;"></i>Taman</h4>
                            <h4 class="sec_h4"><i class="lnr lnr-coffee-cup" style="color:#00BFFF ;"></i>Parkit</h4>

                            
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="facilities_item">
                            <h2 class="title_w">Fasilitas InDoor</h2>
                            <h4 class="sec_h4"><i class="lnr lnr-bicycle" style="color:#00BFFF ;"></i>Wi-Fi Internet gratis</h4>
                            <h4 class="sec_h4"><i class="lnr lnr-bicycle" style="color:#00BFFF ;"></i>Kamar mandi mandi</h4>
                            <h4 class="sec_h4"><i class="lnr lnr-bicycle" style="color:#00BFFF ;"></i>Ukuran kamar</h4>
                            <h4 class="sec_h4"><i class="lnr lnr-bicycle" style="color:#00BFFF ;"></i>TV</h4>
                            <h4 class="sec_h4"><i class="lnr lnr-bicycle" style="color:#00BFFF ;"></i>AC</h4>
                            <h4 class="sec_h4"><i class="lnr lnr-bicycle" style="color:#00BFFF ;"></i>Kopi/teh</h4>
                            <h4 class="sec_h4"><i class="lnr lnr-bicycle" style="color:#00BFFF ;"></i>Ruangan bebas rokok</h4>
                            <h4 class="sec_h4"><i class="lnr lnr-bicycle" style="color:#00BFFF ;"></i>Seprai kualitas premium</h4>
                            <h4 class="sec_h4"><i class="lnr lnr-bicycle" style="color:#00BFFF ;"></i>Housekeeping harian</h4>
                            <h4 class="sec_h4"><i class="lnr lnr-bicycle" style="color:#00BFFF ;"></i> Tipe Matras</h4>

                            
                        </div>
                    
            </div>
        </section>
         
        <!--================ Testimonial Area  =================-->
        <section class="testimonial_area section_gap">
            <div class="container">
                <div class="section_title text-center">
                    <h2 class="title_color">Testimoni dari Klien kami</h2>
                    <p>Berikut adalah ulasan para customer kami setelah check in di Garuda Hotel.</p>
                </div>
                <div class="testimonial_slider owl-carousel">
                    
                    <?php
                        $ambil = mysqli_query($conn, "SELECT * FROM tb_kritik JOIN tb_tamu ON tb_kritik.id_tamu=tb_tamu.id_tamu ORDER BY id_kritik
                        DESC LIMIT 4");
                    if(mysqli_num_rows($ambil) > 0){
                        while($kritik = mysqli_fetch_array($ambil)){
                    ?>    
                    <div class="media testimonial_item">
                        <img class="rounded-circle" src="/hotelrezar/user/tamu/profiluser/<?php echo $kritik['foto']; ?>" style="width: 15%; height: 75px;" alt="">
                        <div class="media-body">
                            <p><?php echo $kritik['pesan']; ?></p>
                            <a href="#"><h4 class="sec_h4"><?php echo $kritik['nama_kritik']; ?></h4></a>
                            <div class="star"> 
                                <a href="#"><i class="fa fa-star" style="color:#00BFFF ;"></i></a>
                                <a href="#"><i class="fa fa-star" style="color:#00BFFF ;"></i></a>
                                <a href="#"><i class="fa fa-star" style="color:#00BFFF ;"></i></a>
                                <a href="#"><i class="fa fa-star" style="color:#00BFFF ;"></i></a>
                                <a href="#"><i class="fa fa-star-half-o" style="color:#00BFFF ;"></i></a>
                            </div>
                        </div>
                    </div>
                <?php }} ?>
                </div>
            </div>
        </section>
        <!--================ Testimonial Area  =================-->
        
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