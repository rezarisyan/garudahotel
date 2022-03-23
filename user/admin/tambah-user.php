<?php 
session_start();
include 'koneksi.php';
//berfungsi mengecek apakah user sudah login atau belum
if($_SESSION['level_user']==""){
    echo '<script>alert("login terlebih dahulu")</script>';
    echo '<script>window.location="/hotelrezar/login-admin.php"</script>';
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Tambah User - GarudaHotel</title> 
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
                        <h3 class="mb-0">Tambah User</h3>
                    </div>
                    <div class="table-responsive">
                        <form action="" method="POST" enctype="multipart/form-data">
                <h5 style="float:left;">User</h5>
                    <select class="form-control" name="leveluser">
                        <option value="">--Pilih--</option>
                        <option value="admin">Admin</option>
                        <option value="petugas">Petugas</option>
                    </select>
                    <br>
                    <input type="text" name="nama" class="form-control" placeholder="Nama" required><br>
                    <input type="text" name="username" class="form-control" placeholder="Username" required><br>
                    <input type="password" name="password" class="form-control" placeholder="Password" required><br>
                    <input type="text" name="telepon" class="form-control" placeholder="No Hp/Telepon" required><br>
                    <input type="text" name="email" class="form-control" placeholder="Email" required><br>
                    <textarea class="form-control" name="alamat" placeholder="Alamat"></textarea><br>
                    <h5 style="float:left;">Foto Profil</h5>
                    <input type="file" name="foto" class="form-control" required><br>
                    <input type="submit" name="submit" value="Tambah" class="btn btn-outline-success" style="float:right;">
                </form>
                <?php 
                if(isset($_POST['submit'])){

                    // menampung inputan dari form
                    $leveluser = $_POST['leveluser'];
                    $nama      = $_POST['nama'];
                    $username  = $_POST['username'];
                    $password  = $_POST['password'];
                    $telepon   = $_POST['telepon'];
                    $email     = $_POST['email'];
                    $alamat    = $_POST['alamat'];

                    // menampung data file yang di upload
                    $filename = $_FILES['foto']['name'];
                    $tmp_name = $_FILES['foto']['tmp_name'];

                    $type1 = explode('.', $filename);
                    $type2 = $type1[1];

                    $newname = 'profil'.time().'.'.$type2;

                    // menampung data dormat file yang diizinkan
                    $tipe_diizinkan = array('jpg', 'jpeg', 'png', 'gif');

                    // validasi format file
                    if(!in_array($type2, $tipe_diizinkan)){
                        // jika format file tidak ada di dalam tipe diizinkan
                        echo '<script>alert("Format file tidak diizinkan")</script>';
                    }else{
                        // jika format file sesuai dengan yang ada di dalam array tipe diizinkan
                        // proses upload file sekaligus insert ke database
                        move_uploaded_file($tmp_name, './profiladmin/'.$newname);

                        $insert = mysqli_query($conn, "INSERT INTO tb_user VALUES (
                            null,
                            '".$nama."',
                            '".$username."',
                            '".MD5($password)."',
                            '".$telepon."',
                            '".$email."',
                            '".$alamat."',
                            '".$newname."',
                            '".$leveluser."'
                            )");
                        if ($insert) {
                            echo '<script>alert("Tambah data berhasil")</script>';
                            
                        }else{

                            echo 'gagal' .mysqli_error($conn);
                            }
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