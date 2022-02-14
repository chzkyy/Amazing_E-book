<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function rent($id)
    {
        Order::where('account_id', Auth::user()->id)
            ->where('ebook_id', $id)
            ->create([
                'account_id' => Auth::user()->id,
                'ebook_id'   => $id,
            ]);
        return redirect()->route('get.cart');
    }

    public function getCart()
    {
        return view('pages.cart', [
            'title' => 'Cart',
            'order' => Order::where('account_id', Auth::user()->id)->get()
        ]);
    }

    public function delete($id)
    {
        Order::find($id)->delete();   
        return back();
    }

    public function submit()
    {
        Order::where('account_id', Auth::user()->id)->delete();
        return redirect()->route('order.thx');
    }

    public function getThankyou()
    {
        return view('pages.thankyou');
    }
}
