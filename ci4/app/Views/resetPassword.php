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

</head>
<body>
    <nav id="navbarContainer"></nav>

    <section class="py-3 mt-3">
        <div class="container">
            <div class="text-uppercase">
                <h2>Şifremi Unuttum</h2>
            </div>
        </div>
    </section>

    <section class="pt-30 pb-80">
        <form id="resetPassword" name="resetPassword" method="post">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <label class="col-md-4 nopadding text-20">Telefon Numaranız:</label>
                        <input type="text" class="form-control col-md-8 " required id="telephone" name="telephone" autocomplete="off" placeholder="Telefon numaranızı giriniz...">
                    </div>
                    <div style="margin-top:15px" class="col-xs-12">
                        <label class="col-md-4 nopadding text-20">Adınızın <u><strong>ilk harfi</strong></u>: </label>
                        <input type="text" class="form-control col-md-8 " required id="ilkHarf" maxlength="1" name="ilkHarf" autocomplete="off">
                    </div>
                    <div style="margin-top:15px" class="col-md-5">
                        <button type="submit" class="btn btn-primary" id="btnUyeKontrol" name="btnUyeKontrol">Kontrol Et</button>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-md-12 mt-3" style="padding: 10px 15px 10px 15px;">
                        <div id="divMenu">
                            <div class="alert alert-danger" role="alert">
                                Lütfen girdiğiniz telefon numarasının doğru formatta olduğunu kontrol ederek tekrar deneyin.
                            </div>
                            <div class="alert alert-danger" role="alert">
                                Eklediğiniz telefon numarasının başında sıfır olmadığından emin olunuz.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </section>


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

    <!-- API KEYİN ALINDIĞI KISIM GOOGLE API DAN ALINACAK VE GOOGLE MAP JAVASCRİPT ENABLE EDİLECEK -->
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=API_KEYI_BURAYA_GIR&callback=initMap"></script>
    <script src="js/script.js"></script>
    <script src="path/to/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>