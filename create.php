<?php
    include 'db.php';

    if(isset($_POST['submit'])){
        // Simpan data yang di inputkan ke POST ke masing-masing variable
        // dan convert semua tag HTML yang mungkin dimasukkan untuk mengindari XSS
        $nama = htmlentities($_POST['nama']);
        $alamat = htmlentities($_POST['alamat']);
        $hp = htmlentities($_POST['hp']);

        // Prepared statement untuk menambah data
        $query = $db->prepare("INSERT INTO `tbBiodata`(`nama`, `alamat`, `hp`)
        VALUES (:nama,:alamat,:hp)");
        $query->bindParam(":nama", $nama);
        $query->bindParam(":alamat", $alamat);
        $query->bindParam(":hp", $hp);
        // Jalankan perintah SQL
        $query->execute();
        // Alihkan ke index.php
        header("location: index.php");
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Tambah Biodata</title>
    </head>
    <body>
        <h1>Tambah Data</h1>
        <form method="post">
            Nama: <input required type="text" name="nama" placeholder="Nama" /> <br>
            Alamat: <input required type="text" name="alamat" placeholder="Alamat" /> <br>
            HP: <input required type="text" name="hp" placeholder="No HP" /> <br>
            <input type="submit" name="submit" />
        </form>
    </body>
</html>
