<?php

namespace App\Models;

use CodeIgniter\Model;

class GetCustomerBalance extends Model {
    protected $db; // Erişim düzeyini protected olarak değiştirildi

    public function __construct() {
        // Veritabanı bağlantısını oluştur
        $servername = "mysql";
        $username = "root";
        $password = "kubilay41"; 
        $dbname = "bus"; 
        $this->db = new \mysqli($servername, $username, $password, $dbname);
        if ($this->db->connect_error) {
            die("Veritabanına bağlanılamadı: " . $this->db->connect_error);
        }
    }

    public function getBalance($UserTC) {
        // Sorguyu hazırla
        $stmt = $this->db->prepare("SELECT * FROM balances WHERE TcKimlik = ?");
        // Değerleri bağla
        $stmt->bind_param("s", $UserTC);
        // Sorguyu çalıştır
        $stmt->execute();
        // Sonucu al
        $result = $stmt->get_result();
        // Tek satırı al
        $balance = $result->fetch_object(); // fetch_object kullanarak bir nesne alın
        // Sonucu döndür
        return $balance;
    }

    public function UpdateTotal($data) {
        // Sorguyu hazırla
        $stmt = $this->db->prepare("UPDATE balances SET TotalBalance = ? WHERE TcKimlik = ?");
        // Değerleri bağla
        $stmt->bind_param("ds", $data['TotalBalance'], $data['TcKimlik']);
        // Sorguyu çalıştır
        if($stmt->execute()) {
            return true; // Güncelleme başarılı oldu
        } else {
            return false; // Güncelleme başarısız oldu
        }
    }
}
