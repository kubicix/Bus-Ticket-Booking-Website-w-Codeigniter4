<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Kullanıcılar</title>
    <link rel="stylesheet" href="<?= CSS ?>style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
</head>

<body>
    <nav id="navbarContainer">
        <?php include(APPPATH . 'Views/adminNavbar.php'); ?>
    </nav>

    <div class="container mt-4">
        <h2>Kullanıcılar</h2>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Tc Kimlik</th>
                    <th scope="col">Adı Soyadı</th>
                    <th scope="col">Cep Telefon</th>
                    <th scope="col">E-Mail</th>
                    <th scope="col">Doğum Tarihi</th>
                    <th scope="col">İl</th>
                    <th scope="col">Cinsiyet</th>
                    <th scope="col">Admin Mi?</th>
                    <th scope="col">İşlemler</th>
                </tr>
            </thead>
            <tbody>
                <!-- Kullanıcı verilerini burada PHP döngüsü ile doldur -->
                <?php foreach ($users as $user): ?>
                    <tr>
                        <td>
                            <?= $user->TcKimlik ?>
                        </td>
                        <td>
                            <?= $user->AdiSoyadi ?>
                        </td>
                        <td>
                            <?= $user->CepTelefon ?>
                        </td>
                        <td>
                            <?= $user->EMail ?>
                        </td>
                        <td>
                            <?= $user->Gun ?>.
                            <?= $user->Ay ?>.
                            <?= $user->Yil ?>
                        </td>
                        <td>
                            <?= $user->Il ?>
                        </td>
                        <td>
                            <?= $user->Cinsiyeti ?>
                        </td>
                        <td>
                            <?= $user->is_admin ? 'Evet' : 'Hayır' ?>
                        </td>
                        <td>
                            <button type="button" class="btn btn-primary btn-sm"
                                onclick="fillInputsForEdit(<?= $user->TcKimlik ?>, '<?= $user->AdiSoyadi ?>', '<?= $user->CepTelefon ?>', '<?= $user->EMail ?>', '<?= $user->Gun ?>', '<?= $user->Ay ?>', '<?= $user->Yil ?>', '<?= $user->Il ?>', '<?= $user->Cinsiyeti ?>', <?= $user->is_admin ?>)">
                                <i class="fas fa-edit"></i> Düzenle
                            </button>

                            <button type="button" class="btn btn-danger btn-sm"
                                onclick="deleteUser(<?= $user->TcKimlik ?>)">
                                <i class="fas fa-trash-alt"></i> Sil
                            </button>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <div class="container mt-5 mb-5 bg-light rounded">
            <h2>Kullanıcı Ekle/Düzenle</h2>
            <form id="userEditForm" method="post">
                <div class="mb-3">
                    <label for="editTcKimlik" class="form-label">Tc Kimlik</label>
                    <input type="text" class="form-control" id="editTcKimlik" name="editTcKimlik" required>
                </div>

                <div class="mb-3">
                    <label for="editAdiSoyadi" class="form-label">Adı Soyadı</label>
                    <input type="text" class="form-control" id="editAdiSoyadi" name="editAdiSoyadi" required>
                </div>
                <div class="mb-3">
                    <label for="editCepTelefon" class="form-label">Cep Telefon</label>
                    <input type="text" class="form-control" id="editCepTelefon" name="editCepTelefon" required>
                </div>
                <div class="mb-3">
                    <label for="editEMail" class="form-label">E-Mail</label>
                    <input type="email" class="form-control" id="editEMail" name="editEMail" required>
                </div>
                <div class="mb-3">
                    <label for="editDogumTarihi" class="form-label">Doğum Tarihi</label>
                    <div class="row">
                        <div class="col">
                            <input type="number" class="form-control" id="editGun" name="editGun" placeholder="Gün"
                                required>
                        </div>
                        <div class="col">
                            <input type="number" class="form-control" id="editAy" name="editAy" placeholder="Ay"
                                required>
                        </div>
                        <div class="col">
                            <input type="number" class="form-control" id="editYil" name="editYil" placeholder="Yıl"
                                required>
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="editIl" class="form-label">İl</label>
                    <input type="text" class="form-control" id="editIl" name="editIl" required>
                </div>
                <div class="mb-3">
                    <label for="editCinsiyeti" class="form-label">Cinsiyet</label>
                    <select class="form-select" id="editCinsiyeti" name="editCinsiyeti" required>
                        <option value="E">Erkek</option>
                        <option value="K">Bayan</option>
                    </select>
                </div>
                <div class="mb-3">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="editIsAdmin" name="editIsAdmin">
                        <label class="form-check-label" for="editIsAdmin">
                            Admin Mi?
                        </label>
                    </div>
                </div>
                <button id="userUpdateButton" class="btn btn-primary btn-lg">
                    <strong>Güncelle</strong>
                </button>
                <button id="userAddButton" class="btn btn-success btn-lg">
                    <strong>Ekle</strong>
                </button>
            </form>
        </div>
    </div>



    <script>
        // Sil butonuna tıklanınca kullanıcıyı sil
        function deleteUser(tcKimlik) {
            if (confirm("Bu kullanıcıyı silmek istediğinizden emin misiniz?")) {
                window.location.href = "<?= site_url('adminUser/delete/') ?>" + tcKimlik;
            }
        }

        // Düzenle butonuna tıklandığında ilgili kullanıcının bilgilerini form alanlarına doldur
        function fillInputsForEdit(tcKimlik, adiSoyadi, cepTelefon, eMail, gun, ay, yil, il, cinsiyeti, isAdmin) {
            document.getElementById('userEditForm').action = "<?= site_url('adminUser/update/') ?>" + tcKimlik;
            document.getElementById('editTcKimlik').value = tcKimlik;
            document.getElementById('editAdiSoyadi').value = adiSoyadi;
            document.getElementById('editCepTelefon').value = cepTelefon;
            document.getElementById('editEMail').value = eMail;
            document.getElementById('editGun').value = gun;
            document.getElementById('editAy').value = ay;
            document.getElementById('editYil').value = yil;
            document.getElementById('editIl').value = il;
            document.getElementById('editCinsiyeti').value = cinsiyeti;
            document.getElementById('editIsAdmin').checked = isAdmin;
        }

        // Ekle butonuna tıklanınca formu post et
        document.getElementById('userAddButton').addEventListener('click', function () {
            if (confirm("Bu kullanıcıyı eklemek istediğinizden emin misiniz?")) {
                document.getElementById('userEditForm').action = "<?= site_url('adminUser/add') ?>";
                document.getElementById('userEditForm').method = "post";
                document.getElementById('userEditForm').submit();
            }
        });

        // Güncelle butonuna tıklanınca formu post et
        document.getElementById('userUpdateButton').addEventListener('click', function () {
            if (confirm("Bu kullanıcıyı güncellemek istediğinizden emin misiniz?")) {
                document.getElementById('userEditForm').action = "<?= site_url('adminUser/update/') ?>" + tcKimlik;
                document.getElementById('userEditForm').method = "post";
                document.getElementById('userEditForm').submit();
            }
        });

    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>