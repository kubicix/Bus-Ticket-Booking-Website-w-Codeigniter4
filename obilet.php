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

        .row {}

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
                    background: #bada55;
                    -webkit-animation-name: rubberBand;
                    animation-name: rubberBand;
                    animation-duration: 300ms;
                    animation-fill-mode: both;
                }
            }

            input[type=checkbox]:disabled {
                +label {
                    background: #dddddd;
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
                background: #25a5f4;
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
    </style>
</head>

<body>
    <nav id="navbarContainer"></nav>

    <div class="container bg-light p-4 rounderd my-4">
        <div class="row">
            <div class="col-md-6">
                <h2 class="text-dark mb-4">Bilet İşlemleri</h2>
                <form id="myForm">
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="kalkisNoktasi" class="form-label text-dark">Kalkış Noktası</label>
                            <select class="form-select" name="kalkisNoktasi" id="kalkisNoktasi" aria-label="Kalkış Noktası">
                                <option selected>İstanbul</option>
                                <option value="izmir">İzmir</option>
                                <option value="ankara">Ankara</option>
                                <option value="antalya">Antalya</option>
                                <option value="kocaeli">Kocaeli</option>
                                <option value="edirne">Edirne</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="varisNoktasi" class="form-label text-dark">Varış Noktası</label>
                            <select class="form-select" name="varisNoktasi" id="varisNoktasi" aria-label="Varış Noktası">
                                <option selected>İstanbul</option>
                                <option value="izmir">İzmir</option>
                                <option value="ankara">Ankara</option>
                                <option value="antalya">Antalya</option>
                                <option value="kocaeli">Kocaeli</option>
                                <option value="edirne">Edirne</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="tarih" class="form-label text-dark">Tarih ve Saat</label>
                            <input type="date" class="form-control" id="tarih">
                        </div>
                        <div class="col-md-6 d-flex align-items-end">
                            <button type="submit" class="btn btn-success">Seferleri Listele</button>
                        </div>
                    </div>
                </form>
                <div class="col-md-6">
                    <h2 class="text-dark mb-4">Seferler</h2>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Yön</th>
                                <th>Saat</th>
                                <th>Firma</th>
                                <th>Model</th>
                                <th>Araç Özellikleri</th>
                                <th>Fiyat</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Gidiş</td>
                                <td>08:00</td>
                                <td><img src="img/logo-seffaf.png" style="height: 100px;" alt=""></td>
                                <td>20+20</td>
                                <td>(MOLASIZ) WIFI TV 220V PRIZ ANDROID</td>
                                <td>310.00</td>
                            </tr>
                            <tr>
                                <td>Gidiş</td>
                                <td>11:05</td>
                                <td><img src="img/logo-seffaf.png" style="height: 100px;" alt=""></td>
                                <td>20+20</td>
                                <td>(MOLASIZ) WIFI TV 220V PRIZ ANDROID</td>
                                <td>310.00</td>
                            </tr>
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
        document.addEventListener("DOMContentLoaded", function() {
            const buyButton = document.querySelector('#buyButton');
    
            buyButton.addEventListener('click', function() {
                const checkedSeats = document.querySelectorAll('.seat input[type="checkbox"]:checked');
                const checkedSeatIds = Array.from(checkedSeats).map(seat => seat.id);
    
                // Seçili koltuk bilgilerini JSON formatına dönüştürme
                const jsonData = JSON.stringify(checkedSeatIds);
    
                // JSON verisini localStorage'a kaydetme
                localStorage.setItem('selectedSeats', jsonData);
    
                
            });
        });
    </script>
    
    
    <!-- ödeme sayfasına bilet bilgileri gönderme -->
    <form id="myForm">
        <input type="text" name="kalkisNoktasi" value="İstanbul">
        <input type="text" name="varisNoktasi" value="Ankara">
        <!-- Diğer form alanları buraya gelecek -->
    </form>
    
    <button class="btn btn-success btn-lg mb-3" id="buyButton">Bileti Satın Al</button>
    
    <script>
        document.getElementById('buyButton').addEventListener('click', function(event) {
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
            window.location.href = 'obilet2.html';
        });
    
        // Tarih formatını ayarlayan fonksiyon
        function formatDate(date) {
            const options = { year: 'numeric', month: '2-digit', day: '2-digit' };
            return date.toLocaleDateString('tr-TR', options);
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


    <script>
        // Navbar'ı yükle
        fetch('navbar.html')
            .then(response => response.text())
            .then(data => {
                document.getElementById('navbarContainer').innerHTML = data;
            })
            .catch(error => console.error('Navbar yüklenirken bir hata oluştu:', error));
    </script>

</body>

</html>