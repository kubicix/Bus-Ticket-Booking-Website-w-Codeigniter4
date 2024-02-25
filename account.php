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

    <section class="pt-30 pb-80 bg-border">
        <div class="container">
            <div id="hesabim" class="row">
                <form id="frm" name="frm" method="post" action="SatinAlinanBilet.php">
                    <div class="col-xs-4 uo">
                        <h5>ÜYELİK OTURUMU</h5><br>
                        <div class="col-md-10">
                            <label>Cep Telefonu: </label>
                            <input type="text" class="form-control" id="LgnUyeNo" name="LgnUyeNo" maxlength="10" onkeyup="isCepTel(this.id);" onkeydown="isCepTel(this.id);" placeholder="Üye Cep No" autocomplete="off">
                        </div><br>
                        <div class="col-md-10">
                            <label>Şifre: </label>
                            <input type="password" class="form-control" id="LgnSifre" name="LgnSifre" placeholder="Üye Şifre" autocomplete="off">
                        </div><br>
                        <div class="col-md-12">
                            <p style="text-align: left;"><a href="resetPassword.html">Şifremi Unuttum</a></p>
                        </div>
                        <div class="col-md-12">
                            <a href="register.html" class="btn btn-default pull-left" style="background-color: rgb(206, 204, 204);">Üye Ol</a>
                            <button type="button" id="hesabimGir" class="btn btn-primary pull-right" onclick="OturumAc()">Oturum Aç</button>
                        </div>
                    </div>
                <input type="hidden" id="EventControl" name="EventControl" autocomplete="off">
                    <br><br>
               </form>

               <form id="frm2" name="frm2" method="post" action="SatinAlinanBiletListe.php">     
                    <div class="col-xs-8 uosab">
                        <h5>ÜYE OLMADAN SATIN ALINAN BİLETLER</h5><br>
                        <div class="form-horizontal">
                            <div class="col-md-12 nopadding">
                                <label class="control-label col-sm-4">PNR NO</label>
                                <div class="col-sm-3">
                                  <input type="text" id="PnrNo" name="PnrNo" class="form-control" value="" autocomplete="off">
                                </div>
                            </div><br>
                            <div class="col-md-12 nopadding mt-20">
                                <label class="control-label col-sm-4">Bilet alırken belirttiğiniz GSM numaranız </label>
                                <div class="col-sm-3">
                                  <input type="text" name="CepTelefon" class="form-control" autocomplete="off">
                                  <small class="pull-right">Örn: 5420000000</small>
                                </div>
                            </div><br>
                            <div class="col-md-10 mt-20">
                                <button type="button" class="btn btn-primary pull-right" onclick="UyeliksizListe()">Gönder</button>
                            </div>
                            <div class="col-md-12 nopadding mt-20">
                                <small style="font-size: 13px;">Yolcularımıza daha kolay ulaşmak için Üye olmadan satın alınan biletler için GSM numarası kullanılmaktadır.</small>
                            </div>
                        </div>
                    </div>
                  <input type="hidden" id="EventControl" name="EventControl" autocomplete="off">  
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