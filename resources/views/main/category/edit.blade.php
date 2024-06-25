@extends('layouts.master')
@section('content')
<div class="subheader mb-2">
<h1 class="subheader-title">
    Edit Category
</h1>
</div>
<div class="row">
<div class="col-md-6"> 
    <div id="panel-2" class="panel">
        <div class="panel-container show"> 
            <div class="panel-content p-0">
                <form method="post" action="{{ url('category/update', ['category' => $category->id]) }}">
                    @csrf
                    <div class="panel-content">
                        <div class="form-row">
                            <div class="col-md-12 mb-3">
                                <label class="form-label">Category <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" placeholder="Enter Category" 
                                value="{{$category->name}}" name="name" required>
                            </div>
                        </div>
                        <div class="form-group">
                        <label class="form-label" for="example-select">Status</label>
                        <select class="form-control" id="example-select" name="status">
                            <option value="1" {{$category->status == 1 ? 'selected' : ''}} >Active</option>
                            <option value="0" {{$category->status == 0 ? 'selected' : ''}} >Inactive</option>
                        </select>
                        </div>
                        <button class="btn btn-primary ml-auto" type="submit">Update</button>
                    </div>
                    
                </form>
                
            </div>
        </div>
    </div> 
</div> 
</div> 

@endsection