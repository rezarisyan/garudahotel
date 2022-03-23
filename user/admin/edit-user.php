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
    <title>Edit User - GarudaHotel</title>
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
                        <h3 class="mb-0">Edit User</h3>
                        <form class="d-none d-md-flex ms-4" method="POST">
                    <button class="btn btn-primary"><i class="fas fa-search"></i></button><input style="margin-left: 5px;" class="form-control border-0" type="search" placeholder="Search" aria-label="Search" name="search">
                    </form>
                    </div>
                    <div class="table-responsive">
                        <table class="table text-start align-middle table-bordered table-hover mb-0">
                            <thead>
                                <tr class="text-dark">
                                    <th scope="col">No</th>
                                    <th scope="col">Level User</th>
                                    <th scope="col">Nama User</th>
                                    <th scope="col">Email User</th>
                                    <th scope="col">Username</th>
                                    <th scope="col">Paswword</th>
                                    <th scope="col">Foto</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead> 
                            <tbody>

                            <?php 

                                $batas1 = 10;
                                $search1 = @$_GET['search'];
                                if(empty($search1)) {
                                      $posisi1 = 0;
                                      $search1 = 1;
                                  }  else{
                                        $posisi1 = ($search1 - 1) * $batas1; 
                                  } 
                                  $no=1;
                                  if($_SERVER['REQUEST_METHOD'] == "POST") {
                                    $pencarian1 = trim(mysqli_real_escape_string($conn, $_POST['search']));
                                    if ($pencarian1 != '') { 
                                        $sql1 = "SELECT * FROM tb_user WHERE nama LIKE '%$pencarian1%'";
                                        $query1 = $sql1;
                                        $queryjml1 = $sql1;
                                    } else {
                                        $query1 = "SELECT * FROM tb_user LIMIT $posisi1, $batas1";
                                        $queryjml1 = "SELECT * FROM tb_user";
                                        $no = $posisi1 + 1;
                                    }
                                  } else {
                                      $query1 = "SELECT * FROM tb_user LIMIT $posisi1, $batas1";
                                        $queryjml1 = "SELECT * FROM tb_user";
                                        $no = $posisi1 + 1;  
                                  } 
                                    $user = mysqli_query($conn, $query1) or die (mysql_error($conn));
                                         if(mysqli_num_rows($user) > 0){
                                        while($row = mysqli_fetch_array($user)){
                                            ?>
                                            <tr>
                                                <td><?php echo $no++ ?></td>
                                                <td><?php echo $row['level_user'] ?></td>
                                                <td><?php echo $row['nama'] ?></td>
                                                <td><?php echo $row['email'] ?></td>
                                                <td><?php echo $row['username'] ?></td> 
                                                <td><?php echo substr($row['password'], 0,10) ?></td>
                                                <td><?php echo substr($row['foto'], 0,10) ?></td>
                                                <td>
                                                    <a href="pengaturan-user.php?id=<?php echo $row['id_user'] ?>" class="btn btn-sm btn-success"><i class="fas fa-edit"></i></a>
                                                    <a href="proseshapus.php?idu=<?php echo $row['id_user'] ?>" onclick="return confirm('Yakin Anda ingin menghapus user ini?')" class="btn btn-sm btn-danger"><i class="far fa-trash-alt"></i></a> 
                                                </td>
                                            </tr>
                                        <?php }}else{ ?>
                                            <tr>
                                                <td colspan="8" style="text-align: center;">Tidak Ada Data</td>
                                            </tr>
                                        <?php } ?>
                        </table>
                        <a href="tambah-user.php" class="btn btn-outline-success" style="float: right;margin-top: 10px;">Tambah User</a>
                        <br><br><br>
                        <?php
                            if($_POST['pencarian'] == '') { ?>
                                <div style="float: left;">
                                    <?php
                                    $jml1 = mysqli_num_rows(mysqli_query($conn, $queryjml1));
                                    echo "Jumlah User : <b>$jml1</b>";
                                    ?>  
                                </div>
                                <div style="float: right;">
                                    <ul class="pagination pagination-sm" style="margin: 0;">
                                        <?php
                                        $previous = $search1 - 1;
                                        $next = $halaman1 + 1;
                                        $jml_hal1 = ceil($jml1 / $batas1);
                                        for ($i=1; $i <= $jml_hal1; $i++) { 
                                            if ($i != $search1) {
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
                                $jml1 = mysqli_num_rows(mysqli_query($conn, $queryjml1));
                                echo "Data Hasil Pencarian : <b>$jml1</b>";
                                echo "</div>";
                            }
                                
                            ?>
                    </div>
                </div>
            </div>

            <div class="container-fluid pt-4 px-4">
                <div class="bg-light text-center rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h3 class="mb-0">Edit Tamu</h3>
                        <form class="d-none d-md-flex ms-4" method="POST">
                    <button class="btn btn-primary"><i class="fas fa-search"></i></button><input style="margin-left: 5px;" class="form-control border-0" type="search" placeholder="Search" aria-label="Search" name="search1">
                    </form>
                    </div>
                    <div class="table-responsive">
                        <table class="table text-start align-middle table-bordered table-hover mb-0">
                            <thead>
                                <tr class="text-dark">
                                    <th scope="col">No</th>
                                    <th scope="col">Nama Tamu</th>
                                    <th scope="col">Email Tamu</th>
                                    <th scope="col">Username</th>
                                    <th scope="col">Paswword</th>
                                    <th scope="col">Foto</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead> 
                            <tbody>

                            <?php 

                                $batas1 = 10;
                                $search1 = @$_GET['search1'];
                                if(empty($search1)) {
                                      $posisi1 = 0;
                                      $search1 = 1;
                                  }  else{
                                        $posisi1 = ($search1 - 1) * $batas1; 
                                  } 
                                  $no=1;
                                  if($_SERVER['REQUEST_METHOD'] == "POST") {
                                    $pencarian1 = trim(mysqli_real_escape_string($conn, $_POST['search1']));
                                    if ($pencarian1 != '') { 
                                        $sql1 = "SELECT * FROM tb_tamu WHERE nama LIKE '%$pencarian1%'";
                                        $query1 = $sql1;
                                        $queryjml1 = $sql1;
                                    } else {
                                        $query1 = "SELECT * FROM tb_tamu LIMIT $posisi1, $batas1";
                                        $queryjml1 = "SELECT * FROM tb_tamu";
                                        $no = $posisi1 + 1;
                                    }
                                  } else {
                                      $query1 = "SELECT * FROM tb_tamu LIMIT $posisi1, $batas1";
                                        $queryjml1 = "SELECT * FROM tb_tamu";
                                        $no = $posisi1 + 1;  
                                  } 
                                    $user = mysqli_query($conn, $query1) or die (mysql_error($conn));
                                         if(mysqli_num_rows($user) > 0){
                                        while($row = mysqli_fetch_array($user)){
                                            ?>
                                            <tr>
                                                <td><?php echo $no++ ?></td>
                                                <td><?php echo $row['nama'] ?></td>
                                                <td><?php echo $row['email'] ?></td>
                                                <td><?php echo $row['username'] ?></td> 
                                                <td><?php echo substr($row['password'], 0,10) ?></td>
                                                <td><?php echo substr($row['foto'], 0,10) ?></td>
                                                <td>
                                                    <a href="pengaturan-tamu.php?id=<?php echo $row['id_tamu'] ?>" class="btn btn-sm btn-success"><i class="fas fa-edit"></i></a>
                                                    <a href="proseshapus.php?idt=<?php echo $row['id_tamu'] ?>" onclick="return confirm('Yakin Anda ingin menghapus user ini?')" class="btn btn-sm btn-danger"><i class="far fa-trash-alt"></i></a> 
                                                </td>
                                            </tr> 
                                        <?php }}else{ ?>
                                            <tr>
                                                <td colspan="8" style="text-align: center;">Tidak Ada Data</td>
                                            </tr>
                                        <?php } ?>
                        </table>
                        <br>
                        <?php
                            if($_POST['pencarian'] == '') { ?>
                                <div style="float: left;">
                                    <?php
                                    $jml1 = mysqli_num_rows(mysqli_query($conn, $queryjml1));
                                    echo "Jumlah User : <b>$jml1</b>";
                                    ?>  
                                </div>
                                <div style="float: right;">
                                    <ul class="pagination pagination-sm" style="margin: 0;">
                                        <?php
                                        $previous = $search1 - 1;
                                        $next = $halaman1 + 1;
                                        $jml_hal1 = ceil($jml1 / $batas1);
                                        for ($i=1; $i <= $jml_hal1; $i++) { 
                                            if ($i != $search1) {
                                                echo "<li><a class=\"page-link\" href=\"?search1=$i\">$i</a></li>";
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
                                $jml1 = mysqli_num_rows(mysqli_query($conn, $queryjml1));
                                echo "Data Hasil Pencarian : <b>$jml1</b>";
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