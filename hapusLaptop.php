<?php
include_once 'connection.php';

$id_laptop = $_GET['id_laptop'];

$query = "DELETE FROM memiliki WHERE ID_LAPTOP = $id_laptop";
$res = mysqli_query($conn, $query);

$query = "DELETE FROM master_laptop WHERE ID_LAPTOP = $id_laptop";
$res = mysqli_query($conn, $query);

header("Location: MasterLaptop.php");
