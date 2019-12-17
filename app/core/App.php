<?php 

class App{

	protected $controller='Home';
	protected $method = 'index';
	protected $params = [];
	public function __construct()
	{
		// Untuk Controller
		$url=$this->parseURL();
		if(file_exists('../public_html/app/controllers/' .$url[0] . '.php')){
			$this->controller=$url[0];
			unset($url[0]);

		}
		require_once '../public_html/app/controllers/' . $this->controller . '.php';
		$this->controller =new $this->controller;

				// Method
		// cek apakah diurl ada mathod di array ke 1
		if(isset($url[1])){
			// jika mathodnya ada dari controler seperti yang di url
			if(method_exists($this->controller, $url[1])){
				// jika ada maka ditimpa dengan url ke 1 yang ada
				$this->method=$url[1];
				// kemudian kita hilangkan sehingga sisanya hanya parameter saja
				unset($url[1]);
			}
		}
		// Parameter
		// parameternya kita kelolah jika ada
		if(!empty($url)){
			// kita ambil arraynya dan simpan ke paramaters params di poperties
			$this->params=array_values($url);
			
		}
		// jalankan controller & mathod, serta kirimkan params jika ada 
		call_user_func_array([$this->controller,$this->method], $this->params);
	}
// fungsi dari function berikut adalah untuk memecahkan file yang ada menjadi rapi
	// dan merubahnya menjadi sebuah array
	public function parseURL()
	{
		if(isset($_GET['url']) ) {
		// kita ambil urlnya dan kita isi urlnya
		// hapus tanda flash yang ada di url
		$url=rtrim($_GET['url'],'/');
		// kemudian bersihkan urlnya  
		$url=filter_var($url,FILTER_SANITIZE_URL);
		// pecah tanda flash dan stringnya menjadi array
		$url=explode('/', $url);
		// kemudian kembalikan urlnya berbentuk array
		return $url;
		}
	}
}
