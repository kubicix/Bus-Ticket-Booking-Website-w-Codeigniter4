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

</head>

<body>
    <nav id="navbarContainer">
        <?php include(APPPATH . 'Views/navbar.php'); ?>
    </nav>

    <div class="container mt-4 mb-4 bg-light rounded p-3">
        <h2>Bilet Sorgulama</h2>
        <form action="<?= site_url('/biletSorgu') ?>" method="post">
            <div class="mb-3">
                <label for="tcno" class="form-label">TC Kimlik Numarası</label>
                <input type="text" class="form-control" id="tcno" name="tcno" required>
            </div>
            <button type="submit" class="btn btn-success">Sorgula</button>
        </form>

        <?php if (isset($tickets) && count($tickets) > 0): ?>
            <table class="table mt-4  table-striped ">
                <thead>
                    <tr>
                        <th>Sefer Tarihi</th>
                        <th>Kalkış Yeri</th>
                        <th>Varış Yeri</th>
                        <th>Araç Plaka</th>
                        <th>Koltuk No</th>
                        <th>PNR Kodu</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($tickets as $ticket): ?>
                        <tr>
                            <td>
                                <?= $ticket['kalkis_tarih'] ?>
                            </td>
                            <td>
                                <?= $ticket['kalkis_yeri'] ?>
                            </td>
                            <td>
                                <?= $ticket['varis_yeri'] ?>
                            </td>
                            <td>
                                <?= $ticket['otobus_plaka'] ?>
                            </td>
                            <td>
                                <?= $ticket['koltuk_no'] ?>
                            </td>
                            <td>
                                <?= $ticket['pnr_code'] ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php elseif (isset($tickets)): ?>
            <div class="alert alert-danger mt-4">TCNO'ya ait satın alınmış bilet bulunamadı.</div>
        <?php endif; ?>
    </div>

    <div id="footerContainer">
        <?= view('footer') ?>
    </div>


</body>

</html>