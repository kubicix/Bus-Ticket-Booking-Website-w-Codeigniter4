<?php


include 'config.php';


?>


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
        .container a {
            text-decoration: none;
            color: white;
            font-size: 16px;
            margin-right: 25px;
            transition: color 0.3s ease;
            margin-bottom: 30px;
        }

        .container a:hover {
            color: lightgray;

        }


        .custom-border {
            border: 1px solid black;
        }

        .custom-border:not(:first-child) {
            border-top: none;
            /* İlk satır dışındaki satırların üst sınırını kaldırır */
            border-bottom-width: 1px;
            /* Alt sınır kalınlığı */
        }

    </style>
</head>


<body>
    <nav id="navbarContainer"></nav>

    <div class="container">
        <div class="row "
            style="background-color: darkgreen; margin-top: 25px; height: 25px; border:2px solid black; padding-bottom: 30px; padding-top: 5px;">
            <div class="col" style="color: white;">
                Ana Menü
            </div>
        </div>
        <div class="row align-items-center"
            style="background-color: cadetblue; height: 75px;  border:2px solid black; text-align: center;">
            <div class="col" style="border-right: 2px solid black;">
                <a href="user.php">Hesabım</a>
            </div>
            <div class="col" style="border-right: 2px solid black;">
                <a href="userInf.php">Üye Bilgilerim</a>
            </div>
            <div class="col" style="border-right: 2px solid black;">
                <a href="obilet.php">Bilet Satın Al</a>
            </div>
            <div class="col" style="border-right: 2px solid black;">
                <a href="points.php">Umtur Puanlarım</a>
            </div>
            <div class="col">
                <a href="logout.php">Oturumu Kapat</a>
            </div>
        </div>
        <div class="row " style="text-align: center; background-color:darkslategray; margin-top: 25px; padding:5px">
            <div class="col-md-12 text-center" style="color: white;">
                Umtur Bilgileriniz
            </div>
        </div>

        <div class="row custom-border">
            <div class="col-md-9">Gsm Numaranız</div>
            <div class="col-md-3" style="text-align: right; ">.col-md-6</div>
        </div>
        <div class="row custom-border">
            <div class="col-md-9">Adınız Soyadınız</div>
            <div class="col-md-3" style="text-align: right; ">.col-md-6</div>
        </div>
        <div class="row custom-border">
            <div class="col-md-9">Toplam Umtur Puanınız</div>
            <div class="col-md-3" style="text-align: right;">.col-md-6</div>
        </div>
        <div class="row custom-border">
            <div class="col-md-9">Toplam Kullanılan Umtur Puanınız</div>
            <div class="col-md-3" style="text-align: right; ">.col-md-6</div>
        </div>
        <div class="row custom-border">
            <div class="col-md-9">Kullanılabilir Umtur Puanınız</div>
            <div class="col-md-3" style="text-align: right;">.col-md-6</div>
        </div>

        <div class="row "
            style="background-color: darkgreen; margin-top: 25px; height: 25px; border:2px solid black; padding-bottom: 30px; padding-top: 5px;">
            <div class="col text-center" style="color: white;">
                GERÇEKLEŞTİRDİĞİNİZ SON BİLET İŞLEMLERİNİZ
            </div>
        </div>
        <div class="row text-center">
        <table class="table table-bordered" >
            <thead >
                <tr >
                    <th scope="col" ">İşlem Tarihi</th>
                    <th scope="col">Sefer Tarihi</th>
                    <th scope="col">İlk Durak</th>
                    <th scope="col">Son Durak</th>
                    <th scope="col">Tür</th>
                    <th scope="col">Umtur Puan </th>
                </tr>
            </thead>
            <tbody>
                <tr>

                </tr>
                <tr>

                </tr>
                <tr>

                </tr>
            </tbody>
        </table>
        </div>
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

    <script src="js/script.js"></script>
    <script src="path/to/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>