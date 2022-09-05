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
    <?php
        session_start();
        ?>
        <div class='col-2 d-flex flex-column justify-content-start h-100 py-5' id='sidebar'>
            <button class='btn btn-light' onclick="location.href = 'MasterLaptop.php'" <?php if($_SESSION['jenis'] == "usr"){ echo "disabled"; } ?>>Master Laptop</button>
            <button class='btn btn-primary'>Master Kriteria</button>
            <button class='btn btn-light' onclick="location.href = 'MasterKaryawan.php'" <?php if($_SESSION['jenis'] == "usr"){ echo "disabled"; } ?>>Master Karyawan</button>
            <div class='sidebarDivider align-self-center'></div>
            <button class='btn btn-light' id='buttonHitung' onclick="location.href = 'pilihKriteria.php'">Hitung</button>
            <button class='btn btn-light' id='buttonHitung' onclick="location.href = 'logout.php'">Logout</button>
        </div>
        <div class='col d-flex flex-column coreTab h-100 py-5'>
            <div class='container-fluid px-5 d-flex w-100 justify-content-between'>
                <div class='tableTitle'>Master Kriteria</div>
                <!-- <div class='align-self-end'>
                    <button class='btn btn-primary' onclick="location.href = 'formTambahKriteria.php'">Tambah Data</button>
                </div> -->
            </div>
            <div class='container-fluid px-5'>
                <?php
                $query = "SELECT * FROM master_kriteria";
                $res = mysqli_query($conn, $query);
                ?>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nama Kriteria</th>
                            <th scope="col">Tipe Kriteria</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $num = 1;
                        while ($data = mysqli_fetch_array($res)) {
                        ?>
                            <tr>
                                <th scope="row"> <?= $num; ?> </th>
                                <td> <?= $data['NAMA_KRITERIA'] ?> </td>
                                <td> <?= $data['TIPE_KRITERIA'] ?> </td>
                                <td>
                                    <a href="formEditKriteria.php?idKriteria=<?= $data["ID_KRITERIA"] ?>">
                                        <button type="button" class="btn btn-success w-100">Edit</button></a>
                                    <!-- <a href="hapusKriteria.php?idKriteria=<?= $data["ID_KRITERIA"] ?>">
                                        <button class='btn btn-danger'>Hapus</button>
                                    </a> -->
                                </td>
                            </tr>
                        <?php
                            $num++;
                        }
                        ?>
                    </tbody>
                </table>
            </div>

</body>

</html>