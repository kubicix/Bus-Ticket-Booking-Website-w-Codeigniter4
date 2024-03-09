<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Bakiyeler</title>
    <link rel="stylesheet" href="<?= CSS ?>style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
</head>

<body>
    <nav id="navbarContainer">
        <?php include(APPPATH . 'Views/adminNavbar.php'); ?>
    </nav>

    <div class="container mt-4">
        <h2>Bakiyeler</h2>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Tc Kimlik</th>
                    <th scope="col">Toplam Bakiye</th>
                    <th scope="col">İşlemler</th> <!-- Düzenle ve Sil için -->
                </tr>
            </thead>
            <tbody>
                <?php foreach ($balances as $balance): ?>
                    <tr>
                        <td>
                            <?= $balance->TcKimlik ?>
                        </td>
                        <td>
                            <?= $balance->TotalBalance ?>
                        </td>
                        <td>
                            <button type="button" class="btn btn-primary btn-sm"
                                onclick="fillInputsForEdit('<?= $balance->TcKimlik ?>', <?= $balance->TotalBalance ?>)">
                                <i class="fas fa-edit"></i> Düzenle
                            </button>

                            <a href="#" class="btn btn-danger btn-sm" onclick="confirmDelete('<?= $balance->TcKimlik ?>')">
                                <i class="fas fa-trash-alt"></i> Sil
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <!-- Input alanları -->
        <div class="container mt-5 mb-5 bg-light rounded ">
            <h2>Bakiye Ekle/Düzenle</h2>

            <form id="editForm" method="post">
                <div class="mb-3">
                    <label for="editTcKimlik" class="form-label">Tc Kimlik</label>
                    <input type="text" class="form-control" id="editTcKimlik" disabled name="editTcKimlik" required>
                </div>
                <div class="mb-3">
                    <label for="editTotalBalance" class="form-label">Toplam Bakiye</label>
                    <input type="number" class="form-control" id="editTotalBalance" name="editTotalBalance" required>
                </div>
                <button id="updateButton" class="btn btn-primary btn-lg">
                    <strong>Güncelle</strong>
                </button>
                <!-- <button id="addButton" class="btn btn-success btn-lg">
                    <strong>Ekle</strong>
                </button> -->
            </form>
        </div>
        <br>
    </div>

    <script>
    function confirmDelete(TcKimlik) {
        if (confirm("Bu bakiyeyi silmek istediğinizden emin misiniz?")) {
            window.location.href = "<?= site_url('adminBalance/delete/') ?>" + TcKimlik;
        }
    }

    function fillInputsForEdit(TcKimlik, TotalBalance) {
        document.getElementById('editForm').action = "<?= site_url('adminBalance/update/') ?>" + TcKimlik;
        document.getElementById('editTcKimlik').value = TcKimlik;
        document.getElementById('editTotalBalance').value = TotalBalance;
    }

    // // Ekle butonuna tıklanınca addBalance route'una yönlendirme yap
    // document.getElementById('addButton').addEventListener('click', function() {
    //     if (confirm("Bu bakiyeyi eklemek istediğinizden emin misiniz?")) {
    //         document.getElementById('editForm').action = "<?= site_url('adminBalance/add') ?>";
    //         document.getElementById('editForm').method = "post";
    //         document.getElementById('editForm').submit();
    //     }
    // });

    // Güncelle butonuna tıklanınca formu submit et
    document.getElementById('updateButton').addEventListener('click', function() {
        if (confirm("Bu bakiyeyi güncellemek istediğinizden emin misiniz?")) {
            document.getElementById('editForm').submit();
        }
    });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
