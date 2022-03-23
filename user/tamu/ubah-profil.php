<?php 
// berfungsi mengaktifkan session
session_start();

 
// berfungsi menghubungkan koneksi ke database
include 'koneksi.php'; 
	
	$nama 		    = ucwords($_POST['nama']);
                     $user	        = $_POST['username'];
                     $hp	  		= $_POST['telepon'];
                     $email		    = $_POST['email'];
                     $alamat		= ucwords($_POST['alamat']);

                     $update = mysqli_query($conn, "UPDATE tb_user SET 
                         nama ='".$nama."',
                         username ='".$user."',
                         telepon ='".$hp."',
                         email ='".$email."',
                         alamat ='".$alamat."'
                         WHERE id_user = '".$_SESSION['id_user']."' ");
                     if($update){
                      echo '<script>alert("Ubah data berhasil")</script>';
                      echo '<script>window.location="/hotelrezar/logout.php"</script>';
                  }else{ 
                      echo 'gagal '.mysqli_error($conn);
                  }

?>