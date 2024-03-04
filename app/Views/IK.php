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
    <nav id="navbarContainer">
        <?php include(APPPATH . 'Views/navbar.php'); ?>
    </nav>
    
    <div class="mx-5 pt-5">
        <h1>İnsan Kaynakları</h1>
        <div class="mx-5 pt-5">
            <img class="img-fluid" src="<?= base_url('public/images/ik.jpg') ?>"  alt="">
            <br>
            <br>
            <h4>İnsan Kaynakları Vizyonumuz:</h4>
            <p>İnsan Kaynakları Vizyonumuz, Efe Tur'un hedeflerine ulaşma sürecinde etkin insan kaynakları politikaları uygulayarak, stratejik rol üstlenmekten oluşuyor.</p>
            <br>
            <h4>İnsan Kaynakları Misyonumuz:</h4>
            <p>"Doğru İşe Doğru İnsanı" seçerek ve bu kişilerin sürekli gelişimini sağlayarak Efe Tur'u hedeflerine taşıyacak yetenekli, katılımcı ve yaratıcı iş gücünü oluşturmak ve elde tutmaktır.</p>
            <br>
            <h4>İnsan Kaynakları Politikamız:</h4>
            <p>Efe Tur Ailesi'nin bir üyesi olmanın gereği olarak karşılıklı sevgi, saygı, eşitlik, güven ve etik değerlere sahip olma ilkeleri etrafında şekilleniyor. Organizasyonumuz içinde yer alan çalışma arkadaşlarımızın, işinin sahibi ve lideri olduğu bilinci ile eğitim, bilgi ve yeteneklerine uygun görevlerde çalışması için fırsat tanıyor, sorumluluk veriyor, gelişmeleri için hedefler belirliyoruz. İnsan kaynakları uygulamalarımızın temelinde, ait olma duygusu ile ailemizin bir üyesi olma bilinci yer alıyor. Bu bilinçle aile fertlerimiz olarak gördüğümüz tüm arkadaşlarımıza eşit, insani değerler içinde yaklaşarak, şirket kültürümüze uyumlu insan kaynakları sistemleri uyguluyoruz.</p>
            <br>
            <h4>Umuttepe Turizm Ailesi'nin bir üyesi olun:</h4>
            <p>Açık pozisyonlarımıza başvuru yapmak için <a href="">tıklayınız.</a></p>
            <br>
    

        </div>
    </div>

    <div id="footerContainer">
        <?= view('footer') ?>
    </div>


    <!-- API KEYİN ALINDIĞI KISIM GOOGLE API DAN ALINACAK VE GOOGLE MAP JAVASCRİPT ENABLE EDİLECEK -->
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=API_KEYI_BURAYA_GIR&callback=initMap"></script>
    <script src="js/script.js"></script>
    <script src="path/to/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>