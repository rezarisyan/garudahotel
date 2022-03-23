<?php 
// berfungsi mengaktifkan session
session_start();
 
// berfungsi menghubungkan koneksi ke database
include 'koneksi.php';
 
// berfungsi menangkap data yang dikirim
$email = $_POST['email'];
$pass = md5($_POST['password']);
 
// berfungsi menyeleksi data user dengan username dan password yang sesuai
$sql = mysqli_query($conn,"SELECT * FROM tb_tamu WHERE email='$email' AND password='$pass'");
//berfungsi menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($sql);

// berfungsi mengecek apakah username dan password ada pada database
if($cek > 0){
    $data = mysqli_fetch_assoc($sql);
    $_SESSION['status_login']   = true;
    $_SESSION['id_tamu']        = $data['id_tamu'];
    $_SESSION['nama']           = $data['nama'];
    $_SESSION['username']       = $data['username'];
    $_SESSION['telepon']        = $data['telepon'];
    $_SESSION['email']          = $data['email'];
    $_SESSION['alamat']         = $data['alamat'];
    $_SESSION['foto']           = $data['foto'];

    // berfungsi mengecek jika user login sebagai admin
    if($data['level_user']=="tamu"){
        // berfungsi membuat session
        $_SESSION['nama'] =  $data['nama'];
        $_SESSION['level_user'] = "tamu";
        //berfungsi mengalihkan ke halaman admin
       echo '<script>alert("Anda Sukses Login")</script>';
        echo '<script>window.location="user/tamu/index.php"</script>';

    }else{
        // berfungsi mengalihkan alihkan ke halaman login kembali
        echo '<script>alert("Username atau password salah")</script>';
        echo '<script>window.location="index.php"</script>';
    }   
}else{
    echo '<script>alert("Username atau password salah")</script>';
        echo '<script>window.location="index.php"</script>';
}
?>