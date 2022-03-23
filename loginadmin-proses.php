<?php 
// berfungsi mengaktifkan session
session_start();
 
// berfungsi menghubungkan koneksi ke database
include 'koneksi.php';
 
// berfungsi menangkap data yang dikirim
$user = $_POST['username'];
$pass = md5($_POST['password']);
 
// berfungsi menyeleksi data user dengan username dan password yang sesuai
$sql = mysqli_query($conn,"SELECT * FROM tb_user WHERE username='$user' AND password='$pass'");
//berfungsi menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($sql);

// berfungsi mengecek apakah username dan password ada pada database
if($cek > 0){
    $data = mysqli_fetch_assoc($sql);
    $_SESSION['status_login1']   = true;
    $_SESSION['id_user']        = $data['id_user'];
    $_SESSION['nama1']           = $data['nama'];
    $_SESSION['username1']       = $data['username'];
    $_SESSION['telepon1']        = $data['telepon'];
    $_SESSION['email1']          = $data['email'];
    $_SESSION['alamat1']         = $data['alamat'];
    $_SESSION['foto1']           = $data['foto'];

    // berfungsi mengecek jika user login sebagai admin
    if($data['level_user']=="admin"){
        // berfungsi membuat session
        $_SESSION['nama'] =  $data['nama'];
        $_SESSION['level_user'] = "admin";
        //berfungsi mengalihkan ke halaman admin
        header("location:user/admin/index.php");
        // berfungsi mengecek jika user login sebagai moderator
        }else if($data['level_user']=="petugas"){
        // berfungsi membuat session
        $_SESSION['nama'] = $data['nama'];
        $_SESSION['level_user'] = "petugas";
        // berfungsi mengalihkan ke halaman moderator
        header("location:user/petugas/index.php");

    }else{
        // berfungsi mengalihkan alihkan ke halaman login kembali
        echo '<script>alert("Username atau password salah")</script>';
        echo '<script>window.location="login-admin.php"</script>';
    }   
}else{
    echo '<script>alert("Username atau password salah")</script>';
        echo '<script>window.location="login-admin.php"</script>';
}
?>