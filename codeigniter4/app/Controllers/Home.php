<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        return view('index'); // app/Views/index.php dosyasını yükle
    }
}
