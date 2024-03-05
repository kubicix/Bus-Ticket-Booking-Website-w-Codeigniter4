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
    <h2>Thank you for purchasing <?php echo $product; ?></h2>
    <hr>
    <p>Your transaction ID is <?php echo $tid; ?></p>
    <p>Check your email for more info</p>
    <p><a href="/" class="btn btn-light mt-2">Go Back</a></p>
</div>
</body>
</html>
