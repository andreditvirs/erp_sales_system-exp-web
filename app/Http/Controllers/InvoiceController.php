<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public function index()
    {
        return view('invoice.index');
    }

    public function store(Request $request)
    {
        $year = date('y', strtotime($request->date));
        $month = sprintf("%02d", $request->date );;
        $invoice = new Invoice;
        
        foreach($request->items_code as $key => $item){
            $detail_trans = new DetailTrans;
            $detail_trans->header_id = $header_trans->id;
            $detail_trans->item_code = $request->items_code[$key];
            $detail_trans->price = $request->items_price[$key];
            $detail_trans->qty = $request->items_qty[$key];
            $detail_trans->save();
        }
        
        return redirect()->route('sales.index');
    }
}
