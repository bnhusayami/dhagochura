<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css">
</head>
<div style="margin-top: 50px" class="container">
    <div class="row">
    <form method="POST" action="/update/product/{{$data->id}}" enctype="multipart/form-data">
            @csrf
        <div class="form-group">
          <label for="exampleInputEmail1">Name</label>
          <input name="name" value="{{$data->name}}" type="text" class="form-control">

          <div class="form-group">
              <label for="exampleInputPassword1">price</label>
              <input name="price" value="{{$data->price}}" type="number" class="form-control" >
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">stock</label>
                <input name="stock" value="{{$data->stock}}" type="number" class="form-control"  >
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">status</label>
                <input name="status" value="{{$data->status}}" type="text" class="form-control" >
            </div>

            <div class="form-group">
              <label for="exampleInputPassword1">image</label>
              <input name="image" type="file" class="form-control">
            </div>
    <br><br>
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>

    </div>
    </div>
