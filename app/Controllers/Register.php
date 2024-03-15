<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\UserModel;

class Register extends Controller
{
    public function index()
    {
        return view('register');
    }

    public function saveUser()
    {
        $userModel = new UserModel();

        $data = [
            'TcKimlik' => $this->request->getPost('TcKimlik'),
            'AdiSoyadi' => $this->request->getPost('AdiSoyadi'),
            'CepTelefon' => $this->request->getPost('CepTelefon'),
            'EMail' => $this->request->getPost('EMail'),
            'Gun' => $this->request->getPost('Gun'),
            'Ay' => $this->request->getPost('Ay'),
            'Yil' => $this->request->getPost('Yil'),
            'Il' => $this->request->getPost('Il'),
            'Sifre' => $this->request->getPost('Sifre'),
            'Cinsiyeti' => $this->request->getPost('Cinsiyeti'),
            'is_admin' => 0 // Assuming default user is not an admin
        ];

        $userModel->insert($data);

        // Optionally, you can set success/error messages and redirect
        return redirect()->to('account');
    }
}
