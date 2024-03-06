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
        *,
        *:before,
        *:after {
            box-sizing: border-box;
        }

        html {
            font-size: 16px;
        }

        .bus {
            margin: 20px auto;
            max-width: 300px;
        }



        .exit {
            position: relative;
            height: 50px;

            &:after {
                content: "EXIT";
                font-size: 14px;
                line-height: 18px;
                padding: 0px 2px;
                font-family: "Arial Narrow", Arial, sans-serif;
                display: block;
                position: absolute;
                background: green;
                color: white;
                top: 50%;
                transform: translate(0, -50%);
            }

            &:before {
                left: 0;
            }

            &:after {
                right: 0;
            }
        }

        .fuselage {
            border-right: 5px solid #d8d8d8;
            border-left: 5px solid #d8d8d8;
        }

        ol {
            list-style: none;
            padding: 0;
            margin: 0;
        }



        .seats {
            display: flex;
            flex-direction: row;
            flex-wrap: nowrap;
            justify-content: flex-start;
        }

        .seat {
            display: flex;
            flex: 0 0 14.28571428571429%;
            padding: 5px;
            position: relative;

            &:nth-child(3) {
                margin-right: 14.28571428571429%;
            }

            input[type=checkbox] {
                position: absolute;
                opacity: 0;
            }

            input[type=checkbox]:checked {
                +label {
                    background: #25a5f4;
                    -webkit-animation-name: rubberBand;
                    animation-name: rubberBand;
                    animation-duration: 300ms;
                    animation-fill-mode: both;
                }
            }

            input[type=checkbox]:disabled {
                +label {
                    background: #db2c2c;
                    text-indent: -9999px;
                    overflow: hidden;

                    &:after {
                        content: "X";
                        text-indent: 0;
                        position: absolute;
                        top: 4px;
                        left: 50%;
                        transform: translate(-50%, 0%);
                    }

                    &:hover {
                        box-shadow: none;
                        cursor: not-allowed;
                    }
                }
            }

            label {
                display: block;
                position: relative;
                width: 100%;
                text-align: center;
                font-size: 14px;
                font-weight: bold;
                line-height: 1.5rem;
                padding: 4px 0;

                background: #bada55;
                border-radius: 5px;
                animation-duration: 300ms;
                animation-fill-mode: both;

                &:before {
                    content: "";
                    position: absolute;
                    width: 75%;
                    height: 75%;
                    top: 1px;
                    left: 50%;
                    transform: translate(-50%, 0%);
                    background: rgba(255, 255, 255, .4);
                    border-radius: 3px;
                }

                &:hover {
                    cursor: pointer;
                    box-shadow: 0 0 0px 2px #e40f0f;
                }

            }
        }

        .bought-label {
            background: red !important;
        }

        .available-label {
            background: blue !important;
        }

        @-webkit-keyframes rubberBand {
            0% {
                -webkit-transform: scale3d(1, 1, 1);
                transform: scale3d(1, 1, 1);
            }

            30% {
                -webkit-transform: scale3d(1.25, 0.75, 1);
                transform: scale3d(1.25, 0.75, 1);
            }

            40% {
                -webkit-transform: scale3d(0.75, 1.25, 1);
                transform: scale3d(0.75, 1.25, 1);
            }

            50% {
                -webkit-transform: scale3d(1.15, 0.85, 1);
                transform: scale3d(1.15, 0.85, 1);
            }

            65% {
                -webkit-transform: scale3d(.95, 1.05, 1);
                transform: scale3d(.95, 1.05, 1);
            }

            75% {
                -webkit-transform: scale3d(1.05, .95, 1);
                transform: scale3d(1.05, .95, 1);
            }

            100% {
                -webkit-transform: scale3d(1, 1, 1);
                transform: scale3d(1, 1, 1);
            }
        }

        @keyframes rubberBand {
            0% {
                -webkit-transform: scale3d(1, 1, 1);
                transform: scale3d(1, 1, 1);
            }

            30% {
                -webkit-transform: scale3d(1.25, 0.75, 1);
                transform: scale3d(1.25, 0.75, 1);
            }

            40% {
                -webkit-transform: scale3d(0.75, 1.25, 1);
                transform: scale3d(0.75, 1.25, 1);
            }

            50% {
                -webkit-transform: scale3d(1.15, 0.85, 1);
                transform: scale3d(1.15, 0.85, 1);
            }

            65% {
                -webkit-transform: scale3d(.95, 1.05, 1);
                transform: scale3d(.95, 1.05, 1);
            }

            75% {
                -webkit-transform: scale3d(1.05, .95, 1);
                transform: scale3d(1.05, .95, 1);
            }

            100% {
                -webkit-transform: scale3d(1, 1, 1);
                transform: scale3d(1, 1, 1);
            }
        }

        .rubberBand {
            -webkit-animation-name: rubberBand;
            animation-name: rubberBand;
        }

        .table th,
        .table td {
            white-space: nowrap;
            /* Metnin satır sonunda kesilmesini engeller */
            overflow: hidden;
            /* Taşan metnin gizlenmesini sağlar */
            text-overflow: ellipsis;
            /* Taşan metnin üç nokta (...) ile kısaltılmasını sağlar */
        }
    </style>
</head>

<body>
    <nav id="navbarContainer">
        <?php include(APPPATH . 'Views/navbar.php'); ?>

    </nav>

    <div class="container bg-light p-4 rounderd my-4">
        <div class="row">
            <div class="col-md-6">
                <h2 class="text-dark mb-4">Bilet İşlemleri</h2>
                <form id="myForm" method="post" action="<?= base_url('obilet') ?>">
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="kalkisNoktasi" class="form-label text-dark">Kalkış Noktası</label>
                            <select class="form-select" name="kalkisNoktasi" id="kalkisNoktasi"
                                aria-label="Kalkış Noktası">
                                <option value="istanbul" <?php if (isset($_POST['kalkisNoktasi']) && $_POST['kalkisNoktasi'] == 'istanbul')
                                    echo 'selected'; ?>>İstanbul</option>
                                <option value="izmir" <?php if (isset($_POST['kalkisNoktasi']) && $_POST['kalkisNoktasi'] == 'izmir')
                                    echo 'selected'; ?>>İzmir</option>
                                <option value="ankara" <?php if (isset($_POST['kalkisNoktasi']) && $_POST['kalkisNoktasi'] == 'ankara')
                                    echo 'selected'; ?>>Ankara</option>
                                <option value="antalya" <?php if (isset($_POST['kalkisNoktasi']) && $_POST['kalkisNoktasi'] == 'antalya')
                                    echo 'selected'; ?>>Antalya</option>
                                <option value="kocaeli" <?php if (isset($_POST['kalkisNoktasi']) && $_POST['kalkisNoktasi'] == 'kocaeli')
                                    echo 'selected'; ?>>Kocaeli</option>
                                <option value="edirne" <?php if (isset($_POST['kalkisNoktasi']) && $_POST['kalkisNoktasi'] == 'edirne')
                                    echo 'selected'; ?>>Edirne</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="varisNoktasi" class="form-label text-dark">Varış Noktası</label>
                            <select class="form-select" name="varisNoktasi" id="varisNoktasi"
                                aria-label="Varış Noktası">
                                <option value="istanbul" <?php if (isset($_POST['varisNoktasi']) && $_POST['varisNoktasi'] == 'istanbul')
                                    echo 'selected'; ?>>İstanbul</option>
                                <option value="izmir" <?php if (isset($_POST['varisNoktasi']) && $_POST['varisNoktasi'] == 'izmir')
                                    echo 'selected'; ?>>İzmir</option>
                                <option value="ankara" <?php if (isset($_POST['varisNoktasi']) && $_POST['varisNoktasi'] == 'ankara')
                                    echo 'selected'; ?>>Ankara</option>
                                <option value="antalya" <?php if (isset($_POST['varisNoktasi']) && $_POST['varisNoktasi'] == 'antalya')
                                    echo 'selected'; ?>>Antalya</option>
                                <option value="kocaeli" <?php if (isset($_POST['varisNoktasi']) && $_POST['varisNoktasi'] == 'kocaeli')
                                    echo 'selected'; ?>>Kocaeli</option>
                                <option value="edirne" <?php if (isset($_POST['varisNoktasi']) && $_POST['varisNoktasi'] == 'edirne')
                                    echo 'selected'; ?>>Edirne</option>
                            </select>
                        </div>
                        <input type="text" id="cinsiyet" value="<?= isset($cinsiyet) ? $cinsiyet : ''; ?>">

                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="tarih" class="form-label text-dark">Tarih ve Saat</label>
                            <input type="date" class="form-control" id="tarih" name="tarih"
                                value="<?php echo isset($_POST['tarih']) ? $_POST['tarih'] : ''; ?>">
                        </div>
                        <div class="col-md-6 d-flex align-items-end">
                            <button type="submit" class="btn btn-success" name="submit">Seferleri Listele</button>
                        </div>
                    </div>
                </form>

                <div class="col-md-6">
                    <h2 class="text-dark mb-4">Seferler</h2>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Kalkış-Varış</th>
                                <th>Plaka</th>
                                <th>Tarih</th>
                                <th>Fiyat</th>
                                <th>Firma</th>
                                <th>Koltuk Listesi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($seferler as $sefer): ?>
                                <tr>
                                    <td>
                                        <?= $sefer['kalkis_yeri'] ?> /
                                        <?= $sefer['varis_yeri'] ?>
                                    </td>
                                    <td>
                                        <?= $sefer['otobus_plaka'] ?>
                                    </td>
                                    <td>
                                        <?= $sefer['sefer_tarih'] ?>
                                    </td>
                                    <td>
                                        <?= $sefer['sefer_fiyat'] ?>
                                    </td>
                                    <td><img src="<?= IMG ?>logo-seffaf.png" alt="umuttepe turizm logo"
                                            style="height: 100px;"></td>
                                    <td><button type="button" class="btn btn-success"
                                            onclick="getKoltukListesi('<?= $sefer['otobus_plaka'] ?>', '<?= $sefer['sefer_tarih'] ?>'); getRowData(this)">Koltuk
                                            Listesi Getir</button></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>

            </div>




            <div class="bus"
                style="border: 10px solid #b0b0b0; border-radius: 25px; width: 300px; margin: 20px auto; text-align: center;">
                <h1 style="margin-top: 20px;">Koltuk Seçimi</h1>
                <div class="exit exit--front fuselage"></div>
                <ol class="cabin fuselage">
                    <!-- JavaScript le koltukların eklendiği kısım -->
                </ol>
                <div class="exit exit--back fuselage"></div>
                <button class="btn btn-success btn-lg mb-3" id="buyButton">Bileti Satın Al</button>
            </div>
            <div>

            </div>
        </div>
    </div>

    <script>
        function getRowData(button) {
            var row = button.closest('tr');
            var cells = row.getElementsByTagName('td');
            var kalkisVaris = cells[0].textContent;
            var otobusPlaka = cells[1].textContent;
            var seferTarih = cells[2].textContent;
            var seferFiyat = cells[3].textContent;

            // Form verilerini JSON formatına dönüştürme
            const formData = {
                kalkisVaris: kalkisVaris,
                otobusPlaka: otobusPlaka,
                seferTarih: seferTarih,
                seferFiyat: seferFiyat
                // Diğer form alanları buraya eklenebilir
            };

            // JSON verisini localStorage'a kaydetme
            localStorage.setItem('rowData', JSON.stringify(formData));

            // Bilgileri ekrana yazdırma
            console.log("Kalkış-Varış: " + kalkisVaris);
            console.log("Otobüs Plaka: " + otobusPlaka);
            console.log("Sefer Tarihi: " + seferTarih);
            console.log("Sefer Fiyatı: " + seferFiyat);
        }
    </script>




    <!-- koltukları diğer sayfaya gönderim için js kodu -->
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const buyButton = document.querySelector('#buyButton');

            buyButton.addEventListener('click', function () {
                const checkedSeats = document.querySelectorAll('.seat input[type="checkbox"]:checked');
                const checkedSeatIds = Array.from(checkedSeats).map(seat => seat.id);

                // Seçili koltuk bilgilerini JSON formatına dönüştürme
                const jsonData = JSON.stringify(checkedSeatIds);

                // JSON verisini localStorage'a kaydetme
                localStorage.setItem('selectedSeats', jsonData);


            });
        });
    </script>



    <!-- form bilgilerini diğer sayfaya gönderim için js kodu -->
    <script>
        document.getElementById('buyButton').addEventListener('click', function (event) {
            // Form verilerini JSON formatına dönüştürme
            const formData = {
                kalkisNoktasi: document.querySelector('#kalkisNoktasi').value,
                varisNoktasi: document.querySelector('#varisNoktasi').value,
                // Tarih bilgisini formatlamak için
                seferTarihi: formatDate(new Date(document.querySelector('#tarih').value)),
                // Diğer form alanları buraya eklenebilir
            };

            // JSON verisini diğer sayfaya gönderme
            const jsonString = JSON.stringify(formData);
            localStorage.setItem('formData', jsonString);

            // Diğer sayfaya yönlendirme
            window.location.href = 'obilet2';
        });

        // Tarih formatını ayarlayan fonksiyon
        function formatDate(date) {
            const options = { year: 'numeric', month: '2-digit', day: '2-digit' };
            return date.toLocaleDateString('tr-TR', options);
        }
    </script>



    <!-- Ajax ile sefere ait koltuk listesi getir butonuyla birlikte koltukların çekilme kodu  -->
    <script>
        function getKoltukListesi(plaka, tarih) {
            // AJAX ile koltuk listesi sorgusu yapılacak
            var xhr = new XMLHttpRequest();
            var url = "get_koltuk_listesi.php"; // Koltuk listesini getiren PHP dosyasının yolu

            // İstek yapıldığında çalışacak fonksiyon
            xhr.onreadystatechange = function () {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    // Başarılı istek durumunda gelen verileri işleme
                    var koltukListesi = JSON.parse(xhr.responseText);
                    // Koltuk listesini işleme
                    koltukListesiniIsle(koltukListesi);
                }
            };

            // POST isteği ayarları
            xhr.open("POST", url, true);
            xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

            // POST isteği gövdesi (istek için gerekli parametreler)
            var params = "plaka=" + plaka + "&tarih=" + tarih;
            xhr.send(params);
        }

        function koltukListesiniIsle(koltukListesi) {
            // Koltuk listesini işleme
            koltukListesi.forEach(function (koltuk) {
                var koltukNumaralari = koltuk.koltuk_no.split(',');

                koltukNumaralari.forEach(function (koltukNumarasi) {
                    var koltukElement = document.getElementById(koltukNumarasi.trim());
                    var labelElement = koltukElement ? koltukElement.nextElementSibling : null;
                    // Yan koltuk numarasını hesapla
                    var yanKoltukNumarasi = hesaplaYanKoltukNumarasi(koltukNumarasi);

                    if (koltuk.is_bought == 1) {
                        // Koltuk satın alınmışsa ve 'label' elemanı varsa
                        if (koltukElement) {
                            koltukElement.disabled = true; // input elemanını disable yap
                        }
                        if (labelElement) {
                            labelElement.classList.add('bought-label'); // 'label' elemanına 'bought-label' sınıfını ekle
                            // Koltuk cinsiyetine göre içeriği ayarla
                            if (koltuk.cinsiyet === 'E') {
                                labelElement.style.content = 'url(<?= IMG ?>man.png)';
                            } else {
                                labelElement.style.content = 'url(<?= IMG ?>woman.png)';
                            }
                        }
                    } else {
                        // Koltuk satın alınmamışsa ve 'label' elemanı varsa
                        if (koltukElement) {
                            koltukElement.disabled = true; // input elemanını disable yapma
                        }
                        if (labelElement) {
                            labelElement.classList.add('available-label'); // 'label' elemanına 'available-label' sınıfını ekle

                            // Koltuk cinsiyetine göre içeriği ayarla
                            if (koltuk.cinsiyet === 'E') {
                                labelElement.style.content = 'url(<?= IMG ?>man.png)';
                            } else {
                                labelElement.style.content = 'url(<?= IMG ?>woman.png)';
                            }
                        }
                    }

                    // Erkekler ve kadınlar yan yana oturmasın
                    if (koltukElement && labelElement) {
                        var cinsiyet = document.getElementById('cinsiyet').value;
                        var yanKoltukElement = document.getElementById(yanKoltukNumarasi);
                        if (yanKoltukElement && yanKoltukElement.nextElementSibling && (koltuk.cinsiyet !== cinsiyet)) {
                            yanKoltukElement.disabled = true;
                            yanKoltukElement.nextElementSibling.classList.add('disabled-label');
                        }
                    }
                });
            });
        }

        function hesaplaYanKoltukNumarasi(koltukNumarasi, cinsiyet) {
    var numara = parseInt(koltukNumarasi.match(/\d+/)[0], 10); // Sayısal kısmı al
    var harf = koltukNumarasi.match(/[a-zA-Z]+/)[0]; // Harf kısmını al
    var yanNumara;

    if (cinsiyet === 'E') { // Erkek ise
        if (numara % 2 === 0) { // Çift sayıysa bir önceki numara
            yanNumara = (numara + 1) + harf;
        } else { // Tek sayıysa bir sonraki numara
            yanNumara = (numara - 1) + harf;
        }
    } else { // Diğer durumlarda (Bayan gibi)
        if (numara % 2 === 0) { // Çift sayıysa bir sonraki numara
            yanNumara = (numara - 1) + harf;
        } else { // Tek sayıysa bir önceki numara
            yanNumara = (numara + 1) + harf;
        }
    }

    return yanNumara;
}



    </script>



    <!-- Koltuk oluşturma -->
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const cabin = document.querySelector(".cabin");
            const seatsPerRow = 4; // Her satırda 6 koltuk
            const totalRows = 10; // Toplam 10 satır

            for (let i = 1; i <= totalRows; i++) {
                const row = document.createElement("li");
                row.className = `row row--${i}`;
                const seatList = document.createElement("ol");
                seatList.className = "seats";
                seatList.type = "A";

                for (let j = 1; j <= seatsPerRow; j++) {
                    const seatNumber = (i - 1) * seatsPerRow + j;
                    const seat = document.createElement("li");
                    seat.className = "seat";

                    const input = document.createElement("input");
                    input.type = "checkbox";
                    input.id = `${seatNumber}A`;
                    const label = document.createElement("label");
                    label.setAttribute("for", `${seatNumber}A`);
                    label.textContent = seatNumber;

                    seat.appendChild(input);
                    seat.appendChild(label);
                    seatList.appendChild(seat);

                    // Boşluk oluşturma (her iki koltuk arasına)
                    if (j == 2) {
                        const spacer = document.createElement("li");
                        spacer.className = "spacer";
                        spacer.style.width = "400px"; // Boşluk genişliği
                        seatList.appendChild(spacer);
                    }
                }

                row.appendChild(seatList);
                cabin.appendChild(row);
            }
        });
    </script>

    <script>
        
    </script>

    <?php include(APPPATH . 'Views/footer.php'); ?>

    <!-- <div id="footerContainer"></div>
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
    </script> -->

</body>

</html>