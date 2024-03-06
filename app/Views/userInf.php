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
        <div class="row " style="background-color: darkgreen; margin-top: 25px; height: 25px; border:2px solid black; padding-bottom: 30px; padding-top: 5px;">
            <div class="col" style="color: white;">
                Ana Menü
            </div>
        </div>
        <div class="row align-items-center" style="background-color: cadetblue; height: 75px;  border:2px solid black; text-align: center;">
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

        <div class="row custom-border">
            <div class="col-md-3">TC Kimlik no</div>
            <div class="col-md-9" style="text-align: center; ">Değişmez</div>
        </div>
        <div class="row custom-border">
            <div class="col-md-3">Aktivasyon Cep Telefonu</div>
            <div class="col-md-9" style="text-align: center; "> Değişmez</div>
        </div>
        <div class="row custom-border">
            <div class="col-md-3">Ad Soyad</div>
            <div class="col-md-9"><input style="background-color:  lightgrey;" type="text" class="form-control" id="AdiSoyadi" name="AdiSoyadi" value="" size="30" autocomplete="off"></div>
        </div>
        <div class="row custom-border">
            <div class="col-md-3">Email</div>
            <div class="col-md-9"><input style="background-color:  lightgrey;" type="text" class="form-control" id="EMail" name="EMail" value="" size="30"  autocomplete="off"></div>
        </div>
        <div class="row custom-border">
            <div class="col-md-3">Şifre</div>
            <div class="col-md-9"><input style="background-color:  lightgrey;" type="password" class="form-control" id="Sifre" name="Sifre"  autocomplete="off"></div>
        </div>
        <div class="row custom-border">
            <div class="col-md-3">Şehir</div>
            <div class="col-md-9">
                <select style="background-color:  lightgrey;" id="Il" name="Il" class="form-control">
                    <option value="0">-Seçiniz-</option>
                    <option value="1">ADANA</option>
                    <option value="2">ADIYAMAN</option>
                    <option value="4">AĞRI</option>
                    <option value="3">AFYON</option>
                    <option value="68">AKSARAY</option>
                    <option value="5">AMASYA</option>
                    <option value="6">ANKARA</option>
                    <option value="7">ANTALYA</option>
                    <option value="75">ARDAHAN</option>
                    <option value="8">ARTVİN</option>
                    <option value="9">AYDIN</option>
                    <option value="10">BALIKESİR</option>
                    <option value="74">BARTIN</option>
                    <option value="72">BATMAN</option>
                    <option value="69">BAYBURT</option>
                    <option value="14">BOLU</option>
                    <option value="15">BURDUR</option>
                    <option value="16">BURSA</option>
                    <option value="11">BİLECİK</option>
                    <option value="12">BİNGÖL</option>
                    <option value="13">BİTLİS</option>
                    <option value="17">ÇANAKKALE</option>
                    <option value="18">ÇANKIRI</option>
                    <option value="19">ÇORUM</option>
                    <option value="20">DENİZLİ</option>
                    <option value="21">DİYARBAKIR</option>
                    <option value="81">DÜZCE</option>
                    <option value="22">EDİRNE</option>
                    <option value="23">ELAZIĞ</option>
                    <option value="25">ERZURUM</option>
                    <option value="24">ERZİNCAN</option>
                    <option value="26">ESKİŞEHİR</option>
                    <option value="27">GAZİANTEP</option>
                    <option value="1000">GERMANY</option>
                    <option value="29">GÜMÜŞHANE</option>
                    <option value="28">GİRESUN</option>
                    <option value="30">HAKKARİ</option>
                    <option value="31">HATAY</option>
                    <option value="76">IĞDIR</option>
                    <option value="32">ISPARTA</option>
                    <option value="33">İÇEL</option>
                    <option value="34">İSTANBUL</option>
                    <option value="35">İZMİR</option>
                    <option value="46">KAHRAMANMARAŞ</option>
                    <option value="78">KARABÜK</option>
                    <option value="70">KARAMAN</option>
                    <option value="36">KARS</option>
                    <option value="37">KASTAMONU</option>
                    <option value="38">KAYSERİ</option>
                    <option value="39">KIRIKKALE</option>
                    <option value="71">KIRKLARELİ</option>
                    <option value="40">KIRŞEHİR</option>
                    <option value="1001">KKTC</option>
                    <option value="41">KOCAELİ</option>
                    <option value="42">KONYA</option>
                    <option value="43">KÜTAHYA</option>
                    <option value="44">MALATYA</option>
                    <option value="45">MANİSA</option>
                    <option value="47">MARDİN</option>
                    <option value="48">MUĞLA</option>
                    <option value="49">MUŞ</option>
                    <option value="50">NEVŞEHİR</option>
                    <option value="51">NİĞDE</option>
                    <option value="52">ORDU</option>
                    <option value="53">RİZE</option>
                    <option value="54">SAKARYA</option>
                    <option value="55">SAMSUN</option>
                    <option value="57">SİNOP</option>
                    <option value="58">SİVAS</option>
                    <option value="56">SİİRT</option>
                    <option value="63">ŞANLIURFA</option>
                    <option value="73">ŞIRNAK</option>
                    <option value="59">TEKİRDAĞ</option>
                    <option value="60">TOKAT</option>
                    <option value="61">TRABZON</option>
                    <option value="62">TUNCELİ</option>
                    <option value="64">UŞAK</option>
                    <option value="65">VAN</option>
                    <option value="77">YALOVA</option>
                    <option value="66">YOZGAT</option>
                    <option value="67">ZONGULDAK </option>
                </select>
            </div>
        </div>
        <div class="row custom-border">
            <div class="col-md-3">Cinsiyet</div>
            <div class="col-md-9"><select style="background-color:  lightgrey;" id="Cinsiyeti" name="Cinsiyeti" class="form-control">
                    <option value="" selected=""> -Seçiniz- </option>
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
                            <option value="01">Ocak</option>
                            <option value="02">Şubat</option>
                            <option value="03">Mart</option>
                            <option value="04">Nisan</option>
                            <option value="05">Mayıs</option>
                            <option value="06">Haziran</option>
                            <option value="07">Temmuz</option>
                            <option value="08">Ağustos</option>
                            <option value="09">Eylül</option>
                            <option value="10">Ekim</option>
                            <option value="11">Kasım</option>
                            <option value="12">Aralık </option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <select style="background-color:  lightgrey;" id="Yil" name="Yil" class="form-control">
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
            <div class="col-md-9" style="text-align: right;"><button type="submit" class="btn btn-primary pull-right" id="update" name="update">Güncelle</button></div>
        </div>
    </div>

    </div>

    <div id="footerContainer">
        <?php include(APPPATH . 'Views/footer.php'); ?>
    </div>


    <script src="js/script.js"></script>
    <script src="path/to/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>