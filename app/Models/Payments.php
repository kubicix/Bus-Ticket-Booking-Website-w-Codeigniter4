<?php

namespace App\Models;

use CodeIgniter\Model;

class Payment extends Model {
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

    public function addPayment($data) {
        // Sorguyu hazırla
        $stmt = $this->db->prepare('INSERT INTO payments (TcKimlik, AdiSoyadi, email, StripeID, Product, Amount, Currency, Status, İlkDurak, SonDurak, SeferTarihi) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)');

         // Check if prepare was successful
         if (!$stmt) {
            die("Prepare failed: " . htmlspecialchars($this->db->error));
        }
        // Değerleri bağla
        $stmt->bind_param('sssssssssss', $data['TcKimlik'], $data['AdiSoyadi'], $data['email'], $data['StripeID'], $data['Product'], $data['Amount'], $data['Currency'], $data['Status'], $data['İlkDurak'], $data['SonDurak'], $data['SeferTarihi']);
    
        // Sorguyu çalıştır
        if($stmt->execute()) {
            return true; // Ekleme başarılı oldu
        } else {
            return false; // Ekleme başarısız oldu
        }
    }
}
