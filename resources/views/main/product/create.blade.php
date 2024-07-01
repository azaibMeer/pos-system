@extends('layouts.master')
@section('content')
<div class="row">
    <div class="col-xl-6"> 
        <div id="panel-2" class="panel">
            <div class="panel-hdr">
                <h2>
                    Product Add
                </h2>
                <div class="panel-toolbar">
                   <a href="{{url('/product/list')}}" class="btn btn-sm btn-primary waves-effect waves-themed" type="submit">Product List</a>
                </div>
            </div>
            <div class="panel-container show"> 
                <div class="panel-content p-0">
                    <form class="needs-validation" novalidate action="{{url('/product/store')}}" method="post" enctype="multipart/form-data">
                    	@csrf
                        <div class="panel-content">
                            <div class="form-row">
                                <div class="col-md-4 mb-3">
                                    <label class="form-label" for="validationCustom03">Product Name<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Name" required>
                                    <div class="invalid-feedback">
                                        Please provide a valid name.
                                    </div>
                                </div> 
                                <div class="col-md-4 mb-3">
                                    <label class="form-label" for="validationCustomUsername">Product SKU <span class="text-danger">*</span></label> 
                                        <input type="text" class="form-control" id="" name="product_sku" placeholder="SKU" required>
                                        <div class="invalid-feedback">
                                             Please provide a valid address.
                                        </div> 
                                </div>
                                <div class="col-md-4 mb-3">
                                <label class="form-label">Category<span class="text-danger">*</span></label>
                                <select class="select2 form-control w-100" id="" name="category_id">
                                @foreach($categories as $category)    
                                <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                                </select>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label class="form-label" for="validationCustom03">Purchase Price <span class="text-danger">*</span></label>
                                    <input type="number" class="form-control" id="" name="purchase_price" placeholder="Purchase Price" required>
                                    <div class="invalid-feedback">
                                        Please provide a valid contact number.
                                    </div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label class="form-label" for="validationCustomUsername">Retail Price <span class="text-danger">*</span></label> 
                                        <input type="number" class="form-control" id="" name="retail_price" placeholder="Retail Price" required>
                                        <div class="invalid-feedback">
                                             Please provide a valid receipt header.
                                        </div> 
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label class="form-label" for="validationCustom03">Image <span class="text-danger">*</span></label>
                                    <input type="file" class="form-control" id="" name="image" required>
                                        <div class="invalid-feedback">
                                             Please provide a valid receipt header.
                                        </div> 
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label class="form-label" for="validationCustom03">Minimum Stock Alert <span class="text-danger">*</span></label>
                                    <input type="number" class="form-control" id="" name="stock_alert" placeholder="Stock Alert" required>
                                        <div class="invalid-feedback">
                                             Please provide a valid receipt header.
                                        </div> 
                                </div>
                            </div> 
                        </div>
                        <div class="panel-content border-faded border-left-0 border-right-0 border-bottom-0 d-flex flex-row align-items-center justify-content-start">
						    <button class="btn btn-primary" type="submit">Submit</button>
						</div> 
                    </form> 
                </div>
            </div>
        </div> 
    </div> 
</div> 
@endsection
@section('scripts')
@include('scripts.select2')
@endsection
