<?php 
// berfungsi mengaktifkan session
session_start();
 
// berfungsi menghubungkan koneksi ke database
include 'koneksi.php';
			 $pass1 	= $_POST['pass1'];
             $pass2 	= $_POST['pass2'];

             if($pass2 != $pass1){
              echo '<script>alert("Password Anda Tidak Cocok")</script>';
              echo '<script>window.location="profil.php"</script>';
          		}else{

              $u_pass = mysqli_query($conn, "UPDATE tb_user SET 
                 password = '".MD5($pass1)."'
                 WHERE id_user = '".$_SESSION['id_user']."' ");
              if($u_pass){
               echo '<script>alert("Ubah Kata Sandi berhasil")</script>';
               echo '<script>window.location="/hotelrezar/logoutadmin.php"</script>';
           		}else{
               echo 'gagal '.mysqli_error($conn);
           }
       }
   ?>