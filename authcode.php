<?php

    session_start();
    include("config.php");

    if(isset($_POST["login_btn"])) {
        $CepTelefon = mysqli_real_escape_string($conn, $_POST['CepTelefon']);
        $Sifre = mysqli_real_escape_string($conn, $_POST['Sifre']);
        $login_query = "SELECT * FROM users WHERE CepTelefon = '$CepTelefon' AND Sifre = '$Sifre'";
        $login_query_run = mysqli_query($conn, $login_query);
        if(mysqli_num_rows($login_query_run) > 0) {
            $_SESSION['message']= true;
            $_SESSION['auth']= true;

            $userdata = mysqli_fetch_array($login_query_run);
            $AdiSoyadi = $userdata['AdiSoyadi'];
            $EMail = $userdata['EMail'];
            $_SESSION['auth_user']=[
                'AdiSoyadi' => $AdiSoyadi,
                'EMail'=> $EMail,
            ];

            unset($_SESSION['message']);

            header('Location: user.php');
        }else
        {
            header('Location: account.php');
            $_SESSION['message']= 'Cep telefon numarası veya şifre yanlış.';

        }
    }

?>