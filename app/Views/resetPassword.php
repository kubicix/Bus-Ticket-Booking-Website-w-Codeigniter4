<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= CSS ?>style.css">
    <title>Şifremi Unuttum</title>
    <link rel="stylesheet" type="text/css" href="scss/_variables.scss" />
    <link rel="stylesheet" href="path/to/bootstrap/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"/>

</head>
<body>
    <nav id="navbarContainer">      
        <?php include(APPPATH . 'Views/navbar.php'); ?></nav>

    <section class="py-3 mt-3">
        <div class="container">
            <div class="text-uppercase">
                <h2>Şifremi Unuttum</h2>
            </div>
        </div>
    </section>

    <section class="pt-30 pb-80">
        <form action="<?= base_url('resetPassword/reset') ?>" method="POST" id="password-form">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <label class="col-md-4 nopadding text-20">Email Adresiniz:</label>
                        <input type="email" class="form-control col-md-8 " required id="email" name="email" autocomplete="off" placeholder="Email Adresinizi giriniz...">
                    </div>
                    <div style="margin-top:15px" class="col-md-5">
                        <button type="submit" class="btn btn-primary" id="btnUyeKontrol" name="btnUyeKontrol">Kontrol Et</button>
                    </div>
                </div>
            </div>
        </form>
    </section>


    <div id="footerContainer">    <?= view('footer') ?></div>
    <script src="js/script.js"></script>
    <script src="path/to/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>