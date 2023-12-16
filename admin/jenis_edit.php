<?php
session_start();

if(!isset($_SESSION['login'])){
    header("location:../login.php");
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="../vendor/light-bootstrap/assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../vendor/light-bootstrap/assets/img/favicon.ico">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Aplikasi Parkir</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <?php require_once('template/css.php'); ?>
</head>

<body>
    <div class="wrapper">
        <div class="sidebar" data-image="../vendor/light-bootstrap/assets/img/">
            <?php require_once('template/sidebar.php'); ?>
        </div>
        <div class="main-panel">

            <!-- Navbar -->
            <?php require_once('template/nav.php'); ?>
            <!-- End Navbar -->
            <div class="content">
                <div class="container-fluid">
                    

                    <div class="card ">
                        <div class="card-header ">
                            <h4 class="card-title">Edit Jenis Kendaraan</h4>
                            <hr>
                        </div>

                        <div class="card-body ">

                            <?php
                            include "../config/config.php";
                            $id = $_GET['id'];
                            $data = mysqli_query($koneksi,"SELECT * FROM jenisKendaraan WHERE id_jenisKendaraan='$id'");
                            ?>

                            <?php foreach($data as $kendaraan): ?>
                            <form action="../config/jenis/do_edit.php" method="post">
                                <input type="hidden" name="id" value="<?= $kendaraan['id_jenisKendaraan']; ?>">
                    
                                <div class="form-group">
                                    <label for="jenis_kendaraan">Jenis Kendaraan</label>
                                    <input type="text" class="form-control" id="jenis_kendaraan" name="jenis_kendaraan" value="<?= $kendaraan['jenis_kendaraan']; ?>">
                                </div>

                                <div class="form-group">
                                    <label for="harga">Harga</label>
                                    <input type="number" class="form-control" id="harga" name="harga" value="<?= $kendaraan['harga']; ?>">
                                </div>

                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary">Edit Data</button>
                                </div>
                            </form>
                            <?php endforeach; ?>

                        </div>
                    </div>
                            
                            
                </div>
            </div>

            <?php require_once('template/footer.php'); ?>
        </div>
    </div>

    <?php require_once('template/js.php'); ?>
</body>


</html>