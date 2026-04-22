<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderController2 extends Controller
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

    // ---------- PROCESS FORM METHODS ----------
    public function customerSubmit(Request $request) {
        $data = $request->only('id','name','address');
        return view('customer', $data);
    }

    public function itemSubmit(Request $request) {
        $data = $request->only('itemNo','name','price');
        return view('item', $data);
    }

    public function orderSubmit(Request $request) {
        $data = $request->only('custId','custName','orderNo','date');
        return view('order', $data);
    }

    public function orderDetailsSubmit(Request $request) {
        $data = $request->only('transNo','orderNo','itemId','name','price','qty');
        return view('orderdetails', $data);
    }

}




//     public function customerSubmit(Request $request)
//     {
//         // -----------------------------
//         // 1️⃣ Using only(): Get specific fields
//         // -----------------------------
//         $onlyData = $request->only('id', 'name', 'address');
//         // $onlyData will contain only the specified fields
//         // Example: ['id'=>101, 'name'=>'John', 'address'=>'NYC']

//         // -----------------------------
//         // 2️⃣ Using all(): Get all input data
//         // -----------------------------
//         $allData = $request->all();
//         // $allData contains everything submitted in the form
//         // Be careful: includes extra fields like hidden inputs or CSRF token

//         // -----------------------------
//         // 3️⃣ Using input(): Get a single field
//         // -----------------------------
//         $id = $request->input('id'); // gets 'id' field
//         $name = $request->input('name', 'No Name'); 
//         // 'No Name' is default if 'name' is missing

//         // -----------------------------
//         // 4️⃣ Using has() and filled(): Check existence or value
//         // -----------------------------
//         if ($request->has('address')) {
//             // The 'address' field exists in the request
//             $address = $request->input('address');
//         }

//         if ($request->filled('address')) {
//             // The 'address' field exists AND is not empty
//             $address = $request->input('address');
//         }

//         // -----------------------------
//         // 5️⃣ Using merge(): Add or modify data before processing
//         // -----------------------------
//         $request->merge(['status' => 'active']);
//         $mergedData = $request->only('id','name','address','status');
//         // Now mergedData includes an extra field 'status' => 'active'

//         // -----------------------------
//         // 6️⃣ Using except(): Remove specific fields
//         // -----------------------------
//         $cleanData = $request->except('_token'); // removes CSRF token
//         // $cleanData now has all fields except '_token'

//         // -----------------------------
//         // Choose which data to pass to the view
//         // -----------------------------
//         // For example, we’ll pass the $onlyData to the view
//         return view('customer', $onlyData);
//     }
// }
// }