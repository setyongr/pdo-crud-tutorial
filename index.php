<?php
    include 'db.php';

    // Buat prepared statement untuk mengambil semua data dari tbBiodata
    $query = $db->prepare("SELECT * FROM tbBiodata");
    // Jalankan perintah SQL
    $query->execute();
    // Ambil semua data dan masukkan ke variable $data
    $data = $query->fetchAll();
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Daftar Biodata</title>
    </head>
    <body>
        <h1>Daftar Biodata</h1>
        <a href="create.php"><button type="button">Tambah Data</button></a>
        <table border="1">
            <tr>
                <th>
                    #ID
                </th>
                <th>
                    Nama
                </th>
                <th>
                    Alamat
                </th>
                <th>
                    No HP
                </th>
                <th>
                    Aksi
                </th>
            </tr>
            <!-- Perulangan Untuk Menampilkan Semua Data yang ada di Variable Data -->
            <?php foreach ($data as $value): ?>
                <tr>
                    <td>
                        <?php echo $value['id'] ?>
                    </td>
                    <td>
                        <?php echo $value['nama'] ?>
                    </td>
                    <td>
                        <?php echo $value['alamat'] ?>
                    </td>
                    <td>
                        <?php echo $value['hp'] ?>
                    </td>
                    <td>
                        <a href="edit.php?id=<?php echo $value['id']?>">Edit</a>
                        <a href="delete.php?id=<?php echo $value['id']?>">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    </body>
</html>
