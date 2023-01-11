@extends('layouts.dashboard.app')

@section('content')

    @include('partials.errors')
    <div class="card card-secondary">
              <div class="card-header">
                <h1 class="mx-auto">Edit User's Data</h2>
              </div>
              <!-- /.card-header -->

              <!-- form start -->
              <form action="{{route('dashboard.users.update',$user->id)}}" method="post">

                @csrf
                @method('put')
                <div class="card-body">
                    <div class="form-group">
                    <label for="first_name">First Name</label>
                    <input type="text" name="first_name" class="form-control" id="first_name" value="{{$user->first_name}}">
                  </div>
                  <div class="form-group">
                    <label for="last_name">Last Name</label>
                    <input type="text" name="last_name" class="form-control" id="last_name" value="{{$user->last_name}}">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" name="email" class="form-control" id="exampleInputEmail1" value="{{$user->email}}">
                  </div>
                  @php
                    $models = ['users','categories','products','clients','orders'];
                    $maps = ['create','read','update','delete'];
                  @endphp
                  <div class="form-group">
                    <label>Permissions</label>
                    <div class="card">
                        <div class="card-header p-0">
                            <ul class="nav nav-pills ml-auto p-2">
                            @foreach($models as $index=>$model)
                            <li class="nav-item"><a class="{{$index==0?'nav-link active':''}}" href="#{{$model}}" data-toggle="tab">{{$model}}</a></li>
                            @endforeach
                            </ul>
                        </div><!-- /.card-header -->
                        <div class="card-body">
                            <div class="tab-content">
                                @foreach($models as $index=>$model)
                                <div class="tab-pane {{$index==0?'active':''}}" id="{{$model}}">
                                    @foreach($maps as $map)
                                    <label><input type="checkbox" name="permissions[]" {{$user->hasPermission($model.'-'.$map)?'checked':''}} value="{{$model .'-'. $map}}"> {{$map}}</label>
                                    @endforeach
                                </div>
                                @endforeach
                            </div>
                            <!-- /.tab-content -->
                        </div><!-- /.card-body -->
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-warning btn-lg"><i class="fa fa-edit"></i> Edit</button>
                </div>
              </form>
            </div>

@endsection
