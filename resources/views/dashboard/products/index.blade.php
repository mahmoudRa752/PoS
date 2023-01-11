@extends('layouts.dashboard.app')

@section('content')

      <div class="container-fluid">


            <div class="card">
              <div class="card-header">
                <h1>Products <small> ( {{ $products->total() }} )</small> </h1>
                <ol class="breadcrumb pull-right">
                    <li><a href="{{route('dashboard.index')}}"><i class="fa fa-dashboard"></i>dashboard</a></li>
                    <li class="active">products</li>
                </ol>
              </div>
              <div class="card-header">
                <form action="{{route('dashboard.products.index')}}" method="get">
                    <div class="row">
                        <div class="col-md-4">
                            <input type="text" name="search" class="form-control" placeholder="search" value="{{request()->search}}">
                        </div>
                        <div class="col-md-4">
                            <select name="category_id" class="form-control">
                                <option value="">all categories</option>
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-4 ">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
                            @if(auth()->user()->hasPermission('products-create'))
                            <a href="{{route('dashboard.products.create')}}" class="btn btn-primary"><i class="fa fa-plus"></i></a>
                            @else
                            <a href="#" class="btn btn-primary disabled"><i class="fa fa-plus"></i></a>
                            @endif
                        </div>
                    </div>
                </form>
              </div>
               <div>
                   @if($products->count() < 0)

                        <h2>no data found</h2>

                   @else
                <table class="table table-striped table-hover">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Name</th>
                      <th>Description</th>
                      <th>Image</th>
                      <th>Purchase Price</th>
                      <th>Sale Price</th>
                      <th>Profit P.</th>
                      <th>Stock</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                      @foreach($products as $product)
                    <tr>
                      <td>{{$product->id}}</td>
                      <td>{{$product->name}}</td>
                      <td>{{$product->description}}</td>
                      <td><img src="{{ $product->image_path }}" class="img-thumbnail" style="width:100px;height:100px;" alt=""></td>
                      <td>{{$product->purchase_price}}</td>
                      <td>{{$product->sale_price}}</td>
                      <td>{{$product->profit_percent}} %</td>
                      <td>{{$product->stock}}</td>
                      <td>
                          @if(auth()->user()->hasPermission('products-update'))
                          <a class="btn btn-info" href="{{route('dashboard.products.edit',$product->id)}}"><i class="fa fa-edit"></i> edit</a>
                          @else
                          <a class="btn btn-info disabled" href="#"><i class="fa fa-edit"></i> edit</a>
                          @endif

                          @if(auth()->user()->hasPermission('products-delete'))
                          <form action="{{route('dashboard.products.destroy',$product->id)}}" method="post" style="display:inline-block">
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
        {{ $products->links() }}
    </div>

                @endsection
