<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client;
use App\User;
use App\Http\Requests\StoreClientRequest;

class ClientController extends Controller
{
    public function index()
    {
        $clients = Client::get();
        // $user = User::find(4);
        // dd($user->matters()->get());
        return view('client.index', compact('clients')); 
    }

    public function showNewClientForm()
    {
        return view('client.add-form'); 
    }

    /**
     * Store the incoming blog post.
     *
     * @param  StoreMatter  $request
     * @return Response
     */

    public function store(StoreClientRequest $request)
    {
        $client = new Client($request->all());
        $client->save();
        return redirect(route('all-clients'));

        // return view('matter.index', compact('matters')); 
    }

    public function delete($id)
    {
        Client::delete($id);
        return redirect()->back();
    }

    

}
