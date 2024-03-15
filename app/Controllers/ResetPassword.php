<?php

namespace App\Controllers;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';
use CodeIgniter\Controller;

class ResetPassword extends Controller
{
    public function index()
    {
        return view('resetPassword');
    }

    public function reset(){
        $email = $this->request->getPost('email');

        $token=bin2hex(random_bytes(16));
        $token_hash=hash('sha256', $token);

        $expiry= date("Y-m-d H:i:s",time() + 60 * 30);

        $mysqli = new \mysqli("mysql", "root", "kubilay41", "bus");
        if ($mysqli->connect_error) {
            die("Veritabanına bağlanılamadı: " . $mysqli->connect_error);
        }
        $sql = "INSERT INTO resetpassword (reset_token_hash, reset_token_expires_at, email) VALUES (?, ?, ?)";

        $stmt= $mysqli->prepare($sql);

        $stmt->bind_param("sss", $token_hash, $expiry, $email,);

        $stmt->execute();

        if ($stmt->affected_rows) 
        {
            $mail = new PHPMailer(true);
            $mail->isSMTP();
            $mail->SMTPAuth = true;
        
            $mail->Host = "smtp.gmail.com";
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;
            $mail->Username = "kocaelideneme41@gmail.com";
            //EMAİL KODU BURAYA GELECEK 
            $mail->Password = "luht phwt lrjc lxys";
        
            $mail->setFrom("kocaelideneme41@gmail.com");
            $mail->addAddress($email);
            $mail->Subject = "Password Reset";
            $mail->isHtml(true);
            $url = base_url('reset-password');
            // $mail->Body = "Click <a href='http://localhost/bus/reset-password?token=$token'>here</a> to reset your password.";
            $mail->Body = "Click <a href='$url?token=$token'>here</a> to reset your password.";
        
            try {
                // E-postayı gönder
                $mail->send();
                echo "Mail başarıyla gönderildi.";
            } catch (Exception $e) {
                echo "Mesaj gönderilemedi. Hata: {$mail->ErrorInfo}";
            }
        } else {
            echo "İşlem başarısız.";
        }
        echo "Message sent, please check your inbox.";
    }

    public function resetPass() 
    {
        return view('reset-password');
    }   

    public function updatePassword(){
        
        $token = $_POST["token"];

        $token_hash = hash("sha256", $token);

        // MySQL bağlantısı oluşturma
        $mysqli = new \mysqli("localhost", "root", "", "bus");

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

        if (strlen($_POST["password"]) < 8) {
            die("Password must be at least 8 characters");
        }

        if ( ! preg_match("/[a-z]/i", $_POST["password"])) {
            die("Password must contain at least one letter");
        }

        if ( ! preg_match("/[0-9]/", $_POST["password"])) {
            die("Password must contain at least one number");
        }

        if ($_POST["password"] !== $_POST["password_confirmation"]) {
            die("Passwords must match");
        }

        $sql = "DELETE FROM resetpassword WHERE reset_token_hash = ? AND reset_token_expires_at = ?";
        $stmt = $mysqli->prepare($sql);
        $stmt->bind_param("ss", $token_hash, $user["reset_token_expires_at"]);
        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            echo "Kayıt başarıyla silindi.";
        } else {
            echo "Kayıt silinemedi.";
        }
        $updateUser="UPDATE users SET Sifre = ? WHERE email = ?";
        $stmt = $mysqli->prepare($updateUser);
        $stmt->bind_param("ss", $_POST["password"], $user["email"]);
        $stmt->execute();
        if ($stmt->affected_rows > 0) {
            return redirect()->to(site_url('index'));
        } else {
            echo "Kullanıcı şifresi güncellenemedi.";
        }
    }
}
