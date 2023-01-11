@extends('layouts.dashboard.app')

@section('content')

@include('partials.errors')
    <div class="card card-primary">
        <div class="card-header">
            <h1 class="mx-auto">Add Order</h2>
            <ol class="breadcrumb pull-right">
                <li class="active"><a href="{{route('dashboard.index')}}"><i class="fa fa-dashboard"></i>dashboard</a></li>
            </ol>
        </div>
        <div class="row">
        <!-- /.card-header -->
        <div class="col-md-6">
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title m-3">Categories</h3>
                </div>
                <div class="box-body">

                    @foreach($categories as $category)
                        <div class="panel-group">
                            <div class="panel panel-info">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" href="#{{str_replace(' ','-',$category->name)}}">{{$category->name}}</a>
                                    </h4>
                                </div>
                                <div id="{{str_replace(' ','-',$category->name)}}" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        @if($category->products->count() > 0)
                                            <table class="table table-hover">
                                                <tr>
                                                    <th>Name</th>
                                                    <th>Stock</th>
                                                    <th>Price</th>
                                                    <th>Add</th>
                                                </tr>
                                                @foreach($category->products as $product)
                                                    <tr>
                                                        <td>{{$product->name}}</td>
                                                        <td>{{$product->stock}}</td>
                                                        <td>{{$product->sale_price}}</td>
                                                        <td>
                                                            <a href=""
                                                            id="product-{{$product->id}}"
                                                            data-name="{{$product->name}}"
                                                            data-id="{{$product->id}}"
                                                            data-price="{{$product->sale_price}}"
                                                            class="btn btn-sm btn-success add-product-btn">
                                                                <i class="fa fa-plus"></i>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </table>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title m-3">Orders</h3>
                </div>
                <div class="box-body">
                    <table class="table table-hover table-light">
                        <tr>
                            <td>Product</td>
                            <td>Quantity</td>
                            <td>Price</td>
                        </tr>
                        <tbody class="order-list">
                        </tbody>
                    </table>
                </div>
                <div class="box-footer">
                    <h2 class="box-title m-3">Total : <span class="total-price"></span></h3>
                </div>
                <button class="btn btn-primary btn-block btn-lg disabled" id="add-order"><i class="fa fa-plus"></i> Add Order</button>
            </div>
            
        </div>
        </div>
    </div>

@endsection
