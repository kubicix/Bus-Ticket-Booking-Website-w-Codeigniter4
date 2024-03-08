<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Seferler</title>
    <link rel="stylesheet" href="<?= CSS ?>style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
</head>

<body>
    <nav id="navbarContainer">
        <?php include(APPPATH . 'Views/adminNavbar.php'); ?>
    </nav>

    <div class="container mt-4">
        <h2>Seferler</h2>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Sefer ID</th>
                    <th scope="col">Kalkış Yeri</th>
                    <th scope="col">Varış Yeri</th>
                    <th scope="col">Otobüs Plaka</th>
                    <th scope="col">Sefer Tarih</th>
                    <th scope="col">Sefer Fiyat</th>
                    <th scope="col">İşlemler</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($seferler as $sefer): ?>
                    <tr>
                        <td>
                            <?= $sefer->sefer_id ?>
                        </td>
                        <td>
                            <?= $sefer->kalkis_yeri ?>
                        </td>
                        <td>
                            <?= $sefer->varis_yeri ?>
                        </td>
                        <td>
                            <?= $sefer->otobus_plaka ?>
                        </td>
                        <td>
                            <?= $sefer->sefer_tarih ?>
                        </td>
                        <td>
                            <?= $sefer->sefer_fiyat ?>
                        </td>
                        <td>
                            <button type="button" class="btn btn-primary btn-sm"
                                onclick="fillInputsForEdit(<?= $sefer->sefer_id ?>, '<?= $sefer->kalkis_yeri ?>', '<?= $sefer->varis_yeri ?>', '<?= $sefer->otobus_plaka ?>', '<?= $sefer->sefer_tarih ?>', <?= $sefer->sefer_fiyat ?>)">
                                <i class="fas fa-edit"></i> Düzenle
                            </button>

                            <button type="button" class="btn btn-danger btn-sm"
                                onclick="deleteSefer(<?= $sefer->sefer_id ?>)">
                                <i class="fas fa-trash-alt"></i> Sil
                            </button>
                        </td>

                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <div class="container mt-5 mb-5 bg-light rounded">
            <h2>Sefer Ekle/Düzenle</h2>
            <form id="seferEditForm" method="post">
                <input type="hidden" id="editSeferId" name="editSeferId" value="">
                <div class="mb-3">
                    <label for="editKalkisYeri" class="form-label">Kalkış Yeri</label>
                    <input type="text" class="form-control" id="editKalkisYeri" name="editKalkisYeri" required>
                </div>
                <div class="mb-3">
                    <label for="editVarisYeri" class="form-label">Varış Yeri</label>
                    <input type="text" class="form-control" id="editVarisYeri" name="editVarisYeri" required>
                </div>
                <div class="mb-3">
                    <label for="editOtobusPlaka" class="form-label">Otobüs Plaka</label>
                    <input type="text" class="form-control" id="editOtobusPlaka" name="editOtobusPlaka" required>
                </div>
                <div class="mb-3">
                    <label for="editSeferTarih" class="form-label">Sefer Tarih</label>
                    <input type="date" class="form-control" id="editSeferTarih" name="editSeferTarih" required>
                </div>
                <div class="mb-3">
                    <label for="editSeferFiyat" class="form-label">Sefer Fiyat</label>
                    <input type="number" class="form-control" id="editSeferFiyat" name="editSeferFiyat" required>
                </div>
                <button id="seferUpdateButton" class="btn btn-primary btn-lg">
                    <strong>Güncelle</strong>
                </button>
                <button id="seferAddButton" class="btn btn-success btn-lg">
                    <strong>Ekle</strong>
                </button>
            </form>
        </div>
    </div>



    <script>
        // Sil butonuna tıklanınca seferi sil
        function deleteSefer(seferId) {
            if (confirm("Bu seferi silmek istediğinizden emin misiniz?")) {
                window.location.href = "<?= site_url('adminSefer/delete/') ?>" + seferId;
            }
        }

        // Düzenle butonuna tıklandığında ilgili seferin bilgilerini form alanlarına doldur
        function fillInputsForEdit(seferId, kalkisYeri, varisYeri, otobusPlaka, seferTarih, seferFiyat) {
            document.getElementById('seferEditForm').action = "<?= site_url('adminSefer/update/') ?>" + seferId;
            document.getElementById('editSeferId').value = seferId;
            document.getElementById('editKalkisYeri').value = kalkisYeri;
            document.getElementById('editVarisYeri').value = varisYeri;
            document.getElementById('editOtobusPlaka').value = otobusPlaka;
            document.getElementById('editSeferTarih').value = seferTarih;
            document.getElementById('editSeferFiyat').value = seferFiyat;
        }

        // Ekle butonuna tıklanınca formu post et
        document.getElementById('seferAddButton').addEventListener('click', function () {
            if (confirm("Bu seferi eklemek istediğinizden emin misiniz?")) {
                document.getElementById('seferEditForm').action = "<?= site_url('adminSefer/add') ?>";
                document.getElementById('seferEditForm').method = "post";
                document.getElementById('seferEditForm').submit();
            }
        });

        // Güncelle butonuna tıklanınca formu post et
        document.getElementById('seferUpdateButton').addEventListener('click', function () {
            if (confirm("Bu seferi güncellemek istediğinizden emin misiniz?")) {
                document.getElementById('seferEditForm').action = "<?= site_url('adminSefer/update/') ?>" + seferId;
                document.getElementById('seferEditForm').method = "post";
                document.getElementById('seferEditForm').submit();
            }
        });

    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>