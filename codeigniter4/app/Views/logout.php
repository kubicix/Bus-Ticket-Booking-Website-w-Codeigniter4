<?php
    session_start();
    if(isset($_SESSION['auth']))
    {
        unset($_SESSION['auth']);
        unset($_SESSION['auth_user']);
        // $_SESSION['message'] = 'Başarıyla çıkış yapıldı.';
        header('Location: index.php');
    }

    // header('Location: account.php');
?>