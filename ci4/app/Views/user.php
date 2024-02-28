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
            color:lightgray;

        }
    </style>
</head>


<body>
    <nav id="navbarContainer"></nav>

    <div class="container">
        <div class="row " style="background-color: darkgreen; margin-top: 25px; height: 25px; border:2px solid black; padding-bottom: 30px; padding-top: 5px;" >
            <div class="col" style="color: white;">
                Ana Menü
            </div>
        </div>
        <div class="row align-items-center" style="background-color: cadetblue; height: 75px;  border:2px solid black; text-align: center;">
            <div class="col" style="border-right: 2px solid black;">
                <a href="">Hesabım</a>
            </div>
            <div class="col" style="border-right: 2px solid black;">
                <a href="">Üye Bilgilerim</a>
            </div>
            <div class="col" style="border-right: 2px solid black;">
                <a href="">Bilet Satın Al</a>
            </div>
            <div class="col" style="border-right: 2px solid black;">
                <a href="">Umtur Puanlarım</a>
            </div>
            <div class="col">
                <a href="logout.php">Oturumu Kapat</a>
            </div>
        </div>
        <div class="row" style="margin-bottom: 100px; padding-top: 25px;">
            <table width="100%" cellspacing="0" cellpadding="0">
                <tbody>
                    <tr>
                        <td>

                            <b><b>Uygun Bilet Kaydı Bulunamadı.<br><br></b>

                            </b>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">

                            <table width="100%">
                                <tbody>
                                    <tr>
                                        <td colspan="2"> <strong>Açıklamalar</strong> </td>
                                    </tr>
                                    <tr>
                                        <td width="25"></td>
                                        <td>Satın aldığınız biletlerinizi, açık tarihli bilete çevirmek
                                            için <b> BİLETİMİ AÇIĞA AL</b> tıklayınız.</td>
                                    </tr>
                                    <tr>
                                        <td width="25"></td>
                                        <td>Açık biletinizi, istediğiniz tarih ve saate çevirmek için
                                            <b>AÇIK BİLETİMİ KULLAN</b>
                                            tıklayınız.
                                        </td>
                                    </tr>

                                    <tr>
                                        <td width="25"><b> </b></td>
                                        <td>Değişiklik yapmak istediğiniz biletleriniz için sağ bölümde
                                            bulunan <b>DEĞİŞİKLİK </b> tıklayınız</td>
                                    </tr>
                                    <tr>
                                        <td width="25"><b> </b></td>
                                        <td>Aynı bilet üzerinde en fazla <b>3 defa</b> değişiklik
                                            yapabilirsiniz.</td>
                                    </tr>
                                    <tr>
                                        <td width="25"><b> </b></td>
                                        <td>Araç hareket saatine, <b>2 saat ve daha az süre kalan</b>
                                            biletler için değişiklik yapılamamaktadır.</td>
                                    </tr>
                                    <tr>
                                        <td width="25"><b> </b></td>
                                        <td>Şehir içi servis değişikliğini <b>BİLET DEĞİŞTİR</b> bölümünden
                                            yapabilirsiniz.</td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
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