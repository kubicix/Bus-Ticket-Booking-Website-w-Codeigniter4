<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Biletler</title>
    <link rel="stylesheet" href="<?= CSS ?>style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
</head>

<body>
    <nav id="navbarContainer">
        <?php include(APPPATH . 'Views/adminNavbar.php'); ?>
    </nav>

    <div class="container mt-4">
        <h2>Biletler</h2>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Bilet ID</th>
                    <th scope="col">Kalkış Tarih</th>
                    <th scope="col">TC No</th>
                    <th scope="col">Cinsiyet</th>
                    <th scope="col">Otobüs Plaka</th>
                    <th scope="col">Koltuk No</th>
                    <th scope="col">İşlem Durumu</th>
                    <th scope="col">Bilet Tarihi</th>
                    <th scope="col">Rezervasyon Son Kullanma Tarihi</th>
                    <th scope="col">PNR Kodu</th>
                    <th scope="col">İşlemler</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($tickets as $ticket): ?>
                    <tr>
                        <td><?= $ticket->ticket_id ?></td>
                        <td><?= $ticket->kalkis_tarih ?></td>
                        <td><?= $ticket->tcno ?></td>
                        <td><?= $ticket->cinsiyet ?></td>
                        <td><?= $ticket->otobus_plaka ?></td>
                        <td><?= $ticket->koltuk_no ?></td>
                        <td><?= $ticket->is_bought ? 'Satın Alındı' : 'Satın Alınmadı' ?></td>
                        <td><?= $ticket->ticket_date ?></td>
                        <td><?= $ticket->reservation_expiry_date ?></td>
                        <td><?= $ticket->pnr_code ?></td>
                        <td>
                            <button type="button" class="btn btn-primary btn-sm"
                                onclick="fillInputsForEdit(<?= $ticket->ticket_id ?>, '<?= $ticket->kalkis_tarih ?>', '<?= $ticket->tcno ?>', '<?= $ticket->cinsiyet ?>', '<?= $ticket->otobus_plaka ?>', '<?= $ticket->koltuk_no ?>', <?= $ticket->is_bought ?>, '<?= $ticket->ticket_date ?>', '<?= $ticket->reservation_expiry_date ?>', '<?= $ticket->pnr_code ?>')">
                                <i class="fas fa-edit"></i> Düzenle
                            </button>

                            <button type="button" class="btn btn-danger btn-sm"
                                onclick="deleteTicket(<?= $ticket->ticket_id ?>)">
                                <i class="fas fa-trash-alt"></i> Sil
                            </button>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <div class="container mt-5 mb-5 bg-light rounded">
            <h2>Bilet Ekle/Düzenle</h2>
            <form id="ticketEditForm" method="post">
                <input type="hidden" id="editTicketId" name="editTicketId" value="">
                <div class="mb-3">
                    <label for="editKalkisTarih" class="form-label">Kalkış Tarih</label>
                    <input type="datetime" class="form-control" id="editKalkisTarih" name="editKalkisTarih" required>
                </div>
                <div class="mb-3">
                    <label for="editTcno" class="form-label">TC No</label>
                    <input type="text" class="form-control" id="editTcno" name="editTcno" required>
                </div>
                <div class="mb-3">
                    <label for="editCinsiyet" class="form-label">Cinsiyet</label>
                    <input type="text" class="form-control" id="editCinsiyet" name="editCinsiyet" required>
                </div>
                <div class="mb-3">
                    <label for="editOtobusPlaka" class="form-label">Otobüs Plaka</label>
                    <input type="text" class="form-control" id="editOtobusPlaka" name="editOtobusPlaka" required>
                </div>
                <div class="mb-3">
                    <label for="editKoltukNo" class="form-label">Koltuk No</label>
                    <input type="text" class="form-control" id="editKoltukNo" name="editKoltukNo" required>
                </div>
                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="editIsBought" name="editIsBought">
                    <label class="form-check-label" for="editIsBought">Satın Alındı mı?</label>
                </div>
                <div class="mb-3">
                    <label for="editTicketDate" class="form-label">Bilet Tarihi</label>
                    <input type="datetime" class="form-control" id="editTicketDate" name="editTicketDate" required>
                </div>
                <div class="mb-3">
                    <label for="editReservationExpiryDate" class="form-label">Rezervasyon Son Kullanma Tarihi</label>
                    <input type="datetime" class="form-control" id="editReservationExpiryDate" name="editReservationExpiryDate" required>
                </div>
                <div class="mb-3">
                    <label for="editPnrCode" class="form-label">PNR Kodu</label>
                    <input type="text" class="form-control" id="editPnrCode" name="editPnrCode" required>
                </div>
                <button id="ticketUpdateButton" class="btn btn-primary btn-lg">
                    <strong>Güncelle</strong>
                </button>
                <button id="ticketAddButton" class="btn btn-success btn-lg">
                    <strong>Ekle</strong>
                </button>
            </form>
        </div>
    </div>

    <script>
        // Sil butonuna tıklanınca bilet sil
        function deleteTicket(ticketId) {
            if (confirm("Bu bileti silmek istediğinizden emin misiniz?")) {
                window.location.href = "<?= site_url('adminTicket/delete/') ?>" + ticketId;
            }
        }

        // Düzenle butonuna tıklandığında ilgili biletin bilgilerini form alanlarına doldur
        function fillInputsForEdit(ticketId, kalkisTarih, tcno, cinsiyet, otobusPlaka, koltukNo, isBought, ticketDate, reservationExpiryDate, pnrCode) {
            document.getElementById('ticketEditForm').action = "<?= site_url('adminTicket/update/') ?>" + ticketId;
            document.getElementById('editTicketId').value = ticketId;
            document.getElementById('editKalkisTarih').value = kalkisTarih;
            document.getElementById('editTcno').value = tcno;
            document.getElementById('editCinsiyet').value = cinsiyet;
            document.getElementById('editOtobusPlaka').value = otobusPlaka;
            document.getElementById('editKoltukNo').value = koltukNo;
            document.getElementById('editIsBought').checked = isBought;
            document.getElementById('editTicketDate').value = ticketDate;
            document.getElementById('editReservationExpiryDate').value = reservationExpiryDate;
            document.getElementById('editPnrCode').value = pnrCode;
        }

        // Ekle butonuna tıklanınca formu post et
        document.getElementById('ticketAddButton').addEventListener('click', function () {
            if (confirm("Bu bilet eklemek istediğinizden emin misiniz?")) {
                document.getElementById('ticketEditForm').action = "<?= site_url('adminTicket/add') ?>";
                document.getElementById('ticketEditForm').method = "post";
                document.getElementById('ticketEditForm').submit();
            }
        });

        // Güncelle butonuna tıklanınca formu post et
        document.getElementById('ticketUpdateButton').addEventListener('click', function () {
            if (confirm("Bu bilet güncellemek istediğinizden emin misiniz?")) {
                document.getElementById('ticketEditForm').submit();
            }
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
