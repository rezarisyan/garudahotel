<?php 
session_start();
error_reporting(0);
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
    <title>Penyewaan - GarudaHotel</title>
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
                        <h3 class="mb-0">Data Penyewaan</h3>
                        <form class="d-none d-md-flex ms-4" method="POST">
                    <button class="btn btn-primary"><i class="fas fa-search"></i></button><input style="margin-left: 5px;" class="form-control border-0" type="search" placeholder="Search" aria-label="Search" name="search">
                    </form>
                    </div>
                    <div class="d-flex align-items-center justify-content-between mb-4">
                    
                    </div>
                    <div class="table-responsive">
                        <table class="table text-start align-middle table-bordered table-hover mb-0">
                            <thead>
                                <tr class="text-dark">
                                    <th scope="col">No</th>
                                    <th scope="col">Nama Tamu</th>
                                    <th scope="col">Tanggal Check IN</th>
                                    <th scope="col">Tanggal Check OUT</th>
                                    <th scope="col">Status Penyewaan</th>
                                    <th scope="col">Total</th>
                                    <th scope="col">Aksi</th>
                                    <th scope="col">Print</th>
                                </tr>
                            </thead> 
                            <tbody>
                                <?php
                                $batas = 10;
                                $search = @$_GET['search'];
                                if(empty($search)) {
                                      $posisi = 0;
                                      $search = 1;
                                  }  else{
                                        $posisi = ($search - 1) * $batas; 
                                  }
                                  $no=1;
                                  if($_SERVER['REQUEST_METHOD'] == "POST") {
                                    $pencarian = trim(mysqli_real_escape_string($conn, $_POST['search']));
                                    if ($pencarian != '') { 
                                        $sql = "SELECT * FROM tb_checkin JOIN tb_tamu ON tb_checkin.id_tamu=tb_tamu.id_tamu WHERE nama LIKE '%$pencarian%'";
                                        $query = $sql;
                                        $queryjml = $sql;
                                    } else {
                                        $query = "SELECT * FROM tb_checkin JOIN tb_tamu ON tb_checkin.id_tamu=tb_tamu.id_tamu LIMIT $posisi, $batas";
                                        $queryjml = "SELECT * FROM tb_checkin";
                                        $no = $posisi + 1;
                                    }
                                  } else {
                                      $query = "SELECT * FROM tb_checkin JOIN tb_tamu ON tb_checkin.id_tamu=tb_tamu.id_tamu LIMIT $posisi, $batas";
                                      $queryjml = "SELECT * FROM tb_checkin";
                                      $no = $posisi + 1;  
                                  }
                                 
                                $ambil= mysqli_query($conn, $query) or die (mysql_error($conn));
                                if(mysqli_num_rows($ambil) > 0){ 
                                while($pecah = mysqli_fetch_array($ambil)) { ?>
                                <tr>
                                    <td><?php echo $no++; ?></td>
                                    <td><?php echo $pecah['nama']; ?></td>
                                    <td><?php echo $pecah['tanggal_checkin']; ?></td>
                                    <td><?php echo $pecah['tanggal_checkout']; ?></td>
                                    <td><?php echo $pecah['status_checkin']; ?></td>
                                    <td>Rp. <?php echo number_format( $pecah['total_pembayaran']); ?></td>
                                    <td>
                                    <a href="detail-pembayaran.php?id=<?php echo $pecah['id_checkin']; ?>" class="btn btn-primary"><i class="fas fa-edit"></i></a>

                                        <?php  if ($pecah['status_checkin']=="tunggu-konfimasi-admin"): ?>
                                            <a href="data-pembayaran.php?pembayaran=<?php echo $pecah['id_checkin'] ?>" class="btn btn-success"><i class="fas fa-money-check-alt"></i></a>
                                        <?php endif ?> 
                                    </td> 
                                    <?php  if ($pecah['status_checkin']=="selesai"): ?>
                                    <td><a href=print.php?pid=<?php echo $pecah['id_checkin']; ?> ><button class='btn btn-primary'> <i class='fa fa-print' ></i> Print</button>
                                    <?php endif ?> </td>
                                </tr>
                                <?php
                                } 
                                 } else {
                                    echo "<tr><td colspan=\"4\" align\"center\">Data tidak ditemukan</td></tr>"; 
                                }
                                ?>
                            </tbody>
                        </table>
                        <br>
                            <?php
                            if($_POST['pencarian'] == '') { ?>
                                <div style="float: left;">
                                    <?php
                                    $jml = mysqli_num_rows(mysqli_query($conn, $queryjml));
                                    echo "Jumlah Data : <b>$jml</b>";
                                    ?>  
                                </div>
                                <div style="float: right;">
                                    <ul class="pagination pagination-sm" style="margin: 0;">
                                        <?php
                                        $previous = $search - 1;
                                        $next = $halaman + 1;
                                        $jml_hal = ceil($jml / $batas);
                                        for ($i=1; $i <= $jml_hal; $i++) { 
                                            if ($i != $search) {
                                                echo "<li><a class=\"page-link\" href=\"?search=$i\">$i</a></li>";
                                            } else {
                                                
                                                echo "<li clas=\"active\" class=\"page-item\"><a class=\"page-link\">$i</a></li>";
                                            }
                                        }
                                        ?>
                                    </ul>
                                </div>
                                <?php
                                    
                            } else { 
                                echo "<div style=\"float:left;\">";
                                $jml = mysqli_num_rows(mysqli_query($conn, $queryjml));
                                echo "Data Hasil Pencarian : <b>$jml</b>";
                                echo "</div>";
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