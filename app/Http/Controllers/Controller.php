<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;


    public function homepage()
    {
        $products = Product::all();
        return view('Frontend.index',[
            'products' => $products
        ]);
    }

    public function order($id)
    {
        if(Auth::user() != NULL)
        {
            $data = Product::find($id);
            return view('Frontend.order',[
                'data' => $data
            ]);
        }
        else{
            return redirect('/login');
        }


    }

    public function vieworders()
    {
        $orders = Order::all();
        return view('Frontend.vieworders',[
            'orders' => $orders
        ]);
    }

    public function admin()
    {
        return view('Frontend.admin');
    }

    public function changeOrderStatus($id)
    {
        $data = Order::find($id);

        if($data->status == "pending")
        {
        $data->status = "delivered";
        $data->save();
        }
        else
        {
            $data->status = "pending";
            $data->save();
        }

        return redirect('/vieworders');
    }


    public function storeOrder(Request $request, $id)
    {
        $request->validate([
            'client_name' => 'required',
            'product_name' => 'required',
            'product_id' => 'required',
            'address' => 'required',
            'user_id' => 'required',
            'contact_no' => 'required',
        ]);

        $data = new Order();
        $data ->client_name = $request->client_name;
        $data ->product_name = $request->product_name;
        $data ->product_id = $request->product_id;
        $data ->address = $request->address;
        $data ->user_id = $request->user_id;
        $data ->contact_no = $request->user_id;
        $data ->price = $request->price;
        $data ->payment_status = $request->payment_status;
        $data ->save();

        $productchange = Product::find($id);
        $productchange->stock = $productchange->stock -1;
        $productchange->save();

        return redirect('/vieworders');

    }


    public function like($id)
    {
        $data = Product::find($id);
        $data->likes = $data->likes +1;
        $data->save();

        return redirect('/');
    }

    public function index()
    {
        $product = product::all();
        return view('Frontend.products',[
            'products'=>$product
        ]);
    }

    public function view($id)
    {
        $product = Product::find($id);
        return view('Frontend.viewproducts',[
            'products'=>  $product
        ]);
    }

    public function status($id)
    {
        $data = Product::find($id);

        if($data->status == 'available')
        {
            $data->status = "not available";
            $data->save();
        }
        else{

            $data->status = "available";
            $data->save();
        }

        return redirect('/product/view/'.$id);
    }

    public function addProduct()
    {

        return view('Frontend.addproduct');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'price' => 'required|string',
            'stock' => 'required|string',
            'status' => 'required|string',
        ]);

        if($file = $request->file('image')){
            $request->validate([[
                'image' => 'mimes:png,jpg,png'
            ]]);

            $image = $request->file('image');
            $imageextension = $image->getClientOriginalExtension();
            $fullname = time().'.'.$imageextension;
            $result = $image->storeAs('images/products',$fullname);
        }



        $data = new Product();
        $data->name = $request->name;
        $data->price = $request->price;
        $data->stock = $request->stock;
        $data->status = $request->status;
        $data->image = $fullname ?? NULL;
        $data->save();

        return redirect('/')->with('message','added succesfully');
    }

    public function edit($id)
    {
        $data = Product::find($id);
        return view('Frontend.editproduct',[
            'data' => $data
        ]);
    }

    public function update(Request $request , $id)
    {
        $data = Product::find($id);

        if($file = $request->file('image')){
            $request->validate([[
                'image' => 'mimes:png,jpg,png'
            ]]);

            $image = $request->file('image');
            $imageextension = $image->getClientOriginalExtension();
            $fullname = time().'.'.$imageextension;
            $result = $image->storeAs('images/products',$fullname);
        }
        else{
            $fullname = $data->image;
        }



        $data->name = $request->name;
        $data->price = $request->price;
        $data->stock = $request->stock;
        $data->status = $request->status;
        $data->image = $fullname ?? NULL;
        $data->save();

        return redirect('/viewproduct');

        
        
    }
   
}
