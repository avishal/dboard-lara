<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Matter;
use App\User;
use App\Client;
use App\CaseDate;
use App\Http\Requests\StoreMatterRequest;
use App\Http\Requests\StoreClientRequest;

class MatterController extends Controller
{
    public function index()
    {
        $matters = Matter::get();
        // $user = User::find(4);
        // dd($user->matters()->get());
        return view('matter.index', compact('matters')); 
    }

    public function showNewMatterForm()
    {
        return view('matter.matter-form'); 
    }

    public function actShowAddDateForm()
    {
        $matters = Matter::get();
        return view('matter.matter-add-date-form', compact('matters')); 
    }

    public function actShowEditDateForm($id)
    {
        $matters = Matter::get();
        $caseDate = CaseDate::find($id);
        return view('matter.matter-edit-date-form', compact('matters','caseDate')); 
    }

    /**
     * Store the incoming blog post.
     *
     * @param  StoreMatter  $request
     * @return Response
     */

    public function saveAddDateForm(Request $request)
    {
        // dd($request->all());
        $case_date = new CaseDate($request->all());
        $case_date->save();
        return redirect(route('all-matters'));
    }

    public function matterDateStatusUpdate()
    {
        // dd($request->all());
        $today = date("Y-m-d");
        $case_dates = CaseDate::where('next_date', "<=", $today)->get();
        foreach($case_dates as $case_date)
            $case_date->update(['status' => 1]);

        return redirect(route('all-matters'));
    }
    
    
    public function deleteDate(Request $request)
    {
        $case_date = CaseDate::find($request->id)->delete();
        return redirect(route('all-matters'));
    }

    public function saveUpdateDateForm(Request $request)
    {
        // dd($request->all());
        $case_date = CaseDate::find($request->id);
        $case_date->update($request->all());
        return redirect(route('all-matters'));
    }

    public function store(StoreMatterRequest $request)
    {
        // dd($request->all());
        $matter = new Matter($request->all());
        $matter->save();
        // $user = Client::find(4);
        // $user->matters()->attach($matter->id);
        return redirect(route('all-matters'));

        // return view('matter.index', compact('matters')); 
    }

    public function showAssignmentForm()
    {
        $cases = Matter::get();

        $matters = [];
        foreach ($cases as $case) {
            $matters[$case->id] = $case->case_number."/".$case->year;
        }

        $clients = Client::get();
        return view('matter.matter-user-assignment', compact('matters', 'clients')); 


    }


    public function assignMatterUser(Request $request)
    {
        $matter = Matter::find($request->matter_id);
        $clients = $request->client_id;
        foreach ($clients as $client) {
            $c = Client::find($client);
            $c->matters()->attach($request->matter_id);
            // dd($c->matters()->get());
        }
        return redirect(route('all-matters'));

    }


    public function matterUserAssignments($matter_id)
    {
        $matter = Matter::find($matter_id);
        return view('matter.matter-user-assignment-list', compact('matter'));
    }

    public function update(StoreMatterRequest  $request){}
    public function delete(StoreMatterRequest $request){}

    public function deassignMatterUser(Request $request)
    {
        $client_id = $request->client_id;
        $matter_id = $request->matter_id;

        $matter = Matter::find($matter_id);
        $matter->clients()->detach($client_id);
        // return redirect(route('all-matters'));
        return redirect()->back();
    }
}
