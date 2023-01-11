@extends('layouts.dashboard.app')

@section('content')

      <div class="container-fluid">


            <div class="card">
              <div class="card-header">
                <h1>Clients 
                  
                </h1>
                <ol class="breadcrumb pull-right">
                    <li><a href="{{route('dashboard.index')}}"><i class="fa fa-dashboard"></i>dashboard</a></li>
                    <li class="active">clients</li>
                </ol>
              </div>
              <div class="card-header">
                <form action="{{route('dashboard.clients.index')}}" method="get">
                    <div class="row">
                        <div class="col-md-4">
                            <input type="text" name="search" class="form-control" placeholder="search" value="{{request()->search}}">
                        </div>
                        <div class="col-md-4 ">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
                            @if(auth()->user()->hasPermission('clients-create'))
                            <a href="{{route('dashboard.clients.create')}}" class="btn btn-primary"><i class="fa fa-plus"></i></a>
                            @else
                            <a href="#" class="btn btn-primary disabled"><i class="fa fa-plus"></i></a>
                            @endif
                        </div>
                    </div>
                </form>
              </div>
               <div>
                   @if($clients->count() < 0)

                        <h2>no data found</h2>

                   @else
                <table class="table table-striped table-hover">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Name</th>
                      <th>Phone Number</th>
                      <th>Address</th>
                      <th>Add Order</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                      @foreach($clients as $client)
                    <tr>
                      <td>{{$client->id}}</td>
                      <td>{{$client->name}}</td>
                      <td>{{$client->phone}}</td>
                      <td>{{$client->address}}</td>
                      @if(auth()->user()->hasPermission('orders-create'))
                      <td><a href="{{route('dashboard.clients.orders.create',$client->id)}}" class="btn btn-primary"><i class="fa fa-cart"></i>add</a></td>
                      @else
                      <td><a href="#" class="btn btn-primary disabled"><i class="fa fa-cart"></i>add</a></td>
                      @endif

                      <td>
                          @if(auth()->user()->hasPermission('clients-update'))
                          <a class="btn btn-info" href="{{route('dashboard.clients.edit',$client->id)}}"><i class="fa fa-edit"></i> edit</a>
                          @else
                          <a class="btn btn-info disabled" href="#"><i class="fa fa-edit"></i> edit</a>
                          @endif

                          @if(auth()->user()->hasPermission('clients-delete'))
                          <form action="{{route('dashboard.clients.destroy',$client->id)}}" method="post" style="display:inline-block">
                            {{ csrf_field() }}
                            {{ method_field('delete') }}
                            <button type="submit" class="btn btn-danger delete"><i class="fa fa-trash"></i> delete</button>
                          </form>
                          @else
                          <button class="btn btn-danger disabled"><i class="fa fa-trash"></i> delete</button>
                          @endif
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
                @endif

            </div>
        
    </div>

                @endsection
