<?php 


include 'koneksi.php';
//berfungsi mengecek apakah user sudah login atau belum
if($_SESSION['level_user']==""){
    echo '<script>alert("login terlebih dahulu")</script>';
    echo '<script>window.location="/hotelrezar/login-admin.php"</script>';
}

?>
<div class="container-xxl position-relative bg-white d-flex p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->
 

        <!-- Sidebar Start -->
        <div class="sidebar pe-4 pb-3">
            <a href="index.html" class="navbar-brand mx-4 mb-3">
                    <img src="img/logo-garuda-hotel.png" style="width: 200px; margin-top: 25px; margin-bottom: 25px;">
                </a> 
            <nav class="navbar bg-light navbar-light">
                
                <div class="d-flex align-items-center ms-4 mb-4">
                    <div class="position-relative">
                        <img src="./profiladmin/<?php echo $_SESSION['foto1']; ?>" class="rounded-circle" alt="" style="width: 50px; height: 50px;">
                        <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
                    </div>
                    <div class="ms-3"> 
                        <h6 class="mb-0"><?php echo $_SESSION['nama1']; ?></h6>
                        <span><?php echo $_SESSION['level_user']; ?></span>
                    </div>
                </div>
                <div class="navbar-nav w-100">
                    <a href="index.php" class="nav-item nav-link"><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="far fa-building"></i>Info Hotel</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="kelas-hotel.php" class="dropdown-item"><i class="fas fa-caret-right"> Kelas Hotel</a></i>
                            <a href="hotel.php" class="dropdown-item"><i class="fas fa-caret-right"></i> Kamar Hotel</a></i>
                        </div>  
                    </div>
                    <a href="edit-user.php" class="nav-item nav-link"><i class="fas fa-user-cog me-2"></i>Edit User</a>
                    <a href="penyewaan.php" class="nav-item nav-link"><i class="fas fa-bed me-2"></i>Penyewaan</a>
                    <a href="info-pembayaran.php" class="nav-item nav-link"><i class="fa fa-dollar-sign me-2"></i>Info Pembayaran</a>
                    <a href="/hotelrezar/logoutadmin.php" class="nav-item nav-link"><i class="fa fas fa-sign-in-alt me-2"></i>LogOut</a>
                </div>
            </nav>
        </div>
        <!-- Sidebar End --> 


        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->
            <nav class="navbar navbar-expand bg-light navbar-light sticky-top px-4 py-0">
                <a href="index.html" class="navbar-brand d-flex d-lg-none me-4">
                    <h2 class="text-primary mb-0"><i class="fa fa-hashtag"></i></h2>
                </a>
                <a href="#" class="sidebar-toggler flex-shrink-0">
                    <i class="fa fa-bars"></i>
                </a>
                <div class="navbar-nav align-items-center ms-auto">
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <i class="fa fa-envelope me-lg-2"></i>
                            <span class="d-none d-lg-inline-flex">Pesan</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                            <a href="#" class="dropdown-item">
                                <div class="d-flex align-items-center">
                                    <img class="rounded-circle" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                                    <div class="ms-2">
                                        <h6 class="fw-normal mb-0">Reza Risyan anda punya pesan</h6>
                                        <small>15 menit yang lalu</small>
                                    </div>
                                </div>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item">
                                <div class="d-flex align-items-center">
                                    <img class="rounded-circle" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                                    <div class="ms-2">
                                        <h6 class="fw-normal mb-0">Reza Risyan anda punya pesan</h6>
                                        <small>30 menit yang lalu</small>
                                    </div>
                                </div>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item">
                                <div class="d-flex align-items-center">
                                    <img class="rounded-circle" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                                    <div class="ms-2">
                                        <h6 class="fw-normal mb-0">Reza Risyan anda punya pesan</h6>
                                        <small>45 menit yang lalu</small>
                                    </div>
                                </div>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item text-center">Lihat semua pesan</a>
                        </div>
                    </div>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <i class="fa fa-bell me-lg-2"></i>
                            <span class="d-none d-lg-inline-flex">Notifikasi</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                            <a href="#" class="dropdown-item">
                                <h6 class="fw-normal mb-0">Profil terbaru</h6>
                                <small>10 minutes ago</small>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item">
                                <h6 class="fw-normal mb-0">Pengguna baru ditambahkan</h6>
                                <small>20 minutes ago</small>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item">
                                <h6 class="fw-normal mb-0">Kata sandi dirubah</h6>
                                <small>47 minutes ago</small>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item text-center">Lihat semua notifikasi</a>
                        </div>
                    </div>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <img src="./profiladmin/<?php echo $_SESSION['foto1']; ?>" class="rounded-circle me-lg-2" alt="" style="width: 40px; height: 40px;">
                            <span class="d-none d-lg-inline-flex"><?php echo $_SESSION['nama1']; ?></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                            <a href="profil.php" class="dropdown-item"><i class="fas fa-user-circle"></i> Profil saya</a>
                            <a href="#" class="dropdown-item"><i class="fas fa-cog"></i> Pengaturan</a>
                            <a href="/hotelrezar/logoutadmin.php" class="dropdown-item"><i class="fas fa-sign-in-alt"></i> Log Out</a>
                        </div>
                    </div>
                </div>
            </nav>
            <!-- Navbar End -->