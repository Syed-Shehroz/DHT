<?php

namespace App\Http\Controllers;

use App\Models\products;
use Illuminate\Http\Request;
use App\Models\ProductSubscription;

class ProductSubscriptionController extends Controller
{
    public function index(Request $request)
    {
        $clienID = $request->route('clientID');
        $projectID = $request->route('projectID');
        $subcriptions = ProductSubscription::where('project_id',$projectID)->where('active' , 1)->get();

      return view ('product_subscription.index')->with('subcriptions', $subcriptions);
    }


    public function create(Request $request)
    {
        $clienID = $request->route('clientID');
        $projectID = $request->route('projectID');
        $productListing = products::get();
        $data['products'] = $productListing;
        return view('product_subscription.create', $data);
    }


    public function store(Request $request)
    {
        $clienID = $request->route('clientID');
        $projectID = $request->route('projectID');

        $input = $request->all();
        $insertData = [
            'project_id' => $projectID,
            'product_id' => $request->get('product_id'),
            'plan_name' => $request->get('plan_name'),
            'validity' => $request->get('validity'),
            'date_created' => $request->get('date_created'),
            'source' => $request->get('source'),

        ];
        ProductSubscription::insert($insertData);
        return redirect('client/' . $clienID . '/project/' . $projectID .'/product-subs')->with('flash_message', 'P.S Addedd!');
    }


    public function show($id)
    {
        $subcription = ProductSubscription::find($id);
        return view('product_subscription.show')->with('subcriptions', $subcription);
    }


    public function edit(Request $request)
    {
        $productListing = products::get();
        $data['products'] = $productListing;
        $ID = $request->route('id');

        $data['subcription'] = ProductSubscription::find($ID);
        return view('product_subscription.edit', $data);

    }


    public function update(Request $request)
    {
        $projectID = $request->route('projectID');
        $clienID = $request->route('clientID');
        $productsubsID= $request->route('id');
        $subcription = ProductSubscription::find($productsubsID);
        $input = $request->all();
        $subcription->update($input);
        return redirect('client/' . $clienID . '/project/'. $projectID .'/product-subs')->with('flash_message', 'P.S Updated!');
    }


    public function destroy(Request $request)
    {
        $projectID = $request->route('projectID');
        $clienID = $request->route('clientID');
        $productsubsID= $request->route('id');

        ProductSubscription::where('id' , $productsubsID)->update([
            'active'=>0
        ]);
        return redirect('client/' . $clienID . '/project/'. $projectID .'/product-subs')->with('flash_message', 'P.S deleted!');
    }
}
