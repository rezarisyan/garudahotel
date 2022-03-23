<?php 
// berfungsi mengaktifkan session
session_start();
 
// berfungsi menghubungkan koneksi ke database
include 'koneksi.php';
 
// berfungsi menangkap data yang dikirim
$nama 		= $_POST['nama'];
$email 		= $_POST['email'];
$username	= $_POST['username'];
$pass 		= md5($_POST['password']);
$pass1 		= md5($_POST['password1']);
$nohp 		= $_POST['telepon'];
$alamat 	= $_POST['alamat'];

if ($pass == $pass1) {
// Proses ganti password
$password =$pass1;

// menampung data file yang diupload
$filename = $_FILES['foto']['name'];
$tmp_name = $_FILES['foto']['tmp_name'];

$type1 = explode('.', $filename);
$type2 = $type1[1];  

$newname = 'profil'.time().'.'.$type2;
move_uploaded_file($tmp_name, './user/tamu/profiluser/'.$newname);

// simpan akun ke tabel tamu
$conn->query("INSERT INTO tb_tamu(nama,username,password,telepon,email,alamat,foto) VALUES ('$nama','$username','$password','$nohp','$email','$alamat','$newname')");

echo '<script>alert("Anda telah daftar")</script>';
echo '<script>window.location="index.php"</script>';
}
?>