<?php

$token = $_GET["token"];

$token_hash = hash("sha256", $token);

$servername = "mysql"; // Sunucu adı
$username = "root"; // Veritabanı kullanıcı adı
$password = "kubilay41"; // Veritabanı şifresi
$database = "bus"; // Veritabanı adı

// MySQL bağlantısı oluşturma
$mysqli = new mysqli($servername, $username, $password, $database);

$sql = "SELECT * FROM resetpassword
        WHERE reset_token_hash = ?";

$stmt = $mysqli->prepare($sql);

$stmt->bind_param("s", $token_hash);

$stmt->execute();

$result = $stmt->get_result();

$user = $result->fetch_assoc();

if ($user === null) {
    die("token not found");
}

if (strtotime($user["reset_token_expires_at"]) <= time()) {
    die("token has expired");
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Reset Password</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="scss/_variables.scss" />
    <link rel="stylesheet" href="path/to/bootstrap/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"/>
    <link rel="stylesheet" href="<?= CSS ?>style.css">
</head>
<body>
    <nav id="navbarContainer">      
        <?php include(APPPATH . 'Views/navbar.php'); ?>
    </nav>
    <div class="container">
    <section class="py-3 mt-3">
        <div class="container">
            <div class="text-uppercase">
                <h2>Şifremi Unuttum</h2>
                <input type="hidden" name="token" value="<?= htmlspecialchars($token) ?>">
            </div>
        </div>
    </section>

    <section class="pt-30 pb-80">
        <form action="<?= base_url('resetPassword/updatePassword') ?>" method="POST" id="password-form">

            <input type="hidden" name="token" value="<?= htmlspecialchars($token) ?>">

            <label for="password">New password</label>
            <input type="password" id="password" name="password">
            <br>

            <label for="password_confirmation">Repeat password</label>
            <input type="password" id="password_confirmation"name="password_confirmation">

            <button>Send</button>
            </form>
    </section>
    </div>
    <div id="footerContainer">    <?= view('footer') ?></div>
</body>
</html>