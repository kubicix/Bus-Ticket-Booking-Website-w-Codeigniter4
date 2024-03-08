<?php

namespace App\Controllers;

use CodeIgniter\Controller;

$isLoggedIn = false;
class Authcode extends Controller
{

    public function login()
    {

        $request = \Config\Services::request();
        $session = session();

        $CepTelefon = $request->getPost('CepTelefon');
        $Sifre = $request->getPost('Sifre');

        $model = new \App\Models\AuthModel();
        $user = $model->where('CepTelefon', $CepTelefon)
            ->where('Sifre', $Sifre)
            ->first();

            if ($user) {
                $session->set('isLoggedIn', true);
                $session->set('auth_user', [
                    'AdiSoyadi' => $user['AdiSoyadi'],
                    'EMail' => $user['EMail'],
                    'TcKimlik' => $user['TcKimlik'],
                    'Cinsiyeti' => $user['Cinsiyeti'],
                    'is_admin' => $user['is_admin'] // isAdmin bilgisini oturum verilerine ekleyin
                ]);

            return redirect()->to('user');
        } else {
            $session->setFlashdata('message', 'Cep telefon numarası veya şifre yanlış.');
            return redirect()->to('account');
        }
    }
}