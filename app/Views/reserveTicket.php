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


    <h1 class="txt-center text-center">BİLETİNİZ BAŞARIYLA RESERVE EDİLDİ</h1>



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