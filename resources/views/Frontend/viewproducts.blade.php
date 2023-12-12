<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css">
</head>

<div style="margin: 100px" class="container">

    <div class="row">
        <div class="card" style="width: 18rem;">
            <img style="height: 100px" class="card-img-top" src="/images/products/{{$products->image}}" alt="Card image cap">
            <div class="card-body">
              <h5 class="card-title">Name : {{$products->name}}</h5>
            <ul class="list-group list-group-flush">
              <li class="list-group-item">Price : {{ $products->price }}</li>
              <li class="list-group-item">Status : {{$products->status}}</li>
              <li class="list-group-item">stock : {{$products->stock}}</li>
              <li class="list-group-item">Likes : {{$products->likes}}</li>
              <li class="list-group-item">Share : {{$products->shares}}</li>
            </ul>
            <div class="card-body">
              <a href="/change-status/{{$products->id}}" class="card-link"><button class="btn btn-success">Change Status</button></a>
              {{-- <a href="#" class="card-link">Another link</a> --}}
            </div>
          </div>

    </div>

</div>
