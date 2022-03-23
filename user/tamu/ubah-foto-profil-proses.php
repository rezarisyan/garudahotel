 <?php 
// berfungsi mengaktifkan session
session_start();
 
// berfungsi menghubungkan koneksi ke database
include 'koneksi.php';



 // menampung data file yang diupload
$filename = $_FILES['foto']['name'];
$tmp_name = $_FILES['foto']['tmp_name'];

$type1 = explode('.', $filename);
$type2 = $type1[1];

$newname = 'profil'.time().'.'.$type2;
move_uploaded_file($tmp_name, './profiluser/'.$newname);

$update = mysqli_query($conn, "UPDATE tb_tamu SET 
                          foto ='".$newname."'
                         WHERE id_tamu = '".$_SESSION['id_tamu']."' ");
                     if($update){
                      echo '<script>alert("Ubah data berhasil")</script>';
                      echo '<script>window.location="/hotelrezar/logout.php"</script>';
                  }else{ 
                      echo 'gagal '.mysqli_error($conn);
                  }

?>