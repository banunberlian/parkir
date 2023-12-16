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
    <title>Web Parkir</title>
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
                            <h4 class="card-title">KENDARAAN</h4>
                            <hr>
                        </div>

                        <div class="card-body ">

                            <div class="container mt-5">

                                <div class="row mb-3">
                                    <div class="col-lg-6">
                                        <a class="btn btn-primary tambahData" href="kendaraan_tambah.php">
                                            Tambah Data Kendaraan
                                        </a>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-lg-6">
                                        <form action="kendaraan.php" method="get">
                                            <div class="input-group">
                                                <input type="text" class="form-control" placeholder="Cari Kendaraan.." name="cari" id="cari">
                                                <div class="input-group-append">
                                                    <button class="btn btn-outline-secondary" type="submit" id="tombolCari">Cari</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                                <div class="row text-center mt-2">
                                    <div class="col-md-6">
                                    <?php 
                                    if(isset($_GET['cari'])){
                                        $cari = $_GET['cari'];
                                        echo "
                                        <div class='text-muted text-center'>Hasil Pencarian '$cari'</div>
                                        <a class='badge badge-primary' href='kendaraan.php'>Kembali</a>
                                        ";
                                    }
                                    ?>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <h3>Daftar Kendaraan</h3>
                                        <ul class="list-group">
                                            <?php
                                            include "../config/config.php";
                                            if(isset($_GET['cari'])){
                                                $cari = $_GET['cari'];
                                                $data = mysqli_query($koneksi,"SELECT * FROM kendaraan WHERE nomor_polisi LIKE '%".$cari."%' OR nama_kendaraan LIKE '%".$cari."%' OR merk_kendaraan LIKE '%".$cari."%'");
                                            }else{
                                                $data = mysqli_query($koneksi,"SELECT * FROM kendaraan");
                                            }
                                            
                                            ?>
                                            <?php while ($kendaraan = mysqli_fetch_assoc($data)): ?>
                                            <li class="list-group-item">
                                                <?= $kendaraan['nomor_polisi']; ?> | <?= $kendaraan['merk_kendaraan']; ?> <?= $kendaraan['nama_kendaraan']; ?>
                                                <a class="badge badge-danger float-right ml-1" onclick="return confirm('Anda Yakin?');" href="../config/kendaraan/do_hapus.php?id=<?= $kendaraan['id']; ?>">Hapus</a>
                                                <a class="badge badge-success float-right ml-1" href="kendaraan_edit.php?id=<?= $kendaraan['id']; ?>">Edit</a>
                                                <a href='#myModal' class='badge badge-primary float-right ml-1' id='custId' data-toggle='modal' data-id="<?= $kendaraan['id']; ?>">Detail</a>
                                            </li>
                                            <?php endwhile; ?>
                                        </ul>
                                    </div>
                                </div>
                                </div>

                                <!-- Modal -->
                                <?php include "template/modal.php"; ?>
                                <!-- End Modal -->
                            </div>

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