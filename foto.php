<?php
session_start();
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"/>
</head>
<body style="background-color: aqua;">
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid" style="background-color: black;">
    <a class="navbar-brand" href="index.php" style="color: white;">Website Galeri Foto</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse mt-2" id="navbarNavAltMarkup">
      <div class="navbar-nav me-auto">
      <a href="home.php"class="btn btn-outline-primary m-1 col-md-10">Home</a>
        <a href="album.php"class="btn btn-outline-primary m-1 col-md-10">Album</a>
        <a href="foto.php"class="btn btn-outline-primary m-1 col-md-10">Foto</a>
        </div>
      <a href="../config/aksi_logout.php" class="btn btn-outline-danger m-1">Logout</a>
    </div>
  </div>
</nav>
<div class="container">
    <div class="row">
        <div class="col-md-4">
<div class="card mt-2">
    <div class="card-header">Tambah Foto</div>
    <div class="card-body">
        <form action="../config/aksi_foto.php" method="POST" enctype="multipart/form-data">
            <label class="form-label">Judul Foto</label>
            <input type="text" name="judulfoto" class="form-control">
            <label class="form-label">Deskripsi</label>
            <textarea class="form-control" name="deskripsifoto"></textarea>
            <label class="form-label">Album</label>
            <SELECT class="form-control" name="albumid">
            <?php
            $userid= $_SESSION['userid'];
            $sql_album= mysqli_query($conn, "SELECT * FROM album where userid='$userid'");
            while($data_album = mysqli_fetch_array($sql_album)){?>
            <option value="<?php echo $data_album['albumid']?>"><?php echo $data_album['namaalbum']?></option>
            <?php } ?>
            </SELECT>
            <label class="form-label">File</label>
            <input type="file" class="form-control" name="lokasifile">
            <button type="submit" class="btn btn-primary mt-2" name="tambah">Tambah Data</button>
        </form>
    </div>
</div>
        </div>

        <div class="col-md-8">
        <div class="card mt-2">
        <div class="card-header">
        Serch For Album : 
  <?php
  $album = mysqli_query($conn, "SELECT * FROM album where userid='$userid'");
  while($row = mysqli_fetch_array($album)) { ?>
  <a href="foto.php?albumid=<?php echo $row['albumid']?>" class="btn btn-outline-primary"><?php echo $row['namaalbum']?></a>

  <?php } ?>
  <div class="row">
<?php
if(isset($_GET['albumid'])){
 $albumid= $_GET['albumid'];
 $query = mysqli_query($conn, "SELECT * FROM foto where userid='$userid' AND albumid='$albumid'");
 while($data = mysqli_fetch_array($query)){?>
     <div class="col-md-2 mt-1">
      <div class="card">
        <img src="../asset/img/<?php echo $data['lokasifile']?>" class="card-img-top" title="../asset/img/<?php echo $data['judulfoto']?>" style="width: 70px; height: 70  px;">
        <div class="card-footer text-center">
        
        </div>
      </div>
    </div>
 
<?php }}else{ 

$query = mysqli_query($conn, "SELECT * FROM foto where userid='$userid'");
while($data = mysqli_fetch_array($query)){?>
    <div class="col-md-3 mt-2">
      <div class="card">
        <img src="../asset/img/<?php echo $data['lokasifile']?>" class="card-img-top" title="../asset/img/<?php echo $data['judulfoto']?>" style="width: 50px; height: 50px; ">
        
      </div>
    </div>

<?php } }?>
</div>
</div>
        </div>
        <div class="card-body">
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Foto</th>
                    <th>Judul FOto</th>
                    <th>Deskripsi</th>
                    <th>Tanggal</th>
                    <th>Aksi</th>
                </tr>
                <tbody>
                  <?php
                  $no = 1;
                  $userid= $_SESSION['userid'];
                  $sql = mysqli_query($conn, "SELECT * FROM foto where userid='$userid'");
                  while($data=mysqli_fetch_array($sql)){
                    ?>
                    <tr>
                    <td><?php echo $no++ ?></td>
                    <td><img src="../asset/img/<?php echo $data['lokasifile']?>"width="100"></td>
                    <td><?=$data['judulfoto']?></td>
                    <td><?=$data['deskripsifoto']?></td>
                    <td><?=$data['tanggalunggah']?></td>
                    <td>
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#edit<?php echo $data['fotoid']?>">
 Update
</button>


<div class="modal fade" id="edit<?php echo $data['fotoid']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Update Data</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="../config/aksi_foto.php" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="fotoid" value="<?php echo $data['fotoid']?>">
                    <label class="form-label">Judul Foto</label>
            <input type="text" name="judulfoto" value="<?php echo $data['judulfoto']?>"class="form-control">
            <label class="form-label">Deskripsi</label>
            <textarea class="form-control" name="deskripsifoto"><?php echo $data['deskripsifoto']?></textarea>
            <label class="form-label">Album</label>
            <SELECT class="form-control" name="albumid">
            <?php
            $sql_album= mysqli_query($conn, "SELECT * FROM album where userid='$userid'");
            while($data_album = mysqli_fetch_array($sql_album)){?>
            <option <?php if($data_album['albumid'] == $data['albumid']){?> selected="selected" <?php } ?>value="<?php echo $data_album['albumid']?>"><?php echo $data_album['namaalbum']?></option>
            <?php } ?>
            </SELECT>
            <label class="form-label">Foto</label>
            <div class="row">
              <div class="col-md-4">
              <img src="../asset/img/<?php echo $data['lokasifile']?>"width="100">
              </div>
              <div class="col-md-8">
              <label class="form-label">Change File</label>
            <input type="file" class="form-control" name="lokasifile">
              </div>
            </div>
            
        
      </div>
      <div class="modal-footer">
        <button type="submit" name="edit" class="btn btn-primary">Update Data</button>
        </form>
      </div>
    </div>
  </div>
</div>

<button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#hapus<?php echo $data['fotoid']?>">
 Delete
</button>


<div class="modal fade" id="hapus<?php echo $data['fotoid']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Delete Data</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="../config/aksi_foto.php" method="POST">
                    <input type="hidden" name="fotoid" value="<?php echo $data['fotoid']?>">
                    Apakah anda yakin ingin menghapus data<strong><?php echo $data['judulfoto']?></strong>?
      </div>
      <div class="modal-footer">
        <button type="submit" name="hapus" class="btn btn-primary">Delete Data</button>
        </form>
      </div>
    </div>
  </div>
</div>
                    </td>
                        
                    </tr>
                    <?php
            }
        ?>
                </tbody>
            </thead>
        </table>
        </div>
        </div>
        </div>
    </div>
</div>


<footer class="d-flex justify-content-center border-top mt-3 bg-light fixed-bottom">
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
    <script type="text/javascript" src="../asset/js/bootstrap.min.js"></script>
</body>
</html>