<?php
include "config.php";

$username = strtolower(stripslashes($_POST['username']));
$password = mysqli_real_escape_string($koneksi,$_POST['password']);
$password2 = mysqli_real_escape_string($koneksi,$_POST['password2']);

if ($password !== $password2){
    echo "<script>
        alert('Konfirmasi Password Tidak Sesuai!');
        window.location.href='../login.php';
    </script>";
}

$password = password_hash($password, PASSWORD_DEFAULT);

$query = mysqli_query($koneksi,"INSERT INTO user VALUES('','$username','$password')");

if ($query){
    echo "<script>
        alert('Registrasi berhasil, silahkan login kembali!');
        window.location.href='../login.php';
    </script>";
} else {
    echo "<script>
        alert('Registrasi gagal! Silahkan Registrasi Kembali!');
        window.location.href='../login.php';
    </script>";
}
?>