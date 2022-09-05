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

$query = "UPDATE master_laptop SET ID_MERK = " . $id_merk . ", NAMA_LAPTOP = '" . $nama_laptop . "' WHERE ID_LAPTOP = " . $id_laptop;
$res = mysqli_query($conn, $query);

$query = "UPDATE memiliki SET KETERANGAN = '" . $harga_desc . "', VALUE = " . $harga . " WHERE ID_LAPTOP = " . $id_laptop . " AND ID_KRITERIA = " . $id_harga;
$res = mysqli_query($conn, $query);
$query = "UPDATE memiliki SET KETERANGAN = '" . $layar_desc . "', VALUE = " . $layar . " WHERE ID_LAPTOP = " . $id_laptop . " AND ID_KRITERIA = " . $id_layar;
$res = mysqli_query($conn, $query);
$query = "UPDATE memiliki SET KETERANGAN = '" . $prosesor_desc . "', VALUE = " . $prosesor . " WHERE ID_LAPTOP = " . $id_laptop . " AND ID_KRITERIA = " . $id_prosesor;
$res = mysqli_query($conn, $query);
$query = "UPDATE memiliki SET KETERANGAN = '" . $kapasitas_memori_desc . "', VALUE = " . $kapasitas_memori . " WHERE ID_LAPTOP = " . $id_laptop . " AND ID_KRITERIA = " . $id_kapasitas_memori;
$res = mysqli_query($conn, $query);
$query = "UPDATE memiliki SET KETERANGAN = '" . $tipe_memori_desc . "', VALUE = " . $tipe_memori . " WHERE ID_LAPTOP = " . $id_laptop . " AND ID_KRITERIA = " . $id_tipe_memori;
$res = mysqli_query($conn, $query);
$query = "UPDATE memiliki SET KETERANGAN = '" . $kapasitas_harddisk_desc . "', VALUE = " . $kapasitas_harddisk . " WHERE ID_LAPTOP = " . $id_laptop . " AND ID_KRITERIA = " . $id_kapasitas_harddisk;
$res = mysqli_query($conn, $query);
$query = "UPDATE memiliki SET KETERANGAN = '" . $aksesoris_desc . "', VALUE = " . $aksesoris . " WHERE ID_LAPTOP = " . $id_laptop . " AND ID_KRITERIA = " . $id_aksesoris;
$res = mysqli_query($conn, $query);

header("Location: MasterLaptop.php");
