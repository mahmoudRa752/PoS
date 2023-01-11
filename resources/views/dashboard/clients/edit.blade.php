@extends('layouts.dashboard.app')

@section('content')

    @include('partials.errors')
    <div class="card card-warning">
              <div class="card-header">
                <h1 class="mx-auto">Edit Client's Data</h2>
              </div>
              <!-- /.card-header -->

              <!-- form start -->
              <form action="{{route('dashboard.clients.update',$client->id)}}" method="post">

                @csrf
                @method('put')
                <div class="card-body">
                    <div class="form-group">
                      <label for="name">Name</label>
                      <input type="text" name="name" class="form-control" id="name" value="{{$client->name}}">
                    </div>
                    <div class="form-group">
                      <label>Phone Number</label>
                      <input type="text" name="phone" class="form-control" value="{{$client->phone}}">
                    </div>
                    <div class="form-group">
                      <label>Address</label>
                      <input type="text" name="address" class="form-control" value="{{$client->address}}">
                    </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary btn-lg"><i class="fa fa-edit"></i> Edit</button>
                </div>
              </form>
            </div>

@endsection
