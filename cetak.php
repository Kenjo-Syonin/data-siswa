<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
    if(isset($_GET['hapus'])){
        $key = $_GET['hapus'];
        unset($_SESSION['data'][$key]);
        header("location: cetak.php");
        exit;
    }

    echo "<table border= '1'>";
    echo "<tr><th>Nama</th> <th>NIS</th> <th>Rayon</th> <th>Aksi</th></tr>";
    foreach($_SESSION['data'] as $key => $data){
        echo "<tr>";
        echo "<td>". $data['nama']. "</td>";
        echo "<td>". $data['nis']. "</td>";
        echo "<td>". $data['rayon']. "</td>";
        echo "<td><a href='?hapus=". $key . "'>Hapus</a></td>";
        echo "</tr>";
    }
    echo "</table>";
?>
<button><a href="index.php">Kembali</a></button>
<button><a href="destroy.php">Kembali dan hapus</a></button>
</body>
</html>