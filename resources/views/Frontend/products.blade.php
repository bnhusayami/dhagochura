
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
                <th style="width: 60px;text-align:center" scope="col">likes</th>
                <th style="width: 60px;text-align:center" scope="col">shares</th>
                <th style="width: 60px;text-align:center" scope="col">status</th>
                <th style="width: 60px;text-align:center" scope="col">stock</th>
                <th style="width: 60px;text-align:center" colspan="3">Actions</th>
              </tr>
            </thead>
            <tbody>
                @foreach ( $products as $product )

              <tr>
                <th scope="row">1</th>
                <td style="width: 60px;text-align:center">{{$product->name}}</td>
                <td style="width: 60px;text-align:center">{{$product->price}}</td>
                <td style="width: 60px;text-align:center">{{$product->likes}}</td>
                <td style="width: 60px;text-align:center">{{$product->shares}}</td>
                <td style="width: 60px;text-align:center">{{$product->status}}</td>
                <td style="width: 60px;text-align:center">{{$product->stock}}</td>
                <td style="width: 60px">

                    <a class="btn btn-primary" style="text-decoration: none" href="/product/view/{{$product->id}}">View</a> <a class="btn btn-success" style="text-decoration: none" href="/product/edit/{{$product->id}}">Edit</a> <form action="/product/delete/{{$product->id}}">@csrf<button class="btn btn-danger" style="margin-top: 5px">Delete</button></form>



                </td>

            </tr>
            @endforeach
            </tbody>
          </table>

    </div>

</div>
