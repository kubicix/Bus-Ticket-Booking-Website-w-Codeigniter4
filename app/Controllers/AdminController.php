<?php

namespace App\Controllers;

use App\Models\BusModel;
use App\Models\SefersModel;
use App\Models\TicketModel;
use App\Models\UserModel;
use App\Models\BalanceModel;
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
    protected $ticketsModel;
    protected $userModel;
    protected $balancesModel;

    public function __construct()
    {
        $this->busModel = new BusModel();
        $this->sefersModel = new SefersModel();
        $this->ticketsModel = new TicketModel();
        $this->userModel = new UserModel();
        $this->balancesModel = new BalanceModel();
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



    public function adminTicket()
    {
        // Veritabanı bağlantısı oluştur
        $db = db_connect();

        // Tickets tablosundan tüm verileri al
        $query = $db->query('SELECT * FROM tickets');
        $tickets = $query->getResult();

        // View'e bilet verilerini aktar
        return view('adminTicket', ['tickets' => $tickets]);
    }

    public function addTicket()
    {
        // Formdan gelen verileri al
        $kalkisTarih = $this->request->getPost('editKalkisTarih');
        $tcno = $this->request->getPost('editTcno');
        $cinsiyet = $this->request->getPost('editCinsiyet');
        $otobusPlaka = $this->request->getPost('editOtobusPlaka');
        $koltukNo = $this->request->getPost('editKoltukNo');
        $isBought = $this->request->getPost('editIsBought') ? 1 : 0;
        $ticketDate = $this->request->getPost('editTicketDate');
        $reservationExpiryDate = $this->request->getPost('editReservationExpiryDate');
        $pnrCode = $this->request->getPost('editPnrCode');

        // Veritabanına ekleme işlemini model aracılığıyla gerçekleştir
        $this->ticketsModel->insert([
            'kalkis_tarih' => $kalkisTarih,
            'tcno' => $tcno,
            'cinsiyet' => $cinsiyet,
            'otobus_plaka' => $otobusPlaka,
            'koltuk_no' => $koltukNo,
            'is_bought' => $isBought,
            'ticket_date' => $ticketDate,
            'reservation_expiry_date' => $reservationExpiryDate,
            'pnr_code' => $pnrCode
        ]);

        // Başarılı bir şekilde eklendiğinde yönlendirme yapabilirsiniz
        return redirect()->to(site_url('adminTicket'));
    }

    public function deleteTicket($id)
    {
        // Bilet sil
        $this->ticketsModel->delete($id);

        // Başarılı bir şekilde silindiğinde yönlendirme yapabilirsiniz
        return redirect()->to(site_url('adminTicket'));
    }

    public function updateTicket($id)
    {
        // Formdan gelen verileri al
        $data = [
            'kalkis_tarih' => $this->request->getPost('editKalkisTarih'),
            'tcno' => $this->request->getPost('editTcno'),
            'cinsiyet' => $this->request->getPost('editCinsiyet'),
            'otobus_plaka' => $this->request->getPost('editOtobusPlaka'),
            'koltuk_no' => $this->request->getPost('editKoltukNo'),
            'is_bought' => $this->request->getPost('editIsBought') ? 1 : 0,
            'ticket_date' => $this->request->getPost('editTicketDate'),
            'reservation_expiry_date' => $this->request->getPost('editReservationExpiryDate'),
            'pnr_code' => $this->request->getPost('editPnrCode')
        ];

        // BiletModel'i yükle
        $ticketModel = new TicketModel();

        // ID'ye göre bilet güncelle
        $ticketModel->update($id, $data);

        // Yönlendirme yap
        return redirect()->to(site_url('adminTicket'));
    }



    // Bakiye yönetimi için
    public function adminBalance()
    {
        // Veritabanı bağlantısı oluştur
        $db = db_connect();

        // Balances tablosundan tüm verileri al
        $query = $db->query('SELECT * FROM balances');
        $balances = $query->getResult();

        // View'e bakiye verilerini aktar
        return view('adminBalance', ['balances' => $balances]);
    }

    // public function addBalance()
// {
//     // Formdan gelen verileri al
//     $TcKimlik = $this->request->getPost('editTcKimlik');
//     $TotalBalance = $this->request->getPost('editTotalBalance');

    //     // Veritabanına ekleme işlemini model aracılığıyla gerçekleştir
//     $this->balancesModel->insert([
//         'TcKimlik' => $TcKimlik,
//         'TotalBalance' => $TotalBalance
//     ]);

    //     // Başarılı bir şekilde eklendiğinde yönlendirme yapabilirsiniz
//     return redirect()->to(site_url('adminBalance'));
// }

    public function deleteBalance($id)
    {
        // Bakiyeyi sil
        $this->balancesModel->delete($id);

        // Başarılı bir şekilde silindiğinde yönlendirme yapabilirsiniz
        return redirect()->to(site_url('adminBalance'));
    }

    public function updateBalance($id)
    {
        // Formdan gelen verileri al
        $data = [
            'TcKimlik' => $this->request->getPost('editTcKimlik'),
            'TotalBalance' => $this->request->getPost('editTotalBalance')
        ];

        // BakiyeModel'i yükle
        $balanceModel = new BalanceModel();

        // ID'ye göre bakiyeyi güncelle
        $balanceModel->update($id, $data);

        // Yönlendirme yap
        return redirect()->to(site_url('adminBalance'));
    }


    // Ödeme yönetimi için
    public function adminPayment()
    {
        // Veritabanı bağlantısı oluştur
        $db = db_connect();

        // Payments tablosundan tüm verileri al
        $query = $db->query('SELECT * FROM payments');
        $payments = $query->getResult();

        // View'e ödeme verilerini aktar
        return view('adminPayment', ['payments' => $payments]);
    }


    public function adminUser()
    {
        // Veritabanı bağlantısı oluştur
        $db = db_connect();

        // Users tablosundan tüm verileri al
        $query = $db->query('SELECT * FROM users');
        $users = $query->getResult();

        // View'e kullanıcı verilerini aktar
        return view('adminUser', ['users' => $users]);
    }

    public function userAdd()
    {
        // Formdan gelen verileri al
        $data = [
            'TcKimlik' => $this->request->getPost('editTcKimlik'),
            'AdiSoyadi' => $this->request->getPost('editAdiSoyadi'),
            'CepTelefon' => $this->request->getPost('editCepTelefon'),
            'EMail' => $this->request->getPost('editEMail'),
            'Gun' => $this->request->getPost('editGun'),
            'Ay' => $this->request->getPost('editAy'),
            'Yil' => $this->request->getPost('editYil'),
            'Il' => $this->request->getPost('editIl'),
            'Cinsiyeti' => $this->request->getPost('editCinsiyeti'),
            'is_admin' => $this->request->getPost('editIsAdmin')
        ];

        // Veritabanına ekleme işlemini model aracılığıyla gerçekleştir
        $userModel = new UserModel();
        $userModel->insert($data);

        // Başarılı bir şekilde eklendiğinde yönlendirme yapabilirsiniz
        return redirect()->to(site_url('adminUser'));
    }

    public function userDelete($TcKimlik)
    {
        // Kullanıcıyı sil
        $userModel = new UserModel();
        $userModel->delete($TcKimlik);

        // Başarılı bir şekilde silindiğinde yönlendirme yapabilirsiniz
        return redirect()->to(site_url('adminUser'));
    }

    public function userUpdate($TcKimlik)
    {
        // Formdan gelen verileri al
        $data = [
            'AdiSoyadi' => $this->request->getPost('editAdiSoyadi'),
            'CepTelefon' => $this->request->getPost('editCepTelefon'),
            'EMail' => $this->request->getPost('editEMail'),
            'Gun' => $this->request->getPost('editGun'),
            'Ay' => $this->request->getPost('editAy'),
            'Yil' => $this->request->getPost('editYil'),
            'Il' => $this->request->getPost('editIl'),
            'Cinsiyeti' => $this->request->getPost('editCinsiyeti'),
            'is_admin' => $this->request->getPost('editIsAdmin')
        ];

        // UserModel'i yükle
        $userModel = new UserModel();

        // TcKimlik'e göre kullanıcıyı güncelle
        $userModel->update($TcKimlik, $data);

        // Yönlendirme yap
        return redirect()->to(site_url('adminUser'));
    }
}

