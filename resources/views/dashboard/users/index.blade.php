@extends('layouts.dashboard.app')

@section('content')

      <div class="container-fluid">


            <div class="card">
              <div class="card-header">
                <h1>@lang('site.users') <small> ( {{ $users->total() }} )</small> </h1>
                <ol class="breadcrumb pull-right">
                    <li><a href="{{route('dashboard.index')}}"><i class="fa fa-dashboard"></i>dashboard</a></li>
                    <li class="active">users</li>
                </ol>
              </div>
              <div class="card-header">
                <form action="{{route('dashboard.users.index')}}" method="get">
                    <div class="row">
                        <div class="col-md-4">
                            <input type="text" name="search" class="form-control" placeholder="search" value="{{request()->search}}">
                        </div>
                        <div class="col-md-4 ">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
                            @if(auth()->user()->hasPermission('users-create'))
                            <a href="{{route('dashboard.users.create')}}" class="btn btn-primary"><i class="fa fa-plus"></i></a>
                            @else
                            <a href="#" class="btn btn-primary disabled"><i class="fa fa-plus"></i></a>
                            @endif
                        </div>
                    </div>
                </form>
              </div>
               <div>
                   @if($users->count() < 0)

                        <h2>no data found</h2>

                   @else
                <table class="table table-striped table-hover">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>First Name</th>
                      <th>Last Name</th>
                      <th>Email</th>
                      <th>Image</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                      @foreach($users as $user)
                    <tr>
                      <td>{{$user->id}}</td>
                      <td>{{$user->first_name}}</td>
                      <td>{{$user->last_name}}</td>
                      <td>{{$user->email}}</td>
                      <td><img src="{{ $user->image_path }}" class="img-thumbnail" style="width:100px;" alt=""></td>
                      <td>
                          @if(auth()->user()->hasPermission('users-update'))
                          <a class="btn btn-info" href="{{route('dashboard.users.edit',$user->id)}}"><i class="fa fa-edit"></i> edit</a>
                          @else
                          <a class="btn btn-info disabled" href="#"><i class="fa fa-edit"></i> edit</a>
                          @endif

                          @if(auth()->user()->hasPermission('users-delete'))
                          <form action="{{route('dashboard.users.destroy',$user->id)}}" method="post" style="display:inline-block">
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
        {{ $users->links() }}
    </div>

                @endsection
