<?php 
	include 'koneksi.php';

	if(isset($_GET['idu'])){
		$delete = mysqli_query($conn, "DELETE FROM tb_user WHERE id_user = '".$_GET['idu']."' ");
		echo '<script>window.location="edit-user.php"</script>';
	}
	if(isset($_GET['idt'])){
		$delete = mysqli_query($conn, "DELETE FROM tb_tamu WHERE id_tamu = '".$_GET['idt']."' ");
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
	if(isset($_GET['idg'])){
		$kamar = mysqli_query($conn, "SELECT gambar_hotel FROM tb_room WHERE id_room = '".$_GET['idg']."' ");
		$k = mysqli_fetch_object($kamar);

		unlink('./image/'.$k->gambar_hotel);

		$delete = mysqli_query($conn, "DELETE FROM tb_room WHERE id_room = '".$_GET['idg']."' ");
		echo '<script>window.location="produk.php"</script>';
	}
?>