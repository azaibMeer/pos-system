@extends('layouts.master')
@section('content')
<div class="row">
    <div class="col-xl-12">
        <div id="panel-1" class="panel">
            <div class="panel-hdr">
                <h2>
                    Product List
                </h2>
                <div class="panel-toolbar">
                    <a href="{{url('/product/add')}}" class="btn btn-sm btn-primary waves-effect waves-themed" type="submit">Product Add</a> 
                </div>
            </div>
            <div class="panel-container show">
                <div class="panel-content">
                <table id="dt-basic-example" class="table table-hover table-bordered  w-100">
                    <thead class="bg-primary-600">
                        <tr>
                            
                            <th>Product Code</th>
                            <th>Name</th>
                            <th>Category</th>
                            <th>Cost price</th>
                            <th>Retail Price</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($products as $product)
                        <tr>
                            <td>{{$product->sku_code}}</td>
                            <td>{{$product->name}}</td>
                            <td>{{$product->category_id}}</td>
                            <td>{{$product->retail_price}}</td>
                            <td>{{$product->purchase_price}}</td>
                            <td>{{$product->status}}</td>
                            <td>action</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                   
                </div>
            </div>
        </div>
    </div>
</div>

@endsection



