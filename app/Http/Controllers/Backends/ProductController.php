<?php
namespace App\Http\Controllers\Backends;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Models\Product;
use App\Models\Category;

class ProductController extends Controller
{
    public function index() {
        $products = Product::all();
        return view('backends.products.index')->with('products', $products);
    }

    public function create() {
        $categories = Category::pluck('title', 'id');
        return view('backends.products.create')->with('categories', $categories);
    }

    public function store(Request $request) {
        // Validate the incoming request data
        $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'price' => 'required|numeric',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $productData = $request->all();
        $file = $request->file('image');

        if ($file) {
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('public/products', $filename);
            $productData['image_url'] = 'storage/products/' . $filename;
        }

        Product::create($productData);
        return redirect(route('backends.products.index'));
    }
    
    public function edit(Product $product) {
        $categories = Category::pluck('title', 'id');
        return view('backends.products.edit', [
            'product' => $product,
            'categories' => $categories
        ]);
    }

    public function update(Product $product, Request $request) {
        // Validate the incoming request data
        $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'price' => 'required|numeric',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $productData = $request->all();
        $file = $request->file('image');

        if ($file) {
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('public/products', $filename);
            $productData['image_url'] = 'storage/products/' . $filename;

            // Delete old image if it exists
            if (File::exists(public_path($product->image_url))) {
                File::delete(public_path($product->image_url));
            }
        } else {
            // Prevent overwriting the image_url if no new image is uploaded
            unset($productData['image_url']);
        }

        $product->update($productData);
        return redirect(route('backends.products.index'));
    }

    public function show(Product $product) {
        return view('backends.products.show', [
            'product' => $product
        ]);
    }

    public function destroy(Product $product) {
        $imageUrl = $product->image_url;
        $product->delete();

        // Delete old image if it exists
        if (File::exists(public_path($imageUrl))) {
            File::delete(public_path($imageUrl));
        }

        return redirect(route('backends.products.index'));
    }
}
