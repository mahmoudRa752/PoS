@extends('layouts.dashboard.app')

@section('content')

@include('partials.errors')
    <div class="card card-primary">
              <div class="card-header">
                <h1 class="mx-auto">Create New Category</h2>
                <ol class="breadcrumb pull-right">
                    <li class="active"><a href="{{route('dashboard.index')}}"><i class="fa fa-dashboard"></i>dashboard</a></li>
                </ol>
              </div>
              <!-- /.card-header -->

              <!-- form start -->
              <form action="{{route('dashboard.categories.store')}}" method="post">
                @csrf

                <div class="card-body">
                    <div class="form-group">
                    <label for="first_name">Name</label>
                    <input type="text" name="name" class="form-control" id="first_name" placeholder="Enter The Name">
                  </div>

                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary btn-lg"><i class="fa fa-plus"></i> Add</button>
                </div>
              </form>
            </div>

@endsection
