<?php 
session_start();
// menghapus session
session_destroy();

echo '<script>alert("anda telah logout")</script>';
echo '<script>window.location="index.php"</script>';

?>