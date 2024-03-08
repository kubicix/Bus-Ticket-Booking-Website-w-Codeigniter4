<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Otobüsler</title>
    <link rel="stylesheet" href="<?= CSS ?>style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
</head>

<body>
    <nav id="navbarContainer">
        <?php include(APPPATH . 'Views/adminNavbar.php'); ?>
    </nav>

    <div class="container mt-4">
        <h2>Otobüsler</h2>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Otobüs ID</th>
                    <th scope="col">Plaka</th>
                    <th scope="col">Marka</th>
                    <th scope="col">Model</th>
                    <th scope="col">Yolcu Kapasitesi</th>
                    <th scope="col">Koltuk Sayısı</th>
                    <th scope="col">İşlemler</th> <!-- Düzenle ve Sil için -->
                </tr>
            </thead>
            <tbody>
                <?php foreach ($buses as $bus): ?>
                    <tr>
                        <td>
                            <?= $bus->otobus_id ?>
                        </td>
                        <td>
                            <?= $bus->otobus_plaka ?>
                        </td>
                        <td>
                            <?= $bus->otobus_marka ?>
                        </td>
                        <td>
                            <?= $bus->otobus_model ?>
                        </td>
                        <td>
                            <?= $bus->yolcu_kapasite ?>
                        </td>
                        <td>
                            <?= $bus->koltuk_sayisi ?>
                        </td>

                        <td>
                            <button type="button" class="btn btn-primary btn-sm"
                                onclick="fillInputsForEdit(<?= $bus->otobus_id ?>, '<?= $bus->otobus_plaka ?>', '<?= $bus->otobus_marka ?>', '<?= $bus->otobus_model ?>', <?= $bus->yolcu_kapasite ?>, <?= $bus->koltuk_sayisi ?>)">
                                <i class="fas fa-edit"></i> Düzenle
                            </button>

                            <a href="#" class="btn btn-danger btn-sm" onclick="confirmDelete(<?= $bus->otobus_id ?>)">
                                <i class="fas fa-trash-alt"></i> Sil
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <!-- Input alanları -->
        <div class="container mt-5 mb-5 bg-light rounded ">
            <h2>Otobüs Ekle/Düzenle</h2>

            <form id="editForm"  method="post">
                <input type="hidden" id="editBusId" name="editBusId" value="">
                <div class="mb-3">
                    <label for="editPlaka" class="form-label">Plaka</label>
                    <input type="text" class="form-control" id="editPlaka" name="editPlaka" required>
                </div>
                <div class="mb-3">
                    <label for="editMarka" class="form-label">Marka</label>
                    <input type="text" class="form-control" id="editMarka" name="editMarka" required>
                </div>
                <div class="mb-3">
                    <label for="editModel" class="form-label">Model</label>
                    <input type="text" class="form-control" id="editModel" name="editModel" required>
                </div>
                <div class="mb-3">
                    <label for="editKapasite" class="form-label">Yolcu Kapasitesi</label>
                    <input type="number" class="form-control" id="editKapasite" name="editKapasite" required>
                </div>
                <div class="mb-3">
                    <label for="editKoltukSayisi" class="form-label">Koltuk Sayısı</label>
                    <input type="number" class="form-control" id="editKoltukSayisi" name="editKoltukSayisi" required>
                </div>
                <button id="updateButton" class="btn btn-primary btn-lg">
                    <strong>Güncelle</strong>
                </button>
                <button id="addButton"  class="btn btn-success btn-lg">
                    <strong>Ekle</strong>
                </button>
            </form>


        </div>
        <br>
    </div>
    <script>
    function confirmDelete(busId) {
        if (confirm("Bu otobüsü silmek istediğinizden emin misiniz?")) {
            window.location.href = "<?= site_url('adminBus/delete/') ?>" + busId;
        }
    }

    function fillInputsForEdit(busId, plaka, marka, model, kapasite, koltukSayisi) {
        document.getElementById('editForm').action = "<?= site_url('adminBus/update/') ?>" + busId;
        document.getElementById('editBusId').value = busId;
        document.getElementById('editPlaka').value = plaka;
        document.getElementById('editMarka').value = marka;
        document.getElementById('editModel').value = model;
        document.getElementById('editKapasite').value = kapasite;
        document.getElementById('editKoltukSayisi').value = koltukSayisi;
    }

    // Ekle butonuna tıklanınca addBus route'una yönlendirme yap
document.getElementById('addButton').addEventListener('click', function() {
    if (confirm("Bu otobüsü eklemek istediğinizden emin misiniz?")) {
        document.getElementById('editForm').action = "<?= site_url('adminBus/add') ?>";
        document.getElementById('editForm').method = "post";
        document.getElementById('editForm').submit();
    }
});

// Güncelle butonuna tıklanınca formu submit et
document.getElementById('updateButton').addEventListener('click', function() {
    if (confirm("Bu otobüsü güncellemek istediğinizden emin misiniz?")) {
        document.getElementById('editForm').submit();
    }
});

</script>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>