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
                Üye Bilgilerini Güncelle
            </div>
        </div>
        <form action="<?= base_url('userInf') ?>" method="post">
            <div class="row custom-border">
                <div class="col-md-3">TC Kimlik no</div>
                <div class="col-md-9" style="text-align: center; " name="TcKimlik"
                    value="<?php echo $user['TcKimlik']; ?>">
                    <?php echo $user['TcKimlik']; ?>
                </div>
                <input type="hidden" name="TcKimlik" value="<?php echo $user['TcKimlik']; ?>">
            </div>
            <div class="row custom-border">
                <div class="col-md-3">Aktivasyon Cep Telefonu</div>
                <div class="col-md-9" style="text-align: center; ">
                    <?php echo $user['CepTelefon']; ?>
                </div>
            </div>
            <div class="row custom-border">
                <div class="col-md-3">Ad Soyad</div>
                <div class="col-md-9"><input style="background-color:  lightgrey;" type="text" class="form-control"
                        id="AdiSoyadi" name="AdiSoyadi" value="<?php echo $user['AdiSoyadi']; ?>" size="30"
                        autocomplete="off"></div>
            </div>
            <div class="row custom-border">
                <div class="col-md-3">Email</div>
                <div class="col-md-9"><input style="background-color:  lightgrey;" type="text" class="form-control"
                        id="EMail" name="EMail" value="<?php echo $user['EMail']; ?>" size="30" autocomplete="off">
                </div>
            </div>
            <div class="row custom-border">
                <div class="col-md-3">Şifre</div>
                <div class="col-md-9"><input style="background-color:  lightgrey;" type="password" class="form-control"
                        id="Sifre" name="Sifre" autocomplete="off" value="<?php echo $user['Sifre']; ?>"></div>
            </div>
            <div class="row custom-border">
                <div class="col-md-3">Şehir</div>
                <div class="col-md-9">
                    <select style="background-color:  lightgrey;" id="Il" name="Il" class="form-control">
                        <option value="Adana">Adana</option>
                        <option value="Adıyaman">Adıyaman</option>
                        <option value="Afyonkarahisar">Afyonkarahisar</option>
                        <option value="Ağrı">Ağrı</option>
                        <option value="Amasya">Amasya</option>
                        <option value="Ankara">Ankara</option>
                        <option value="Antalya">Antalya</option>
                        <option value="Artvin">Artvin</option>
                        <option value="Aydın">Aydın</option>
                        <option value="Balıkesir">Balıkesir</option>
                        <option value="Bilecik">Bilecik</option>
                        <option value="Bingöl">Bingöl</option>
                        <option value="Bitlis">Bitlis</option>
                        <option value="Bolu">Bolu</option>
                        <option value="Burdur">Burdur</option>
                        <option value="Bursa">Bursa</option>
                        <option value="Çanakkale">Çanakkale</option>
                        <option value="Çankırı">Çankırı</option>
                        <option value="Çorum">Çorum</option>
                        <option value="Denizli">Denizli</option>
                        <option value="Diyarbakır">Diyarbakır</option>
                        <option value="Edirne">Edirne</option>
                        <option value="Elazığ">Elazığ</option>
                        <option value="Erzincan">Erzincan</option>
                        <option value="Erzurum">Erzurum</option>
                        <option value="Eskişehir">Eskişehir</option>
                        <option value="Gaziantep">Gaziantep</option>
                        <option value="Giresun">Giresun</option>
                        <option value="Gümüşhane">Gümüşhane</option>
                        <option value="Hakkari">Hakkari</option>
                        <option value="Hatay">Hatay</option>
                        <option value="Isparta">Isparta</option>
                        <option value="Mersin">Mersin</option>
                        <option value="İstanbul">İstanbul</option>
                        <option value="İzmir">İzmir</option>
                        <option value="Kars">Kars</option>
                        <option value="Kastamonu">Kastamonu</option>
                        <option value="Kayseri">Kayseri</option>
                        <option value="Kırklareli">Kırklareli</option>
                        <option value="Kırşehir">Kırşehir</option>
                        <option value="Kocaeli">Kocaeli</option>
                        <option value="Konya">Konya</option>
                        <option value="Kütahya">Kütahya</option>
                        <option value="Malatya">Malatya</option>
                        <option value="Manisa">Manisa</option>
                        <option value="Kahramanmaraş">Kahramanmaraş</option>
                        <option value="Mardin">Mardin</option>
                        <option value="Muğla">Muğla</option>
                        <option value="Muş">Muş</option>
                        <option value="Nevşehir">Nevşehir</option>
                        <option value="Niğde">Niğde</option>
                        <option value="Ordu">Ordu</option>
                        <option value="Rize">Rize</option>
                        <option value="Sakarya">Sakarya</option>
                        <option value="Samsun">Samsun</option>
                        <option value="Siirt">Siirt</option>
                        <option value="Sinop">Sinop</option>
                        <option value="Sivas">Sivas</option>
                        <option value="Tekirdağ">Tekirdağ</option>
                        <option value="Tokat">Tokat</option>
                        <option value="Trabzon">Trabzon</option>
                        <option value="Tunceli">Tunceli</option>
                        <option value="Şanlıurfa">Şanlıurfa</option>
                        <option value="Uşak">Uşak</option>
                        <option value="Van">Van</option>
                        <option value="Yozgat">Yozgat</option>
                        <option value="Zonguldak">Zonguldak</option>
                        <option value="Aksaray">Aksaray</option>
                        <option value="Bayburt">Bayburt</option>
                        <option value="Karaman">Karaman</option>
                        <option value="Kırıkkale">Kırıkkale</option>
                        <option value="Batman">Batman</option>
                        <option value="Şırnak">Şırnak</option>
                        <option value="Bartın">Bartın</option>
                        <option value="Ardahan">Ardahan</option>
                        <option value="Iğdır">Iğdır</option>
                        <option value="Yalova">Yalova</option>
                        <option value="Karabük">Karabük</option>
                        <option value="Kilis">Kilis</option>
                        <option value="Osmaniye">Osmaniye</option>
                        <option value="Düzce">Düzce</option>
                        <option value="KKTC">KKTC</option>
                    </select>
                </div>
            </div>
            <div class="row custom-border">
                <div class="col-md-3">Cinsiyet</div>
                <div class="col-md-9"><select style="background-color:  lightgrey;" id="Cinsiyeti" name="Cinsiyeti"
                        class="form-control">
                        <option value="<?php echo $user['Cinsiyeti']; ?>" selected="">
                        <?php echo $user['Cinsiyeti']; ?>
                        </option>
                        <option value="E"> Erkek </option>
                        <option value="B"> Bayan </option>
                    </select></div>
            </div>
            <div class="row custom-border">
                <div class="col-md-3">Doğum Tarihi</div>
                <div class="col-md-9">
                    <div class="row">
                        <div class="col-md-4">
                            <select style="background-color:  lightgrey;" id="Gun" name="Gun" class="form-control">
                                <option value="<?php echo $user['Gun']; ?>">
                                    <?php echo $user['Gun']; ?>
                                </option>
                                <option value="01">1</option>
                                <option value="02">2</option>
                                <option value="03">3</option>
                                <option value="04">4</option>
                                <option value="05">5</option>
                                <option value="06">6</option>
                                <option value="07">7</option>
                                <option value="08">8</option>
                                <option value="09">9</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                                <option value="13">13</option>
                                <option value="14">14</option>
                                <option value="15">15</option>
                                <option value="16">16</option>
                                <option value="17">17</option>
                                <option value="18">18</option>
                                <option value="19">19</option>
                                <option value="20">20</option>
                                <option value="21">21</option>
                                <option value="22">22</option>
                                <option value="23">23</option>
                                <option value="24">24</option>
                                <option value="25">25</option>
                                <option value="26">26</option>
                                <option value="27">27</option>
                                <option value="28">28</option>
                                <option value="29">29</option>
                                <option value="30">30</option>
                                <option value="31">31 </option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <select style="background-color:  lightgrey;" id="Ay" name="Ay" class="form-control">

                                <option value="<?php echo $user['Cinsiyeti']; ?>">
                                    <?php echo $user['Ay']; ?>
                                </option>
                                <option value="1">Ocak</option>
                                <option value="2">Şubat</option>
                                <option value="3">Mart</option>
                                <option value="4">Nisan</option>
                                <option value="5">Mayıs</option>
                                <option value="6">Haziran</option>
                                <option value="7">Temmuz</option>
                                <option value="8">Ağustos</option>
                                <option value="9">Eylül</option>
                                <option value="10">Ekim</option>
                                <option value="11">Kasım</option>
                                <option value="12">Aralık </option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <select style="background-color:  lightgrey;" id="Yil" name="Yil" class="form-control">

                                <option value="<?php echo $user['Yil']; ?>">
                                    <?php echo $user['Yil']; ?>
                                </option>
                                <option value="1915">1915 </option>
                                <option value="1916">1916 </option>
                                <option value="1917">1917 </option>
                                <option value="1918">1918 </option>
                                <option value="1919">1919 </option>
                                <option value="1920">1920 </option>
                                <option value="1921">1921 </option>
                                <option value="1922">1922 </option>
                                <option value="1923">1923 </option>
                                <option value="1924">1924 </option>
                                <option value="1925">1925 </option>
                                <option value="1926">1926 </option>
                                <option value="1927">1927 </option>
                                <option value="1928">1928 </option>
                                <option value="1929">1929 </option>
                                <option value="1930">1930 </option>
                                <option value="1931">1931 </option>
                                <option value="1932">1932 </option>
                                <option value="1933">1933 </option>
                                <option value="1934">1934 </option>
                                <option value="1935">1935 </option>
                                <option value="1936">1936 </option>
                                <option value="1937">1937 </option>
                                <option value="1938">1938 </option>
                                <option value="1939">1939 </option>
                                <option value="1940">1940 </option>
                                <option value="1941">1941 </option>
                                <option value="1942">1942 </option>
                                <option value="1943">1943 </option>
                                <option value="1944">1944 </option>
                                <option value="1945">1945 </option>
                                <option value="1946">1946 </option>
                                <option value="1947">1947 </option>
                                <option value="1948">1948 </option>
                                <option value="1949">1949 </option>
                                <option value="1950">1950 </option>
                                <option value="1951">1951 </option>
                                <option value="1952">1952 </option>
                                <option value="1953">1953 </option>
                                <option value="1954">1954 </option>
                                <option value="1955">1955 </option>
                                <option value="1956">1956 </option>
                                <option value="1957">1957 </option>
                                <option value="1958">1958 </option>
                                <option value="1959">1959 </option>
                                <option value="1960">1960 </option>
                                <option value="1961">1961 </option>
                                <option value="1962">1962 </option>
                                <option value="1963">1963 </option>
                                <option value="1964">1964 </option>
                                <option value="1965">1965 </option>
                                <option value="1966">1966 </option>
                                <option value="1967">1967 </option>
                                <option value="1968">1968 </option>
                                <option value="1969">1969 </option>
                                <option value="1970">1970 </option>
                                <option value="1971">1971 </option>
                                <option value="1972">1972 </option>
                                <option value="1973">1973 </option>
                                <option value="1974">1974 </option>
                                <option value="1975">1975 </option>
                                <option value="1976">1976 </option>
                                <option value="1977">1977 </option>
                                <option value="1978">1978 </option>
                                <option value="1979">1979 </option>
                                <option value="1980">1980 </option>
                                <option value="1981">1981 </option>
                                <option value="1982">1982 </option>
                                <option value="1983">1983 </option>
                                <option value="1984">1984 </option>
                                <option value="1985">1985 </option>
                                <option value="1986">1986 </option>
                                <option value="1987">1987 </option>
                                <option value="1988">1988 </option>
                                <option value="1989">1989 </option>
                                <option value="1990">1990 </option>
                                <option value="1991">1991 </option>
                                <option value="1992">1992 </option>
                                <option value="1993">1993 </option>
                                <option value="1994">1994 </option>
                                <option value="1995">1995 </option>
                                <option value="1996">1996 </option>
                                <option value="1997">1997 </option>
                                <option value="1998">1998 </option>
                                <option value="1999">1999 </option>
                                <option value="2000">2000 </option>
                                <option value="2001">2001 </option>
                                <option value="2002">2002 </option>
                                <option value="2003">2003 </option>
                                <option value="2004">2004 </option>
                                <option value="2005">2005 </option>
                                <option value="2006">2006 </option>
                                <option value="2007">2007 </option>
                                <option value="2008">2008 </option>
                                <option value="2009">2009 </option>
                                <option value="2010">2010 </option>
                                <option value="2011">2011 </option>
                                <option value="2012">2012 </option>
                                <option value="2013">2013 </option>
                                <option value="2014">2014 </option>
                                <option value="2015">2015 </option>
                                <option value="2016">2016 </option>
                                <option value="2017">2017 </option>
                                <option value="2018">2018 </option>
                                <option value="2019">2019 </option>
                                <option value="2020">2020 </option>
                                <option value="2021">2021 </option>
                                <option value="2022">2022 </option>
                                <option value="2023">2023 </option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row " style="margin-top: 15px;">
                <div class="col-md-3"></div>
                <div class="col-md-9" style="text-align: right;"><button type="submit"
                        class="btn btn-primary pull-right" id="update" name="update">Güncelle</button></div>
            </div>
    </div>
    </form>

    </div>

    <div id="footerContainer">
        <?php include(APPPATH . 'Views/footer.php'); ?>
    </div>


    <script src="js/script.js"></script>
    <script src="path/to/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>