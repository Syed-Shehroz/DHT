<?php

namespace App\Http\Controllers;

use App\Models\clients;
use App\Models\products;
use App\Models\ProductSubscription;
use App\Models\ProductSubscriptionPayment;
use App\Models\projects;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index(Request $request)
    {
        $projects = projects::with('getClient')->where('active', 1)->get()->toArray();
        return view('projects.project_view')->with('projects', $projects);
    }

    public function create(Request $request)
    {
        $data['projects'] = projects::select('id', 'project_name')->where('active', 1)->get()->toArray();

        $data['clients'] = clients::select('id', 'client_name')->where('active', 1)->get()->toArray();

        $data['products'] = products::select('id', 'name')->where('active', 1)->get()->toArray();

        $data['ProductSubscription'] = ProductSubscription::select('id', 'plan_name')->where('active', 1)->get()->toArray();

        return view('projects.project_add_form', $data);
    }

    public function store(Request $request)
    {

        $inserProjectData = [
            'project_name' => $request->get('project_name'),
            'client_id' => $request->get('client_id'),
            'combined_plan' => $request->get('combined_plan'),
            'plan_description' => $request->get('project_description'),
            'cost' => $request->get('project_cost'),
            'recurring' => $request->get('project_recurring'),
            'frequency_amount' => $request->get('project_frequency_amount'),
            'frequency_unit' => $request->get('project_frequency_unit'),
            'validity' => $request->get('project_validity'),
            'source' => $request->get('project_source'),
            'project_date' => $request->get('project_date')
        ];

        $projectID = projects::insertGetId($inserProjectData);

        // Product Subscription
        $productIDs = $request->input('product_id') ;
        $plan_names = $request->get('product_plan_name');
        $plan_descriptions = $request->get('product_description');
        $costs = $request->get('product_cost');
        $recurrings = $request->get('product_recurring');
        $frequency_amounts = $request->get('product_frequency_amount');
        $frequency_units = $request->get('product_frequency_unit');
        $validitys = $request->get('product_validity');
        $sources = $request->get('product_source');
        $date_createds = $request->get('date_created');

        $ProductSubscriptionIDs = [];
        foreach ($productIDs as $key => $val) {
            $insertProductSubData = [
                'project_id' => $projectID,
                'product_id' => $val,
                'plan_name' => $plan_names[$key],
                'plan_description' => $plan_descriptions[$key],
                'cost' => $costs[$key],
                'recurring' => $recurrings[$key],
                'frequency_amount' => $frequency_amounts[$key],
                'frequency_unit' => $frequency_units[$key],
                'validity' => $validitys[$key],
                'source' => $sources[$key],
                'date_created' => $date_createds[$key],
            ];
            $ProductSubscriptionIDs[] = ProductSubscription::insertGetId($insertProductSubData);
        }


        if($request->get('combined_plan') == 1){ // for type Project

            $insertProjectPayment = [
                'reference_id' => $projectID,
                'type' => 'PROJECT',
                'amount' => $request->get('payment_amount'), // $request->get('project_cost'),
                'frequency_amount' => $request->get('payment_frequency_amount'),
                'frequency_unit' => $request->get('payment_frequency_unit'),
                'plan' => $request->get('payment_plan'),
                'validity' => $request->get('payment_validity'),
                'status' => $request->get('payment_status'),
            ];

            ProductSubscriptionPayment::insert($insertProjectPayment);

        }else{

            foreach($ProductSubscriptionIDs as $key => $ProductSubscriptionID){
                $insertProjectPayment = [
                    'reference_id' => $ProductSubscriptionID,
                    'type' => 'PRODUCT',
                    'amount' => $request->get('payment_amount'), // $costs[$key],
                    'frequency_amount' => $request->get('payment_frequency_amount'),
                    'frequency_unit' => $request->get('payment_frequency_unit'),
                    'plan' => $request->get('payment_plan'),
                    'validity' => $request->get('payment_validity'),
                    'status' => $request->get('payment_status'),
                ];

                ProductSubscriptionPayment::insert($insertProjectPayment);
            }

        }


        return redirect('project')->with('flash_message', 'Project Addedd!');
    }

    public function edit($projectID)
    {
        $data['projects'] = projects::find($projectID);
        $data['ProductSubscription'] = ProductSubscription::select('id', 'plan_name')->where('active', 1)->get()->toArray();

        $data['clients'] = clients::select('id', 'client_name')->where('active', 1)->get()->toArray();
        $data['products'] = products::select('id', 'name')->where('active', 1)->get()->toArray();
        $data['ProductSubscription'] = ProductSubscription::select('id', 'plan_name')->where('active', 1)->get()->toArray();
        return view('projects.project_edit_form', $data);
    }

    public function update(Request $request)
    {
        $projectID = $request->input("project_id");
        $updateColumn = [
            "project_name" => $request->input("project_name"),
            "client_id" => $request->input("client_id"),
            "combined_plan" => $request->input("combined_plan"),
            'plan_description' => $request->input('plan_description'),
            "project_date" =>$request->input("project_date")
        ];
        $project = projects::where('id', $projectID)->update($updateColumn);
        return redirect('project')->with('flash_message', 'Project Updated!');
    }

    public function destroy(Request $request)
    {
        $projectID = $request->route('id');

        projects::where('id', $projectID)->update([
            'active'=>0
        ]);
        return redirect('/project')->with('flash_message', 'Project deleted!');
    }
}
