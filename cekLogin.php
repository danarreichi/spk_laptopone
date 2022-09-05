<?php
include_once 'connection.php';

$username = $_POST['username'];
$password = $_POST['password'];

$query = "SELECT * FROM karyawan WHERE BINARY NAMA_USER = '" . $username . "' AND BINARY PASSWORD_USER = '" . $password . "'";

$res = mysqli_query($conn, $query);

if (mysqli_num_rows($res) == 1) {
    while ($usr = mysqli_fetch_array($res)) {
        session_start();
        if ($usr['TIPE_USER'] == "adm") {
            $_SESSION['jenis'] = "adm";
            header("Location: MasterLaptop.php");
        } else if ($usr['TIPE_USER'] == "usr") {
            $_SESSION['jenis'] = "usr";
            header("Location: pilihKriteria.php");
        }
    }
} else {
    session_start();
    $_SESSION['message'] = 'User tidak ditemukan';
    header("Location: index.php");
}
