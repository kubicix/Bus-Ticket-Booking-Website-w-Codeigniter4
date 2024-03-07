<?php

namespace App\Controllers;


class Payment extends BaseController
{
    protected $pid = null;
    public function index()
    {
        $data['pid'] = $this->request->getVar('pid');
        return view('payment', $data);
    }

    public function process_payment()
    {
        // Stripe API ve diğer sınıfları dahil etme
        require_once('vendor/autoload.php');
        require_once(APPPATH . 'Models/Payments.php');
        require_once(APPPATH . 'Models/Balances.php');
        $session = session();
        $pid = $this->request->getPost('pid');
        //Kullanıcı Login Olmuş mu?
        if($session->has('auth_user')){
            //İşlem yapılacak ürünün ID değeri doğru olarak geldi mi?
            if($pid !== null && $pid !== '')
            {
                $auth_user = $session->get('auth_user');
                // Kullanıcı TC Kimlik Numarası
                $userTC = $auth_user['TcKimlik'];
                // Stripe için API anahtarını ayarlayın
                \Stripe\Stripe::setApiKey('sk_test_51Oo8fYGwjXKy93pLK0VPzEzLDwJ7QhFwNkhy75zGGQSjpjNmZXPYREmuOWyiaQ0WGHciGgcOYSH1eJ4ldweSjl5g00GA3qVfDs');
        
                // POST verilerini filtreleyin
                $POST = filter_var_array($_POST, FILTER_SANITIZE_STRING);
                $first_name = $POST['first_name'];
                $last_name = $POST['last_name'];
                $email = $POST['email'];
                $token = $POST['stripeToken'];
        
                // Gelen ID değerine göre ürün bilgilerini bul
                $conn = new \mysqli("localhost", "root", "", "bus");
                if ($conn->connect_error) {
                    die("Veritabanına bağlanılamadı: " . $conn->connect_error);
                } else {
                    echo "Veritabanına başarıyla bağlandı.\n";
                }
                //SQL sorgusu
                $sql = "SELECT tickets.*, seferler.* FROM tickets JOIN seferler ON seferler.otobus_plaka=tickets.otobus_plaka and tickets.kalkis_tarih=seferler.sefer_tarih WHERE ticket_id = ?";
                $stmt = $conn->prepare($sql);
                if ($stmt === false) {
                    die("Sorgu hazırlanırken bir hata oluştu: " . $conn->error);
                }
                // PID parametresini bind etme
                $stmt->bind_param("i", $pid); // "i" parametresi integer olduğunu belirtir
                // Sorguyu çalıştırma
                if ($stmt->execute()) {
                    // Sonuçları alma
                    $result = $stmt->get_result();
                    $paymentInfo=array();
                    // Sonuçları listeleme
                    while ($row = $result->fetch_assoc()) {
                        $paymentInfo[] = array(
                            "TcKimlik" => $userTC,
                            "AdiSoyadi" =>  $first_name . " ". $last_name,
                            "email" => $email,
                            "StripeID" => "",
                            "Product" => $row['koltuk_no'],
                            "Amount" => $row['sefer_fiyat'],
                            "Currency" => "try",
                            "İlkDurak" => $row['kalkis_yeri'],
                            "SonDurak" => $row['varis_yeri'],
                            "SeferTarihi" => $row["sefer_tarih"],
                        );
                    }
                    print_r($paymentInfo);
                } else {
                    echo "Sorgu çalıştırılırken bir hata oluştu: " . $stmt->error;
                }
                $stmt->close();
                $conn->close();
        
                //Müşterinin mevcut bakiyesini alma
                $balance = new \App\Models\GetCustomerBalance();
                $customer = $balance->getBalance($userTC);
                $total_balance = $customer->TotalBalance * 100; // Stripe kuruş sistemine çevirme
        
                $amount = $paymentInfo[0]["Amount"];
                if ($total_balance - ($amount * 100) < 0) {
                header('Location: paymentError.php');
                }
                else{
                    // Müşteri Oluşturma
                    $customer = \Stripe\Customer::create(array(
                        "email" => $email,
                        "source" => $token
                    ));
                    
                    $chargeData = array(
                        "amount" => $amount * 100 ,
                        "currency" => "try",
                        "description" => $paymentInfo[0]['Product'],
                        "customer" => $customer->id,
                    );
                    $charge = \Stripe\Charge::create($chargeData);
        
                    $newBalance = array(
                        "TotalBalance" => ($total_balance - $amount) / 100,
                        "TcKimlik" => $userTC,
                    );
                    $updateBalanceStatus=$balance->UpdateTotal($newBalance);
                    if($updateBalanceStatus){
                    $payment = new \App\Models\Payment();
                    $paymentInfo[0]["Status"]=$charge->status;
                    $paymentInfo[0]["StripeID"]=$charge->id;
                    $payment->addPayment($paymentInfo[0]);
                    
                    return redirect()->to(site_url('success?tid='.$charge->id.'&product='.$paymentInfo[0]['Product']));
                    }else{
                        return redirect()->to(site_url('paymentError.php'));
                    }
                }
            }else{
                echo "Girili Bilet Bilgisi Bulunamadı";
            }
        }else{
            echo "Kullanıcı oturumu bulunamadı.";
        }
    }
}
