<?php

include "../config.php";
$jenisK = $_POST['jenis_kendaraan'];
$harga = $_POST['harga'];

$query = mysqli_query($koneksi,"INSERT INTO jenisKendaraan VALUES('','$jenisK','$harga')");

if($query){
    header("location:../../admin/jenis_kendaraan.php");

}else{
    header("location:../../admin/jenis_kendaraan.php");
}
?>