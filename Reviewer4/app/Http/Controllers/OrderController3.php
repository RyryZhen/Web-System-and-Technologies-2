<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderController3 extends Controller
{
    // ---------- SHOW FORM METHODS ----------
    public function customerForm() {
        return view('customer-form');
    }

    public function itemForm() {
        return view('item-form');
    }

    public function orderForm() {
        return view('order-form');
    }

    public function orderDetailsForm() {
        return view('orderdetails-form');
    }

    // ---------- PROCESS FORM METHODS WITH VALIDATION ----------
    public function customerSubmit(Request $request) {
        $validated = $request->validate([
            'id' => 'required|numeric',
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
        ]);

        return view('customer', $validated);
    }

    public function itemSubmit(Request $request) {
        $validated = $request->validate([
            'itemNo' => 'required|numeric',
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
        ]);

        return view('item', $validated);
    }

    public function orderSubmit(Request $request) {
        $validated = $request->validate([
            'custId' => 'required|numeric',
            'custName' => 'required|string|max:255',
            'orderNo' => 'required|numeric',
            'date' => 'required|date',
        ]);

        return view('order', $validated);
    }

    public function orderDetailsSubmit(Request $request) {
        $validated = $request->validate([
            'transNo' => 'required|numeric',
            'orderNo' => 'required|numeric',
            'itemId' => 'required|numeric',
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'qty' => 'required|numeric|min:1',
        ]);

        return view('orderdetails', $validated);
    }
}