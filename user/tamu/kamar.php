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
        <title>Kamar - GarudaHotel</title>
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
                    <h2 class="page-cover-tittle">Kamar</h2>
                    <ol class="breadcrumb">
                        <li><a href="index.html">Beranda</a></li>
                        <li class="active">Kamar</li>
                    </ol>
                </div>
            </div>
        </section>
        <!--================Breadcrumb Area =================-->

        <section class="accomodation_area section_gap">
            <div class="col-lg-2" style="float:right;">
                        <div class="blog_right_sidebar" style="margin-right: 10px;"> 
                            <aside class="single_sidebar_widget post_category_widget">
                                <h5 class="widget_title">Kelas Kategori</h5>
                                <ul class="list_style cat-list">
                                    <li>
                                        <?php 
                                            $kategori = mysqli_query($conn, "SELECT * FROM tb_kelas ORDER BY
                                                id_kelas DESC");
                                            if(mysqli_num_rows($kategori) > 0){
                                                while($k = mysqli_fetch_array($kategori)){
                                                    ?>    
                                        <a href="kelas-kamar.php?kat=<?php echo $k['id_kelas'] ?>" class="d-flex justify-content-between">
                                        <li class="">
                                            <?php echo $k['kelas_nama'] ?>
                                        <i class="fa fa-chevron-left" style="color:#1b3771;" aria-hidden="true"></i>
                                            
                                            
                                        </a>
                                        <?php }}else{ ?>
                                                        Kategori tidak ada
                                                    <?php } ?>
                                    </li>           
                                </ul>
                                <div class="br"></div>
                            </aside>
                        </div>
                    </div>
            <div class="container">
              <div style = "margin-left:0;" class = "container">
        <div class = "panel panel-default" >
            <div class = "panel-body">
                <h2 class="title_color">Booking Kamar</h2>
                <br>
                <?php
                    include 'koneksi.php';

                    $query = $conn->query("SELECT * FROM tb_room JOIN tb_kelas ON tb_room.id_kelas=tb_kelas.id_kelas LIMIT 10") or die(mysql_error());
                    if(mysqli_num_rows($query) > 0){
                    while($fetch = $query->fetch_array()){
                ?>  
                    <div class = "well" style = "height:300px; width:100%;">
                        <div style = "float:left;">
                            <img src = "/hotelrezar/user/admin/image/<?php echo $fetch['gambar_hotel']?>" height = "250" width = "350"/>
                        </div>
                        <div style = "float:left; margin-left:30px;">
                            <h3 style= "color:black;"><?php echo $fetch['kelas_nama']?></h3>
                            <h5><?php echo $fetch['status_hotel']?></h5>
                            <h5 style="color: black;">Fasilitas In Door</h5>
                            <p><?php echo substr($fetch['fasilitas_indoor'], 0, 25)  ?></p>
                            <h5 style="color: black;">Fasilitas Out Door</h5>
                            <p><?php echo substr($fetch['fasilitas_outdoor'], 0, 25)  ?><p>
                            <h4 style = "color:darkred;">Rp. <?php echo number_format($fetch['harga_hotel']) ?></h4>
                            
                            <a style = "margin-left:580px;" href = "detail-kamar.php?room_id=<?php echo $fetch['id_room']?>" class = "btn btn-info">Detail</a>
                        </div>
                    </div>
                <?php }} ?>
            </div>
        </div>
    </div>
              </div>
            </div>

        
       
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