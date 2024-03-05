<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class Logout extends Controller {

    public function index() {
        $session = session();
        $session->destroy();

        return redirect()->to('account');
    }
}