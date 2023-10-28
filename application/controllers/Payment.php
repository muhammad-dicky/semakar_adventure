<?php

defined('BASEPATH') or exit('No direct script access allowed');

// File: application/controllers/Payment.php
class Payment extends CI_Controller {
    public function index() {
        $this->load->view('payment_form');
    }

    public function checkout() {
        $this->load->library('midtrans');

        

        // Set up transaction details
        $params = array(
            'transaction_details' => array(
                'order_id' => rand(),
                'gross_amount' => 10000,
            )
        );
        
        $snapToken = \Midtrans\Snap::getSnapToken($params);

        // Load the payment pop-up view with the Snap Token
        $data['snapToken'] = $snapToken;
        $this->load->view('payment_popup', $data);
    }
}


