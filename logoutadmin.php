<?php 
session_start();
// mengahapus semua session yang di simpan
session_destroy();

echo '<script>alert("anda telah logout")</script>';
echo '<script>window.location="login-admin.php"</script>';

?>