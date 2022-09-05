<?php
include_once 'connection.php';

$id_kriteria = $_POST['idKriteria'];
$nama_kriteria = $_POST['namaKriteria'];
$kategori_kriteria = $_POST['katKriteria'];

$query = "INSERT INTO master_kriteria VALUES(" . $id_kriteria . ", '" . $nama_kriteria . "', '" . $kategori_kriteria . "')";
$res = mysqli_query($conn, $query);

header("Location: MasterKriteria.php");
