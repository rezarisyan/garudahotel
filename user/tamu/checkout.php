<?php
include 'koneksi.php';

// mendapatkan id_checkin dari url
$id_checkin = $_GET['id'];
$ambil = $conn->query("SELECT * FROM tb_checkin WHERE id_checkin='$id_checkin' ");
$detc = $ambil->fetch_assoc();
$tanggal_keluar = date("Y-m-d");

$id_room = $detc['id_room'];

// mengambil data room berdasarkan id_pembayaran
$ambil2 = $conn->query("SELECT * FROM tb_room WHERE id_room='$id_room'");
$detail2 = $ambil2->fetch_assoc();

$id_room1 = $detail2['id_room'];


// simpan data checkout dari url 
$conn->query("INSERT INTO tb_checkout(id_checkin,tanggal_keluar)
                                        VALUES ('$id_checkin','$tanggal_keluar') ");

// update data checkin dari selesai menjadi sudah sudah selesai
$conn->query("UPDATE tb_checkin SET status_checkin='sudah-selesai'
                                        WHERE id_checkin='$id_checkin'");

// update data checkin dari selesai menjadi sudah sudah selesai
$conn->query("UPDATE tb_room SET status_hotel='Tersedia'
                                        WHERE id_room='$id_room1'");

echo '<script>alert("Terimakasih sudah menginap di hotel kami")</script>'; 
echo '<script>window.location="riwayat.php"</script>';

?>