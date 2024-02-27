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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    <style>
        
    </style>
</head>

<body>
    <nav id="navbarContainer"></nav>

    
    <div class="container bg-light rounded mb-4">
        <div class="row">
            <div class="col-md-6">
                <h2 class="font-weight-bold">Bilet Bilgileri</h2>
                <p><strong>Kalkış Noktası:</strong> <span id="kalkisNoktasi"></span></p>
                <p><strong>Varış Noktası:</strong> <span id="varisNoktasi"></span></p>
                <p><strong>Sefer Tarihi:</strong> <span id="seferTarihi"></span></p>
                <p><strong>Satın Alınan Koltuklar:</strong> <span id="satınAlınanKoltuklar"></span></p>
                <p><strong class="font-weight-bold h2">TOPLAM:</strong> <span id="fiyat" class="font-weight-bold h2 text-danger"></span></p>
            </div>
            
            <button class="btn btn-success btn-lg" id="buyTicketButton">Satın Al</button>
            
        </div>
    </div>
    
    
    <script>
        const selectedSeats = JSON.parse(window.localStorage.getItem('selectedSeats'));
        
        // localStorage'da formData anahtarına sahip veriyi al
        const jsonString = window.localStorage.getItem('formData');
        
        // JSON verisini parse et
        const formData = JSON.parse(jsonString);
        
        // Form verilerini kullanarak istediğiniz işlemleri yapın
        document.getElementById('kalkisNoktasi').textContent = formData.kalkisNoktasi;
        document.getElementById('varisNoktasi').textContent = formData.varisNoktasi;
        document.getElementById('seferTarihi').textContent = formData.seferTarihi;
        
        // Eğer koltuklar null ise, boş bir array olarak ayarla
        const seats = selectedSeats || [];
        
        // Satın alınan koltukları yazdır
        document.getElementById('satınAlınanKoltuklar').textContent = seats.join(', ');
        
        // Fiyatı hesapla ve yazdır
        const fiyat = seats.length * 300;
        document.getElementById('fiyat').textContent = fiyat + ' TL';
    </script>
    
    
    
    

    <div id="footerContainer"></div>

    <!-- <script>
        const selectedSeats = JSON.parse(window.localStorage.getItem('selectedSeats'));
    
        // localStorage'da formData anahtarına sahip veriyi al
        const jsonString = window.localStorage.getItem('formData');
        
        // JSON verisini parse et
        const formData = JSON.parse(jsonString);
        
        // Form verilerini kullanarak istediğiniz işlemleri yapın
        console.log(formData.kalkisNoktasi); // sehirler
        console.log(formData.varisNoktasi); // sehirler
        console.log(formData.seferTarihi); // tarih
    
        // Eğer koltuklar null ise, boş bir array olarak ayarla
        const seats = selectedSeats || [];
    
        console.log(seats);
    </script> -->
    
   
    

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