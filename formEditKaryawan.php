<?php
include_once 'connection.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='customStyle.css' rel='stylesheet'>
    <link href='Assets/css/bootstrap.css' rel='stylesheet'>
    <title>SPK Laptop One</title>
</head>

<body>

    <div class='container-fluid d-flex vh-100 justify-content-center align-items-center'>
        <div class='col-2 d-flex flex-column justify-content-start h-100 py-5' id='sidebar'>
            <button class='btn btn-light' onclick="location.href = 'MasterLaptop.php'">Master Laptop</button>
            <button class='btn btn-light' onclick="location.href = 'MasterKriteria.php'">Master Kriteria</button>
            <button class='btn btn-light' onclick="location.href = 'MasterKaryawan.php'">Master Karyawan</button>
            <div class='sidebarDivider align-self-center'></div>
            <button class='btn btn-light' id='buttonHitung'>Hitung</button>
        </div>
        <div class='col d-flex flex-column coreTab h-100 py-5'>
            <div class='container-fluid px-5 d-flex'>
                <div class='tableTitle'>Form Edit Karyawan</div>
            </div>

            <form action="edit_karyawan.php" method='post'>

                <?php

                //Ambil ID dari url
                $id_user = $_GET['id_karyawan'];

                $query = "SELECT * FROM karyawan WHERE ID_USER=$id_user";
                $res = mysqli_query($conn, $query);
                $data = mysqli_fetch_array($res);
                $tipe_user = $data['TIPE_USER'];
                ?>

                <div class='container-fluid px-5 d-flex flex-column'>
                    <div class='row w-100'>
                        <div class='col-6'>
                            <div class='inputData'>
                                <h4>ID Karyawan</h4>
                                <input class="form-control" name="idKaryawan" placeholder='ID Karyawan' value='<?= $id_user ?>' readonly>
                            </div>
                            <div class='inputData'>
                                <h4>Nama User</h4>
                                <input class="form-control" name="namaKaryawan" placeholder='Nama User' value='<?= $data['NAMA_USER'] ?>' required>
                            </div>
                            <input class='btn btn-success' style='position: relative; top: 1.5em' type="submit" value="Ubah Data">
                        </div>
                        <div class='col-6 px-5'>
                            <div class='inputData'>
                                <h4>Password User</h4>
                                <input type='password' class="form-control" name="passwordKaryawan" value='<?= $data['PASSWORD_USER'] ?>' placeholder='Password Karyawan'>
                            </div>
                            <div class='inputData'>
                                <h4>Tipe</h4>
                                <select class="form-select" name="tipeUser" required>
                                    <option value='adm' <?php if($data['TIPE_USER'] == "adm"){ echo 'selected';} ?>>Admin</option>
                                    <option value='usr' <?php if($data['TIPE_USER'] == "usr"){ echo 'selected';} ?>>User</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </form>

</body>

</html>