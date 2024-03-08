
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="<?= CSS ?>style.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="scss/_variables.scss" />
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

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
    </style>
</head>
<body>
    
<nav id="navbarContainer">
      <?php include(APPPATH . 'Views/navbar.php'); ?>
</nav>


<div id="carouselExampleFade" class="carousel slide carousel-fade">
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="<?= IMAGES ?>bus1.jpg" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
            <img src="<?= IMAGES ?>bus2.jpg" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
            <img src="<?= IMAGES ?>bus3.jpg" class="d-block w-100" alt="...">
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>


    <section class="p-5">
        <div class="container mt-5">
            <div class="card">
              <div class="card-header bg-primary text-white fw-bold">
                Bilet İşlemleri
              </div>
              <div class="card-body">
                <form method="GET" action="<?= base_url('obilet') ?>">
                  <div class="mb-3">
                    <label for="kalkisNoktasi" class="form-label">Kalkış Noktası</label>
                    <select class="form-select" id="start" required>
                      <option value="ankara">Ankara</option>
                      <option value="antalya">Antalya</option>
                      <option value="istanbul">İstanbul</option>
                      <option value="izmir">İzmir</option>
                    </select>
                  </div>
                  <div class="mb-3">
                    <label for="varisNoktasi" class="form-label">Varış Noktası</label>
                    <select class="form-select" id="end" required>
                      <option value="ankara">Ankara</option>
                      <option value="antalya">Antalya</option>
                      <option value="istanbul">İstanbul</option>
                      <option value="izmir">İzmir</option>
                    </select>
                  </div>
                  <div class="mb-3">
                    <label for="gidisTarihi" class="form-label">Gidiş Tarihi</label>
                    <input type="date" class="form-control" id="gidisTarihi" required>
                  </div>
                  <div class="mb-3">
                    <label for="donusTarihi" class="form-label">Dönüş Tarihi</label>
                    <input type="date" class="form-control" id="donusTarihi">
                  </div>
                  <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="donusCheckbox">
                    <label class="form-check-label" for="donusCheckbox">Dönüş</label>
                  </div>
                  <button type="submit" class="btn btn-primary">Bilet Ara</button>
                </form>
              </div>
              
            </div>
            
          </div>

          <div class="card mb-4 mt-4">
            <div class="card-body">
                <div class="mb-3">
                    <div id="map" style="height: 600px; width: auto;"></div> <!-- Harita alanı -->
                </div>
            </div>
        </div>
        

          <div class="container mt-5">
            <!-- Üyelik İşlemleri Kartı -->
            <div class="card">
                <div class="card-header bg-success text-white fw-bold">
                    Üyelik İşlemleri
                </div>
                <div class="card-body">
                    <form>
                        <div class="mb-3">
                            <label for="cepTelefonu" class="form-label">Cep Telefonu</label>
                            <input type="tel" class="form-control" id="cepTelefonu" placeholder="Cep telefonu numaranızı girin" required>
                        </div>
                        <div class="mb-3">
                            <label for="sifre" class="form-label">Şifre</label>
                            <input type="password" class="form-control" id="sifre" placeholder="Şifrenizi girin" required>
                        </div>
                        <div class="mb-3">
                            <button type="button" class="btn btn-success">Üye Ol</button>
                            <button type="button" class="btn btn-primary">Oturum Aç</button>
                            <button type="button" class="btn btn-danger">Şifremi Unuttum</button>
                        </div>
                    </form>
                </div>
            </div>
            
          </div>
    </section>
    
    <div id="footerContainer">
      <?= view('footer') ?>
    </div>


  <script>
      function initMap() {
        var directionsService = new google.maps.DirectionsService;
        var directionsDisplay = new google.maps.DirectionsRenderer;
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 7,
          center: {lat: 39.9255, lng: 32.8660} // Türkiye'nin koordinatları (Ortalama)
        });
        directionsDisplay.setMap(map);

        var onChangeHandler = function() {
          calculateAndDisplayRoute(directionsService, directionsDisplay);
        };
        document.getElementById('start').addEventListener('change', onChangeHandler);
        document.getElementById('end').addEventListener('change', onChangeHandler);
      }

      function calculateAndDisplayRoute(directionsService, directionsDisplay) {
        directionsService.route({
          origin: document.getElementById('start').value,
          destination: document.getElementById('end').value,
          travelMode: 'DRIVING'
        }, function(response, status) {
          if (status === 'OK') {
            directionsDisplay.setDirections(response);
          } else {
            window.alert('Yönler isteği ' + status + ' nedeniyle başarısız oldu.');
          }
        });
      }
    </script>

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
    </script> -->

    <!-- API KEYİN ALINDIĞI KISIM GOOGLE API DAN ALINACAK VE GOOGLE MAP JAVASCRİPT ENABLE EDİLECEK -->
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=API_KEY_BURAYA&callback=initMap"></script>
    <script src="../js/script.js"></script>
    <script src="path/to/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>