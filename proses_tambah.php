<?php
include 'koneksi.php';

	// membuat variabel untuk menampung data dari form
    $nama_produk   = $_POST['nama_produk'];
    $deskripsi     = $_POST['deskripsi'];
    $harga_beli    = $_POST['harga_beli'];
    $harga_jual    = $_POST['harga_jual'];
    $gambar_produk = $_FILES['gambar']['name'];


if($gambar_produk != "") {
    $ekstensi_diperbolehkan = array('png','jpg','jpeg'); 
    $x = explode('.', $gambar_produk); 
    $ekstensi = strtolower(end($x));
    $file_tmp = $_FILES['gambar']['tmp_name'];   
    $angka_acak     = rand(1,999);
    $nama_gambar_baru = $angka_acak.'-'.$gambar_produk; 

        if(in_array($ekstensi, $ekstensi_diperbolehkan) === true)  {     
                move_uploaded_file($file_tmp, 'gambar/'.$nama_gambar_baru); 

                    $query = "INSERT INTO `barang` (`id`, `nama_produk`, `deskripsi`, `harga_beli`, `harga_jual`, `gambar`) VALUES (NULL, '$nama_produk', '$deskripsi', '$harga_beli', '$harga_jual', '$gambar_produk')";
                    $result = mysqli_query($koneksi, $query);
            
                    if(!$result){
                        die ("Query gagal dijalankan: ".mysqli_errno($koneksi).  
                        " - ".mysqli_error($koneksi));
                    } else {
                    echo "<script>alert('Data berhasil ditambah.');window.location='index.php';</script>";
                    }

                    } else {     
                    echo "<script>alert('Ekstensi gambar yang boleh hanya jpg jpeg atau png.');window.location='tambah_produk.php';</script>";
                }
                    } else {
                        $query = "INSERT INTO barang (nama_produk, deskripsi, harga_beli, harga_jual, gambar) VALUES ('$nama_produk', '$deskripsi', '$harga_beli', '$harga_jual', null)";
                        $result = mysqli_query($koneksi, $query);
                    
                    if(!$result){
                        die ("Query gagal dijalankan: ".mysqli_errno($koneksi).
                            " - ".mysqli_error($koneksi));
                    } else {
                        echo "<script>alert('Data berhasil ditambah.');window.location='tabel.php';</script>";
                    }
}
