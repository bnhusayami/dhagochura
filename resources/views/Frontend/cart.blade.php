<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<table>
        <thead>
            <tr>
                <th>Product Id</th>
                <th>Product Name</th>
                <th>Product Price</th>
                <th>Quantity</th>
                <th>Totoal</th>
                <th>Action</th>
            </tr>
        </thead>
        @if($cartItems)
            @foreach($cartItems as $item)
        <tbody>
           
           
            <tr>
                <td>{{$item->product->id}}</td>
                <td>{{$item->product->name}}</td>
                <td>{{$item->product->price}}</td>
                <td>{{$item->quantity}}</td>
                <td>{{$item->quantity * $item->product->price}}</td>
                <td>
                    <form action="/checkout" method="post">
                        @csrf
                        <input type="text" placeholder="enter your name" name="client_name">
                        <input type="number" placeholder="enter your phone number" name="client_no">
                        <input type="hidden" name="cart_id" value="{{$item->id}}">
                        <input type="hidden" name="product_id" value="{{$item->product->id}}">
                        <input type="hidden" name="product_name" value="{{$item->product->name}}">
                        <input type="hidden" name="product_price" value="{{$item->product->price}}">
                        <input type="hidden" name="product_quantity" value="{{$item->product->quantity}}">
                        <input type="hidden" name="product_total" value="{{$item->quantity * $item->product->price}}">
                  <button class="btn btn-primary">Checkout</button>
                    </form>
                </td>   
            
            </tr>
           
            <!-- Add more rows as needed -->
        </tbody>
        @endforeach
             @endif
    </table>
</body>
</html>