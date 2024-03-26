<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LAPORAN HASIL DARI UKK TABEL Like</title>
    <link rel="shortcut icon" href="../asset/img/yphk.png">
</head>
<body>
<script>
		window.print();
	</script>
<table width="100%" border="1" cellpadding="5" cellspacing="0">
        <tr bgcolor="gray">
            <th>Id Like</th>
            <th>Id Foto</th>
            <th>Id User</th>
            <th>Tanggal Like</th>
        </tr>
        <?php
            include "../config/koneksi.php";
            $sql=mysqli_query($conn,"select * from likefoto");
            while($data=mysqli_fetch_array($sql)){
        ?>
            <tr>
                <td><?=$data['likeid']?></td>
                <td><?=$data['fotoid']?></td>
                <td><?=$data['userid']?></td>
                <td><?=$data['tanggallike']?></td>
            </tr>
        <?php
            }
        ?>
    </table>
<script type="text/javascript">
            $(document).ready(function(){
                $('.klik menu').click(function(){
                    var menu=$(this).attr('id');
                    if(menu="home"){
                        $('.badan').load('home.php');
                    }else if(menu="album"){
                        $('.badan').load('album.php');
                    }else if(menu="foto"){
                        $('.badan').load('foto.php');
                    }else if(menu="logout"){
                        $('.badan').load('logout.php');
                }
            });
            $('.badan').load('home.php');
        });
        </script>
        <center>
  <p>&copy; UKK RPL 2024 | Arnozzlea Ambarita</p>

</center>
</div>
</body>
</html>