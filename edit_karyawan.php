<?php
include_once 'connection.php';

$id_karyawan = $_POST['idKaryawan'];
$nama_karyawan = $_POST['namaKaryawan'];
$password_karyawan = $_POST['passwordKaryawan'];
$tipe_user = $_POST['tipeUser'];

$query = "UPDATE karyawan SET NAMA_USER = '" . $nama_karyawan . "', PASSWORD_USER= '" . $password_karyawan . "', TIPE_USER = '" . $tipe_user . "' WHERE ID_USER = " . $id_karyawan;
$res = mysqli_query($conn, $query);

header("Location: MasterKaryawan.php");
