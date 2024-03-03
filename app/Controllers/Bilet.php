<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class Bilet extends Controller
{
    public function index()
    {
        $seferler = [
            
        ];
        
        return view('obilet', ['seferler' => $seferler]);
    }

    public function seferleriListele()
    {
        // Formdan gelen verileri alma
        $kalkisNoktasi = $this->request->getPost('kalkisNoktasi');
        $varisNoktasi = $this->request->getPost('varisNoktasi');
        $tarih = $this->request->getPost('tarih');

        // Veritabanı bağlantısı için gerekli bilgiler
        $servername = "localhost";
        $username = "root"; // Veritabanı kullanıcı adı
        $password = ""; // Veritabanı şifresi
        $dbname = "bus"; // Kullanılan veritabanı adı

        // Veritabanı bağlantısını oluşturma
        $conn = new \mysqli($servername, $username, $password, $dbname);

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

        // Veritabanı bağlantısını kapatma
        $conn->close();

        return view('obilet', $data); // Örnek bir view dosyası adı kullanıldı, mevcut olanı kullanın
    }
}
