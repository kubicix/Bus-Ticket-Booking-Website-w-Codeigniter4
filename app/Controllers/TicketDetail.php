<?php

namespace App\Controllers;


class TicketDetail extends BaseController
{
    public function index()
    {
        $data['ticketID'] = $this->request->getVar('ticketID');
        $session = session();
        if ($session->has('auth_user')) {
            $auth_user = $session->get('auth_user');
            $userTC = $auth_user['TcKimlik'];
            $conn = new \mysqli("mysql", "root", "kubilay41", "bus");
            if ($conn->connect_error) {
                die("Veritabanına bağlanılamadı: " . $conn->connect_error);
            }
            // SQL sorgusu
            $sql = "SELECT * FROM tickets WHERE ticket_id = ? AND tcno = ?";
            $stmt = $conn->prepare($sql);
            if ($stmt === false) {
                die("Sorgu hazırlanırken bir hata oluştu: " . $conn->error);
            }
            // Parametreleri bind etme
            $stmt->bind_param("ss", $data['ticketID'], $userTC); // "i" parametresi integer olduğunu belirtir
            // Sorguyu çalıştırma
            if ($stmt->execute()) {
                $result = $stmt->get_result();

                // Sorgudan gelen veri var mı kontrolü
                if ($result->num_rows > 0) {
                    // Veri varsa, ticketDetail sayfasına yönlendirme
                    return view('ticketDetail', $data);
                } else {
                    return redirect()->to('index');
                }
            } else {
                echo "Sorgu çalıştırılırken bir hata oluştu.";
            }
        } else {
            echo "Oturum bulunamadı.";
        }
    }
    public function BuyTicket()
    {
        $ticketID = $this->request->getPost('ticketID');
        $session = session();
        if ($session->has('auth_user')) {
            $auth_user = $session->get('auth_user');
            $userTC = $auth_user['TcKimlik'];
            $conn = new \mysqli("localhost", "root", "", "bus");
            if ($conn->connect_error) {
                die("Veritabanına bağlanılamadı: " . $conn->connect_error);
            }
            $sql = "SELECT * FROM tickets WHERE ticket_id = ? AND tcno = ?";
            $stmt = $conn->prepare($sql);
            if ($stmt === false) {
                die("Sorgu hazırlanırken bir hata oluştu: " . $conn->error);
            }
            // Parametreleri bind etme
            $stmt->bind_param("ss", $ticketID, $userTC); // "i" parametresi integer olduğunu belirtir
            // Sorguyu çalıştırma
            if ($stmt->execute()) {
                $result = $stmt->get_result();

                if ($result->num_rows > 0) {
                    $updateSql = "UPDATE tickets SET is_bought = 1 WHERE ticket_id = ? AND tcno = ?";
                    $updateStmt = $conn->prepare($updateSql);
                    if ($updateStmt === false) {
                        die("Güncelleme sorgusu hazırlanırken bir hata oluştu: " . $conn->error);
                    }

                    // Parametreleri bind etme
                    $updateStmt->bind_param("ss", $ticketID, $userTC);

                    // Güncelleme sorgusunu çalıştırma
                    if ($updateStmt->execute()) {
                        // Güncelleme başarılı ise ödeme sayfasına yönlendirme yapabilirsiniz
                        return redirect()->to(site_url('payment?pid=' . $ticketID));
                    } else {
                        // Güncelleme başarısız ise hata mesajı ver
                        die("Güncelleme işlemi başarısız: " . $updateStmt->error);
                    }
                } else {
                    return redirect()->to('index');
                }
            }
        }
    }

    public function DeleteTicket()
    {
        $ticketID = $this->request->getPost('ticketID');
        $session = session();

        if (!$session->has('auth_user')) {
            return redirect()->to(site_url('login')); // Kullanıcı girişi kontrolü
        }

        $auth_user = $session->get('auth_user');
        $userTC = $auth_user['TcKimlik'];

        $db = db_connect(); // Veritabanı bağlantısı

        // Biletin varlığını kontrol et
        $ticket = $db->table('tickets')
            ->where('ticket_id', $ticketID)
            ->where('tcno', $userTC)
            ->get()
            ->getRow();

        if (!$ticket) {
            return "Bilet bulunamadı"; // Bilet yoksa işlem sonlandırılır.
        }

        // İlgili seferin fiyatını bul
        $sefer = $db->table('seferler')
            ->where('otobus_plaka', $ticket->otobus_plaka)
            ->where('sefer_tarih', $ticket->kalkis_tarih)
            ->get()
            ->getRow();

        // Bilet silme işlemi
        $db->table('tickets')
            ->where('ticket_id', $ticketID)
            ->where('tcno', $userTC)
            ->delete();

        // Müşteri bakiyesini güncelle
        $customerBalance = $db->table('balances')
            ->where('TcKimlik', $userTC)
            ->get()
            ->getRow();
        $newBalance = $customerBalance->TotalBalance + $sefer->sefer_fiyat;

        $balanceData = [
            'TotalBalance' => $newBalance,
        ];

        $db->table('balances')
            ->where('TcKimlik', $userTC)
            ->update($balanceData);

        return redirect()->to(site_url('index')); // İşlem tamamlandıktan sonra ana sayfaya yönlendir
    }
}
