<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= CSS ?>style.css">
    <title>Profile</title>
    <link rel="stylesheet" type="text/css" href="scss/_variables.scss" />
    <link rel="stylesheet" href="path/to/bootstrap/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"/>

</head>
<body>
    <nav id="navbarContainer"> <?php include(APPPATH . 'Views/navbar.php'); ?></nav>
    
    <div class="mx-5 pt-5">
        <h1>Hakkımızda</h1>
        <div class="mx-5 pt-5">
            <h3>"Önce İnsan"</h3>
            <br>
            <p>1990 Yılında merhum Mehmet Sadık Efe tarafından bir aile şirketi olarak kurulmuş olan Efe Tur 2012 yılının Ekim ayı itibari ile Sayın Kadir Alper Birant ve Sayın Halit Bıçak ortaklığında yoluna devam etmektedir./p>
            <br>
            <p>Firmamız kuruluş amacında taşıdığı ruhu kaybetmeden, geçmişine ve değerlerine sahip çıkarak aynı zamanda gelişen teknoloji ile birlikte sektörde örnek ve öncü olma hedefini taşımaktadır. "Önce insan" anlayışı ile hareket eden Efe Tur 1990 yılından bu yana profesyonel kadrosu ve yeniliğe açık olan bireyler ile birlikte çalışarak oluşabilecek her türlü sorunlara karşı objektif bir yaklaşımla toplum ve hukuk kurallarına saygılıdır.</p>
            <br>
            <p>Siz değerli müşteri ve çözüm ortaklarımızın memnuniyeti firmamızın en önemli kalıcı değeridir.</p>
            <br>
            <div class="row">
                <div class="col-4"  >
                    <img class="img-fluid" src="<?= base_url('public/images/misyon-vizyon.jpg') ?>" alt="">
                </div>
                <div class="col-8">
                    <h4>Misyonumuz :</h4>
                    <br>
                    <p>Yolcularımızın beklentilerini karşılayarak kara yol taşımacılığında örnek olmaktır. Yolcularımızın memnuniyeti ön planda olmak üzere ana ilkemiz karşılıklı saygı ve dürüstlük çerçevesinde iletişim kurmayı sağlamaktır. Hizmetlerimizi siz değerli yolcularımıza en iyi şekilde sunabilmek ve firmamızı en üst seviyeye taşımaktır.</p>
                    <br>
                    <h4>Vizyonumuz :</h4>
                    <p>Profesyonel yönetim anlayışı ile teknolojik gelişmelere uygunluğu, paylaşımcı olmayı esas alan bir anlayışıyla sektörde lider olmak ve hizmet mükemmeliyetini sağlamaktır.</p>
                </div>
                <br>
            </div>

        </div>
    </div>

    <div id="footerContainer">        <?= view('footer') ?></div>

    <!-- API KEYİN ALINDIĞI KISIM GOOGLE API DAN ALINACAK VE GOOGLE MAP JAVASCRİPT ENABLE EDİLECEK -->
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=API_KEYI_BURAYA_GIR&callback=initMap"></script>
    <script src="js/script.js"></script>
    <script src="path/to/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>