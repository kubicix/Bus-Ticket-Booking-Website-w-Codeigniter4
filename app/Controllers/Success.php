<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class Success extends Controller
{
    public function index()
    {
        $transactionId = $_GET['tid'] ?? null;
        $product = $_GET['product'] ?? null;

        return view('success', ['transactionId' => $transactionId, 'product' => $product]);
    }
}
