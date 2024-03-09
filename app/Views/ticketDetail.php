<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="<?= CSS ?>style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Ticket Detail</title>
</head>
<body>
    <nav id="navbarContainer">
        <?php include(APPPATH . 'Views/navbar.php'); ?>
    </nav>
    <div class="container">
        <div class="row " style="background-color: darkgreen; margin-top: 25px; height: 25px; border:2px solid black; padding-bottom: 30px; padding-top: 5px;">
            <div class="col" style="color: white;">Bilet Detay</div>
        </div>
        <div class="row " style="text-align: center; background-color:darkslategray; margin-top: 25px; padding:5px">
            <div class="col-md-12 text-center" style="color: white;">
                Bilet Bilgileriniz
            </div>
        </div>
        <?php
            $session = session();
            if ($session->has('auth_user')) {
                $auth_user = $session->get('auth_user');
                $userTC = $auth_user['TcKimlik'];
                $conn = new \mysqli("localhost", "root", "", "bus");
                if ($conn->connect_error) {
                    die("Veritabanına bağlanılamadı: " . $conn->connect_error);
                } else {
                    $sql = "SELECT
                                tickets.ticket_date AS 'İşlem Tarihi',
                                seferler.sefer_tarih AS 'Sefer Tarihi',
                                SUBSTRING_INDEX(seferler.kalkis_yeri, ',', 1) AS 'İlk Durak',
                                SUBSTRING_INDEX(seferler.varis_yeri, ',', 1) AS 'Son Durak',
                                tickets.otobus_plaka AS 'Plaka',
                                tickets.is_bought as 'isBought',
                                tickets.koltuk_no AS 'Koltuk',
                                tickets.ticket_date AS 'Bilet Tarihi',
                                tickets.ticket_id AS 'ticket id'
                            FROM
                                tickets
                            JOIN seferler ON tickets.otobus_plaka = seferler.otobus_plaka
                                AND tickets.kalkis_tarih = seferler.sefer_tarih
                            WHERE
                                tickets.ticket_id = ? AND tickets.tcno = ?
                            ORDER BY
                                tickets.ticket_date DESC";

                    $stmt = $conn->prepare($sql);
                    if ($stmt === false) {
                        die("Sorgu hazırlanırken bir hata oluştu: " . $conn->error);
                    }
                    $stmt->bind_param('is', $ticketID, $userTC);
                    $stmt->execute();
                    $result = $stmt->get_result();
                    $row = $result->fetch_assoc();
        ?> 
        <div class="row custom-border">
            <div class="col-md-9">İşlem Tarihi</div>
            <div class="col-md-3" style="text-align: right; "><?php echo $row['İşlem Tarihi']; ?></div>
        </div>
        <div class="row custom-border">
            <div class="col-md-9">Sefer Tarihi</div>
            <div class="col-md-3" style="text-align: right; "><?php echo $row['Sefer Tarihi']; ?></div>
        </div>
        <div class="row custom-border">
            <div class="col-md-9">İlk Durak</div>
            <div class="col-md-3" style="text-align: right;"><?php echo strtoupper($row['İlk Durak']); ?></div>
        </div>
        <div class="row custom-border">
            <div class="col-md-9">Son Durak</div>
            <div class="col-md-3" style="text-align: right; "><?php echo strtoupper($row['Son Durak']); ?></div>
        </div>
        <div class="row custom-border">
            <div class="col-md-9">Alınan Koltuk</div>
            <div class="col-md-3" style="text-align: right;"><?php echo $row['Koltuk']; ?></div>
        </div>
        <div class="row custom-border">
            <div class="col-md-9">Bilet Tarihi</div>
            <div class="col-md-3" style="text-align: right;"><?php echo $row['Bilet Tarihi']; ?></div>
        </div>
        <div class="row custom-border">
            <div class="col-md-9">Araç Plaka</div>
            <div class="col-md-3" style="text-align: right;"><?php echo $row['Plaka']; ?></div>
        </div>
        <?php
        if (!$row['isBought'] ) {
        ?>
        <!--EĞER BİLET REZERVE İSE BURADAN SATIN ALINACAK-->
       <div class="row custom-border">
            <div class="col-md-9 mt-5"><strong>SATIN AL</strong></div>
            <div class="col-md-3 mt-5" style="text-align: right;">
                <form action="<?= base_url('ticketDetail/buyTicket') ?>" method="POST">
                    <input type="hidden" name="ticketID" value="<?php echo $ticketID; ?>">
                    <button type="submit" class="btn btn-success">Satın Al</button>
                </form>
            </div>
        </div>
<?php
        }else{
?>
        <!--BİLET EĞER REZERVE İSE BURADA İPTAL EDİLECEK VE SİLİNECEK-->
         <div class="row custom-border">
            <div class="col-md-9 mt-5"><strong>İPTAL ET</strong></div>
            <div class="col-md-3 mt-5" style="text-align: right;">
                <form action="<?= base_url('ticketDetail/deniedTicket') ?>" method="POST">
                    <input type="hidden" name="ticketID" value="<?php echo $ticketID; ?>">
                    <button type="submit" class="btn btn-danger">İPTAL ET</button>
                </form>
            </div>
        </div>
<?php
        }
    }
}
?>
    </div>
    <div style="margin-top:20px;">
        <?php include(APPPATH . 'Views/footer.php'); ?>
    </div>
</body>
</html>
