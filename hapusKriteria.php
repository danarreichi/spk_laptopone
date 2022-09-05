<?php
include_once 'connection.php';

$id_kriteria = $_GET['idKriteria'];

$query = "DELETE FROM master_kriteria WHERE ID_KRITERIA = $id_kriteria";
$res = mysqli_query($conn, $query);

header("Location: MasterKriteria.php");
