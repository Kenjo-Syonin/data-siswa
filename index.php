<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Siswa</title>
</head>
<body>
    <form action="" method="post">
        <h1>Masukkan Data Siswa</h1>
        <label for="nama">Nama</label><br>
        <input type="text" id="nama" name="nama"><br>
        <label for="nis">NIS</label><br>
        <input type="number" id="nis" name="nis"><br>
        <label for="rayon">Rayon</label><br>
        <input type="text" id="rayon" name="rayon"><br></br>
        <button id="tambah" name="tambah">Tambah</button>
        <button id="cetak" name="cetak">Cetak</button>
        <button id="hapus" name="hapus"><a href="destroy.php">Hapus</a></button>
    </form>

    <?php 
    session_start();

    if(!isset($_SESSION['data'])){
        $_SESSION['data'] = array();
    }

    if(isset($_POST['tambah'])){
        if(empty($_POST['nama']) || empty($_POST['nis']) || empty($_POST['rayon'])){
            echo "Data yang di isi tidak boleh kosong";
            exit();
        }
        else{
            $nama = $_POST['nama'];
            $nis = $_POST['nis'];
            $rayon = $_POST['rayon'];
            $data = array(
                'nama' => $nama,
                'nis' => $nis,
                'rayon' => $rayon
                );
            array_push($_SESSION['data'], $data);
        }
    }

    if(isset($_POST['cetak'])){
        if(count($_SESSION['data']) == 0){
            echo "Data kosong";
            exit();
        }
        else{
            header('location: cetak.php');
            exit();
        }
    }

    if(isset($_GET['hapus'])){
        $key = $_GET['hapus'];
        unset($_SESSION['data'][$key]);
        header("location: index.php");
        exit;
    }

    if(count($_SESSION['data']) > 0){
        echo "<table border= '1'>";
        echo "<tr><th>Nama</th> <th>NIS</th> <th>Rayon</th> <th>Aksi</th> </tr>";
        foreach($_SESSION['data'] as $key => $data){
            echo "<tr>";
            echo "<td>". $data['nama']. "</td>";
            echo "<td>". $data['nis']. "</td>";
            echo "<td>". $data['rayon']. "</td>";
            echo "<td><a href='?hapus=". $key . "'>Hapus</a></td>";
            echo "</tr>";
        }
        echo "</table>";
    }

    ?>
</body>
</html>