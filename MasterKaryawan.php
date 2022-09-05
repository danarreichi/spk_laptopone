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
            <button class='btn btn-light' onclick="location.href = 'MasterLaptop.php'">Master Laptop</button>
            <button class='btn btn-light' onclick="location.href = 'MasterKriteria.php'">Master Kriteria</button>
            <button class='btn btn-primary'>Master Karyawan</button>
            <div class='sidebarDivider align-self-center'></div>
            <button class='btn btn-light' id='buttonHitung' onclick="location.href = 'pilihKriteria.php'">Hitung</button>
            <button class='btn btn-light' id='buttonHitung' onclick="location.href = 'logout.php'">Logout</button>
        </div>
        <div class='col d-flex flex-column coreTab h-100 py-5'>
            <div class='container-fluid px-5 d-flex w-100 justify-content-between'>
                <div class='tableTitle'>Master Karyawan</div>
                <div class='align-self-end'>
                    <button class='btn btn-primary' onclick="location.href = 'formTambahKaryawan.php'">Tambah Data</button>
                </div>
            </div>
            <div class='container-fluid px-5'>
                <?php
                $query = "SELECT * FROM karyawan";
                $res = mysqli_query($conn, $query);
                ?>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nama User</th>
                            <th scope="col">Password</th>
                            <th scope="col">Tipe User</th>
                            <th scope="col"> Action </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $num = 1;
                        while ($data = mysqli_fetch_array($res)) {
                        ?>
                            <tr>
                                <th scope="row"> <?= $num; ?> </th>
                                <td> <?= $data['NAMA_USER'] ?> </td>
                                <td> <?= $data['PASSWORD_USER'] ?> </td>
                                <td> <?= $data['TIPE_USER'] ?> </td>
                                <td>
                                    <a href="formEditKaryawan.php?id_karyawan=<?= $data["ID_USER"] ?>">
                                        <button type="button" class="btn btn-success">Edit</button></a>

                                    <?php if (mysqli_num_rows($res) != 1) { ?>
                                        <button class='btn btn-danger' onclick="hapusKaryawan(<?= $data["ID_USER"] ?>)">Hapus</button>
                                    <?php } ?>
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
                function hapusKaryawan(id_karyawan) {
                    if (confirm('Apakah anda yakin menghapus karyawan ini?')) {
                        window.location = "hapusKaryawan.php?id_karyawan=" + id_karyawan;
                    }
                }
            </script>
</body>

</html>