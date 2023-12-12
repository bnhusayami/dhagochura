<div style="margin-top: 50px" class="container">
   <?php
   $user = auth()->user();
   ?>
    <div class="row">
    <head>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css">
    </head>

    <div class="row">
        <div class="card" style="width: 18rem;">
            <img style="height: 100px" class="card-img-top" src="/images/products/{{$data->image}}" alt="Card image cap">
            <div class="card-body">
              <h5 class="card-title">Name : {{$data->name}}</h5>
            <ul class="list-group list-group-flush">
              <li class="list-group-item">Price : {{ $data->price }}</li>
              <li class="list-group-item">Status : {{$data->status}}</li>
              <li class="list-group-item">stock : {{$data->stock}}</li>
              <li class="list-group-item">Likes : {{$data->likes}}</li>
              <li class="list-group-item">Share : {{$data->shares}}</li>
            </ul>

          </div>

    </div>

    <form method="POST" action="/store/order/{{$data->id}}" enctype="multipart/form-data">
            @csrf
        <div class="form-group">
          <label for="exampleInputEmail1">Your Name</label>
          <input name="client_name" type="text" class="form-control" required>

          <input name="product_name" type="text" value="{{$data->name}}" class="form-control" hidden>
          <input name="product_id" type="text" value="{{$data->id}}" class="form-control" hidden>
          <input name="price" type="text" value="{{$data->price}}" class="form-control" hidden>

          @if($user != NULL)
          <input name="user_id" type="text" value="{{$user->id}}" class="form-control" hidden>
            @endif

          <div class="form-group">
              <label for="exampleInputPassword1">Address</label>
              <input name="address" type="text" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Contact Number</label>
                <input name="contact_no" type="number" class="form-control"  required>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Payment</label><br><br>
                <select name="payment_status" id="payment_status" required>
                    <option value=""></option>
                    <option value="cash_on_delivery">Cash On Delivery</option>
                    <option value="esewa" disabled>Esewa // currently N/A</option>
                </select>
            </div>

            <br><br>

          <button type="submit" class="btn btn-primary">Submit</button>

          <br><br><br><br>
        </form>

    </div>
    </div>
