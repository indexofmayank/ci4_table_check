<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Admin extends BaseController
{
    public function index()
    {   
        $data['title'] = 'Hello, Admin';
        return view('admin/dashboard', $data);
    }
}
