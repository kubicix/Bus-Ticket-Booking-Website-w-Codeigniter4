<?php


include 'config.php';


?>


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
    <nav id="navbarContainer">
        <?php include(APPPATH . 'Views/navbar.php'); ?>
    </nav>

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
                <a href="user">Hesabım</a>
            </div>
            <div class="col" style="border-right: 2px solid black;">
                <a href="userInf">Üye Bilgilerim</a>
            </div>
            <div class="col" style="border-right: 2px solid black;">
                <a href="obilet">Bilet Satın Al</a>
            </div>
            <div class="col" style="border-right: 2px solid black;">
                <a href="points">Umtur Puanlarım</a>
            </div>
            <div class="col">
                <a href="logout">Oturumu Kapat</a>
            </div>
        </div>
        <div class="row " style="text-align: center; background-color:darkslategray; margin-top: 25px; padding:5px">
            <div class="col-md-12 text-center" style="color: white;">
                Umtur Bilgileriniz
            </div>
        </div>
        <?php
             $session = session();
             if($session->has('auth_user')){
                    $auth_user = $session->get('auth_user');
                    $userTC = $auth_user['TcKimlik'];
                    $conn = new \mysqli("localhost", "root", "", "bus");
                    if ($conn->connect_error) {
                        die("Veritabanına bağlanılamadı: " . $conn->connect_error);
                    } else {
                        $sql = "SELECT users.*, balances.* FROM users JOIN balances ON users.TcKimlik = balances.TcKimlik WHERE users.TcKimlik = ? GROUP BY users.TcKimlik;";

                        $stmt = $conn->prepare($sql);
                        if ($stmt === false) {
                            die("Sorgu hazırlanırken bir hata oluştu: " . $conn->error);
                        }
                        $stmt->bind_param('s', $userTC);
                        $stmt->execute(); // Sorguyu çalıştır
                        $result = $stmt->get_result(); // Sonuçları al
                        while ($row = $result->fetch_assoc()) {
                            echo "<div class='row custom-border'>";
                            echo "<div class='col-md-9'>Gsm Numaranız:</div>";
                            echo "<div class='col-md-3' style='text-align: right;'>".$row['CepTelefon'] ."</div>";
                            echo "</div>";

                            echo "<div class='row custom-border'>";
                            echo "<div class='col-md-9'>Adınız Soyadınız:</div>";
                            echo "<div class='col-md-3' style='text-align: right;'>".$row['AdiSoyadi'] ."</div>";
                            echo "</div>";

                            echo "<div class='row custom-border'>";
                            echo "<div class='col-md-9'>Cinsiyetiniz:</div>";
                            echo "<div class='col-md-3' style='text-align: right;'>".$row['Cinsiyeti'] ."</div>";
                            echo "</div>";

                            echo "<div class='row custom-border'>";
                            echo "<div class='col-md-9'>Bakiyeniz:</div>";
                            echo "<div class='col-md-3' style='text-align: right;'>".$row['TotalBalance'] ."</div>";
                            echo "</div>";
                        }
                    }
             }
        ?>
        <!-- <div class="row custom-border">
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
        </div> -->

        <div class="row "
            style="background-color: darkgreen; margin-top: 25px; height: 25px; border:2px solid black; padding-bottom: 30px; padding-top: 5px;">
            <div class="col text-center" style="color: white;">
                GERÇEKLEŞTİRDİĞİNİZ SON BİLET İŞLEMLERİNİZ
            </div>
        </div>
        <div class="row text-center">
        <table class="table table-bordered">
            <thead >
                <tr >
                    <th scope="col" >İşlem Tarihi</th>
                    <th scope="col">Sefer Tarihi</th>
                    <th scope="col">İlk Durak</th>
                    <th scope="col">Son Durak</th>
                    <th scope="col">Koltuk</th>
                    <th scope="col">Bilet Tarihi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $session = session();
                    if($session->has('auth_user')){
                        $auth_user = $session->get('auth_user');
                        $userTC = $auth_user['TcKimlik'];
                        $conn = new \mysqli("localhost", "root", "", "bus");
                        if ($conn->connect_error) {
                            die("Veritabanına bağlanılamadı: " . $conn->connect_error);
                        } else {
                            $sql = "SELECT tickets.*, payments.* 
                            FROM tickets 
                            JOIN payments ON tickets.tcno = payments.TcKimlik
                            WHERE payments.TcKimlik = ?
                            GROUP BY tickets.ticket_id;";

                            $stmt = $conn->prepare($sql);
                            if ($stmt === false) {
                                die("Sorgu hazırlanırken bir hata oluştu: " . $conn->error);
                            }
                            $stmt->bind_param('s', $userTC);
                            $stmt->execute(); // Sorguyu çalıştır
                            $result = $stmt->get_result(); // Sonuçları al
                            while ($row = $result->fetch_assoc()) {
                                echo "<tr>";
                                    echo "<td>" . $row['created_at'] . "</td>";
                                    echo "<td>" . $row['SeferTarihi'] . "</td>";
                                    echo "<td>" . $row['İlkDurak'] . "</td>";
                                    echo "<td>" . $row['SonDurak'] . "</td>";
                                    echo "<td>" . $row['koltuk_no'] . "</td>";
                                    echo "<td>" . $row['ticket_date'] . "</td>";
                                echo "</tr>";
                            }
                        }
                    }
                ?>
            </tbody>
        </table>
        </div>
    </div>

    <div id="footerContainer">
        <?php include(APPPATH . 'Views/footer.php'); ?>
    </div>

    <script src="js/script.js"></script>
    <script src="path/to/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>