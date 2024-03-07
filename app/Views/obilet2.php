<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="<?= CSS ?>style.css">
    <link rel="stylesheet" type="text/css" href="scss/_variables.scss" />
    <link rel="stylesheet" href="path/to/bootstrap/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    <style>

    </style>
</head>

<body>
    <nav id="navbarContainer">
        <?php include(APPPATH . 'Views/navbar.php'); ?>
    </nav>


    <div class="container bg-light rounded mb-4">
        <div class="row">

            <div class="col-md-6">
                <h2 class="font-weight-bold">Bilet Bilgileri</h2>
                <p><strong>Kalkış Noktası:</strong> <span id="kalkisNoktasi"></span></p>
                <p><strong>Varış Noktası:</strong> <span id="varisNoktasi"></span></p>
                <p><strong>Otobüs Plakası:</strong> <span id="otobusPlaka" name="otobusPlaka"></span></p>
                <p><strong>Sefer Tarihi:</strong> <span id="seferTarihi" name="seferTarihi"></span></p>
                <p><strong>Satın Alınan Koltuklar:</strong> <span id="koltukNo" name="koltukNo"></span></p>
                <p><strong class="font-weight-bold h2">TOPLAM:</strong> <span id="fiyat"
                        class="font-weight-bold h2 text-danger"></span></p>
            </div>
            <form method="post" id="ticketForm" >
                <input type="hidden" id="otobusPlaka1" name="otobusPlaka1">
                <input type="hidden" id="seferTarihi1" name="seferTarihi1">
                <input type="hidden" id="koltukNo1" name="koltukNo1">
                <input type="hidden" id="fiyat1" name="fiyat1">

                <!-- Satın Al Butonu -->
                <button type="submit" class="btn btn-success btn-lg" id="buyTicketButton">Satın Al <i
                        class="fas fa-ticket-alt"></i></button>

                <!-- Rezerve Et Butonu -->
                <button type="submit" class="btn btn-primary btn-lg" id="reserveTicketButton">Rezerve Et <i class="fas fa-book"></i>
</button>
            </form>


        </div>
    </div>
    


    <script>
    // Satın Al butonuna tıklanırsa
    document.getElementById("buyTicketButton").addEventListener("click", function() {
        // Satın al işlemi için formu submit et
        document.getElementById("ticketForm").action = "<?= base_url('obilet2') ?>";
        document.getElementById("ticketForm").submit();
    });

    // Rezerve Et butonuna tıklanırsa
    document.getElementById("reserveTicketButton").addEventListener("click", function() {
        // Rezerve et işlemi için formu submit et
        document.getElementById("ticketForm").action = "<?= base_url('user') ?>";
        document.getElementById("ticketForm").submit();
    });
</script>



    <script>
        const selectedSeats = JSON.parse(window.localStorage.getItem('selectedSeats'));

        // localStorage'da formData anahtarına sahip veriyi al
        const jsonString = window.localStorage.getItem('formData');
        const jsonString2 = window.localStorage.getItem('rowData');

        // JSON verisini parse et
        const formData = JSON.parse(jsonString);
        const formData2 = JSON.parse(jsonString2);

        // Form verilerini kullanarak istediğiniz işlemleri yapın
        document.getElementById('kalkisNoktasi').textContent = formData.kalkisNoktasi;
        document.getElementById('varisNoktasi').textContent = formData.varisNoktasi;
        document.getElementById('otobusPlaka').textContent = formData2.otobusPlaka;
        document.getElementById('seferTarihi').textContent = formData2.seferTarih;

        document.getElementById('otobusPlaka1').value = formData2.otobusPlaka;
        document.getElementById('seferTarihi1').value = formData2.seferTarih;


        // Eğer koltuklar null ise, boş bir array olarak ayarla
        const seats = selectedSeats || [];

        // Satın alınan koltukları yazdır
        document.getElementById('koltukNo').textContent = seats.join(', ');
        document.getElementById('koltukNo1').value = seats.join(', ');

        // Fiyatı hesapla ve yazdır
        const fiyat = seats.length * formData2.seferFiyat;
        document.getElementById('fiyat').textContent = fiyat + ' TL';
    </script>





    <div id="footerContainer">
        <?php include(APPPATH . 'Views/footer.php'); ?>
    </div>

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