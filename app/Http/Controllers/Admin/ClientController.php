<?php

namespace App\Http\Controllers\Admin;

use App\Client;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Mail\NewClient;
use Illuminate\Support\Facades\Mail;
class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.client.index', ['clients' => Client::paginate(5)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('admin.client.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
          $validatedData = $request->validate($this->validationRules());

        $client = Client::create($validatedData);
        Mail::to($client->email)->send(new NewClient($client));
        return redirect()->route('clients.show', $client)->with('storeClient', "client has been added successfuly");
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {
        return view('admin.client.show', ['client' => $client]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $client)
    {
        return view('admin.client.edit', ['client' => $client]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Client $client)
    {
        $validatedData = $request->validate($this->validationRules());

        $client->update($validatedData);
      
        return redirect()->route('clients.show', $client)->with('updateClient', "client has been updated successfuly");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client)
    {
        //
        $client->delete();
        return redirect()->route('clients.index')->with('deleteClient', "client has been deleted successfuly");
    }
    private function validationRules()
    {
        return [
           'nom' => 'required|min:2',
            'prenom' => 'required|min:2',
            'telephone' => 'required|min:11|numeric',
            'email' => 'required|email',
            'adresse' => 'required',
        ];
    }
}
