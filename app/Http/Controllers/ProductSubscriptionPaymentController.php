<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductSubscriptionPayment;
class ProductSubscriptionPaymentController extends Controller
{
    public function index(Request $request)
    {
        $productsubsID= $request->route('productsubsID');
        $payments = ProductSubscriptionPayment::where('reference_id',$productsubsID)->where('active' , 1)->get();
      return view ('product_subscription_payment.index')->with('payments', $payments);
    }


    public function create()
    {
        return view('product_subscription_payment.create');
    }


    public function store(Request $request)
    {

        $input = $request->all();
        ProductSubscriptionPayment::create($input);
        return redirect('product-payment')->with('flash_message', 'Client Addedd!');
    }


    public function show($id)
    {
        $payment = ProductSubscriptionPayment::find($id);
        return view('product_subscription_payment.show')->with('payments', $payment);
    }


    public function edit($id)
    {
        $payment = ProductSubscriptionPayment::find($id);

        return view('product_subscription_payment.edit')->with('payments', $payment);

    }


    public function update(Request $request, $id)
    {
        $payment = ProductSubscriptionPayment::find($id);
        $input = $request->all();
        $payment->update($input);
        return redirect('product-payment')->with('flash_message', 'Client Updated!');
    }


    public function destroy($id)
    {
        ProductSubscriptionPayment::destroy($id);
        return redirect('product-payment')->with('flash_message', 'Client deleted!');
    }
}
