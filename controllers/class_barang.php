<?php 
    class Barang{
        private $dbh;
        public function __construct($dbh){
            $this->dbh = $dbh;
        }

        public function dataBarang(){
            $sql="SELECT * FROM Barang";
            $rs = $this->dbh->query($sql);
            return $rs;
        }
        
        public function getAllJenis(){
            $sql = "SELECT * FROM jenis_barang";
            // fungsi query, eksekusi query dan ambil datanya
            $rs = $this->dbh->query($sql); 
            return $rs;
        }

        public function simpan($data){
            $sql = "INSERT INTO barang(kode,nama,harga_beli,harga_jual,stok,min_stok,jenis_barang_id)
                    VALUES (?,?,?,?,?,?,?)";
            // prepare statement PDO
            $ps = $this->dbh->prepare($sql); 
            $ps->execute($data);
        }

        public function getBarang($id) {
            $sql = "SELECT barang.*, jenis_barang.nama AS kategori 
                    FROM barang 
                    INNER JOIN jenis_barang ON jenis_barang.id = barang.jenis_barang_id 
                    WHERE barang.id = ?";
            
            $ps = $this->dbh->prepare($sql); 
            $ps->execute([$id]);
            $rs = $ps->fetch(PDO::FETCH_ASSOC); // Use FETCH_ASSOC for array
            return $rs;
        }

        public function ubah($data){
            $sql = "UPDATE barang SET kode=?, nama=?, harga_beli=?, harga_jual=?, stok=?, min_stok=?, jenis_barang_id=? WHERE id=?";
            // prepare statement PDO
            $ps = $this->dbh->prepare($sql); 
            $ps->execute($data);
        }

        public function hapus($id){
            $sql = "DELETE FROM barang WHERE id=?";
            // prepare statement PDO
            $ps = $this->dbh->prepare($sql); 
            $ps->execute($id);
        }


        
    }
?>