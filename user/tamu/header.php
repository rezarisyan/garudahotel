
<!--================Header Area =================-->
        <header class="header_area">
            <div class="container"> 
                <nav class="navbar navbar-expand-lg navbar-light">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <a class="navbar-brand logo_h" href="index.html"><img src="image/logo-garuda-hotel.png" alt="" width="150px"></a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <!-- Collect the nav links, forms, and other content for toggling --> 
                    <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                        <ul class="nav navbar-nav menu_nav ml-auto">
                            <li class="nav-item"><a class="nav-link" href="index.php">Beranda</a></li> 
                            <li class="nav-item"><a class="nav-link" href="about.php">Tentang Kami</a></li>
                            <li class="nav-item"><a class="nav-link" href="kamar.php">Kamar</a></li>
                            <li class="nav-item"><a class="nav-link" href="gallery.php">Galeri</a></li>
                            <li class="nav-item"><a class="nav-link" href="contact.php">Kontak</a></li>
                            <li class="nav-item"><a class="nav-link" href="riwayat.php">Riwayat</a></li>
                            <li class="nav-item submenu dropdown">
                                <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo $_SESSION['nama']; ?>
                            <img src="/hotelrezar/user/tamu/profiluser/<?php echo $_SESSION['foto']; ?>" class="rounded-circle me-lg-2" alt="" style="width: 40px; height: 40px; margin-left: 15px;">
                            </a>
                                <ul class="dropdown-menu">
                                    <li class="nav-item"><a class="nav-link" href="pengaturan.php">pengaturan</a></li>
                                    <li class="nav-item"><a class="nav-link" href="/hotelrezar/logout.php">Logout</a></li>
                                </ul>
                            </li> 
                        </ul>
                    </div> 
                </nav>
            </div>
        </header>
        <!--================Header Area =================-->