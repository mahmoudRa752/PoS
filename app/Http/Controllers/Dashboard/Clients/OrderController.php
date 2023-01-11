<?php

namespace App\Http\Controllers\Dashboard\Clients;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Client;
use App\Models\Category;

class OrderController extends Controller
{
    public function index(){

    }

    public function create(Client $client){
        $categories =Category::with('products')->get();
        return view('dashboard.clients.orders.create',compact('client','categories'));
    }

    public function store(Request $request,Client $client){

    }

    public function edit(Client $client,Order $order){

    }

    public function update(Request $request,Client $client,Order $order){

    }

    public function destroy(Client $client,Order $order){

    }
}
