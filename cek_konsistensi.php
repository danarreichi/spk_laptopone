<?php
include_once 'connection.php';
$query = "SELECT * FROM master_kriteria";
$res = mysqli_query($conn, $query);

$id_kriteria = array();
$prioritas = array();
$perbandingan = array();
$penjumlahan_perbandingan = array();
$pembagian_perbandingan = array();
$rata_rata_kriteria = array();
$a3 = array();
$a4 = array();
$lambda_max = 0;
$ci = 0;
$random_index = 1.32;
$cr = 0;

//Memasukkan id_kriteria ke array

for ($i = 1; $i <= mysqli_num_rows($res); $i++) {
    array_push($id_kriteria, $_POST['id_kriteria' . strval($i)]);
}
echo '<br>';

//Memasukkan prioritas ke array

for ($i = 1; $i <= mysqli_num_rows($res); $i++) {
    array_push($prioritas, $_POST['prioritas' . strval($i)]);
}

//copyright lila 2021
for ($i = 0; $i < count($id_kriteria); $i++) {
    for ($j = 0; $j < count($id_kriteria); $j++) {
        $perbandingan[$i][$j] = round($prioritas[$i] / $prioritas[$j], 2);
    }
}

for ($i = 0; $i < count($perbandingan); $i++) {
    $hasil = 0;
    for ($j = 0; $j < count($perbandingan); $j++) {
        $hasil = $hasil + $perbandingan[$j][$i];
    }
    $penjumlahan_perbandingan[0][$i] = $hasil;
}

for ($i = 0; $i < count($perbandingan); $i++) {
    for ($j = 0; $j < count($perbandingan); $j++) {
        $pembagian_perbandingan[$i][$j] = round($perbandingan[$i][$j] / $penjumlahan_perbandingan[0][$j], 2);
    }
}

for ($i = 0; $i < count($pembagian_perbandingan); $i++) {
    $hasil = 0;
    for ($j = 0; $j < count($pembagian_perbandingan); $j++) {
        $hasil = $hasil + $pembagian_perbandingan[$i][$j];
    }
    $hasil = $hasil / count($pembagian_perbandingan);
    $rata_rata_kriteria[$i][0] = round($hasil, 2);
}

$a3 = perkalian_matriks($perbandingan, $rata_rata_kriteria);

for ($i = 0; $i < count($a3); $i++) {
    $a4[$i][0] = round($a3[$i][0] / $rata_rata_kriteria[$i][0], 2);
}

$temp = 0;
for ($i = 0; $i < count($a4); $i++) {
    $temp = $temp + $a4[$i][0];
}

$lambda_max = $temp / count($a4);

$ci = ($lambda_max - count($id_kriteria)) / (count($id_kriteria) - 1);
$cr = $ci / $random_index;

$daftar_id_laptop = array();
$query = "SELECT distinct(ID_LAPTOP) FROM memiliki";
$res = mysqli_query($conn, $query);
while ($temporary = mysqli_fetch_array($res)) {
    array_push($daftar_id_laptop, $temporary[0]);
}

$matriks_sebelum_normalisasi = array();
for ($i = 0; $i < count($daftar_id_laptop); $i++) {
    $arrayBaris = array();
    $query2 = "SELECT VALUE FROM memiliki WHERE ID_LAPTOP = " . $daftar_id_laptop[$i] . " ORDER BY ID_LAPTOP, ID_KRITERIA";
    $rest = mysqli_query($conn, $query2);
    while ($temporary = mysqli_fetch_array($rest)) {
        array_push($arrayBaris, $temporary[0]);
    }
    array_push($matriks_sebelum_normalisasi, $arrayBaris);
}

$daftar_tipe_kriteria = array();
$query = "SELECT TIPE_KRITERIA FROM master_kriteria";
$res = mysqli_query($conn, $query);
while ($temporary = mysqli_fetch_array($res)) {
    array_push($daftar_tipe_kriteria, $temporary[0]);
}

// echo $daftar_tipe_kriteria[0];
// echo "<br>";

$matriks_setelah_normalisasi = array();
for ($i = 0; $i < count($daftar_tipe_kriteria); $i++) {
    if ($daftar_tipe_kriteria[$i] == "cos") {
        $min = min(array_column($matriks_sebelum_normalisasi, $i));
        for ($j = 0; $j < count($daftar_id_laptop); $j++) {
            $matriks_setelah_normalisasi[$j][$i] = $min / $matriks_sebelum_normalisasi[$j][$i];
        }
    } else if ($daftar_tipe_kriteria[$i] == "ben") {
        $max = max(array_column($matriks_sebelum_normalisasi, $i));
        for ($j = 0; $j < count($daftar_id_laptop); $j++) {
            $matriks_setelah_normalisasi[$j][$i] = $matriks_sebelum_normalisasi[$j][$i] / $max;
        }
    }
}

$hasil_saran = perkalian_matriks($matriks_setelah_normalisasi, $rata_rata_kriteria);


for ($i = 0; $i < count($daftar_id_laptop); $i++) {
    $hasil_saran[$i][1] = $daftar_id_laptop[$i];
}

function perkalian_matriks($matriks_a, $matriks_b)
{
    $hasil = array();
    for ($i = 0; $i < sizeof($matriks_a); $i++) {
        for ($j = 0; $j < sizeof($matriks_b[0]); $j++) {
            $temp = 0;
            for ($k = 0; $k < sizeof($matriks_b); $k++) {
                $temp += $matriks_a[$i][$k] * $matriks_b[$k][$j];
            }
            $hasil[$i][$j] = $temp;
        }
    }
    return $hasil;
}

for ($i = 0; $i < count($id_kriteria); $i++) {
    for ($j = 0; $j < count($id_kriteria); $j++) {
        echo $perbandingan[$i][$j];
        echo ';';
    }
    echo "<br>";
}

echo "------------------- <br>";

for ($i = 0; $i < count($penjumlahan_perbandingan, 1) - 1; $i++) {
    echo $penjumlahan_perbandingan[0][$i];
    echo ';';
}

echo "<br>";

echo "<br>";
echo "<br>";

for ($i = 0; $i < count($pembagian_perbandingan); $i++) {
    for ($j = 0; $j < count($pembagian_perbandingan); $j++) {
        echo $pembagian_perbandingan[$i][$j];
        echo ';';
    }
    echo "<br>";
}

echo "<br>";
echo "A2";
echo "<br>";

for ($i = 0; $i < count($rata_rata_kriteria); $i++) {
    echo $rata_rata_kriteria[$i][0];
    echo ';';
}

echo "<br>";
echo "<br>";
echo "A3";
echo "<br>";

for ($i = 0; $i < count($a3); $i++) {
    echo $a3[$i][0];
    echo ';';
}

echo "<br>";
echo "<br>";
echo "A4";
echo "<br>";

for ($i = 0; $i < count($a4); $i++) {
    echo $a4[$i][0];
    echo ';';
}

echo "<br>";
echo "<br>";
echo "CI";
echo "<br>";
echo $ci;

echo "<br>";
echo "<br>";
echo "CR";
echo "<br>";
echo $cr;
echo "<br>";
echo "<br>";

echo "sebelum normalisasi <br>";
for ($i = 0; $i < count($matriks_sebelum_normalisasi); $i++) {
    for ($j = 0; $j < count($id_kriteria); $j++) {
        echo round($matriks_sebelum_normalisasi[$i][$j], 2);
        echo ";";
    }
    echo "<br>";
}

echo "<br>";
echo "setelah normalisasi <br>";

for ($i = 0; $i < count($matriks_setelah_normalisasi); $i++) {
    for ($j = 0; $j < count($id_kriteria); $j++) {
        echo round($matriks_setelah_normalisasi[$i][$j], 2);
        echo ";";
    }
    echo "<br>";
}
echo "<br>";
echo "Hasil Saran";
echo "<br>";

for ($i = 0; $i < count($hasil_saran); $i++) {
    echo round($hasil_saran[$i][0], 3);
    echo ';';
    echo $hasil_saran[$i][1];
    echo '; <br>';
}

echo "<br>";
echo "Hasil Saran (Terurut)";
echo "<br>";

//buat sorting dari yang terbesar
rsort($hasil_saran);

for ($i = 0; $i < count($hasil_saran); $i++) {
    $query = "SELECT NAMA_LAPTOP FROM master_laptop WHERE ID_LAPTOP = " . $hasil_saran[$i][1];
    $res = mysqli_query($conn, $query);
    while ($row = mysqli_fetch_array($res)) {
        $hasil_saran[$i][2] = $row[0];
    }
    echo round($hasil_saran[$i][0], 3);
    echo ';';
    echo $hasil_saran[$i][1];
    echo '; ';
    echo $hasil_saran[$i][2];
    echo '; <br>';
}
session_start();
$_SESSION['array'] = $hasil_saran;
// header("Location: hasil.php");
