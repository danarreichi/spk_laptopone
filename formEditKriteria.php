<?php
include_once 'connection.php';
$id_kriteria = $_GET['idKriteria'];

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
            <button class='btn btn-light' id='buttonHitung'>Hitung</button>
        </div>
        <div class='col d-flex flex-column coreTab h-100 py-5'>
            <div class='container-fluid px-5 d-flex'>
                <div class='tableTitle'>Form Edit Kriteria</div>
            </div>

            <form action="edit_kriteria.php" method='post'>

                <?php
                $query = "SELECT * FROM master_kriteria WHERE ID_KRITERIA = ".$id_kriteria;
                $res = mysqli_query($conn, $query);
                while ($data = mysqli_fetch_array($res)) {
                    $kategori = $data['TIPE_KRITERIA'];
                    $nama = $data['NAMA_KRITERIA'];
                }
                ?>

                <div class='container-fluid px-5 d-flex flex-column'>
                    <div class='row w-100'>
                        <div class='col-6'>
                            <div class='inputData'>
                                <h4>ID Kriteria</h4>
                                <input class="form-control" name="idKriteria" placeholder='ID Kriteria' value='<?= $id_kriteria ?>' readonly>
                            </div>
                            <div class='inputData'>
                                <h4>Nama Kriteria</h4>
                                <input class="form-control" name="namaKriteria" value="<?= $nama; ?>" placeholder='Nama Kriteria' readonly required>
                            </div>
                            <input class='btn btn-success' style='position: relative; top: 1.5em' type="submit" value="Ubah Data">
                        </div>
                        <div class='col-6 px-5'>
                            <div class='inputData'>
                                <h4>Kategori Kriteria</h4>
                                <select class="form-select" name="katKriteria" required>
                                    <option value="">-- Pilih --</option>
                                    <option value="cos" <?php if($kategori == "cos"){ echo 'selected';} ?>> Cost (Terkecil paling baik) </option>
                                    <option value="ben" <?php if($kategori == "ben"){ echo 'selected';} ?>> Benefit (Terbesar paling baik) </option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </form>

</body>

</html>