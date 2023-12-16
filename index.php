<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Web Parkir</title>
    <?php require_once('template/css.php'); ?>
</head>
<body>
    <!-- Navigation -->
    <?php require_once('template/nav.php'); ?>

    <!-- Page Content -->
    <div class="container">
    <center><h3 class="mt-4">NEO CULTURE INSTITUTE OF TECHNOLOGY</h3></center>
    <center><p>WEBSITE PARKIR</p></center>
        
        <h3 class="mt-4">Daftar Parkir Kendaraan  </a>
       
        </h3>

        <form action="index.php" method="get">
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Cari Kendaraan.." name="cari" id="cari">
                <div class="input-group-append">
                    <input class="btn btn-outline-secondary" type="submit" id="tombolCari" value="Cari">
                </div>
            </div>
        </form>

        <div class="row text-center mt-2">
            <div class="col">
            <?php 
            if(isset($_GET['cari'])){
                $cari = $_GET['cari'];
                echo "
                <div class='text-muted text-center'>Hasil Pencarian '$cari'</div>
                <a class='badge badge-primary' href='index.php'>Kembali</a>
                ";
            }
            ?>
            </div>
        </div>

        <div class="row mt-3">

            <?php
            include "config/config.php";
            if(isset($_GET['cari'])){
                $cari = $_GET['cari'];
                $data = mysqli_query($koneksi,"SELECT * FROM kendaraan JOIN jenisKendaraan ON kendaraan.id_jenisKendaraan = jenisKendaraan.id_jenisKendaraan WHERE nomor_polisi LIKE '%".$cari."%' OR nama_kendaraan LIKE '%".$cari."%' OR merk_kendaraan LIKE '%".$cari."%'");
            } else {
                $data = mysqli_query($koneksi,"SELECT * FROM kendaraan JOIN jenisKendaraan ON kendaraan.id_jenisKendaraan = jenisKendaraan.id_jenisKendaraan");
            }
            ?>
            <?php while ($kendaraan = mysqli_fetch_array($data)): ?>
            <div class="col-md-4">
                <div class="card border-success mb-3">
                    <div class="card-header bg-transparent border-success">Nomor Polisi : <?= $kendaraan['nomor_polisi']; ?></div>
                    <div class="card-body text-success">
                        <p class="card-text"><?= $kendaraan['merk_kendaraan']; ?> <?= $kendaraan['nama_kendaraan']; ?></p>
                    </div>
                    <div class="card-footer">
                        <small class="text-muted">Harga Parkir : Rp.<?= rupiah($kendaraan['harga']); ?></small>
                    </div>
                </div>
            </div>
            <?php endwhile; ?>
            
        </div>
    </div>
    <!-- /.container -->

    <?php require_once('template/js.php'); ?>
</body>
</html>