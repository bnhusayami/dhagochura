
<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css">
</head>
<div style="margin-top: 20px" class="container">

    <div class="row">

        <table class="table">
            <thead>
              <tr>
                <th style="width: 60px;text-align:center" scope="col">#</th>
                <th style="width: 60px;text-align:center" scope="col">Name</th>
                <th style="width: 60px;text-align:center" scope="col">Price</th>
                <th style="width: 60px;text-align:center" scope="col">Address</th>
                <th style="width: 60px;text-align:center" scope="col">Contact No</th>
                <th style="width: 60px;text-align:center" scope="col">Product Name</th>
                <th style="width: 60px;text-align:center" scope="col">Status</th>
                <th style="width: 60px;text-align:center" scope="col">Payment Status</th>
                <th style="width: 60px;text-align:center">Actions</th>
              </tr>
            </thead>
            <tbody>
                @foreach ( $orders as $product )

              <tr>
                <th scope="row">1</th>
                <td style="width: 60px;text-align:center">{{$product->client_name}}</td>
                <td style="width: 60px;text-align:center">{{$product->price}}</td>
                <td style="width: 60px;text-align:center">{{$product->address}}</td>
                <td style="width: 60px;text-align:center">{{$product->contact_no}}</td>
                <td style="width: 60px;text-align:center"><a style="text-decoration: none;" href="/product/view/{{$product->product_id}}">{{$product->product_name}}</a></td>
                @if($product->status == "pending")
                <td style="width: 60px;text-align:center;color:red;font-weight:bold">{{$product->status}}</td>
                @else
                <td style="width: 60px;text-align:center;color:green;font-weight:bold">{{$product->status}}</td>
                @endif
                <td style="width: 60px;text-align:center">{{$product->payment_status}}</td>
                <td style="width: 60px">
                <a href="/change/order/status/{{$product->id}}"><button class="btn btn-primary">Change Status</button></a>
                
              
              </td>
<a href="homeButton {
    padding: 10px 15px;
    background-color: #4caf50;
    color: #ffffff;
    text-decoration: none;
    border-radius: 5px;
    font-size: 16px;
}"

                
            </tr>
            @endforeach
            </tbody>
          </table>

    </div>

</div>
