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
              <form action="{{route('dashboard.products.store')}}" method="post" enctype="multipart/form-data">
                @csrf

                <div class="card-body">
                    <div class="form-group">
                        <label>Select Category</label>
                        <select name="category_id">
                            <option value="">all categories</option>
                            @foreach($categories as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" class="form-control" id="name" placeholder="Enter The Name">
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea name="description" class="form-control" id="description"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="image">Image</label>
                        <input type="file" name="image" class="form-control" id="image">
                    </div>
                    <div class="form-group">
                        <img src="{{asset('uploads/products-images/default.jpg')}}" style="width:100px;" class="img-thumbnail image-preview">
                    </div>
                    <div class="form-group">
                        <label for="purchase_price">Purchase Price</label>
                        <input type="text" name="purchase_price" class="form-control" id="first_name" placeholder="Enter The Purchase Price">
                    </div>
                    <div class="form-group">
                        <label for="sale_price">Sale Price</label>
                        <input type="text" name="sale_price" class="form-control" id="sale_price" placeholder="Enter The Sale Price">
                    </div>
                    <div class="form-group">
                        <label for="stock">Stoch</label>
                        <input type="text" name="stock" class="form-control" id="stock" placeholder="Enter The Number Of Piece In Stock">
                    </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary btn-lg"><i class="fa fa-plus"></i> Add</button>
                </div>
              </form>
            </div>

@endsection
