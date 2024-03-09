<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Payments</title>
    <link rel="stylesheet" href="<?= CSS ?>style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
</head>

<body>
    <nav id="navbarContainer">
        <?php include(APPPATH . 'Views/adminNavbar.php'); ?>
    </nav>

    <div class="container mt-4">
        <h2>Payments</h2>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">TcKimlik</th>
                    <th scope="col">Adı Soyadı</th>
                    <th scope="col">Email</th>
                    <th scope="col">StripeID</th>
                    <th scope="col">Product</th>
                    <th scope="col">Amount</th>
                    <th scope="col">Currency</th>
                    <th scope="col">Status</th>
                    <th scope="col">İlk Durak</th>
                    <th scope="col">Son Durak</th>
                    <th scope="col">Sefer Tarihi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($payments as $payment): ?>
                    <tr>
                        <td><?= $payment->TcKimlik ?></td>
                        <td><?= $payment->AdiSoyadi ?></td>
                        <td><?= $payment->email ?></td>
                        <td><?= $payment->StripeID ?></td>
                        <td><?= $payment->Product ?></td>
                        <td><?= $payment->Amount ?></td>
                        <td><?= $payment->Currency ?></td>
                        <td><?= $payment->Status ?></td>
                        <td><?= $payment->İlkDurak ?></td>
                        <td><?= $payment->SonDurak ?></td>
                        <td><?= $payment->SeferTarihi ?></td>
                        
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        
        <br>
    </div>

    <script>
    
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
