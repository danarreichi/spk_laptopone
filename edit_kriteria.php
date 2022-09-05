<?php
include_once 'connection.php';

$id_kriteria = $_POST['idKriteria'];
$nama_kriteria = $_POST['namaKriteria'];
$kat_kriteria = $_POST['katKriteria'];

$query = "UPDATE master_kriteria SET NAMA_KRITERIA = '" . $nama_kriteria . "', TIPE_KRITERIA = '" . $kat_kriteria . "' WHERE ID_KRITERIA = " . $id_kriteria;
$res = mysqli_query($conn, $query);

header("Location: MasterKriteria.php");
