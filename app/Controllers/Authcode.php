<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class Auth extends Controller {

    public function login() {
        $request = \Config\Services::request();
        $session = session();

        $CepTelefon = $request->getPost('CepTelefon');
        $Sifre = $request->getPost('Sifre');

        $model = new \App\Models\AuthModel();
        $user = $model->where('CepTelefon', $CepTelefon)
                      ->where('Sifre', $Sifre)
                      ->first();

        if($user) {
            $session->set('auth', true);
            $session->set('auth_user', [
                'AdiSoyadi' => $user['AdiSoyadi'],
                'EMail' => $user['EMail']
            ]);

            return redirect()->to('user');
        } else {
            $session->setFlashdata('message', 'Cep telefon numarası veya şifre yanlış.');
            return redirect()->to('account');
        }
    }
}