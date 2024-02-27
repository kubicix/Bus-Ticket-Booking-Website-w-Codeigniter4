<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Profile</title>
    <link rel="stylesheet" type="text/css" href="scss/_variables.scss" />
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
    <nav id="navbarContainer"></nav>
    
    <div class="container mt-5">
      <h2 class="mb-4">Öneri ve Şikayet Formu</h2>
      <form>
        <div class="mb-3">
          <label for="fullName" class="form-label">Ad Soyad</label>
          <input type="text" class="form-control" id="fullName" required>
        </div>
        <div class="mb-3">
          <label for="email" class="form-label">E-Posta</label>
          <input type="email" class="form-control" id="email" required>
        </div>
        <div class="mb-3">
          <label for="phone" class="form-label">Cep Telefonu</label>
          <input type="tel" class="form-control" id="phone" required>
        </div>
        <div class="mb-3">
          <label for="contactType" class="form-label">İletişim Türü</label>
          <select class="form-select" id="contactType" required>
            <option value="">- Seçiniz -</option>
            <option value="öneri">Öneri</option>
            <option value="şikayet">Şikayet</option>
          </select>
        </div>
        <div class="mb-3">
          <label for="subject" class="form-label">Konu</label>
          <select class="form-select" id="subject" required>
            <option value="">- Seçiniz -</option>
            <option value="yolculuk">Güzergah Bilgisi</option>
            <option value="diger">Diğer</option>
          </select>
        </div>
        <div class="mb-3">
          <label for="message" class="form-label">Mesajınız</label>
          <textarea class="form-control" id="message" rows="4" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Kaydet</button>
      </form>
    </div>
    
    <div id="footerContainer"></div>
    <script>
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
    </script>

</body>
</html>