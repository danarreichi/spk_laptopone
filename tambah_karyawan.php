<?php
include_once 'connection.php';

$id_karyawan = $_POST['idKaryawan'];
$nama_karyawan = $_POST['namaKaryawan'];
$password_karyawan = $_POST['passwordKaryawan'];
$tipe_user = $_POST['tipeUser'];

$query = "INSERT INTO karyawan VALUES(" . $id_karyawan . ", '" . $nama_karyawan . "', '" . $password_karyawan . "', '". $tipe_user ."')";
$res = mysqli_query($conn, $query);

header("Location: MasterKaryawan.php");
