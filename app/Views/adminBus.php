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
                            <a href="#" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i> Düzenle</a>
                            <a href="#" class="btn btn-danger btn-sm" onclick="confirmDelete(<?= $bus->otobus_id ?>)">
                                <i class="fas fa-trash-alt"></i> Sil
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <script>
        function confirmDelete(busId) {
            if (confirm("Bu otobüsü silmek istediğinizden emin misiniz?")) {
                window.location.href = "<?= site_url('adminBus/delete/') ?>" + busId;
            }
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>