<?php

include "../config.php";
$nomorP = $_POST['nomor_polisi'];
$namaK = $_POST['nama_kendaraan'];
$merkK = $_POST['merk_kendaraan'];
$jenisK = $_POST['jenis_kendaraan'];

$query = mysqli_query($koneksi,"INSERT INTO kendaraan VALUES('','$nomorP','$namaK','$merkK','$jenisK')");

if($query){
    header("location:../../admin/kendaraan.php");

}else{
    header("location:../../admin/kendaraan.php");
}
?>