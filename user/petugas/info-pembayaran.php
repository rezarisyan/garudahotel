<?php 
session_start();

include 'koneksi.php';
//berfungsi mengecek apakah user sudah login atau belum
if($_SESSION['level_user']==""){
    echo '<script>alert("login terlebih dahulu")</script>';
    echo '<script>window.location="/hotelrezar/login-admin.php"</script>';
}
$semuadata=array();
$tgl_mulai="-";
$tgl_selesai="-";
$status = "";
if (isset($_POST['kirim'])) 
{
    $tgl_mulai = $_POST['tglm'];
    $tgl_selesai = $_POST['tgls'];
    $status = $_POST['status'];
    $ambil = $conn->query("SELECT * FROM tb_checkin tck LEFT JOIN tb_tamu tpt ON
        tck.id_tamu=tpt.id_tamu WHERE status_checkin='$status'AND tanggal BETWEEN '$tgl_mulai' AND '$tgl_selesai' ");
    while($pecah = $ambil->fetch_assoc())
    {
        $semuadata[]=$pecah;
    }
}
?>

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Info Pembayaran - GarudaHotel</title>
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
    <div class="bg-light  rounded p-4">
    <div class="container-fluid pt-4 px-4">
                    <h2>Laporan Pembayaran</h2>
                    <hr>
                    <form method="post">
                        <div method="post">
                            <div class="col-md-3">
                                <label>Tanggal Mulai</label>
                                <input type="date" class="form-control" name="tglm" value="<?php echo $tgl_mulai ?>">
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Tanggal Selesai</label>
                                    <input type="date" class="form-control" name="tgls" value="<?php echo $tgl_selesai ?>">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Status</label>
                                    <select class="form-control" name="status" value="<?php echo $tgl_selesai ?>">
                                        <option value="">Pilih Status</option>
                                        <option value="pending" <?php echo $status=="pending"?"selected":""; ?>>Pending</option>
                                        <option value="tunggu-konfimasi-admin" <?php echo $status=="tunggu-konfimasi-admin"?"selected":""; ?>>tunggu konfirmasi admin</option>
                                        <option value="sudah dibayar" <?php echo $status=="sudah dibayar"?"selected":""; ?>>sudah dibayar</option>
                                        <option value="selesai" <?php echo $status=="selesai"?"selected":""; ?>>selesai</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <label>&nbsp;</label><br>
                                <button class="btn btn-primary" name="kirim">Lihat</button>
                            </div>
                            
                        </div>
                    </form>
                    <table class="table table-striped align-middle "><br>
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Pelanggan</th>
                                <th>Tanggal</th>
                                <th>Jumlah</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $total=0; ?>
                            <?php foreach ($semuadata as $key => $value): ?>
                                <?php $total+=$value['total_pembayaran'] ?>


                                <tr>
                                    <td><?php echo $key+1; ?></td>
                                    <td><?php echo $value['nama'] ?></td>
                                    <td><?php echo date("d F Y",strtotime($value['tanggal'])) ?></td>
                                    <td>Rp, <?php echo number_format($value['total_pembayaran']) ?></td>
                                    <td><?php echo $value['status_checkin'] ?></td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th colspan="3">Total</th>
                                <th>Rp, <?php echo number_format($total) ?></th>
                                <th></th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
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