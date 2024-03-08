<?php

namespace App\Controllers;

use App\Models\BusModel;
use CodeIgniter\Controller;

class AdminController extends Controller
{
    // Index fonksiyonu, admin panelinin ana sayfasını oluşturur
    public function index()
    {
        // Admin paneli ana sayfasına yönlendirme
        return view('adminIndex');
    }

    public function adminBus()
    {
        // Veritabanı bağlantısı oluştur
        $db = db_connect();

        // Buses tablosundan tüm verileri al
        $query = $db->query('SELECT * FROM buses');
        $buses = $query->getResult();

        // View'e otobüs verilerini aktar
        return view('adminBus', ['buses' => $buses]);
    }

    // Otobüs silme fonksiyonu
    public function deleteBus($id)
    {
        // Otobüsü belirtilen ID'ye göre sil
        $this->busModel->deleteBus($id);

        // Otobüs listesi sayfasına yeniden yönlendirme
        return redirect()->to(site_url('adminBus'));
    }
    
    // BusModel nesnesini oluşturalım
    protected $busModel;

    public function __construct()
    {
        $this->busModel = new BusModel();
    }


    // Bilet yönetimi için
    public function adminTicket()
    {
        return view('adminTicket');
    }

    // Sefer yönetimi için
    public function adminSefer()
    {
        return view('adminSefer');
    }

    // Bakiye yönetimi için
    public function adminBalance()
    {
        return view('adminBalance');
    }

    // Ödeme yönetimi için
    public function adminPayment()
    {
        return view('adminPayment');
    }

    // Kullanıcı yönetimi için
    public function adminUser()
    {
        return view('adminUser');
    }
}

