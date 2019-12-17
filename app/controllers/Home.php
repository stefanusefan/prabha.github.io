<?php 

class Home extends Controller{
	// funsinya untuk memanggil file yang ada di views
	public function index()
	{
		$data['judul']='Home';
		// Panggil Class getUser  yang ada di controller (User_model)
		
		$this->view('templates/header',$data);
		$this->view('home/index');
		$this->view('templates/footer');
	}
public function about($id)
{
		$data['judul']='About';
		// Panggil Class getUser  yang ada di controller (User_model)
		$data['menu'] = $this->model('Menu_model')->getAllDataMenu();
		$this->view('templates/header',$data);
		$this->view('home/index');
		$this->view('templates/footer');
}

public function login($data)
{
	$data['judul'] = 'Home';
	$data['login'] = $this->model('Login_model')->cekDataUser();
	$this->view('templates/header', $data);
	$this ->view('home/index', $data);
	$this->view ('templates/footer');
}
	
}