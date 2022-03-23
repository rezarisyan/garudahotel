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
        <title>GarudaHotel</title>
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="vendors/linericon/style.css">
        <link rel="stylesheet" href="css/font-awesome.min.css">
        <link rel="stylesheet" href="vendors/owl-carousel/owl.carousel.min.css">
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
        
        <!--================Banner Area =================-->
        <section class="banner_area">
            <div class="booking_table d_flex align-items-center">
            	<div class="overlay bg-parallax" data-stellar-ratio="0.9" data-stellar-vertical-offset="0" data-background=""></div>
				<div class="container">
					<div class="banner_content text-center">
						<h6>Reservasi</h6>
						<h2>Garuda Hotel</h2>
						<p>Menyediakan berbagai macam hotel dan fasilitas yang terbaik.dan sudah terjamin kualitas nya ,banyak customer yang memilih hotel kami sebagai penginapan istirahat mereka</p>
						
					</div> 
				</div>
            </div>
            <div class="hotel_booking_area position">
                <div class="container">
                    <div class="hotel_booking_table">
                        <div class="col-md-3">
                            <h2>Booking<br> Kamar Anda</h2>
                        </div>
                        <div class="col-md-9">
                            <div class="boking_table">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="book_tabel_item">
                                            <div class="form-group">
                                                <div class='input-group date'>
                                                    <input name="tgl_checkout" type='date' class="form-control" placeholder="Tanggal kedatangan"/>
                                                    <span class="input-group-addon">
                                                        <i class="fa fa-calendar" ></i> 
                                                    </span>
                                                </div>
                                            </div> 
                                            <div class="form-group">
                                                <div class='input-group date'>
                                                    <input name="tgl_checkout" type='date' class="form-control" placeholder="Tanggal keberangkatan"/>
                                                    <span class="input-group-addon">
                                                        <i class="fa fa-calendar" aria-hidden="true"></i>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="book_tabel_item">
                                            <div class="input-group">
                                                <select class="wide">
                                                    <option data-display="1 Orang">1 Orang</option>
                            <?php
                             $jml_orang=array("","1 Orang","2 Orang","3 Orang","4 Orang","5 Orang");
                             for ($i=1;$i<=5;$i++)
                             {
                               echo "<option value=".$i.">".$jml_orang[$i]."</option>";
                             }
                            ?>
                                                </select>
                                            </div>
                                            <div class="input-group">
                                                <select class="wide">
                                                    <option data-display="1 Kamar">1 Kamar</option>
                                                    <?php
                             $jml_kamar=array("","1 Kamar","2 Kamar","3 Kamar","4 Kamar");
                             for ($i=1;$i<=4;$i++)
                             {
                               echo "<option value=".$i.">".$jml_kamar[$i]."</option>";
                             }
                            ?>  
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="book_tabel_item">
                                            <div class="input-group">
                                                
                                            </div>
                                            <a class="book_now_btn button_hover info radius" href="kamar.php">Booking Sekarang</a>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--================Banner Area =================-->
        
        <!--================ Accomodation Area  =================-->
        <section class="accomodation_area section_gap"> 
            <div class="container">
                <div class="section_title text-center">
                    <h2 class="title_color">Akomodasi hotel</h2>
                    <p>We all live in an age that belongs to the young at heart. Life that is becoming extremely fast, </p>
                </div>
                <?php 
                    include 'koneksi.php';
                    $query1 = $conn->query("SELECT * FROM tb_room ORDER BY id_room ASC LIMIT 1") or die(mysql_error());
                    while($fetch1 = $query1->fetch_array()){
                ?>
                <div class="row">
                    <div class="col-md-6 d_flex align-items-center">
                        <div class="about_content ">
                            <h2 class="title title_color"><?php echo $fetch1['nama_hotel']?></h2>
                            <p><?php echo $fetch1['hotel_deskripsi']?></p>
                            <a href="detail-kamar.php?room_id=<?php echo $fetch1['id_room']?>" class="button_hover theme_btn_two">Booking</a>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <img class="img-fluid" src="/hotelrezar/user/admin/image/<?php echo $fetch1['gambar_hotel']?>" alt="img">
                    </div>
                </div>
            <?php } ?>
            </div>
        </section>
        <!--================ Accomodation Area  =================-->
        
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
                            <h4 class="sec_h4"><i class="lnr lnr-store" style="color:#00BFFF ;"></i>Minimarket</h4>
                            <h4 class="sec_h4"><i class="lnr lnr-license" style="color:#00BFFF ;"></i>Atm Mini</h4>
                            <h4 class="sec_h4"><i class="lnr lnr-leaf" style="color:#00BFFF ;"></i>Taman</h4>
                            <h4 class="sec_h4"><i class="lnr lnr-construction" style="color:#00BFFF ;"></i>Parkir</h4>

                            
                        </div> 
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="facilities_item">
                            <h2 class="title_w">Fasilitas InDoor</h2>
                            <h4 class="sec_h4"><i class="lnr lnr-laptop-phone" style="color:#00BFFF ;"></i>Wi-Fi Internet gratis</h4>
                            <h4 class="sec_h4"><i class="lnr lnr-dice" style="color:#00BFFF ;"></i>Kamar mandi </h4>
                            <h4 class="sec_h4"><i class="lnr lnr-inbox" style="color:#00BFFF ;"></i>Ukuran kamar</h4>
                            <h4 class="sec_h4"><i class="lnr lnr-screen" style="color:#00BFFF ;"></i>TV</h4>
                            <h4 class="sec_h4"><i class="lnr lnr-bicycle" style="color:#00BFFF ;"></i>AC</h4>
                            <h4 class="sec_h4"><i class="lnr lnr-coffee-cup" style="color:#00BFFF ;"></i>Kopi/teh</h4>
                            <h4 class="sec_h4"><i class="lnr lnr-cloud" style="color:#00BFFF ;"></i>Ruangan bebas rokok</h4>
                            <h4 class="sec_h4"><i class="lnr lnr-inbox" style="color:#00BFFF ;"></i>Seprai kualitas premium</h4>
                            <h4 class="sec_h4"><i class="lnr lnr-home" style="color:#00BFFF ;"></i>House keeping harian</h4>
                            <h4 class="sec_h4"><i class="lnr lnr-inbox" style="color:#00BFFF ;"></i> Tipe Matras</h4>

                            
                        </div>
                    
            </div>
        </section>
        <!--================ Facilities Area  =================-->
        
        <!--================ visi misi Area  =================-->
        <section class="about_history_area section_gap">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 d_flex align-items-center">
                        <div class="about_content ">
                            <h2 class="title title_color">Tentang kami<br>Misi & Visi</h2><br>
                            <h5>Visi</h5><p>kami Menjadi perusahaan perhotelan yang profesional dan selalu berusaha meningkatkan kualitas pelayanan dengan menjaga kearifan lokal, dan mendiversifikasi risiko bisnis dengan berinvestasi pada perusahaan yang dapat memberikan nilai tambah bagi stakeholders.<br><h5>Misi</h5>Selalu berinovasi untuk menciptakan produk hotel yang memiliki karakteristik unik dan memberikan pelayanan internasional. Mengembangkan bisnis Perusahaan ke arah yang lebih baik dengan berinvestasi pada perusahaan yang dapat meningkatkan bisnis Perusahaan secara finansial dan operasional. Menciptakan sumber daya manusia yang profesional dan selalu dapat meningkatkan kinerja Perusahaan.</p>
                        </div>
                    </div> 
                    <div class="col-md-4">
                        <img  style="width: 750px;" src="/hotelrezar/user/admin/img/logo-garuda-hotel.png" alt="img">
                    </div>
                </div>
            </div>
        </section>
        <!--================ visi misi Area  =================-->
        
        <!--================ Testimonial Area  =================-->
        <section class="testimonial_area section_gap">
            <div class="container">
                <div class="section_title text-center">
                    <h2 class="title_color">Testimoni dari Klien kami</h2>
                    <p>Berikut adalah ulasan para customer kami setelah check in di Garuda Hotel. </p>
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
        <script src="js/mail-script.js"></script>
        <script src="vendors/bootstrap-datepicker/bootstrap-datetimepicker.min.js"></script>
        <script src="vendors/nice-select/js/jquery.nice-select.js"></script>
        <script src="js/mail-script.js"></script>
        <script src="js/stellar.js"></script>
        <script src="vendors/lightbox/simpleLightbox.min.js"></script>
        <script src="js/custom.js"></script>
    </body>
</html>