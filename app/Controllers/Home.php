<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Session\Session;

class Home extends BaseController
{
    public function index(){
        echo view('_partials/header');
        echo view('_partials/navbar');
        echo view('home/home.php');
        echo view('_partials/footer');
    }
}
