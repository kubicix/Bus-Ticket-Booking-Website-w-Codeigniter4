<?php
// Veritabanı bağlantısı için gerekli bilgiler
$servername = "localhost";
$username = "root"; // Veritabanı kullanıcı adı
$password = ""; // Veritabanı şifresi
$dbname = "bus"; // Kullanılan veritabanı adı

// Veritabanı bağlantısını oluşturma
$conn = new mysqli($servername, $username, $password, $dbname);

// Bağlantıyı kontrol etme
if ($conn->connect_error) {
    die("Veritabanına bağlanılamadı: " . $conn->connect_error);
}

// Formdan gelen verileri alma
$kalkisNoktasi = $_POST['kalkisNoktasi'];
$varisNoktasi = $_POST['varisNoktasi'];
$tarih = $_POST['tarih'];

// SQL sorgusunu oluşturma
$sql = "SELECT * FROM seferler WHERE kalkis_yeri = '$kalkisNoktasi' AND varis_yeri = '$varisNoktasi' AND sefer_tarih = '$tarih'";

// SQL sorgusunu çalıştırma ve sonuçları alma
$result = $conn->query($sql);

// Sonuçları işleme ve ekrana yazdırma
if ($result->num_rows > 0) {
    // Veritabanından gelen verileri tablo olarak ekrana yazdırma
    echo '<table class="table table-bordered">';
    echo '<thead>';
    echo '<tr>';
    echo '<th>Kalkış-Varış</th>';
    echo '<th>Saat</th>';
    echo '<th>Firma</th>';
    echo '<th>Model</th>';
    echo '<th>Araç Özellikleri</th>';
    echo '<th>Fiyat</th>';
    echo '</tr>';
    echo '</thead>';
    echo '<tbody>';

    while ($row = $result->fetch_assoc()) {
        echo '<tr>';
        echo '<td>' . $row["kalkis_yeri"] . ' / ' . $row["varis_yeri"] . '</td>';
        echo '<td>' . $row["saat"] . '</td>';
        echo '<td>' . $row["firma"] . '</td>';
        echo '<td>' . $row["model"] . '</td>';
        echo '<td>' . $row["arac_ozellikleri"] . '</td>';
        echo '<td>' . $row["fiyat"] . '</td>';
        echo '</tr>';
    }

    echo '</tbody>';
    echo '</table>';
} else {
    echo '<div class="alert alert-danger" role="alert">Sefer bulunamadı.</div>';
}

// Veritabanı bağlantısını kapatma
$conn->close();
?>
