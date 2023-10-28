<!DOCTYPE html>
<html>
<head>
    <title>Pembayaran Form</title>
</head>
<body>
    <h1>Form Pembayaran</h1>
    <form action="<?php echo base_url('payment/checkout'); ?>" method="post">
        <!-- Isi formulir pembayaran di sini -->
        <input type="submit" value="Bayar Sekarang">
    </form>
</body>
</html>
