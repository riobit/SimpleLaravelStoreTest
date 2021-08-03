<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\User;
use App\Models\OrderDetails;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // ordering some items
    public function store(Request $request)
    {
        //just basic add transaction
        //todo transaction scope
        $order = new Order;
        $order->userId = $request->userId;
        $order->save();

        foreach ($request->items as $item){
            $orderDetail = new OrderDetails;
            $orderDetail->orderId = $order->id;
            $orderDetail->itemId = $item;
            $orderDetail->save();
        }
        return $order;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        $result = OrderDetails::Join('orders', 'orders.id', '=', 'orderDetails.orderId')
                                ->join('items', 'items.id', '=', 'orderDetails.itemId')
                                ->select(
                                    'orders.id',
                                    'items.name',
                                    'items.code',
                                    'items.price',
                                    'orders.userId',
                                    'orders.created_at')
                                ->where('orders.id', '=', $order->id)
                                ->get();

        return $result;
    }
}
