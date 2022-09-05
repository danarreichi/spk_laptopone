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
        if ($_SESSION['jenis'] == "usr") {
            header("Location: pilihKriteria.php");
        }
        ?>
        <div class='col-2 d-flex flex-column justify-content-start h-100 py-5' id='sidebar'>
            <button class='btn btn-primary'">Master Laptop</button>
            <button class='btn btn-light' onclick=" location.href='MasterKriteria.php'">Master Kriteria</button>
            <button class='btn btn-light' onclick=" location.href='MasterKaryawan.php'">Master Karyawan</button>
            <div class='sidebarDivider align-self-center'></div>
            <button class='btn btn-light' id='buttonHitung' onclick=" location.href='pilihKriteria.php'">Hitung</button>
            <button class='btn btn-light' id='buttonHitung' onclick="location.href = 'logout.php'">Logout</button>
        </div>
        <div class='col d-flex flex-column coreTab h-100 py-5'>
            <div class='container-fluid px-5 d-flex w-100 justify-content-between'>
                <div class='tableTitle'>Master Laptop</div>
                <div class='align-self-end'>
                    <button class='btn btn-primary' onclick=" location.href='formTambahLaptop.php'">Tambah Data</button>
                </div>
            </div>
            <div class='container-fluid px-5'>
                <?php
                $query = "SELECT ID_LAPTOP, MERK, NAMA_LAPTOP FROM master_laptop m JOIN merk_laptop me ON m.ID_MERK = me.ID_MERK";
                $res = mysqli_query($conn, $query);
                ?>
                <table class=" table table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Merek</th>
                        <th scope="col">Nama Laptop</th>
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
                            <td> <?= $data['MERK'] ?> </td>
                            <td> <?= $data['NAMA_LAPTOP'] ?> </td>
                            <td>
                                <a href="formEditLaptop.php?id_laptop=<?= $data["ID_LAPTOP"] ?>">
                                    <button type="button" class="btn btn-success">Edit</button></a>
                                <button class='btn btn-danger' onclick='hapusLaptop(<?= $data["ID_LAPTOP"] ?>)'>Hapus</button>
                            </td>
                        </tr>
                    <?php
                        $num++;
                    }
                    ?>
                </tbody>
                </table>
        </div>
        <script>
            function hapusLaptop(id_laptop) {
                if (confirm('Apakah anda yakin menghapus laptop ini?')) {
                    window.location = "hapusLaptop.php?id_laptop=" + id_laptop;
                }
            }
        </script>
</body>

</html>