<?php
$tid = $_GET['tid'] ?? null;
$product = $_GET['product'] ?? null;

// Eğer gerekli parametreler yoksa index.php sayfasına yönlendir
if (empty($tid) || empty($product)) {
    header('Location: index.php');
    exit; // Kodun devam etmemesi için
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <title>Thank You</title>
</head>
<body>
<div class="container mt-4">
    <h2>Satın Alımınız için Teşekkürler<?php echo $product; ?></h2>
    <hr>
    <p>Sipariş Numaranız: <strong><?php echo $tid; ?> </strong></p>
    <p>Daha detaylı bilgi için biletlerim sayfasına gidebilirsiniz.</p>
    <p><a href="<?= base_url('points') ?>" class="btn btn-light mt-2">Biletlerime Git</a></p>
</div>
</body>
</html>
