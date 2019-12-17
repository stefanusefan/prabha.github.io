<?php 
class Controller{
	// buat sebuah function untuk menerima data yang dikirim oleh
	// Class Home di controllers
	// public function index()
	// {
	// 	$this->view('home/index');
	// }
	public function view($view,$data=[])
	{
		require_once '../public_html/app/views/' . $view . '.php';
	}

	public function model($model)
	{
		// panggil class model yaitu
		require_once '../public_html/app/models/' .$model . '.php';
		// 
		return  new $model;
	}

}