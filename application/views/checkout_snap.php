<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="SB-Mid-client-xlYwVpHKCJDeQgzn"></script>
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
  <title>Check Out</title>
</head>

<body>
  <h1>test</h1>

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <div class="container">
    <div class="row">
      <div class="col-4 col-md-4">
        <form id="payment-form" method="post" action="<?= base_url() ?>/snap/finish">
          <input type="hidden" name="result_type" id="result-type" value="">
          <input type="hidden" name="result_data" id="result-data" value="">
          <div class="form-group">
            <label for="exampleInputEmail1">Nama</label>
            <input type="text" name="nama" id="nama" class="form-control" aria-describedby="emailHelp" placeholder="Enter nama">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Email</label>
            <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">harga</label>
            <input type="text" name="harga" class="form-control" id="harga" aria-describedby="emailHelp" placeholder="Enter Harga">
          </div>
          <button class="btn btn-primary" id="pay-button">Bayar Sekarang</button>
        </form>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-body my-3">
            <table class="table table-bordered table-responsive" id="example1">
              <thead class="text-center" style="color: white; background-color: dodgerblue;">
                <tr>
                  <th>No</th>
                  <th>ID ORDER</th>
                  <th>Nama Pelanggan</th>
                  <th>Email Pelanggan</th>
                  <th>Status Transaksi</th>
                  <th>Total yang Dibayar</th>
                  <th>Bank</th>
                  <th>Virtual Acoount</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $no = 1;
                foreach ($getTransaksi as $key => $value) { ?>
                  <tr class="text-center">
                    <td style="vertical-align: middle;"><?= $no++ ?></td>
                    <td style="vertical-align: middle;"><?= $value->id_order ?></td>
                    <td style="vertical-align: middle;"><?= $value->nama ?></td>
                    <td style="vertical-align: middle;"><?= $value->email ?></td>
                    <td style="vertical-align: middle;"><span class="badge badge-warning"><?= $value->status_message ?></span></td>
                    <td style="vertical-align: middle;">Rp. <?= number_format($value->gross_amount, 0, '', '.') ?></td>
                    <td style="vertical-align: middle;"><?= strtoupper($value->bank) ?> </td>
                    <td style="vertical-align: middle;"><?= $value->va_number ?></td>
                  </tr>
                <?php }  ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script type="text/javascript">
    $('#pay-button').click(function(event) {
      event.preventDefault();
      $(this).attr("disabled", "disabled");


      var nama = $("#nama").val();
      var kelas = $("#email").val();
      var harga = $("#harga").val();
      $.ajax({
        type: 'POST',
        url: '<?= base_url() ?>/snap/token',
        data: {
          nama: nama,
          kelas: kelas,
          harga: harga
        },
        cache: false,

        success: function(data) {
          //location = data;

          console.log('token = ' + data);

          var resultType = document.getElementById('result-type');
          var resultData = document.getElementById('result-data');

          function changeResult(type, data) {
            $("#result-type").val(type);
            $("#result-data").val(JSON.stringify(data));
            //resultType.innerHTML = type;
            //resultData.innerHTML = JSON.stringify(data);
          }

          snap.pay(data, {

            onSuccess: function(result) {
              changeResult('success', result);
              console.log(result.status_message);
              console.log(result);
              $("#payment-form").submit();
            },
            onPending: function(result) {
              changeResult('pending', result);
              console.log(result.status_message);
              $("#payment-form").submit();
            },
            onError: function(result) {
              changeResult('error', result);
              console.log(result.status_message);
              $("#payment-form").submit();
            }
          });
        }
      });
    });
  </script>
  <!-- <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script> -->
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>