<?php

namespace App\Http\Controllers;

use App\Models\clients;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index()
    {
        $clients = clients::where('active' , 1)->get();
        return view ('clients.client_view')->with('clients', $clients);
    }


    public function create()
    {
        return view('clients.client_add_form');
    }


    public function store(Request $request)
    {
        $input = $request->all();
        clients::create($input);
        return redirect('client')->with('flash_message', 'Client Addedd!');
    }

    // not in use
    public function show($id)
    {
        $client = clients::find($id);
        return view('clients.show')->with('clients', $client);
    }


    public function edit($id)
    {
        $client = clients::find($id);
        return view('clients.client_edit_form')->with('clients', $client);

    }


    public function update(Request $request, $id)
    {
        $client = clients::find($id);
        $input = $request->all();
        $client->update($input);
        return redirect('client')->with('flash_message', 'Client Updated!');
    }


    public function destroy($id)
    {
        clients::where('id' , $id)->update([
            'active'=>0
        ]);
        return redirect('client')->with('flash_message', 'Client deleted!');
    }
}
