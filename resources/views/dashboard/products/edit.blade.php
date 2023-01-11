@extends('layouts.dashboard.app')

@section('content')

@include('partials.errors')
    <div class="card card-warning">
              <div class="card-header">
                <h1 class="mx-auto">Edit Product</h2>
                <ol class="breadcrumb pull-right">
                    <li class="active"><a href="{{route('dashboard.index')}}"><i class="fa fa-dashboard"></i>dashboard</a></li>
                </ol>
              </div>
              <!-- /.card-header -->

              <!-- form start -->
              <form action="{{route('dashboard.products.update',$product->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                {{ method_field('PUT') }}
                <div class="card-body">
                    <div class="form-group">
                        <label>Select Category</label>
                        <select name="category_id">
                            <option value="">all categories</option>
                            @foreach($categories as $category)
                                <option value="{{$category->id}}" {{$product->category_id == $category->id ? 'selected' : ''}}>{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" class="form-control" id="name" value="{{$product->name}}">
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea name="description" class="form-control" id="description">{{$product->description}}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="image">Image</label>
                        <input type="file" name="image" class="form-control" id="image">
                    </div>
                    <div class="form-group">
                        <img src="{{ $product->image_path }}" style="width:100px;" class="img-thumbnail image-preview">
                    </div>
                    <div class="form-group">
                        <label for="purchase_price">Purchase Price</label>
                        <input type="text" name="purchase_price" value="{{$product->purchase_price}}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="sale_price">Sale Price</label>
                        <input type="text" name="sale_price" class="form-control" value="{{$product->sale_price}}">
                    </div>
                    <div class="form-group">
                        <label for="stock">Stock</label>
                        <input type="text" name="stock" class="form-control" id="stock" value="{{$product->stock}}">
                    </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary btn-lg"><i class="fa fa-edit"></i> Edit</button>
                </div>
              </form>
            </div>

@endsection

