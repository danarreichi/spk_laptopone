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
            <button class='btn btn-light' onclick="window.history.back()">Kembali</button>
        </div>
        <div class='col d-flex flex-column coreTab h-100 py-5'>
            <div class='container-fluid px-5 d-flex'>
                <div class='tableTitle'>Detail Laptop</div>
            </div>

            <form method='post'>

                <?php

                //Ambil ID dari url
                $id_laptop = $_GET['id'];

                $query = "SELECT ID_MERK, NAMA_LAPTOP FROM master_laptop WHERE ID_LAPTOP=$id_laptop";
                $res = mysqli_query($conn, $query);
                $data = mysqli_fetch_array($res);
                $id_merek = $data['ID_MERK']
                ?>

                <div class='container-fluid px-5 d-flex flex-column' style='overflow-y: scroll; height: 75vh; margin: 2em 0 0 0'>
                    <div class='row w-100'>
                        <div class='col-6'>
                            <div class='inputData'>
                                <h4>ID Laptop</h4>
                                <input class="form-control" name="idLaptop" placeholder='ID Laptop' value='<?= $id_laptop ?>' readonly>
                            </div>
                            <div class='inputData'>
                                <h4>Nama Laptop</h4>
                                <input class="form-control" name="namaLaptop" value='<?= $data['NAMA_LAPTOP'] ?>' readonly>
                            </div>
                        </div>
                        <?php
                        $query = "SELECT * FROM merk_laptop";
                        $res = mysqli_query($conn, $query);
                        ?>
                        <div class='col-6'>
                            <div class='inputData'>
                                <h4>Merek</h4>
                                <select class="form-select" name="merkLaptop" disabled>
                                    <option value="">-- Choose --</option>
                                    <?php
                                    while ($data = mysqli_fetch_array($res)) {
                                        //kalo $id_merek colongan sama dengan ID_MERK ambil di database, maka nanti optionnya jadi keselect
                                        if ($id_merek == $data['ID_MERK']) {
                                    ?>
                                            <option value="<?= $data['ID_MERK'] ?>" selected><?= $data['MERK'] ?></option>
                                        <?php
                                        } else {
                                        ?>
                                            <option value="<?= $data['ID_MERK'] ?>"><?= $data['MERK'] ?></option>
                                    <?php
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <br>
                    <br>
                    <?php
                    $query = "SELECT * FROM memiliki WHERE ID_LAPTOP = " . $id_laptop . " AND ID_KRITERIA = 1";
                    $res = mysqli_query($conn, $query);
                    $data = mysqli_fetch_array($res);
                    ?>
                    <!-- HARGA -->
                    <div class="inputData row">
                        <div class='col-6'>
                            <h4>Harga</h4>
                            <select class="form-select" name="harga" disabled>
                                <option value="1" <?php if($data['VALUE'] == 1){ echo 'selected'; } ?>> Rp0 - Rp10.000.000 </option>
                                <option value="2" <?php if($data['VALUE'] == 2){ echo 'selected'; } ?>> Rp10.000.000 - Rp30.000.000 </option>
                                <option value="3" <?php if($data['VALUE'] == 3){ echo 'selected'; } ?>> Rp31.000.000 - Rp40.000.000 </option>
                                <option value="4" <?php if($data['VALUE'] == 4){ echo 'selected'; } ?>> Rp41.000.000 - Rp50.000.000 </option>
                                <option value="5" <?php if($data['VALUE'] == 5){ echo 'selected'; } ?>> Rp51.000.000 - Rp60.000.000 </option>
                                <option value="6" <?php if($data['VALUE'] == 6){ echo 'selected'; } ?>> Rp60.000.000 Keatas </option>
                            </select>
                        </div>
                        <div class='col-6 d-flex'>
                            <input class="form-control align-self-end" value="<?= $data['KETERANGAN'] ?>" name="harga_desc" placeholder='ex. Rp3.xxx.xxx' readonly>
                        </div>
                    </div>

                    <?php
                    $query = "SELECT * FROM memiliki WHERE ID_LAPTOP = " . $id_laptop . " AND ID_KRITERIA = 2";
                    $res = mysqli_query($conn, $query);
                    $data = mysqli_fetch_array($res);
                    ?>
                    <!-- LAYAR -->
                    <div class="inputData row">
                        <div class='col-6'>
                            <h4>Layar</h4>
                            <select class="form-select" name="layar" disabled>
                                <option value="1" <?php if($data['VALUE'] == 1){ echo 'selected'; } ?>> 10 - 12 inch </option>
                                <option value="2" <?php if($data['VALUE'] == 2){ echo 'selected'; } ?>> ~ 13 inch </option>
                                <option value="3" <?php if($data['VALUE'] == 3){ echo 'selected'; } ?>> ~ 14 inch </option>
                                <option value="4" <?php if($data['VALUE'] == 4){ echo 'selected'; } ?>> ~ 15 inch </option>
                                <option value="5" <?php if($data['VALUE'] == 5){ echo 'selected'; } ?>> ~ 16 inch </option>
                                <option value="6" <?php if($data['VALUE'] == 6){ echo 'selected'; } ?>> ~ 17 inch </option>
                            </select>
                        </div>
                        <div class='col-6 d-flex'>
                            <input class="form-control align-self-end " value="<?= $data['KETERANGAN'] ?>"  name="layar_desc" placeholder='ex. 14.7-inch' readonly>
                        </div>
                    </div>
                    
                    <?php
                    $query = "SELECT * FROM memiliki WHERE ID_LAPTOP = " . $id_laptop . " AND ID_KRITERIA = 3";
                    $res = mysqli_query($conn, $query);
                    $data = mysqli_fetch_array($res);
                    ?>
                    <!-- JENIS PROSESOR -->
                    <div class="inputData row">
                        <div class='col-6'>
                            <h4>Jenis Prosesor</h4>
                            <input class="form-control align-self-end " type="number" name="prosesor" value="<?= $data['VALUE'] ?>" min="0" readonly>
                        </div>
                        <div class='col-6 d-flex'>
                            <input class="form-control align-self-end " value="<?= $data['KETERANGAN'] ?>" name="prosesor_desc" placeholder='ex. Intel Core i7 7700HK' readonly>
                        </div>
                    </div>

                    <?php
                    $query = "SELECT * FROM memiliki WHERE ID_LAPTOP = " . $id_laptop . " AND ID_KRITERIA = 4";
                    $res = mysqli_query($conn, $query);
                    $data = mysqli_fetch_array($res);
                    ?>
                    <!-- KAPASITAS MEMORI -->
                    <div class="inputData row">
                        <div class='col-6'>
                            <h4>Kapasitas Memori</h4>
                            <select class="form-select" name="kapasitas_memori" disabled>
                                <option value="1" <?php if($data['VALUE'] == 1){ echo 'selected'; } ?>> 2 GB </option>
                                <option value="2" <?php if($data['VALUE'] == 2){ echo 'selected'; } ?>> 4 - 6 GB </option>
                                <option value="3" <?php if($data['VALUE'] == 3){ echo 'selected'; } ?>> 8 - 12 GB </option>
                                <option value="4" <?php if($data['VALUE'] == 4){ echo 'selected'; } ?>> > 12 GB </option>
                            </select>
                        </div>
                        <div class='col-6 d-flex'>
                            <input class="form-control align-self-end " value="<?= $data['KETERANGAN'] ?>" name="kapasitas_memori_desc" placeholder='ex. 8GB' readonly>
                        </div>
                    </div>

                    <?php
                    $query = "SELECT * FROM memiliki WHERE ID_LAPTOP = " . $id_laptop . " AND ID_KRITERIA = 5";
                    $res = mysqli_query($conn, $query);
                    $data = mysqli_fetch_array($res);
                    ?>
                    <!-- TIPE MEMORI -->
                    <div class="inputData row">
                        <div class='col-6'>
                            <h4>Tipe Memori</h4>
                            <select class="form-select" name="tipe_memori" disabled>
                                <option value="1" <?php if($data['VALUE'] == 1){ echo 'selected'; } ?>> < 1600 MHz </option>
                                <option value="2" <?php if($data['VALUE'] == 2){ echo 'selected'; } ?>> 2400 - 2666 MHz </option>
                                <option value="3" <?php if($data['VALUE'] == 3){ echo 'selected'; } ?>> 2700 - 3200 MHz </option>
                                <option value="4" <?php if($data['VALUE'] == 4){ echo 'selected'; } ?>> > 3200 MHz </option>
                            </select>
                        </div>
                        <div class='col-6 d-flex'>
                            <input class="form-control align-self-end " value="<?= $data['KETERANGAN'] ?>" name="tipe_memori_desc" placeholder='ex. DDR4 2666MHz' readonly>
                        </div>
                    </div>

                    <?php
                    $query = "SELECT * FROM memiliki WHERE ID_LAPTOP = " . $id_laptop . " AND ID_KRITERIA = 6";
                    $res = mysqli_query($conn, $query);
                    $data = mysqli_fetch_array($res);
                    ?>
                    <!-- KAPASITAS HARD DISK -->
                    <div class="inputData row">
                        <div class='col-6'>
                            <h4>Kapasitas Hard Disk</h4>
                            <select class="form-select" name="kapasitas_harddisk" disabled>
                                <option value="1" <?php if($data['VALUE'] == 1){ echo 'selected'; } ?>> 64 - 256 GB</option>
                                <option value="2" <?php if($data['VALUE'] == 2){ echo 'selected'; } ?>> 256 - 500 GB</option>
                                <option value="3" <?php if($data['VALUE'] == 3){ echo 'selected'; } ?>> 500 - 999 GB </option>
                                <option value="4" <?php if($data['VALUE'] == 4){ echo 'selected'; } ?>> > 1 TB</option>
                            </select>
                        </div>
                        <div class='col-6 d-flex'>
                            <input class="form-control align-self-end " value="<?= $data['KETERANGAN'] ?>" name="kapasitas_harddisk_desc" placeholder='ex. 512GB M.2 NVMe™ PCIe® 3.0 SSD' readonly>
                        </div>
                    </div>

                    <?php
                    $query = "SELECT * FROM memiliki WHERE ID_LAPTOP = " . $id_laptop . " AND ID_KRITERIA = 7";
                    $res = mysqli_query($conn, $query);
                    $data = mysqli_fetch_array($res);
                    ?>
                    <!-- AKSESORIS -->
                    <div class="inputData row">
                        <div class='col-6'>
                            <h4>Aksesoris</h4>
                            <select class="form-select" name="aksesoris" disabled>
                                <option value="1" <?php if($data['VALUE'] == 1){ echo 'selected'; } ?>> Tidak </option>
                                <option value="2" <?php if($data['VALUE'] == 2){ echo 'selected'; } ?>> Ya </option>
                            </select>
                        </div>
                        <div class='col-6 d-flex'>
                            <input class="form-control align-self-end " value="<?= $data['KETERANGAN'] ?>" name="aksesoris_desc" placeholder='ex. Mouse + Steam Wallet' readonly>
                        </div>
                    </div>
                </div>
            </form>
</body>

</html>