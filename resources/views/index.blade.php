
<!DOCTYPE html>
<html lang="en">
@include('partials.head')
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            @php
                $i = 0;
            @endphp
            @for($i = 0; $i < 12; $i++)
            @php
                $price = rand(10000,100000);
            @endphp
            <div class="col-lg-4 mb-3">
                <div class="card">
                    <div class="card-header">
                        <p class="fw-bold text-center">Item {{$i}}</p>
                    </div>
                    <div class="card-body text-center">
                        <p>Harga: {{number_format($price,0,',','.')}}</p>
                    </div>
                    <div class="card-footer">
                        <a href="/checkout/{{$price}}/Item {{$i}}" class="btn btn-primary w-100">Buy Now</a>
                    </div>
                </div>
            </div>
            @endfor
        </div>
    </div>
    @include('partials.script')
</body>
</html>