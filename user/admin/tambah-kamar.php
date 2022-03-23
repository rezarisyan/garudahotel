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
    <title>Tambah Kamar - GarudaHotel</title> 
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
                        <h3 class="mb-0">Tambah Kamar</h3>
                    </div>
                    <div class="table-responsive">
                        <form action="" method="POST" enctype="multipart/form-data">
                    <h5 style="float:left;">Kelas Kamar</h5>
                    <select class="form-control" name="idkelas">
                        <option value="">--Pilih--</option>
                        <?php 
                        $kelas = mysqli_query($conn, "SELECT * FROM tb_kelas ORDER BY id_kelas DESC");
                        while($k = mysqli_fetch_array($kelas)){
                    ?>
                    <option value="<?php echo $k['id_kelas'] ?>">
                        <?php echo $k['kelas_nama'] ?></option>
                    <?php } ?>
                    </select>
                    <br>
                    <input type="text" name="namahotel" class="form-control" placeholder="Nama Hotel" value="" required><br>
                    <h5 style="float:left;">Status Hotel</h5>
                    <select class="form-control" name="sh">
                    <option value="">--Pilih--</option>
                    <option value="Tersedia">Tersedia</option>
                    <option value="Terisi">Terisi</option>
                    </select><br>

                    <input type="text" name="hargahotel" class="form-control" placeholder="Harga Hotel" value="" required><br>
                    <input type="text" name="deskripsihotel" class="form-control" placeholder="Deskripsi Hotel" value="" required><br>
                    <h5 style="float:left;">Status</h5>
                   <select class="form-control" name="status">
                    <option value="">--Pilih--</option>
                    <option value="1">Aktif</option>
                    <option value="0">Tidak Aktif</option>
                    </select>
                    <br>
                    <h5 style="float:left;">Masukan Gambar Kamar</h5>
                    <input type="file" name="gambar" class="form-control"><br>
                    <input type="submit" name="submit" value="Edit" class="btn btn-outline-success" style="float:right;">
                </form>
                <?php 
                if(isset($_POST['submit'])){

                    // menampung inputan dari form
                    $kelas          = $_POST['idkelas'];
                    $namahotel      = $_POST['namahotel'];
                    $sh             = $_POST['sh'];
                    $hargahotel     = $_POST['hargahotel'];
                    $deskripsihotel = $_POST['deskripsihotel'];
                    $status         = $_POST['status'];

                    // data gambar yang baru
                    $filename = $_FILES['gambar']['name'];
                    $tmp_name = $_FILES['gambar']['tmp_name'];

                    

                    // jika admin ganti gambar
                    if($filename != ''){
                        $type1 = explode('.', $filename);
                        $type2 = $type1[1];

                        $newname = 'hotel'.time().'.'.$type2;

                        // menampung data dormat file yang diizinkan
                        $tipe_diizinkan = array('jpg', 'jpeg', 'png', 'gif');

                        // validasi format file
                        if(!in_array($type2, $tipe_diizinkan)){
                            // jika format file tidak ada di dalam tipe diizinkan
                            echo '<script>alert("Format file tidak diizinkan")</script>';
                    }else{
                        move_uploaded_file($tmp_name, './image/'.$newname);
                        $namafoto = $newname;

                    }
                }else{
                    // jika admin tidak ganti foto
                    $namafoto = $gambar;
                }

                // query update data user
                        $insert = mysqli_query($conn, "INSERT INTO tb_room VALUES (
                            null,
                            '".$kelas."',
                            '".$namahotel."',
                            '".$sh."',
                            '".$hargahotel."',
                            '".$deskripsihotel."',
                            '".$namafoto."',
                            '".$status."' 
                                        )");
                        if ($insert) {
                            echo '<script>alert("Ubah data berhasil")</script>';
                            echo '<script>window.location="hotel.php"</script>';
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