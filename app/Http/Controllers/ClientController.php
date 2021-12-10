<?php

namespace App\Http\Controllers;

use App\Models\clients;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index()
    {
        $clients = clients::all();
      return view ('clients.index')->with('clients', $clients);
    }


    public function create()
    {
        return view('clients.create');
    }


    public function store(Request $request)
    {
        $input = $request->all();
        clients::create($input);
        return redirect('client')->with('flash_message', 'Client Addedd!');
    }


    public function show($id)
    {
        $client = clients::find($id);
        return view('clients.show')->with('clients', $client);
    }


    public function edit($id)
    {
        $client = clients::find($id);
        return view('clients.edit')->with('clients', $client);

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
        clients::destroy($id);
        return redirect('client')->with('flash_message', 'Client deleted!');
    }
}
