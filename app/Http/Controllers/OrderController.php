<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function show()
    {
        $orders = Order::all();
        return view('orders', ['orders' => $orders]);
    }

    public function showOrderForm(){
        return view('order');
    }

    public function store(Request $request)
    {
        $order = Order::all();
        $validated = $request->validate([
            'dishes' => 'required|string|min:1',
            'table_number' => 'integer|min:1',
        ]);
        Order::create([
                'dishes' => $validated['dishes'],
                'table_number' => $validated['table_number'],
            ]);
        return redirect('/orders')->with('success', 'Заказ успешно оформлен');
    }

    public function accept(Order $order){
        $order->update(['status' => 'принят']);
        return redirect()->back()->with('success', 'Заказ принят.');
    }

    public function cook(Order $order){
        $order->update(['status' => 'приготовлен']);
        return redirect()->back()->with('success', 'Заказ приготовлен.');
    }

    public function complete(Order $order)
    {
        $order->update(['status' => 'завершен']);
        return redirect()->back()->with('success', 'Заказ завершен.');
    }
}
