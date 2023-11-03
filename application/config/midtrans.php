<?php
defined('BASEPATH') or exit('No direct script access allowed');


// File: application/config/midtrans.php
$config['server_key'] = 'SB-Mid-server-OKBa9QyvCPuRIG7ItfaGaAKS'; // Ganti dengan kunci server Midtrans Anda
$config['client_key'] = 'SB-Mid-client-DmsQrl8JsYHCjlJN'; // Ganti dengan kunci klien Midtrans Anda
$config['is_production'] = FALSE; // Ganti dengan TRUE ketika Anda siap untuk produksi


// Set your Merchant Server Key
// \Midtrans\Config::$serverKey = 'SB-Mid-server-OKBa9QyvCPuRIG7ItfaGaAKS';
// // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
// \Midtrans\Config::$isProduction = false;
// // Set sanitization on (default)
// \Midtrans\Config::$isSanitized = true;
// // Set 3DS transaction for credit card to true
// \Midtrans\Config::$is3ds = true;