<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    // Customer view
    public function customer($id, $name, $address)
    {
        return view('customer', compact('id', 'name', 'address'));
    }

    // Item view
    public function item($itemNo, $name, $price)
    {
        return view('item', compact('itemNo', 'name', 'price'));
    }

    // Order view
    public function order($custId, $custName, $orderNo, $date)
    {
        return view('order', compact('custId', 'custName', 'orderNo', 'date'));
    }

    // Order Details view
    public function orderDetails($transNo, $orderNo, $itemId, $name, $price, $qty)
    {
        return view('orderdetails', compact('transNo','orderNo','itemId','name','price','qty'));
    }
}