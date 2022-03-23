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
        <title>Kontak - GarudaHotel</title>
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
                    <h2 class="page-cover-tittle">Kontak Kami</h2>
                    <ol class="breadcrumb">
                        <li><a href="index.html">Beranda</a></li>
                        <li class="active">Kontak</li>
                    </ol>
                </div>
            </div>
        </section>
        <!--================Breadcrumb Area =================-->
        
        <!--================Contact Area =================-->
        <section class="contact_area section_gap">
            <div class="container">
                <div  class="container">
                <div class="section_title text-center">
                    <h2 class="title_color">Kontak Kami</h2>
                    <p>Jika mempunyai kesulitan atau ingin memesan langsung ke admin hubungi dibawah, </p>
                </div>
                <br> 
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1980.40165681507!2d107.49672930713736!3d-6.914104694396136!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68e540d152bea3%3A0x922302e414f128c7!2sResmi%20Galih%20No.8%2C%20Batujajar%20Tim.%2C%20Kec.%20Batujajar%2C%20Kabupaten%20Bandung%20Barat%2C%20Jawa%20Barat%2040561!5e0!3m2!1sen!2sid!4v1645688381006!5m2!1sen!2sid" width="600" height="450" style="border:0; width: 1125px;" allowfullscreen="" loading="lazy"></iframe>
                </div><br>
                <div class="row">
                    <div class="col-md-3">
                        <div class="contact_info">
                            <div class="info_item">
                                <i class="lnr lnr-home" style="color:#00BFFF ;"></i>
                                <h6>Bandung Barat, Indonesia</h6>
                                <p>Batujajar Timur</p>
                            </div> 
                            <div class="info_item">
                                <i class="lnr lnr-phone-handset" style="color:#00BFFF ;"></i>
                                <h6><a href="#">+62 8213 0842 118</a></h6>
                                <p>Senin s/d Jum 09.00 s/d 18.00</p>
                            </div>
                            <div class="info_item">
                                <i class="lnr lnr-envelope" style="color:#00BFFF ;"></i>
                                <h6><a href="#">rezarisyanfauzi21@gmail.com</a></h6>
                                <p>Kirimkan pertanyaan Anda kapan saja!</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <form class="row contact_form" action="contact_process.php" method="post" id="contactForm" novalidate="novalidate">
                            <div class="col-md-6"> 
                                <div class="form-group">
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name">
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control" id="email" name="email" placeholder="Enter email address">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" id="subject" name="subject" placeholder="Enter Subject">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <textarea class="form-control" name="message" id="message" rows="1" placeholder="Enter Message"></textarea>
                                </div>
                            </div>
                            <div class="col-md-12 text-right">
                                <button type="submit" value="submit" class="btn theme_btn button_hover info radius">Send Message</button>
                            </div>
                        </form>
                    </div>
                </div>
                
            </div>
        </section>
        <!--================Contact Area =================-->

        <!--================ Kritik Area =================-->
        <section class="testimonial_area section_gap">
            <div class="container">
                <div  class="container"> 
                </div><br>
                <div class="row">
                   <div class="col">
                     <h1>Kritik & Saran</h1>
                     <p>
                       Silahkan tinggalkan pesan anda, pada kolom yang tersedia.
                     </p>
                   </div>
                 
                   <div class="col">
                     <form method="post">
                        
                       <div class="form-group">
                         <label name="nama">Nama Anda:</label>
                         <input type="text" class="form-control" name="nama" placeholder="Masukkan Nama">
                       </div>
                 
                       <div class="form-group">
                         <label name="email">E-mail Anda:</label>
                         <input type="email" class="form-control" name="email" placeholder="Masukkan Email">
                       </div>
                 
                       <div class="form-group">
                         <label name="pesan">Pesan Anda:</label>
                         <textarea name="pesan" class="form-control" cols="30" rows="7"></textarea>
                       </div>
                 
                       <button name="post" class="btn theme_btn button_hover info radius" type="submit">Post</button>
                 
                     </form>
                     <?php
                     include 'koneksi.php';
                        // jika ada tombol kirim
                        if (isset($_POST['post'])) 
                        {

                            $id_tamu = $_SESSION['id_tamu'];
                            $nama = $_POST['nama'];
                            $email = $_POST['email'];
                            $pesan = $_POST['pesan'];

                            // simpan data kritik & saran
                            $conn->query("INSERT INTO tb_kritik(id_tamu,nama_kritik,email,pesan) VALUES ('$id_tamu','$nama','$email','$pesan') ");
                            echo '<script>alert("Pesan anda telah terikirim")</script>';

                        }
                        ?>
                   </div>
                 </div>
        </div>
      </div>
                    </div>
                </div>
                
            </div>
        </section>
        <!--================ kritik Area =================-->
        
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