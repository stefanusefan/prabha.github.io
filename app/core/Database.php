<?php 

class Database{
	// Membuat variabel baru untuk memanggil  konfigurasi dari
	// file config
	private $host=DB_HOST; //hostnamenya =localhost
	private $user=DB_USER;  // user databasenya
	private $pass=DB_PASS; //Password databases
	private $db_name=DB_NAME;  //Nama Database

	// Kemudian buat variabel koneksi ke databases
	private $dbh; //Database henler
	private $stmt; //statement


public function __construct(){
		// data source name
		// Membuat koneksi ke database
		$dsn ='mysql:host=' . $this->host . '; dbname=' . $this->db_name;
		// Option digunakan untuk menstabilkan koneksi ke database // pesan error yang tampil
		$option = [
			// Isinya array 
			PDO::ATTR_PERSISTENT => true, //Database terjaga koneksinya
			PDO::ATTR_ERRMODE =>PDO::ERRMODE_EXCEPTION //Untuk errornya
		];

		try {
			$this->dbh=new PDO($dsn,$this->user,$this->pass,$option);//Option digunakan untuk menstabilkan koneksi kde database
			} catch (PDOException $e) {
				die($e->getMessage());
			}
	}

// Kemudian kita buat sebuah function yang digunakan untuk menjalankan query
	// agar berjalan secara fleksibel
public function query($query){
		// Menyiapkan query  yang gunakan oleh user
		$this->stmt= $this->dbh->prepare($query);
	}

// 
public function bind($param, $value, $type=null){
	// Jika parameter yang dicari typenya null
	if(is_null($type)){
		// Maka lakukan hal berikut dan jalankan switch 
		switch(true){
			//jika  nilainya integer set menjadi integer
			case is_int($value) :
				$type=PDO::PARAM_INT;
				break; //Berhenti

			case is_bool($value) : // jika typenya bolean
				$type=PDO::PARAM_BOOL; //ser menjadi bolean
				break;
			case is_null($value) :
				$type=PDO::PARAM_NULL; // Jika typenya nul set menjadi null juga
				break;
			default : // Selain dari itu typenya parameter string
				$type=PDO::PARAM_STR;

		}
	}
	// kemudian kita ambil  datanya yang sudah di cek diatas yaitu parameter, value, type
	$this->stmt->bindValue($param,$value,$type);
}

// Kemudian exsekusi hasinya
public function execute()
{	
	$this->stmt->execute();
}

// kalau data yang mau ditampilin banyak
// gunakan function berikut
public function resultSet(){
	$this->execute();
	return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
}

// kalau mau data yang ditampilin hanya satu gunakan
// function berikut
public function single(){
	$this->execute();
	return $this->stmt->fetch(PDO::FETCH_ASSOC);
}

public function rowCount()
{
	return $this->stmt->rowCount();
}


}