<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class ResetPassword extends Controller
{
    public function index()
    {
        return view('resetPassword');
    }
}
