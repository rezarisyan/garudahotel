<?php 
	include 'koneksi.php';

	if(isset($_GET['idu'])){
		$delete = mysqli_query($conn, "DELETE FROM tb_user WHERE id_user = '".$_GET['idu']."' ");
		echo '<script>window.location="edit-user.php"</script>';
	}
	if(isset($_GET['idl'])){
		$delete = mysqli_query($conn, "DELETE FROM tb_kelas WHERE id_kelas = '".$_GET['idl']."' ");
		echo '<script>window.location="kelas-hotel.php"</script>';
	}
	if(isset($_GET['idr'])){
		$delete = mysqli_query($conn, "DELETE FROM tb_room WHERE id_room = '".$_GET['idr']."' ");
		echo '<script>window.location="hotel.php"</script>';
	}      
	if(isset($_GET['idp'])){
		$produk = mysqli_query($conn, "SELECT product_image FROM tb_product WHERE product_id = '".$_GET['idp']."' ");
		$p = mysqli_fetch_object($produk);

		unlink('./Produk/'.$p->product_image);

		$delete = mysqli_query($conn, "DELETE FROM tb_product WHERE product_id = '".$_GET['idp']."' ");
		echo '<script>window.location="produk.php"</script>';
	}
?>