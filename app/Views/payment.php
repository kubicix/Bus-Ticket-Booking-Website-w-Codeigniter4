<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="<?= CSS ?>style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Pay Page</title>
</head>
<body>
    <nav id="navbarContainer">
        <?php include(APPPATH . 'Views/navbar.php'); ?>

    </nav>
        <div class="container">
            <h2 class="my-4 text-center">Ödeme Bilgileri</h2>
            <form action="<?= base_url('payment/process_payment') ?>" method="post" id="payment-form">
                <input type="hidden" name="pid" value="<?= $pid ?>">
                <div class="form-row">
                <input type="text" name="first_name" class="form-control mb-3 StripeElement StripeElement--empty" placeholder="Kart Üzerindeki İsim">
                <input type="text" name="last_name" class="form-control mb-3 StripeElement StripeElement--empty" placeholder="Kart Üzerindeki Soyisim">
                <input type="email" name="email" class="form-control mb-3 StripeElement StripeElement--empty" placeholder="Email Adresi">
                <div id="card-element" class="form-control">
                    <!-- a Stripe Element will be inserted here. -->
                </div>
                <!-- Used to display form errors -->
                <div id="card-errors" role="alert"></div>
                </div>
                <button>Ödeme Yap</button>
            </form>
        </div>
    <div style="margin-top:20px;">
        <?php include(APPPATH . 'Views/footer.php'); ?>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://js.stripe.com/v3/"></script>
    <script src="<?= JS ?>charge.js"></script>
</body>
</html>