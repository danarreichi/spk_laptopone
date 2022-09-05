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
            <button class='btn btn-light' onclick="location.href = 'MasterKriteria.php'">Master Kriteria</button>
            <button class='btn btn-light' onclick="location.href = 'MasterKaryawan.php'" <?php if($_SESSION['jenis'] == "usr"){ echo "disabled"; } ?>>Master Karyawan</button>
            <div class='sidebarDivider align-self-center'></div>
            <button class='btn btn-primary' id='buttonHitung'>Hitung</button>
            <button class='btn btn-light' id='buttonHitung' onclick="location.href = 'logout.php'">Logout</button>
        </div>
        <div class='col d-flex flex-column coreTab h-100 py-5'>
            <div class='container-fluid px-5 d-flex w-100 justify-content-between'>
                <div class='tableTitle'>Pilih Prioritas Kriteria</div>
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
                            <th scope="col">Nilai Prioritas</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $num = 1;
                        while ($data = mysqli_fetch_array($res)) {
                        ?>
                            <form action="cek_konsistensi.php" method="post">
                                <tr>
                                    <input type="hidden" <?= 'name=id_kriteria' . $num ?> value="<?= $data['ID_KRITERIA'] ?>">
                                    <th scope="row"> <?= $num; ?> </th>
                                    <td> <?= $data['NAMA_KRITERIA'] ?> </td>
                                    <td>
                                        <select <?= 'name=prioritas' . $num ?> class='form-control w-50' style='font-weight: 600'>
                                            <option value="1" style='font-weight: 600'>1 (Sangat Rendah)</option>
                                            <option value="2">2</option>
                                            <option value="3" style='font-weight: 600'>3 (Rendah)</option>
                                            <option value="4">4</option>
                                            <option value="5" style='font-weight: 600'>5 (Normal)</option>
                                            <option value="6">6</option>
                                            <option value="7" style='font-weight: 600'>7 (Penting)</option>
                                            <option value="8">8</option>
                                            <option value="9" style='font-weight: 600'>9 (Sangat Penting)</option>
                                        </select>
                                    </td>
                                </tr>
                            <?php
                            $num++;
                        }
                            ?>
                    </tbody>
                </table>
                <div class='w-100'>
                    <input type='submit' class="btn btn-primary w-100" value="Tampilkan Saran Laptop">
                </div>
                </form>
            </div>
</body>

</html>