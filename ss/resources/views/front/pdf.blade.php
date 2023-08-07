
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order '.$order->id.'</title>
    <style>
        body {
            margin: 0;
            line-height: 2em;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        .table-header{
            text-transform: uppercase;
            letter-spacing: 1.5px;
        }
        tbody > tr {
            margin-left: 20px;
        }
    </style>
</head>
<body>
    <p>Dato: {{date('Y-m-d')}}</p>
    <div>
        <b>Order status: {{$status[$order->status]}}</b>
    </div>
    <div>
        <b>Order ID: {{$order->id}}</b>
    </div>
    <div>
        <table class="table table-hover">
            <thead>
              <tr class="table-header">
                <th scope="col"></th>
                <th scope="col">Product name</th>
                <th scope="col">Price x count</th>
                <th scope="col">Total</th>
              </tr>
            </thead>
            @foreach ($order->products as $product)
            <tbody>
              <tr>
                <th scope="row"></th>
                <td>{{ $product['title'] }}</td>
                <td>{{ $product['price'] }} &#8364;
                    x
                    {{ $product['count'] }}</td>
                <td>{{ $product['total'] }} &#8364;</td>
              </tr>
            </tbody>
            @endforeach
          </table>

          <div>
            <h3></h3>
          </div>
    </div>
</body>
</html>