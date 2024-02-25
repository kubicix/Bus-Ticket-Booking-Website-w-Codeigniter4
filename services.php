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
    
    <div class="mx-5 pt-5">
        <div class="d-flex justify-content-center align-items-center flex-column">
            <h1>Servis güzergahlarını görmek için bölge seçiniz:</h1>
            <select class="form-control w-50" id="KrtBolge" name="KrtBolge">
                <option value="servisantalya">ANTALYA</option>
                <option value="servisankara">ANKARA</option>
                <option value="servisesenler">ESENLER (İSTANBUL)</option>
                <option value="servisharem">HAREM (İSTANBUL)</option>
                <option value="servisizmir">İZMİR</option>
                <option value="serviskocaeli">KOCAELİ</option>
            </select>
        </div>
        <div class="mx-5 pt-5">
            <div class="col-xs-12 table-responsive">
                <table class="table table-bordered table-striped table-hover">
                    <tbody>
                        <tr> 
                            <th>1. GÜZERGAH</th>
                            <th>2. GÜZERGAH</th>
                            <th>3. GÜZERGAH</th>
                            <th>4. GÜZERGAH</th>
                        </tr>
                        <tr>
                            <td>TOPKAPI</td>
                            <td>DAVUTPAŞA (METRO)</td>
                            <td>100.YIL KÖPRÜ</td>
                            <td>*KARTEPE</td>
                        </tr>
                        <tr>
                            <td>*ÇAPA</td>
                            <td>MERTER</td>
                            <td>*BAĞCILAR</td>
                            <td>*BEŞYÜZEVLER</td>
                        </tr>
                        <tr>
                            <td>ŞEHREMİNİ</td>
                            <td>*BAKIRKÖY</td>    
                            <td>*GÜNEŞLİ</td>       
                            <td>*KARADENİZ MAH</td>       
                        </tr>
                        <tr>
                            <td>*ZEYTİNBURNU</td>
                            <td>İNCİRLİ (ÖMÜR)</td>
                            <td>*İKİTELLİ</td>
                            <td>METRİS CEZA EVİ</td>
                        </tr>
                        <tr>
                            <td>VATAN CADDESİ</td>
                            <td>ŞİRİNEVLER</td>
                            <td>İNÖNÜ</td>
                            <td>*KÜÇÜKKÖY</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>KULELİ</td>
                            <td>*S.ÇEŞME</td>
                            <td>*SULTANÇİFTLİĞİ</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>*YENİBOSNA</td>
                            <td>*HALKALI MEYDAN</td>
                            <td>*GAZİOSMANPAŞA</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>HAVALİMANI</td>
                            <td>*HALKALI ARENA PARK</td> 
                            <td></td> 
                        </tr>
                            <tr>
                            <td></td>
                            <td>*SEFAKÖY</td>
                            <td>BASIN EKSPRES YOLU</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>SEFAKÖY (BELEDİYE)</td>
                            <td></td>
                            <td></td>
                        </tr>
                            <tr>
                            <td></td>
                            <td>SEFAKÖY (BEŞYOL)</td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>*CENNET MAH(GİRİŞ)</td>
                            <td></td>
                            <td></td>
                        </tr>
                            <tr>
                            <td></td>
                            <td>KÜÇÜKÇEKMECE(GİRİŞ)</td>
                            <td></td>
                            <td></td>
                        </tr> 
                        <tr>
                            <td></td>
                            <td>*AVCILAR</td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>HARAMİDERE (CARREFOUR)</td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>KIRAÇ</td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>*ESENYURT</td>
                            <td></td>
                            <td></td>
                        </tr> 
                        <tr>
                            <td></td>
                            <td>*BEYLİKDÜZÜ</td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>BEYLİKDÜZÜ (TÜYAP)</td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>*GÜRPINAR</td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr style="pointer-events:none;">
                            <td align="center" colspan="4"><b>YILDIZ İBARESİ BULUNAN YERLERDE ŞUBEMİZ BULUNMAKTADIR</b></td>
                        </tr>  
                    </tbody>
                </table>
            </div>
        </div>
    </div>

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


    <!-- API KEYİN ALINDIĞI KISIM GOOGLE API DAN ALINACAK VE GOOGLE MAP JAVASCRİPT ENABLE EDİLECEK -->
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=API_KEYI_BURAYA_GIR&callback=initMap"></script>
    <script src="js/script.js"></script>
    <script src="path/to/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>