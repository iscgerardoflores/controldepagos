<?php

namespace App\Controllers;

class Home extends BaseController
{
	function salir()
	{
		$this->session->destroy();		
		return redirect()->to(site_url('Login'));	
	}
}
