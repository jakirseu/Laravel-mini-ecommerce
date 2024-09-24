<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Routing\Controller as BaseController;
use App\Models\Category;

class ProductController extends BaseController
{
    public function __construct()
    {
        $this->middleware(['auth', 'role:admin'], ['except' => ['index', 'show']]);
    }

    public function index()
    {
        $products = Product::query()
            ->orderBy('created_at', 'desc')
            ->paginate(10);
        return view("product-index", ['products' => $products]);
    }

    public function create()
    {
       // return view('create');
       $categories = Category::all();

       return view('create', compact('categories'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => ['required', 'string'],
            'price' => ['required', 'numeric'],
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'category_id' => 'required|exists:categories,id', // new feild for adding category
        ]);

             // Handle the image upload if there is an image
             $imagePath = null;
             if ($request->hasFile('image')) {
                 $imagePath = $request->file('image')->store('images/products', 'public'); // Store the image in the public disk
             }


        $product =  Product::create([
            'title' => $request->input('title'),
            'price' => $request->input('price'),
            'image' => $imagePath,
            'category_id' => $data['category_id'], // creating product with category
        ]);

        return to_route('product.show', $product);
    }

    public function show(Product $product)
    {
        return view("single-product", ['product' => $product]);
    }

    public function edit(string $id)
    {
        //
    }


    public function update(Request $request, string $id)
    {
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return to_route('product.index', $product);
    }
}
