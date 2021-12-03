<?php

namespace App\Http\Controllers;

use App\Models\Buyer;
use App\Models\Invoice;
use App\Models\InvoiceDetail;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function index(){
        return view('welcome');
    }
    public function show_product(Request $request){

        
        $invoices= InvoiceDetail::where('invoice_id',$request->id)->get();
        $invoice= Invoice::where('id',$request->id)->get();
        $buyers=Buyer::all();
        return view('welcome',compact('invoices','invoice','buyers'));
    }
}
