<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Client;

class ClientController extends Controller
{
    public function index(Request $request){
        $clients = Client::when($request->search,function($query) use($request){
            return $query->where('name','like','%'.$request->search.'%')
            ->orWhere('phone','like','%'.$request->search.'%')
            ->orWhere('address','like','%'.$request->search.'%');
        })->paginate(10);
        return view('dashboard.clients.index',compact('clients'));
    }

    public function create(){
        return view('dashboard.clients.create');
    }

    public function store(Request $request){
        $request->validate([
            'name'=>'required',
            'phone'=>'required',
            'address'=>'required',
        ]);

        Client::create($request->all());

        session()->flash('success','Client Added Successfully');
        return redirect()->route('dashboard.clients.index');
    }

    public function edit(Client $client){
        
        return view('dashboard.clients.edit',compact('client'));  
    }

    public function update(Request $request , Client $client){
        $request->validate([
            'name'=>'required',
            'phone'=>'required',
            'address'=>'required',
        ]);

        $client->update($request->all());

        session()->flash('success','Client Updated Successfully');
        return redirect(route('dashboard.clients.index'));
    }

    public function destroy(Client $client){
        $client->delete();

        session()->flash('success','Client Deleted Successfully');
        return back();
    }
}

