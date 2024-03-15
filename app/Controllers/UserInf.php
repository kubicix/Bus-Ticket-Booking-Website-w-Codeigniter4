<?php

namespace App\Controllers;

use App\Models\UserModel;

class UserInf extends BaseController
{
    public function index()
    {
        $session = session();
        $userModel = new UserModel();

        // Oturumdan kullanıcı bilgilerini alma
        $auth_user = $session->get('auth_user');

        // Kullanıcı oturumu açık değilse
        if (!$auth_user) {
            return redirect()->to('account'); // Account sayfasına yönlendirme
        }

        // Kullanıcı bilgilerini TcKimlik'e göre al
        $user = $userModel->where('TcKimlik', $auth_user['TcKimlik'])->first();

        return view('userInf', ['user' => $user]);
    }
    public function update()
    {
        $userModel = new UserModel();

        // Formdan gelen verileri al
        $data = [
            'AdiSoyadi' => $this->request->getPost('AdiSoyadi'),
            'EMail' => $this->request->getPost('EMail'),
            'Sifre' => $this->request->getPost('Sifre'),
            'Il' => $this->request->getPost('Il'),
            'Cinsiyeti' => $this->request->getPost('Cinsiyeti'),
            'Gun' => $this->request->getPost('Gun'),
            'Ay' => $this->request->getPost('Ay'),
            'Yil' => $this->request->getPost('Yil')
        ];

        // TcKimlik'e göre kaydı güncelle
        $userModel->where('TcKimlik', $this->request->getPost('TcKimlik'))->set($data)->update();

        return redirect()->to('userInf'); // Güncelleme işleminden sonra userInf sayfasına yönlendirme
    }
}
