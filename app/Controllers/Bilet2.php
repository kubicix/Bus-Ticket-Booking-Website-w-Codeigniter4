<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\TicketModel;

class Bilet2 extends Controller
{
    public function index()
    {
        return view('obilet2');
    }

    public function buyTicket()
    {
        // Session başlatma
        $session = session();

        // Oturumda kullanıcı bilgileri var mı kontrol etme
        if ($session->has('auth_user')) {
            // Oturumdan kullanıcı bilgilerini alma
            $auth_user = $session->get('auth_user');

            // Kullanıcı bilgilerini değişkenlere alma
            $tcno = $auth_user['TcKimlik'];
            $cinsiyet = $auth_user['Cinsiyeti'];

            // TicketModel'i kullanarak yeni bir bilet oluştur
            $model = new TicketModel();

            // Veritabanı bağlantısı için gerekli bilgiler
            $servername = "localhost";
            $username = "root"; // Veritabanı kullanıcı adı
            $password = ""; // Veritabanı şifresi
            $dbname = "bus"; // Kullanılan veritabanı adı

            // Veritabanı bağlantısını oluşturma
            $conn = new \mysqli($servername, $username, $password, $dbname);

            // Veritabanına bağlanma kontrolü
            if ($conn->connect_error) {
                die("Veritabanına bağlanılamadı: " . $conn->connect_error);
            } else {
                echo "Veritabanına başarıyla bağlandı.\n";
            }

            // Formdan gelen verileri alma
            $kalkisTarihi = $this->request->getPost('seferTarihi1');
            $otobusPlakasi = trim($this->request->getPost('otobusPlaka1'));
            $koltukNo = $this->request->getPost('koltukNo1');

            // Ekrana yazdırma
            echo "<br>";
            echo "Kalkış Tarihi: " . $kalkisTarihi . "<br>";
            echo "Otobüs Plakası:-" . $otobusPlakasi . "-<br>";
            echo "Koltuk Numarası: " . $koltukNo . "<br>";
            echo "Tc Kimlik: " . $tcno . "<br>";
            echo "Cinsiyet: " . $cinsiyet . "<br>";

            //hazırlar
            $is_bought = 1;
            $ticket_date = date('Y-m-d H:i:s');

            // Yeni bir bilet oluşturmak için SQL sorgusunu hazırlama
            $sql = "INSERT INTO tickets (kalkis_tarih, tcno, cinsiyet, otobus_plaka, koltuk_no, is_bought, ticket_date) VALUES (?, ?, ?, ?, ?, ?, ?)";

            // Prepare statement hazırlanıyor
            $stmt = $conn->prepare($sql);
            if ($stmt === false) {
                die("Sorgu hatası: " . $conn->error);
            }

            // Parametreleri sorguya bağlama
            $stmt->bind_param("sssssis", $kalkisTarihi, $tcno, $cinsiyet, $otobusPlakasi, $koltukNo, $is_bought, $ticket_date);

            // Insert işlemi sonrası bilgi yazdırma
            if ($stmt->execute()) {
                echo "Bilet başarıyla veritabanına eklendi.\n";
                $last_id = $conn->insert_id;
                return redirect()->to(site_url('payment?pid=' . $last_id));
            } else {
                echo "Bilet eklenirken bir hata oluştu: " . $stmt->error . "\n" . $kalkisTarihi, $tcno, $cinsiyet, $otobusPlakasi, $koltukNo, $is_bought, $ticket_date;
            }

            // Statement ve bağlantıyı kapatma
            $stmt->close();
            $conn->close();

            // Yönlendirme yerine alert kullanarak mesaj göster
            // echo "<script>alert('Bilet başarıyla satın alındı!');</script>";
            // return redirect()->to(site_url('payment?tid='.$last_id));
        } else {
            // Oturumda kullanıcı bilgisi yoksa, uygun bir hata mesajı gösterme veya yönlendirme yapma...
            echo "Kullanıcı oturumu bulunamadı.";
            // Veya uygun bir yönlendirme yapabilirsiniz:
            // return redirect()->to('login');
        }
    }

    public function reserveTicket()
    {
        // Session başlatma
        $session = session();

        // Oturumda kullanıcı bilgileri var mı kontrol etme
        if ($session->has('auth_user')) {
            // Oturumdan kullanıcı bilgilerini alma
            $auth_user = $session->get('auth_user');

            // Kullanıcı bilgilerini değişkenlere alma
            $tcno = $auth_user['TcKimlik'];
            $cinsiyet = $auth_user['Cinsiyeti'];

            // TicketModel'i kullanarak yeni bir bilet oluştur
            $model = new TicketModel();

            // Veritabanı bağlantısı için gerekli bilgiler
            $servername = "localhost";
            $username = "root"; // Veritabanı kullanıcı adı
            $password = ""; // Veritabanı şifresi
            $dbname = "bus"; // Kullanılan veritabanı adı

            // Veritabanı bağlantısını oluşturma
            $conn = new \mysqli($servername, $username, $password, $dbname);

            // Veritabanına bağlanma kontrolü
            if ($conn->connect_error) {
                die("Veritabanına bağlanılamadı: " . $conn->connect_error);
            } else {
                echo "Veritabanına başarıyla bağlandı.\n";
            }

            // Formdan gelen verileri alma
            $kalkisTarihi = $this->request->getPost('seferTarihi1');
            $otobusPlakasi = trim($this->request->getPost('otobusPlaka1'));
            $koltukNo = $this->request->getPost('koltukNo1');

            // Ekrana yazdırma
            echo "<br>";
            echo "Kalkış Tarihi: " . $kalkisTarihi . "<br>";
            echo "Otobüs Plakası:-" . $otobusPlakasi . "-<br>";
            echo "Koltuk Numarası: " . $koltukNo . "<br>";
            echo "Tc Kimlik: " . $tcno . "<br>";
            echo "Cinsiyet: " . $cinsiyet . "<br>";

            //hazırlar
            $is_bought = 0;
            $ticket_date = date('Y-m-d H:i:s');

            // Yeni bir bilet oluşturmak için SQL sorgusunu hazırlama
            $sql = "INSERT INTO tickets (kalkis_tarih, tcno, cinsiyet, otobus_plaka, koltuk_no, is_bought, ticket_date) VALUES (?, ?, ?, ?, ?, ?, ?)";

            // Prepare statement hazırlanıyor
            $stmt = $conn->prepare($sql);
            if ($stmt === false) {
                die("Sorgu hatası: " . $conn->error);
            }

            // Parametreleri sorguya bağlama
            $stmt->bind_param("sssssis", $kalkisTarihi, $tcno, $cinsiyet, $otobusPlakasi, $koltukNo, $is_bought, $ticket_date);

            // Insert işlemi sonrası bilgi yazdırma
            if ($stmt->execute()) {
                echo "Bilet başarıyla veritabanına eklendi.\n";
            } else {
                echo "Bilet eklenirken bir hata oluştu: " . $stmt->error . "\n" . $kalkisTarihi, $tcno, $cinsiyet, $otobusPlakasi, $koltukNo, $is_bought, $ticket_date;
            }

            // Statement ve bağlantıyı kapatma
            $stmt->close();
            $conn->close();

            // Yönlendirme yerine alert kullanarak mesaj göster
            // echo "<script>alert('Bilet başarıyla satın alındı!');</script>";
            // return redirect()->to(site_url('payment?tid='.$last_id));
        } else {
            // Oturumda kullanıcı bilgisi yoksa, uygun bir hata mesajı gösterme veya yönlendirme yapma...
            echo "Kullanıcı oturumu bulunamadı.";
            // Veya uygun bir yönlendirme yapabilirsiniz:
            // return redirect()->to('login');
        }
    }
}
