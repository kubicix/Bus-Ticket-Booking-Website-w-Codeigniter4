<?php
$session = session();
$isLoggedIn = $session->get('isLoggedIn');

// isAdmin fonksiyonu yönetici yetkisini kontrol eder
function isAdmin()
{
    $session = session();

    // Kullanıcının giriş yapmış olduğunu ve yönetici yetkisine sahip olduğunu kontrol edelim
    if (!$session->get('isLoggedIn')) {
        return false;
    }

    // Oturumdan kullanıcı verilerini alalım
    $auth_user = $session->get('auth_user');

    // isAdmin anahtarını kontrol ederek kullanıcının yönetici olup olmadığını belirleyelim
    if (isset($auth_user['is_admin']) && $auth_user['is_admin']) {
        return true;
    } else {
        return false;
    }
}

// // Kullanıcı adminse ekrana "Kullanıcı admin" yazdırma
// if (isAdmin()) {
//     echo "Kullanıcı admin";
// }
?>

<h2 class="mt-4 mb-3">
    <a style="text-decoration: none; font-family: 'Arial Black', sans-serif; font-size:24px; font-weight: bold; color: darkgreen;"
        href="adminIndex"><img src="<?= IMG ?>logo-seffaf.png" alt="umuttepe turizm logo"
            style="width: 200px; height: 150px;"> UMUTTEPE TURİZM YÖNETİCİ PANELİ</a>
</h2>

<ul >
    <!-- Yönetim Paneli İçin Navbar -->
    <?php if ($isLoggedIn && isAdmin()): ?>
        <ul>
    <li class="bg-light rounded"><a href="<?= site_url('adminBus') ?>"><strong>OTOBÜSLER</strong></a></li>
    <li class="bg-light rounded"><a href="<?= site_url('adminSefer') ?>"><strong>SEFERLER</strong></a></li>
    <li class="bg-light rounded"><a href="<?= site_url('adminTicket') ?>"><strong>BİLETLER</strong></a></li>
    <li class="bg-light rounded"><a href="<?= site_url('adminUser') ?>"><strong>KULLANICILAR</strong></a></li>
    <li class="bg-light rounded"><a href="<?= site_url('adminBalance') ?>"><strong>BAKİYELER</strong></a></li>
    <li class="bg-light rounded"><a href="<?= site_url('adminPayment') ?>"><strong>ÖDEMELER</strong></a></li>
</ul>

    <?php endif; ?>

</ul>