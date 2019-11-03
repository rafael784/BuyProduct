<?php namespace App\Controllers;

class Home extends BaseController
{
	public function index()
	{	
		echo view('templates/header');
		echo view('templates/menuBar');
		echo view('templates/footer');	
	}

	//--------------------------------------------------------------------
}
