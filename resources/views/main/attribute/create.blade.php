@extends('layouts.master')
@section('content')             
<div class="row">
    <div class="col-xl-6"> 
        <div id="panel-2" class="panel">
            <div class="panel-hdr">
                <h2>
                     Attribute Add
                </h2>
                <div class="panel-toolbar">
                   <a href="{{url('/attribute/list')}}" class="btn btn-sm btn-primary waves-effect waves-themed" type="submit">Attribute List</a>
                </div>
            </div>
            <div class="panel-container show"> 
                <div class="panel-content p-0">
                    <form class="needs-validation" novalidate action="{{url('/attribute/store')}}" method="post">
                    	@csrf
                        <div class="panel-content">
                            <div class="form-row">
                                <div class="col-md-4 mb-3">
                                    <label class="form-label" for="validationCustom03">Name<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Name" required>
                                    <div class="invalid-feedback">
                                        Please provide a valid name.
                                    </div>
                                    @error('name')
                                        <div class="text-danger">
                                            attribute already exists
                                        </div>
                                    @enderror
                                </div> 
                                <div class="col-md-4 mb-3">
                                <label class="form-label" for="example-select">Status</label>
                                <select class="form-control" id="example-select" name="status">
                                    <option value="1">Active</option>
                                    <option value="0">Inactive</option>
                                </select>
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