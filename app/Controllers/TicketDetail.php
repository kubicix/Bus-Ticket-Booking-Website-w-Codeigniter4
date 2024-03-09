<?php

namespace App\Controllers;


class TicketDetail extends BaseController
{
    public function index()
    {
        $data['ticketID'] = $this->request->getVar('ticketID');
        $session = session();
        if($session->has('auth_user')){
            $auth_user = $session->get('auth_user');
            $userTC = $auth_user['TcKimlik'];
            $conn = new \mysqli("localhost", "root", "", "bus");
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
        if($session->has('auth_user')){
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

    public function DeleteTicket(){
        require_once(APPPATH . 'Models/Payments.php');
        require_once(APPPATH . 'Models/Balances.php');
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
                    $row = $result->fetch_assoc();
                    $TcKimlik = $row['tcno'];
                    $Kalkis_Tarih = $row['kalkis_tarih'];
                    $koltukNo = $row['koltuk_no'];
                    
                    echo $TcKimlik . "<br>";
                    echo $Kalkis_Tarih . "<br>";
                    echo $koltukNo . "<br>";
        
                    $findPayment = "SELECT * FROM payments WHERE TcKimlik = ? AND SeferTarihi = ? and Product = ?";
                    $stmtPayment = $conn->prepare($findPayment);
                    if ($stmtPayment === false) {
                        die("Sorgu hazırlanırken bir hata oluştu: " . $conn->error);
                    }
                    $stmtPayment->bind_param("sss", $TcKimlik, $Kalkis_Tarih, $koltukNo);
                    if ($stmtPayment->execute()) {
                        $paymentResult = $stmtPayment->get_result();
                        if ($paymentResult->num_rows > 0) {
                            $data = $paymentResult->fetch_assoc();
                            $amount = $data["Amount"];
                            $balance = new \App\Models\GetCustomerBalance();
                            $customer = $balance->getBalance($userTC);
                            $total_balance = $customer->TotalBalance;
                            $newBalance = array(
                                "TotalBalance" => ($total_balance + $amount),
                                "TcKimlik" => $userTC,
                            );
                            $updateBalanceStatus=$balance->UpdateTotal($newBalance);
                            echo $total_balance + $amount;

                            $updatePayment = "UPDATE payments SET Status = 'returned' WHERE TcKimlik = ? AND SeferTarihi = ? AND Product = ?";
                            $stmtUpdatePayment = $conn->prepare($updatePayment);
                            if ($stmtUpdatePayment === false) {
                                die("Sorgu hazırlanırken bir hata oluştu: " . $conn->error);
                            }

                            // Parametreleri bind etme
                            $stmtUpdatePayment->bind_param("sss", $TcKimlik, $Kalkis_Tarih, $koltukNo);
                            if ($stmtUpdatePayment->execute()) {
                                echo "Sorgu başarıyla çalıştırıldı, ödemeler güncellendi.";
                            } else {
                                echo "Sorgu çalıştırılırken bir hata oluştu: " . $stmtUpdatePayment->error;
                            }

                            $deileteTicket = "DELETE FROM tickets WHERE ticket_id = ? AND tcno = ?";
                            $stmtTicket = $conn->prepare($deileteTicket);
                            if ($stmtTicket === false) {
                                die("Sorgu hazırlanırken bir hata oluştu: " . $conn->error);
                            }
                            $stmtTicket->bind_param("ss", $ticketID, $userTC);
                            if ($stmtTicket->execute()) {
                                return redirect()->to(site_url('index'));
                            } else {
                                echo "Sorgu çalıştırılırken bir hata oluştu: " . $stmt->error;
                            }
                        } else {
                            echo "HATA";
                        }
                    } else {
                        echo "Ödeme sorgulanırken bir hata oluştu: " . $stmtPayment->error;
                    }
                } else {
                    echo "HATA";
                }
            } else {
                echo "Bilet sorgulanırken bir hata oluştu: " . $stmt->error;
            }
        }
    }
}
