<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order {{$order->id}}</title>
    <style>
        body {
            margin: 0;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        td {
            height: 200px;
            text-align: center;
            font-size: 30px;
            letter-spacing: 3px;
            color: white;
        }

    </style>
</head>
<body>
    <div>
        <b> Order status: {{$status[$order->status]}} </b>
     </div>
     <div>
         <b>Order ID:{{$order->id}}</b>
     </div>
    <div>
        @foreach ($order->products as $product)
        <li>
            <div>{{$product['title']}}</div>
            <div>{{$product['price']}} eur
            x
            {{$product['count']}}</div>
            <b>Total:  {{$product['total']}}</b>
        </li>
        @endforeach
    </div>
</body>


</html>