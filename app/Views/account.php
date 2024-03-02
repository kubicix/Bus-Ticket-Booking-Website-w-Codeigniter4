<?php
    session_start();
    include("config.php");
    
    // Eğer bir giriş denemesi yapılmışsa ve hata mesajı varsa, bu mesajı al ve temizle
    $errorMessage = isset($_SESSION['message']) ? $_SESSION['message'] : '';

?>


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

    <section class="py-3 mt-3" >
        <div class="container">
            <div class="text-uppercase">
                <h2>Hesabım</h2>
            </div>
        </div>
    </section>
    <?php
            if(!$errorMessage == ''){
                echo "<div class='alert alert-danger'>".$errorMessage."</div>";
                unset($_SESSION["message"]);
            } elseif(isset($_SESSION['message'])){
                echo "<div class='alert alert-danger'>".$errorMessage."</div>";
            }
    ?>
    <section class="pt-30 pb-80 bg-border">
        <div class="container">
            <div id="hesabim" class="row">
                <form method="POST" action="authcode.php">
                    <div class="col-xs-4 uo">
                        <h5>ÜYELİK OTURUMU</h5><br>
                        <div class="col-md-10">
                            <label>Cep Telefonu: </label>
                            <input type="text" class="form-control" id="CepTelefon" name="CepTelefon" maxlength="10"  placeholder="Üye Cep No" autocomplete="off">
                        </div><br>
                        <div class="col-md-10">
                            <label>Şifre: </label>
                            <input type="password" class="form-control" id="Sifre" name="Sifre" placeholder="Üye Şifre" autocomplete="off">
                        </div><br>
                        <div class="col-md-12">
                            <p style="text-align: left;"><a href="resetPassword.html">Şifremi Unuttum</a></p>
                        </div>
                        <div class="col-md-12">
                            <a href="register.html" class="btn btn-default pull-left" style="background-color: rgb(206, 204, 204);">Üye Ol</a>
                            <button type="submit" id="login_btn" name="login_btn" class="btn btn-primary pull-right">Oturum Aç</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>

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

    <script src="js/script.js"></script>
    <script src="path/to/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>