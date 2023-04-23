<!DOCTYPE html>
<html>
    <head>
        <title> TUGAS CRUD </title>
        <style type="text/css">
      * {
        font-family: "Trebuchet MS";
        }
        h1 {
        text-transform: uppercase;
        color: #FF0099;
        }
        table {
        border: solid 1px #000000;
        border-collapse: collapse;
        border-spacing: 0;
        width: 70%;
        margin: 10px auto 10px auto;
        }
        table thead th {
        background-color: #FF9CEE;
        border: solid 1px #000000;
        color: #990066;
        padding: 10px;
        text-align: left;
        text-shadow: 1px 1px 1px #DDEEEE;
        text-decoration: none;
        }
        table tbody td {
        border: solid 1px #000000;
        color: #990066;
        padding: 10px;
        text-shadow: 1px 1px 1px #fff;
    }
    a {
        background-color: #990066;
        color: #DDEEEE;
        padding: 10px;
        text-decoration: none;
        font-size: 12px;
    }
    </style>
    </head>
    <body>
        <center><h1>Data Produk</h1></center>
        <center><a href="tambah_produk.php">+ &nbsp; Tambah Produk</a></center>
        <br>
        <table>
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Produk</th>
                    <th>Deskripsi</th>
                    <th>Harga beli</th>
                    <th>Harga jual</th>
                    <th>Gambar</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php   
                    session_start();
                    include "koneksi.php";

                    $query = "SELECT * FROM barang ORDER BY id ASC";
                    $result = mysqli_query($koneksi, $query);

                    if(!$result) {
                        die("Query Error : ".mysqli_errno($koneksi).
                        " - ".mysqli_error($koneksi));
                    }
                    $no = 1;

                    while($row = mysqli_fetch_assoc($result)) {
                ?>
                <tr>
                    <td><?php echo $no; ?></td>
                    <td><?php echo $row['nama_produk']; ?></td>
                    <td><?php echo substr($row['deskripsi'], 0, 20); ?>...</td>
                    <td>Rp <?php echo number_format($row['harga_beli'],0,',','.'); ?></td>
                    <td>Rp <?php echo $row['harga_jual']; ?></td>
                    <td><img style="width: 120px;" src="gambar/<?php echo $row['gambar']; ?>"></td>
                    <td>
                    <a href="edit_produk.php?id=<?php echo $row['id']; ?>">Edit</a> |
                    <a href="hapus_produk.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Anda yakin akan menghapus data ini? ')">Hapus</a>
                    </td>
                </tr> 
                <?php 
                    $no++;  
                }
                ?>
            </tbody>
        </table>
    </body>
</html>