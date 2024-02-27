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

    <section class="py-3 mt-3" >
        <div class="container">
            <div class="text-uppercase">
                <h2>E-Bilet</h2>
            </div>
        </div>
    </section>

    <section class="pt-30 pb-80 bg-border">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-md-12 text-center"> 
                    <div class="text-uppercase">
                        <h2>E-Bilet Gönder</h2>
                    </div>
                    <form method="post">
                        <div class="col-md-6 mx-auto">
                            <label for="telephoneNo" class="col-form-label">Cep Telefonu:</label>
                            <input class="form-control" type="text" id="telephoneNo" name="telephoneNo" maxlength="10" autocomplete="off" placeholder="5XXXXXXXXX">
                        </div>
                        <div class="col-md-12 my-3 text-center">
                            <button type="submit" id="btnGonder" name="btnGonder" class="btn btn-primary btn-lg" style="width:200px;"><b>Gönder</b></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
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