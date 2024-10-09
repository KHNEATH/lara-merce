<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'category_id',
        'image_url',
        'name',
        'description',
        'unit_price',
        'qty_in_stock'
    ];

    public function index()
{
    // Fetch products and pass to the view
    $products = Product::all(); // Assuming you're using Eloquent ORM

    return view('backends.products.index', compact('products'));
}


    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
    
    public function getTotalPrice($qty)
    {
        return $this -> unit_price * $qty;
    }
}
