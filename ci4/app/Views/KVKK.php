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
    
    <div class="mx-5 pt-5">
        <h1>Kişisel Verilerin Korunması</h1>
        <div class="mx-5 pt-5">
            <img class="img-fluid" src="images/kvkk.jpeg" alt="">
            <br><br><br>
            <h4>Veri Sorumlusu ve İletişim Bilgileri</h4>
            <p>Bu gizlilik politikası, Umuttepe Turizm Adı tarafından işletilen otobüs yolcu taşımacılığı hizmetleri sırasında kişisel verilerin toplanması, kullanılması ve korunması hakkında bilgi sağlamaktadır. Şirketimiz, Kişisel Verilerin Korunması Kanunu ("KVKK") kapsamında veri sorumlusu olarak kabul edilmektedir. İlgili konularla ilgili herhangi bir soru veya endişeniz varsa, lütfen aşağıdaki iletişim bilgilerini kullanarak bize ulaşın:
                <br><br>
                Umuttepe Turizm <br>
                Kabaoğlu İzmit/Kocaeli <br>
                4141 414 41 41 <br>
                umuttepe_turizm@hotmail.com</p>
            <br>
            <h4>Toplanan Kişisel Veriler ve İşleme Amaçları</h4>
            <p>Şirketimiz, aşağıdaki kişisel verileri toplayabilir ve işleyebilir:

                Ad, soyadı, doğum tarihi
                İletişim bilgileri (telefon numarası, e-posta adresi)
                Kimlik bilgileri (TC kimlik numarası, pasaport bilgileri)
                Ödeme bilgileri
                Bu veriler, aşağıdaki amaçlar için işlenebilir:
                Yolcu rezervasyonları ve taleplerinin yönetimi
                Ödeme işlemlerinin gerçekleştirilmesi
                Hizmet kalitesinin artırılması ve müşteri memnuniyeti sağlanması
                Yasal yükümlülüklerin yerine getirilmesi</p>
            <br>
            <h4>Veri Saklama ve Güvenliği</h4>
            <p>Kişisel verileriniz, gerekli olan süre boyunca saklanacak ve bu süre sonunda silinecektir. Verilerin güvenliği için uygun teknik ve organizasyonel önlemler alınmaktadır. Ancak, internet üzerinden iletişim veya veri depolama konusundaki güvenlik garantisi verilemez.</p>
            <br>
            <h4>Üçüncü Taraf Paylaşımı</h4>
            <p>Kişisel veriler, yasal düzenlemelere uygun olarak ve sadece işleme amacına hizmet eden üçüncü taraflarla paylaşılabilir. Bu paylaşımlar, yasal düzenlemelere uygun olarak ve gizlilik prensiplerimize bağlı olarak gerçekleştirilecektir.</a></p>
            <br>
            <h4> KVKK Hakları</h4>
            <p>KVKK kapsamında, kişisel verilerinizle ilgili belirli haklara sahipsiniz. Bu haklarınızı kullanmak veya bilgi almak için lütfen yukarıdaki iletişim bilgilerini kullanarak bize başvurun.</a></p>
            <br>
            <h4>Güncellemeler ve Değişiklikler</h4>
            <p>Bu gizlilik politikası, değişiklikler ve güncellemeler dahil olmak üzere zaman zaman revize edilebilir. Güncel politikaya erişim sağlamak için lütfen düzenli olarak kontrol edin.

                Bu politika, [Tarih] tarihinde revize edilmiştir.</a></p>
            <br>
            <hr>
    

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

    <!-- API KEYİN ALINDIĞI KISIM GOOGLE API DAN ALINACAK VE GOOGLE MAP JAVASCRİPT ENABLE EDİLECEK -->
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=API_KEYI_BURAYA_GIR&callback=initMap"></script>
    <script src="js/script.js"></script>
    <script src="path/to/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>