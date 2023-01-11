@extends('layouts.dashboard.app')

@section('content')

      <div class="container-fluid">


            <div class="card">
              <div class="card-header">
                <h1>Categories <small> ( {{ $categories->total() }} )</small> </h1>
                <ol class="breadcrumb pull-right">
                    <li><a href="{{route('dashboard.index')}}"><i class="fa fa-dashboard"></i>dashboard</a></li>
                    <li class="active">categories</li>
                </ol>
              </div>
              <div class="card-header">
                <form action="{{route('dashboard.categories.index')}}" method="get">
                    <div class="row">
                        <div class="col-md-4">
                            <input type="text" name="search" class="form-control" placeholder="search" value="{{request()->search}}">
                        </div>
                        <div class="col-md-4 ">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
                            @if(auth()->user()->hasPermission('categories-create'))
                            <a href="{{route('dashboard.categories.create')}}" class="btn btn-primary"><i class="fa fa-plus"></i></a>
                            @else
                            <a href="#" class="btn btn-primary disabled"><i class="fa fa-plus"></i></a>
                            @endif
                        </div>
                    </div>
                </form>
              </div>
               <div>
                   @if($categories->count() < 0)

                        <h2>no data found</h2>

                   @else
                <table class="table table-striped table-hover">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Name</th>
                      <th>Items N.</th>
                      <th>Related Products</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                      @foreach($categories as $category)
                    <tr>
                      <td>{{$category->id}}</td>
                      <td>{{$category->name}}</td>
                      <td>{{$category->products->count()}}</td>
                      <td>
                          <a href="{{route('dashboard.products.index',['category_id'=>$category->id])}}" class="btn btn-info btn-sm">Show</a>
                      </td>

                      <td>
                          @if(auth()->user()->hasPermission('categories-update'))
                          <a class="btn btn-info" href="{{route('dashboard.categories.edit',$category->id)}}"><i class="fa fa-edit"></i> edit</a>
                          @else
                          <a class="btn btn-info disabled" href="#"><i class="fa fa-edit"></i> edit</a>
                          @endif

                          @if(auth()->user()->hasPermission('categories-delete'))
                          <form action="{{route('dashboard.categories.destroy',$category->id)}}" method="post" style="display:inline-block">
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
        {{ $categories->links() }}
    </div>

                @endsection
