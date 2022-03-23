<?php 
session_start();
include 'koneksi.php';
//berfungsi mengecek apakah user sudah login atau belum
if($_SESSION['level_user']==""){
    echo '<script>alert("login terlebih dahulu")</script>';
    echo '<script>window.location="/hotelrezar/login-admin.php"</script>';
}
    $kelashotel = mysqli_query($conn, "SELECT * FROM tb_kelas WHERE id_kelas = '".$_GET['id']."' ");
    if(mysqli_num_rows($kelashotel) == 0){
        echo '<script>window.location="kelas-hotel.php"</script>';
    }
    $k = mysqli_fetch_object($kelashotel);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Edit Kelas - GarudaHotel</title> 
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
        <div class="container-fluid pt-4 px-4">
                <div class="bg-light text-center rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h3 class="mb-0">Edit Kelas</h3>
                    </div>
                    <div class="table-responsive">
                        <form action="" method="POST">
                            <input type="text" name="nama" class="form-control" placeholder="Nama Kelas" value="<?php echo $k-> 
                            kelas_nama ?>" required><br>
                            <input type="text" name="fasilitasindoor" class="form-control" placeholder="Fasilitas In Door" value="<?php echo $k->fasilitas_indoor ?>" required><br>
                            <input type="text" name="fasilitasoutdoor" class="form-control" placeholder="Fasilitas Out Door" value="<?php echo $k->fasilitas_outdoor ?>" required><br>
                            <input type="submit" name="submit" value="Edit Kelas" class="btn btn-outline-success" style="float:right;">
                        </form> 
                        <?php  
                        if(isset($_POST['submit'])){

                            $nama = ucwords($_POST['nama']);
                            $fasin = $_POST['fasilitasindoor'];
                            $fasout = $_POST['fasilitasoutdoor'];
 
                            // query update data user
                        $update = mysqli_query($conn, "UPDATE tb_kelas SET
                            kelas_nama        = '".$nama."',
                            fasilitas_indoor  = '".$fasin."',
                            fasilitas_outdoor = '".$fasout."'
                            WHERE id_kelas = '".$k->id_kelas."' 
                             ");
                        if ($update) {
                            echo '<script>alert("Ubah data berhasil")</script>';
                            echo '<script>window.location="kelas-hotel.php"</script>';
                        }else{

                            echo 'gagal' .mysqli_error($conn);
                            }
                        }

                ?>
                    </div>
                </div>
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