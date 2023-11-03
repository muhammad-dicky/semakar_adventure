<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Payment extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->config->load('midtrans', TRUE);
        require_once APPPATH . 'libraries/Mid/Midtrans.php';

        \Midtrans\Config::$serverKey = 'SB-Mid-server-OKBa9QyvCPuRIG7ItfaGaAKS';
        \Midtrans\Config::$isProduction = false;
        \Midtrans\Config::$isSanitized = true;
        \Midtrans\Config::$is3ds = true;
    }

    public function index() {
        // $this->load->view('payment_form');
    

    // public function checkout() {
        $params = array(
            'transaction_details' => array(
                'order_id' => rand(),
                'gross_amount' => 10000,
            )
        );

        $snapToken = '';
        try {
            $snapToken = \Midtrans\Snap::getSnapToken($params);
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }

        $data['snapToken'] = $snapToken;
        $this->load->view('payment_form', $data);
        // $this->load->view('payment_popup', $data);
    // }

}
<<<<<<< HEAD


//  // Kustomisasi callback URL
//  $custom_callback_url = site_url('checkout/finish');

//  // Konfigurasi notifikasi Midtrans
//  $this->midtrans->config->notificationUrl = $custom_callback_url;

//  // Buat transaksi
//  $transaction = array(
//      'transaction_details' => $transaction_details,
//      'item_details'       => $items,
//      'customer_details'    => $customer_details
//  );

//  try {
//      $snapToken = $this->midtrans->createSnapToken($transaction);
//      $data['snap_token'] = $snapToken;
//      $this->load->view('checkout', $data);
//  } catch (Exception $e) {
//      echo $e->getMessage();
//  }
// }

// public function finish() {
//  // Proses setelah pembayaran selesai
//  $result = json_decode(file_get_contents('php://input'), true);
//  // Lakukan sesuatu dengan data transaksi, misalnya menyimpan ke database
//  // Misalnya, Anda bisa menggunakan $result['transaction_status'] untuk menentukan apakah transaksi sukses atau gagal.
// }



=======
>>>>>>> d7d97e22d69308f7dd9dc1a6d86ecc0872f485e8
}
