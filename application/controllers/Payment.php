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
}
