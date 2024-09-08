<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Routing\Controller as BaseController;

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
        return view('create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => ['required', 'string'],
            'price' => ['required', 'numeric']
        ]);

        $product = Product::create($data);

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
