<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="<?= CSS ?>style.css">
    <link rel="stylesheet" href="path/to/bootstrap/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"/>
    <style>
      /* Haritayı içeren div elemanının boyutunu belirlemek için haritayı yükseklik olarak belirtin. */
      #map {
        height: 100%;
      }
      #floating-panel {
        position: absolute;
        top: 10px;
        left: 25%;
        z-index: 5;
        background-color: #fff;
        padding: 5px;
        border: 1px solid #999;
        text-align: center;
        font-family: 'Roboto','sans-serif';
        line-height: 30px;
        padding-left: 10px;
      }
    .map-container {
      width: 100%;
      height: 400px; /* Harita görüntüsü için bir yükseklik değeri belirleyin */
    }
    </style>
</head>
<body>
    <nav id="navbarContainer">
    <?php include(APPPATH . 'Views/navbar.php'); ?>

    </nav>
    
    <div class="container mt-5">
        <div class="row">
          <!-- İletişim Bilgileri -->
          <div class="col-md-6">
            <h2>İletişim Bilgileri</h2>
            <p><strong>Genel Müdürlük:</strong> Kubiağa Mahallesi, Boncuk Bademsu Caddesi, No:143, Merkez/Kocaeli</p>
            <p><strong>E-Posta:</strong> info@umtur.com.tr</p>
            <p><strong>Çağrı Merkezi:</strong> (4141) 414 41 41</p>
          </div>
          <!-- Harita -->
          <div class="col-md-6">
            <h2>Kocaeli Üniversitesi Konumu</h2>
            <div class="map-container">
              <!-- Buraya harita eklenecek (Google Maps API kullanılarak) -->
            </div>
          </div>
        </div>
      </div>
    
      <!-- Bootstrap JS (popper.js and bootstrap.js) -->
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.11.6/umd/popper.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.min.js"></script>
      <!-- Google Maps API -->
      <script src="https://maps.googleapis.com/maps/api/js?key=API_KEYI_BURAYA_GIR&callback=initMap" defer></script>
      <script>
        // Google Maps API ile harita oluşturma fonksiyonu
        function initMap() {
          // Kocaeli Üniversitesi koordinatları
          const kocaeliUniCoords = { lat: 40.774057, lng: 29.936702 };
          // Harita oluşturma
          const map = new google.maps.Map(document.querySelector('.map-container'), {
            zoom: 15,
            center: kocaeliUniCoords
          });
          // İşaretçi oluşturma
          new google.maps.Marker({
            position: kocaeliUniCoords,
            map: map,
            title: 'Kocaeli Üniversitesi'
          });
        }
      </script>

    
    <div id="footerContainer">
    <?php include(APPPATH . 'Views/footer.php'); ?>

    </div>
    <!-- <script>
        fetch('navbar.html')
            .then(response => response.text())
            .then(data => {
                document.getElementById('navbarContainer').innerHTML = data;
            })
            .catch(error => console.error('Navbar yüklenirken bir hata oluştu:', error));
        fetch('footer.html')
            .then(response => response.text())
            .then(data => {
                document.getElementById('footerContainer').innerHTML = data;
            })
            .catch(error => console.error('Navbar yüklenirken bir hata oluştu:', error));
    </script>
  

    <script>
        // Navbar'ı yükle
        fetch('navbar.html')
            .then(response => response.text())
            .then(data => {
                document.getElementById('navbarContainer').innerHTML = data;
            })
            .catch(error => console.error('Navbar yüklenirken bir hata oluştu:', error));
    </script> -->

</body>
</html>