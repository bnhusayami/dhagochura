<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;


    protected $appends = ['image_url'];

    protected $table = "product";

    protected $fillable = ['name','price','image','stock','staus'];


    public function getImageUrlAttribute()
    {
        return is_null($this->image) ? NULL : asset('storage/images/products/'.$this->image);
    }
    public function toArray()
    {
        return [
            'id'    => $this->id,
            'name'  => $this->name,
            'price' => $this->price,
            // Add other fields as needed
        ];
    }

    public function cart()
    {
        return $this->belongsTo(Cart::class,'product_id','id');
    }
}
