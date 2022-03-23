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
    <title>Data Pembayaran - GarudaHotel</title> 
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
                        <h3 class="mb-0">Data Pembayaran</h3>
                        <?php
                    // mendapatkan id_pembayaran dari url
                    $id_pembayaran = $_GET['pembayaran'];

                    // mengambil data pembayaran berdasarkan id_pembayaran
                    $ambil = $conn->query("SELECT * FROM tb_pembayaran WHERE id_checkin='$id_pembayaran'");
                    $detail = $ambil->fetch_assoc();

                     // mengambil data checkin berdasarkan id_pembayaran
                    $ambil1 = $conn->query("SELECT * FROM tb_checkin WHERE id_checkin='$id_pembayaran'");
                    $detail1 = $ambil1->fetch_assoc();

                    $id_room = $detail1['id_room'];

                    // mengambil data room berdasarkan id_pembayaran
                    $ambil2 = $conn->query("SELECT * FROM tb_room WHERE id_room='$id_room'");
                    $detail2 = $ambil2->fetch_assoc();

                    ?>
                    </div>
                    <div class="table-responsive" style="text-align: left;">
                            <table class="table">
                                <tr>
                                    <th>Nama</th>
                                    <td><?php echo $detail['nama'] ?></td>
                                </tr>
                                 <tr>
                                    <th>Id Room</th>
                                    <td><?php echo $detail2['id_room'] ?></td>
                                </tr>
                                <tr>
                                    <th>Bank</th>
                                    <td><?php echo $detail['bank'] ?></td>
                                </tr>
                                <tr>
                                    <th>Jumlah</th>
                                    <td><?php echo number_format($detail['jumlah']) ?></td>
                                </tr>
                                <tr>
                                    <th>Tanggal</th>
                                    <td><?php echo $detail['tanggal'] ?></td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-md-6">
                            <img src="/desainruangan/bukti_pembayaran/<?php echo $detail['bukti'] ?>" alt="" class="img-reponsive" width="35%">
                        </div>

                         <form method="post">
                        <div class="form-group">
                            <label style="float:left;">No Hotel</label>
                            <input type="text" class="form-control" name="nohotel">
                        </div>
                        <div class="form-group">
                            <label style="float:left;">Status</label>
                            <select class="form-control" name="status">
                                <option value=""><?php echo $detail1['status_checkin'] ?></option>
                               <option value="ditunda">ditunda</option>
                               <option value="selesai">selesai</option>
                               <option value="batal checkin">dibatalkan</option>
                            </select>
                        </div>
                        <br>
                        <div class="form-group">
                            <label style="float:left;">Status Hotel</label>
                            <select class="form-control" name="statushotel">
                                <option value="<?php echo $detail2['status_hotel'] ?>"><?php echo $detail2['status_hotel'] ?></option>
                               <option value="Tersedia">Tersedia</option>
                               <option value="Terisi">Terisi</option>
                               <option value="Terpesan">Terpesan</option>
                            </select>
                        </div>
                        <br>
                        <button type="submit" name="proses" class="btn btn-primary">Proses</button>
                    </form>
                    <?php 
                    if (isset($_POST['proses'])) 
                    {
                        $nohotel = $_POST['nohotel'];
                        $id_checkin = $detail['id_checkin'];
                        $status = $_POST['status'];
                        $status_hotel = $_POST['statushotel'];
                        $id_room1 = $detail2['id_room'];
                        $conn->query("UPDATE tb_pembayaran SET no_hotel='$nohotel'
                            WHERE id_pembayaran='$id_pembayaran'");

                        $conn->query("UPDATE tb_checkin SET status_checkin='$status'
                            WHERE id_checkin='$id_checkin'");

                        $conn->query("UPDATE tb_room SET status_hotel='$status_hotel'
                            WHERE id_room='$id_room1'");

                        echo '<script>alert("Data pembelian terupdate")</script>';
                        echo "<script>window.location='penyewaan.php';</script>";
                    }
                    ?>

                    </div>
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