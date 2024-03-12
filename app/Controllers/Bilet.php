<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class Bilet extends Controller
{
    public function index()
    {
        $session = session();

        // Oturumdan kullanıcı bilgilerini alma
        $auth_user = $session->get('auth_user');

        // Kullanıcı oturumu açık değilse
        if (!$auth_user) {
            return redirect()->to('account'); // Account sayfasına yönlendirme
        }
        // Kullanıcı bilgilerini değişkenlere alma
        $tcno = $auth_user['TcKimlik'];
        $cinsiyet = $auth_user['Cinsiyeti'];

        $seferler = [

        ];

        return view('obilet', ['seferler' => $seferler, 'cinsiyet' => $cinsiyet]);
    }

    public function seferleriListele()
    {
        $session = session();

        // Oturumdan kullanıcı bilgilerini alma
        $auth_user = $session->get('auth_user');

        // Kullanıcı oturumu açık değilse
        if (!$auth_user) {
            return redirect()->to('account'); // Account sayfasına yönlendirme
        }

        // Kullanıcı bilgilerini değişkenlere alma
        $tcno = $auth_user['TcKimlik'];
        $cinsiyet = $auth_user['Cinsiyeti'];
        // Formdan gelen verileri alma
        $kalkisNoktasi = $this->request->getPost('kalkisNoktasi');
        $varisNoktasi = $this->request->getPost('varisNoktasi');
        $tarih = $this->request->getPost('tarih');

        // Veritabanı bağlantısı için gerekli bilgiler
        $servername = "mysql";
        $username = "root"; // Veritabanı kullanıcı adı
        $password = "kubilay41"; // Veritabanı şifresi
        $dbname = "bus"; // Kullanılan veritabanı adı

        // Veritabanı bağlantısını oluşturma
        $conn = new \mysqli($servername, $username, $password, $dbname,3306);

        // Bağlantıyı kontrol etme
        if ($conn->connect_error) {
            die("Veritabanına bağlanılamadı: " . $conn->connect_error);
        }

        // SQL sorgusunu oluşturma
        $sql = "SELECT * FROM seferler WHERE kalkis_yeri = '$kalkisNoktasi' AND varis_yeri = '$varisNoktasi'";

        // SQL sorgusunu çalıştırma ve sonuçları alma
        $result = $conn->query($sql);

        // Sonuçları işleme ve ekrana yazdırma
        $data['seferler'] = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $data['seferler'][] = $row;
            }
        }

        $data['cinsiyet'] = $cinsiyet; // cinsiyet değişkenini data dizisine ekle
        // Veritabanı bağlantısını kapatma
        $conn->close();

        return view('obilet', $data); // Örnek bir view dosyası adı kullanıldı, mevcut olanı kullanın
    }
}
