@extends('layouts.dashboard.app')

@section('content')

@include('partials.errors')
    <div class="card card-primary">
              <div class="card-header">
                <h1 class="mx-auto">Create New User</h2>
                <ol class="breadcrumb">
                    <li class="active"><a href="{{route('dashboard.index')}}"><i class="fa fa-dashboard"></i>dashboard</a></li>
                </ol>
              </div>
              <!-- /.card-header -->

              <!-- form start -->
              <form action="{{route('dashboard.users.store')}}" method="post" enctype="multipart/form-data">

                @csrf

                <div class="card-body">
                    <div class="form-group">
                    <label for="first_name">First Name</label>
                    <input type="text" name="first_name" class="form-control" id="first_name" placeholder="Enter first name">
                  </div>
                  <div class="form-group">
                    <label for="last_name">Last Name</label>
                    <input type="text" name="last_name" class="form-control" id="last_name" placeholder="Enter last name">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                  </div>

                  <div class="form-group">
                    <label for="image">Image</label>
                    <input type="file" name="image" class="form-control" id="image">
                  </div>

                  <div class="form-group">
                    <img class="image" src="{{asset('uploads/users-images/default.png')}}" style="width:100px;" class="img-thumbnail image-preview">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Enter Password">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword2">Confirm Password</label>
                    <input type="password" name="password_confirmation" class="form-control" id="exampleInputPassword2" placeholder="Enter Password">
                  </div>
                  @php
                    $models = ['users','categories','products','clients','orders'];
                    $maps = ['create','read','update','delete'];
                  @endphp
                  <div class="form-group">
                    <label>Permissions</label>
                    <div class="card">
                        <div class="card-header p-0">
                            <ul class="nav nav-tabs ml-auto p-2">
                            @foreach($models as $index=>$model)
                            <li class="{{$index==0?'active':''}}"><a href="#{{$model}}" data-toggle="tab">{{$model}}</a></li>
                            @endforeach
                            </ul>
                        </div><!-- /.card-header -->
                        <div class="card-body">
                            <div class="tab-content">
                                @foreach($models as $index=>$model)
                                <div class="tab-pane {{$index==0?'active':''}}" id="{{$model}}">
                                    @foreach($maps as $map)
                                    <label><input type="checkbox" name="permissions[]" value="{{$model .'-'. $map}}"> {{$map}}</label>
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
                  <button type="submit" class="btn btn-primary btn-lg"><i class="fa fa-plus"></i> Add</button>
                </div>
              </form>
            </div>

@endsection
