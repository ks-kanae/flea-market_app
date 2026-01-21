<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Purchase;
use App\Http\Requests\PurchaseRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class PurchaseController extends Controller
{
    public function show(Product $item)
    {
        if ($item->is_sold || $item->user_id === Auth::id()) {
            abort(404);
        }

        $user = Auth::user();

        $address = session("purchase_address.{$item->id}", [
            'postcode' => $user->profile->postcode ?? '',
            'address'  => $user->profile->address ?? '',
            'building' => $user->profile->building ?? '',
        ]);

        return view('purchase', [
            'product'  => $item,
            'postcode' => $address['postcode'],
            'address'  => $address['address'],
            'building' => $address['building'],
        ]);
    }

    public function store(PurchaseRequest $request, Product $item)
    {
        if ($item->is_sold || $item->user_id === Auth::id()) {
            abort(404);
        }

        $user = Auth::user();

        $address = session("purchase_address.{$item->id}", [
            'postcode' => $user->profile->postcode,
            'address'  => $user->profile->address,
            'building' => $user->profile->building,
        ]);

        Purchase::create([
            'user_id' => Auth::id(),
            'product_id' => $item->id,
            'payment_method' => $request->payment_method,
            'postcode' => $address['postcode'],
            'address' => $address['address'],
            'building' => $address['building'],
        ]);

        $item->update(['is_sold' => true]);

        session()->forget('purchase_address');

        return redirect('/')->with('success', '購入が完了しました');
    }
}
