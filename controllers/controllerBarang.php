<?php 
    
    require_once '../models/koneksi.php';
    require_once 'class_barang.php';

    // tangkap request element form
    $kode = $_POST['kode'];
    $nama = $_POST['nama'];
    $harga_beli = $_POST['harga_beli'];
    $harga_jual = $_POST['harga_jual'];
    $stok = $_POST['stok'];
    $min_stok = $_POST['min_stok'];
    $jenis_barang_id = $_POST['jenis_barang_id'];
    $tombol = $_POST['submit'];

    // Menyimpan data diatas ke sebuah array
    $data = [
        $kode,      // ? 1 
        $nama,      // ? 2
        $harga_beli,   // ? 3
        $harga_jual,     // ? 4
        $stok,      // ? 5
        $min_stok,   // ? 6
        $jenis_barang_id       // ? 7
    ];

    // proses
    $obj = new Barang($dbh);
    // $obj->simpan($data);
    switch ($tombol) {
        case 'simpan';
            $obj->simpan($data);
            break;
        case 'ubah';
            $data[] = $_POST['idx']; //tangkap hidden field u/ ? ke-8
            $obj->ubah($data);
            break;
        case 'hapus';
        $id[] = $_POST['idx']; //tangkap ke-1 where id=?
        $obj->hapus($id);
        break;  
        default://tombol batal
        header('Location:http://localhost/LatihanPHP_nabil/crud/barang.php');
            break;
    }

    // Landing Page
    header('Location:http://localhost/LatihanPHP_nabil/crud/barang.php');
?>