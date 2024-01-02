<?php

namespace App\Services;

use App\Http\Requests\OrderValidation;
use App\Models\Order;
use App\Models\Product;

class OrderService
{
    public function create(OrderValidation $request)
    {
        $order = Order::query()->create($request->all());
        $exist = Product::query()->whereIn('id', $request->get('products_ids'))->get();

        foreach ($exist as $index => $value) {
            $order->products()->attach($value);
        }

        $result = $order->toArray();
        $result += ['products_ids' => $exist];

        return $result;
    }
}
