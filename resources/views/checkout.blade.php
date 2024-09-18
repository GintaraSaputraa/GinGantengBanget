<?php
 
\Midtrans\Config::$serverKey = env('MIDTRANS_SERVER_KEY');
\Midtrans\Config::$isProduction = false;
\Midtrans\Config::$isSanitized = true;
\Midtrans\Config::$is3ds = true;

$params = array(
    'transaction_details' => array(
        'order_id' => rand(),
        'gross_amount' => $price,
    )
);

$snapToken = \Midtrans\Snap::getSnapToken($params);

?>

<!DOCTYPE html>
<html lang="en">
@include('partials.head')
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-lg-7">
                <div class="card">
                    <div class="card-body">
                        <h2 class="text-center">Konfirmasi Checkout</h2>
                        <h1 class="text-center">Harga: <span class="text-primary">Rp {{number_format($price,0,',','.')}}</span></h1>
                    </div>
                    <div class="card-footer">
                        <a href="javascript:;" class="btn btn-primary w-100" id="pay-button">Checkout Sekarang</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('partials.script')
    <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{env('MIDTRANS_CLIENT_KEY')}}"></script>
        <script type="text/javascript">
          document.getElementById('pay-button').onclick = function(){
            // SnapToken acquired from previous step
            snap.pay('<?=$snapToken?>', {
              // Optional
              onSuccess: function(result){
                /* You may add your own js here, this is just example */ document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
              },
              // Optional
              onPending: function(result){
                /* You may add your own js here, this is just example */ document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
              },
              // Optional
              onError: function(result){
                /* You may add your own js here, this is just example */ document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
              }
            });
          };
        </script>
</body>
</html>