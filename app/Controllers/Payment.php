<?php

namespace App\Controllers;


class Payment extends BaseController
{
    public function index()
    {
        return view('payment'); // app/Views/payment.php dosyasını yükle
    }

    public function process_payment()
    {
        // Stripe API ve diğer sınıfları dahil edin
        require_once('vendor/autoload.php');
        require_once(APPPATH . 'Models/Payments.php');
        require_once(APPPATH . 'Models/Balances.php');

        // Stripe için API anahtarını ayarlayın
        \Stripe\Stripe::setApiKey('sk_test_51Oo8fYGwjXKy93pLK0VPzEzLDwJ7QhFwNkhy75zGGQSjpjNmZXPYREmuOWyiaQ0WGHciGgcOYSH1eJ4ldweSjl5g00GA3qVfDs');

        // POST verilerini filtreleyin
        $POST = filter_var_array($_POST, FILTER_SANITIZE_STRING);
        $first_name = $POST['first_name'];
        $last_name = $POST['last_name'];
        $email = $POST['email'];
        $token = $POST['stripeToken'];

        // Ürün bilgilerini ayarlayın (örnek olarak)
        $chargeData = array(
            "amount" => 10000, // 100.00 USD
            "currency" => "usd",
            "description" => "Intro To React Course",
        );

        // Kullanıcı TC Kimlik Numarasını belirtin (örnek olarak)
        $userTC = "11111";
        // GetCustomerBalance sınıfını kullanarak müşteri bakiyesini alın
        $balance = new \App\Models\GetCustomerBalance(); // Namespaced sınıfı kullanın
        $customer = $balance->getBalance($userTC);
        $total_balance = $customer->TotalBalance * 100; // Stripe için tutarı cent cinsinden ayarlayın

        $amount = $chargeData["amount"];
        $sonuc = "";
        if ($total_balance - $amount < 0) {
        header('Location: paymentError.php');
        }else{
            // Müşteri Oluşturma
            $customer = \Stripe\Customer::create(array(
                "email" => $email,
                "source" => $token
            ));
            $chargeData["customer"] =  $customer->id;
            $charge = \Stripe\Charge::create($chargeData);

            $newBalance = array(
                "TotalBalance" => ($total_balance - $amount) / 100,
                "TcKimlik" => $userTC,
            );
            $updateBalanceStatus=$balance->UpdateTotal($newBalance);
            if($updateBalanceStatus){
            $paymentData=[
                "TcKimlik"=>$userTC,
                "AdiSoyadi"=>$first_name . " " . $last_name,
                "email"=>$email,
                "StripeID"=>$charge->id,
                "Product"=>$charge->description,
                "Amount"=> $charge->amount / 100,
                'Currency' => $charge->currency,
                'Status' => $charge->status,
            ];
            // Add Payment Information
            $payment = new \App\Models\Payment();
            $payment->addPayment($paymentData);
            return redirect()->to(site_url('success?tid='.$charge->id.'&product='.$charge->description));
            }else{
                return redirect()->to(site_url('paymentError.php'));
            }
        }
    }
}
