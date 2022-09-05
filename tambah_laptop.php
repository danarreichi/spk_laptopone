<?php
include_once 'connection.php';

$id_laptop = $_POST['idLaptop'];
$id_merk = $_POST['merkLaptop'];
$nama_laptop = $_POST['namaLaptop'];

$id_harga = 1;
$harga = $_POST['harga'];
$harga_desc = $_POST['harga_desc'];

$id_layar = 2;
$layar = $_POST['layar'];
$layar_desc = $_POST['layar_desc'];

$id_prosesor = 3;
$prosesor = $_POST['prosesor'];
$prosesor_desc = $_POST['prosesor_desc'];

$id_kapasitas_memori = 4;
$kapasitas_memori = $_POST['kapasitas_memori'];
$kapasitas_memori_desc = $_POST['kapasitas_memori_desc'];

$id_tipe_memori = 5;
$tipe_memori = $_POST['tipe_memori'];
$tipe_memori_desc = $_POST['tipe_memori_desc'];

$id_kapasitas_harddisk = 6;
$kapasitas_harddisk = $_POST['kapasitas_harddisk'];
$kapasitas_harddisk_desc = $_POST['kapasitas_harddisk_desc'];

$id_aksesoris = 7;
$aksesoris = $_POST['aksesoris'];
$aksesoris_desc = $_POST['aksesoris_desc'];

$query = "INSERT INTO master_laptop VALUES(" . $id_laptop . ", " . $id_merk . ", '" . $nama_laptop . "')";
$res = mysqli_query($conn, $query);

$query = "INSERT INTO memiliki VALUES(" . $id_laptop . ", " . $id_harga . ", '" . $harga_desc . "', " . $harga . ")";
$res = mysqli_query($conn, $query);

$query = "INSERT INTO memiliki VALUES(" . $id_laptop . ", " . $id_layar . ", '" . $layar_desc . "', " . $layar . ")";
$res = mysqli_query($conn, $query);

$query = "INSERT INTO memiliki VALUES(" . $id_laptop . ", " . $id_prosesor . ", '" . $prosesor_desc . "', " . $prosesor . ")";
$res = mysqli_query($conn, $query);

$query = "INSERT INTO memiliki VALUES(" . $id_laptop . ", " . $id_kapasitas_memori . ", '" . $kapasitas_memori_desc . "', " . $kapasitas_memori . ")";
$res = mysqli_query($conn, $query);

$query = "INSERT INTO memiliki VALUES(" . $id_laptop . ", " . $id_tipe_memori . ", '" . $tipe_memori_desc . "', " . $tipe_memori . ")";
$res = mysqli_query($conn, $query);

$query = "INSERT INTO memiliki VALUES(" . $id_laptop . ", " . $id_kapasitas_harddisk . ", '" . $kapasitas_memori_desc . "', " . $kapasitas_harddisk . ")";
$res = mysqli_query($conn, $query);

$query = "INSERT INTO memiliki VALUES(" . $id_laptop . ", " . $id_aksesoris . ", '" . $aksesoris_desc . "', " . $aksesoris . ")";
$res = mysqli_query($conn, $query);

header("Location: MasterLaptop.php");
