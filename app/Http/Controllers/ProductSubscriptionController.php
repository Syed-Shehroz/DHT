<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductSubscription;

class ProductSubscriptionController extends Controller
{
    public function index(Request $request)
    {
        $projectID = $request->route('projectID');
        $subcriptions = ProductSubscription::where('project_id',$projectID)->get();
        // dd($subcriptions);
        // $subcriptions = ProductSubscription::all();
      return view ('product_subscription.index')->with('subcriptions', $subcriptions);
    }


    public function create()
    {
        return view('product_subscription.create');
    }


    public function store(Request $request)
    {
        $input = $request->all();
        ProductSubscription::create($input);
        return redirect('product-subs')->with('flash_message', 'P.S Addedd!');
    }


    public function show($id)
    {
        $subcription = ProductSubscription::find($id);
        return view('product_subscription.show')->with('subcriptions', $subcription);
    }


    public function edit($id)
    {
        $subcription = ProductSubscription::find($id);
        return view('product_subscription.edit')->with('subcriptions', $subcription);

    }


    public function update(Request $request, $id)
    {
        $subcription = ProductSubscription::find($id);
        $input = $request->all();
        $subcription->update($input);
        return redirect('product-subs')->with('flash_message', 'P.S Updated!');
    }


    public function destroy($id)
    {
        ProductSubscription::destroy($id);
        return redirect('product-subs')->with('flash_message', 'P.S deleted!');
    }
}
