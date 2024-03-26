<?php
session_start();
$userid = $_SESSION['userid'];
include "../config/koneksi.php";
if($_SESSION['status']!='login')
echo "<script>alert('Anda Belum Login');
location.href='../login.php';
</script>";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Website Galeri Foto</title>
    <link rel="shortcut icon" href="../asset/img/yphk.png">
    <link rel="stylesheet" href="../asset/css/bootstrap.min.css">
    <style>/* Dropdown Button */
.dropbtn {
  
  background-color: blue;
  color: white;
  padding: 16px;
  font-size: 16px;
  border: none;
}

/* The container <div> - needed to position the dropdown content */
.dropdown {
  position: relative;
  display: inline-block;
}

/* Dropdown Content (Hidden by Default) */
.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f1f1f1;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

/* Links inside the dropdown */
.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

/* Change color of dropdown links on hover */
.dropdown-content a:hover {background-color: blue;}

/* Show the dropdown menu on hover */
.dropdown:hover .dropdown-content {display: block;}

/* Change the background color of the dropdown button when the dropdown content is shown */
.dropdown:hover .dropbtn {background-color: #3e8e41;}</style>
  
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"/>
</head>

<body style="background-color: aqua;">
<div class="bg-primary text-white"></div>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid" style="background-color: black;">
    <a class="navbar-brand" href="index.php"  style="color: white;">Website Galeri Foto</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse mt-2 " id="navbarNavAltMarkup">
      <div class="navbar-nav me-auto" >
        <a href="home.php"class="btn btn-outline-primary m-1 col-md-10">Home</a>
        <a href="album.php"class="btn btn-outline-primary m-1 col-md-10">Album</a>
        <a href="foto.php"class="btn btn-outline-primary m-1 col-md-10">Foto</a>
      </div>
      <a href="../config/aksi_logout.php" class="btn btn-outline-danger m-1">Logout</a>
    </div>
  </div>
</nav>
<div class="dropdown">
  <button class="dropbtn">Print Laporan</button>
  <div class="dropdown-content">
    <a href="laporan_album.php">Album</a>
    <a href="laporan_foto.php">Foto</a>
    <a href="laporan_komentar.php">Komentar</a>
    <a href="laporan.php">Like</a>
  </div>
</div>
<div class="container mt-3" >
  <div class="row">
    <?php
    $query = mysqli_query($conn, "SELECT * FROM foto INNER JOIN user ON foto.userid=user.userid INNER JOIN album ON foto.albumid=album.albumid");
    while($data = mysqli_fetch_array($query)){?>
        <div class="col-md-3 mt-2">
        <a type="button"  data-bs-toggle="modal" data-bs-target="#komentar<?php echo $data['fotoid']?>">
    
          <div class="card mb-2">
            <img src="../asset/img/<?php echo $data['lokasifile']?>" class="card-img-top" title="../asset/img/<?php echo $data['judulfoto']?>" style=" height: 15rem;">
            <div class="card-footer text-center">
            <?php
            $fotoid = $data['fotoid'];
            $ceksuka = mysqli_query($conn, "SELECT * FROM likefoto where fotoid='$fotoid' and userid='$userid'");
            if(mysqli_num_rows($ceksuka)== 1){?>
            <a href="../config/proses_like_index.php?fotoid=<?php echo $data['fotoid']?>" 
            type="submit" name="batalsuka"><i class="fa fa-heart" ></i></a>
            <?php } else { ?>
              <a href="../config/proses_like_index.php?fotoid=<?php echo $data['fotoid']?>" 
            type="submit" name="suka"><i class="fa-regular fa-heart" ></i></a>
            <?php }
            $LIKE = mysqli_query($conn, "SELECT * FROM likefoto where fotoid='$fotoid'");
            echo mysqli_num_rows($LIKE). ' Suka';
            ?>
            <a href="#" type="button"  data-bs-toggle="modal" data-bs-target="#komentar<?php echo $data['fotoid']?>"><i class="fa-regular fa-comment"></i></a>
            <?php 
            $jmlkomen = mysqli_query($conn, "SELECT * FROM komentarfoto where fotoid='$fotoid'");
            echo mysqli_num_rows($jmlkomen). ' Komentar';
            ?>
            </div>
          </div>
          </a>
          <!-- Modal -->
<div class="modal fade" id="komentar<?php echo $data['fotoid']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body">
        <div class="row">
          <div class="col-md-7">
          <img src="../asset/img/<?php echo $data['lokasifile']?>" class="card-img-top" title="../asset/img/<?php echo $data['judulfoto']?>" style=" height: 15rem;">
          </div>
          <div class="col-md-16">
<div class="m-2">
  <div class="overlow-auto">
    <div class="sticky-top">
      <strong><?php echo $data['judulfoto'] ?></strong><br>
      <span class="badge bg-secondary"><?php echo $data['namalengkap'] ?></span>
      <span class="badge bg-secondary"><?php echo $data['tanggalunggah'] ?></span>
      <span class="badge bg-primary"><?php echo $data['namaalbum'] ?></span>
    </div>
    <hr>
    <p align="left">
      <?php echo $data['deskripsifoto'] ?>
    </p>
    <hr>
              <?php 
              $fotoid = $data['fotoid'];
              $komentar = mysqli_query($conn, "SELECT * FROM komentarfoto INNER JOIN user ON komentarfoto.userid=user.userid where komentarfoto.fotoid='$fotoid'");
              while($row =mysqli_fetch_array($komentar)){
              ?>
              <p align="left">
                <strong><?php echo $row['namalengkap']?></strong>
                <?php echo $row['isikomentar']?>
              </p>
              <?php } ?>
    <hr>
    <div class="sticky-bottom">
      <form action="../config/proses_komentar.php" method="post">
        <div class="input-group">
          <input type="hidden" name="fotoid" value="<?php echo $data['fotoid']?>">
          <input type="text" name="isikomentar" class="form-control" placeholder="Tambah Komentar">
          <div class="input-group-prepend">
            <button type="submit" name="kirimkomentar" class="btn btn-outline-primary">Kirim</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
        </div>
    <?php } ?>
  </div>
</div>


    <script type="text/javascript" src="../asset/js/bootstrap.min.js"></script>
    <footer class="d-flex justify-content-center border-top mt-3 bg-light fixed-bottom" >
    💙
💙
💙
💙
💙
  <p>&copy; UKK RPL 2024 | Arnozzlea Ambarita</p>
💙
💙
💙
💙
💙

</footer>

</body>
</html>