<?php

namespace App\Controllers;

use App\Models\BusModel;
use App\Models\SefersModel;
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

    public function busUpdate($id)
    {
        // Formdan gelen verileri al
        $data = [
            'otobus_plaka' => $this->request->getPost('editPlaka'),
            'otobus_marka' => $this->request->getPost('editMarka'),
            'otobus_model' => $this->request->getPost('editModel'),
            'yolcu_kapasite' => $this->request->getPost('editKapasite'),
            'koltuk_sayisi' => $this->request->getPost('editKoltukSayisi')
        ];

        // BusModel'i yükle
        $busModel = new BusModel();

        // ID'ye göre otobüsü güncelle
        $busModel->update($id, $data);

        // Yönlendirme yap
        return redirect()->to(site_url('adminBus'));
    }

    // AdminController.php içinde
    public function addBus()
    {
        // Formdan gelen verileri al
        $plaka = $this->request->getPost('editPlaka');
        $marka = $this->request->getPost('editMarka');
        $model = $this->request->getPost('editModel');
        $kapasite = $this->request->getPost('editKapasite');
        $koltukSayisi = $this->request->getPost('editKoltukSayisi');

        // Veritabanına ekleme işlemini model aracılığıyla gerçekleştir
        $this->busModel->insert([
            'otobus_plaka' => $plaka,
            'otobus_marka' => $marka,
            'otobus_model' => $model,
            'yolcu_kapasite' => $kapasite,
            'koltuk_sayisi' => $koltukSayisi
        ]);

        // Başarılı bir şekilde eklendiğinde yönlendirme yapabilirsiniz
        return redirect()->to(site_url('adminBus'));
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
    protected $sefersModel;

    public function __construct()
    {
        $this->busModel = new BusModel();
        $this->sefersModel = new SefersModel();
    }

    public function adminSefer()
    {
        // Veritabanı bağlantısı oluştur
        $db = db_connect();

        // Buses tablosundan tüm verileri al
        $query = $db->query('SELECT * FROM seferler');
        $seferler = $query->getResult();

        // View'e otobüs verilerini aktar
        return view('adminSefer', ['seferler' => $seferler]);
    }

    public function addSefer()
    {
        // Formdan gelen verileri al
        $kalkisYeri = $this->request->getPost('editKalkisYeri');
        $varisYeri = $this->request->getPost('editVarisYeri');
        $otobusPlaka = $this->request->getPost('editOtobusPlaka');
        $seferTarih = $this->request->getPost('editSeferTarih');
        $seferFiyat = $this->request->getPost('editSeferFiyat');

        // Veritabanına ekleme işlemini model aracılığıyla gerçekleştir
        $this->sefersModel->insert([
            'kalkis_yeri' => $kalkisYeri,
            'varis_yeri' => $varisYeri,
            'otobus_plaka' => $otobusPlaka,
            'sefer_tarih' => $seferTarih,
            'sefer_fiyat' => $seferFiyat
        ]);

        // Başarılı bir şekilde eklendiğinde yönlendirme yapabilirsiniz
        return redirect()->to(site_url('adminSefer'));
    }

    public function deleteSefer($id)
    {
        // Seferi sil
        $this->sefersModel->delete($id);

        // Başarılı bir şekilde silindiğinde yönlendirme yapabilirsiniz
        return redirect()->to(site_url('adminSefer'));
    }

    public function updateSefer($id)
    {
        // Formdan gelen verileri al
        $data = [
            'kalkis_yeri' => $this->request->getPost('editKalkisYeri'),
            'varis_yeri' => $this->request->getPost('editVarisYeri'),
            'otobus_plaka' => $this->request->getPost('editOtobusPlaka'),
            'sefer_tarih' => $this->request->getPost('editSeferTarih'),
            'sefer_fiyat' => $this->request->getPost('editSeferFiyat')
        ];

        // SeferModel'i yükle
        $seferModel = new SefersModel();

        // ID'ye göre seferi güncelle
        $seferModel->update($id, $data);

        // Yönlendirme yap
        return redirect()->to(site_url('adminSefer'));
    }



    // Bilet yönetimi için
    public function adminTicket()
    {
        return view('adminTicket');
    }

    // Sefer yönetimi için
    // AdminController.php içinde




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

