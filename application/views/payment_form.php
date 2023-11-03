<!DOCTYPE html>
<!-- <html>
<head>
    <title>Pembayaran Form</title>
</head>
<body>
    <h1>Form Pembayaran</h1>
    <form action="<?php echo base_url('payment/checkout'); ?>" method="post">
        <input type="submit" value="Bayar Sekarang">
    </form>
</body>
</html> -->

<!DOCTYPE html>
<html>
<head>
    <title>Pembayaran Form</title>
</head>
<body>
    <h1>Form Pembayaran</h1>
    <button id="pay-button">Bayar Sekarang</button>
    <div id="result-json"></div>

    <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="SB-Mid-client-DmsQrl8JsYHCjlJN"></script>
    <script type="text/javascript">
        document.getElementById('pay-button').onclick = function () {
            snap.pay('<?= $snapToken ?>', {
                onSuccess: function (result) {
                    document.getElementById('result-json').innerHTML = JSON.stringify(result, null, 2);
                },
                onPending: function (result) {
                    document.getElementById('result-json').innerHTML = JSON.stringify(result, null, 2);
                },
                onError: function (result) {
                    document.getElementById('result-json').innerHTML = JSON.stringify(result, null, 2);
                }
            });
        };
    </script>
</body>
</html>
