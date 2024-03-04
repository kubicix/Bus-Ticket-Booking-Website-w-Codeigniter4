<?php
// Veritabanı bağlantısı için gerekli bilgiler
$servername = "localhost";
$username = "root"; // Veritabanı kullanıcı adı
$password = "qwertyu10"; // Veritabanı şifresi
$dbname = "bus"; // Kullanılan veritabanı adı

// POST isteği ile gelen parametreleri al
$otobus_plaka = $_POST['plaka'];
$kalkis_tarih = $_POST['tarih'];

// Veritabanına bağlanma
$conn = new mysqli($servername, $username, $password, $dbname);

// Bağlantıyı kontrol etme
if ($conn->connect_error) {
    die("Veritabanına bağlanılamadı: " . $conn->connect_error);
}

// Koltuk listesi sorgusu
$sql = "SELECT * FROM tickets WHERE otobus_plaka = '$otobus_plaka' AND kalkis_tarih = '$kalkis_tarih'";

// Sorguyu çalıştırma ve sonuçları alma
$result = $conn->query($sql);

$koltukListesi = array();

// Sonuçları işleme
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        // Her bir koltuk için gerekli bilgileri al
        $koltuk = array(
            'ticket_id' => $row['ticket_id'],
            'kalkis_tarih' => $row['kalkis_tarih'],
            'tcno' => $row['tcno'],
            'cinsiyet' => $row['cinsiyet'],
            'otobus_plaka' => $row['otobus_plaka'],
            'koltuk_no' => $row['koltuk_no'],
            'is_bought' => $row['is_bought'],
            'ticket_date' => $row['ticket_date'],
            'reservation_expiry_date' => $row['reservation_expiry_date']
        );
        // Koltuk listesine ekle
        $koltukListesi[] = $koltuk;
    }
}

// Veritabanı bağlantısını kapat
$conn->close();

// Koltuk listesini JSON formatında döndür
echo json_encode($koltukListesi);
?>
