<?php

session_start();

if(!isset($_SESSION['login'])){
    header("location:../login.php");
    exit;
}
include "../config.php";

if($_POST['rowid']) {
    $id = $_POST['rowid'];
    // mengambil data berdasarkan id
    $sql = "SELECT * FROM kendaraan JOIN jenisKendaraan ON kendaraan.id_jenisKendaraan = jenisKendaraan.id_jenisKendaraan WHERE id = $id";
    $result = $koneksi->query($sql);
    foreach ($result as $kendaraan) { ?>
        <table class="table">
            <tr>
                <td>Nomor Polisi</td>
                <td>:</td>
                <td><?php echo $kendaraan['nomor_polisi']; ?></td>
            </tr>
            <tr>
                <td>Nama Kendaraan</td>
                <td>:</td>
                <td><?php echo $kendaraan['nama_kendaraan']; ?></td>
            </tr>
            <tr>
                <td>Merk Kendaraan</td>
                <td>:</td>
                <td><?php echo $kendaraan['merk_kendaraan']; ?></td>
            </tr>
            <tr>
                <td>Jenis Kendaraan</td>
                <td>:</td>
                <td><?php echo $kendaraan['jenis_kendaraan']; ?></td>
            </tr>
            <tr>
                <td>Harga Parkir</td>
                <td>:</td>
                <td><?php echo $kendaraan['harga']; ?></td>
            </tr>
        </table>
    <?php 

    }
}
$koneksi->close();
?>