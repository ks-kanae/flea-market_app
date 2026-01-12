<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\Category;
use App\Http\Requests\ExhibitionRequest;

class ProductController extends Controller
{
    public function create()
    {
        $categories = Category::all();
        return view('sell', compact('categories'));
    }

    public function store(ExhibitionRequest $request)
    {
        $path = $request->file('image')->store('product_images', 'public');

        $product = Product::create([
            'user_id' => Auth::id(),
            'name' => $request->name,
            'brand' => $request->brand,
            'description' => $request->description,
            'price' => $request->price,
            'condition' => $request->condition,
            'image_path' => $path,
        ]);

        $product->categories()->sync($request->categories);

        return redirect('/')->with('success', '商品を出品しました！');
    }
}
