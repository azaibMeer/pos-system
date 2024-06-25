@extends('layouts.master')
@section('content')             
<div class="row">
    <div class="col-xl-6"> 
        <div id="panel-2" class="panel">
            <div class="panel-hdr">
                <h2>
                    Customer Update
                </h2>
                <div class="panel-toolbar">
                    <a href="{{url('/customer/list')}}" class="btn btn-sm btn-primary waves-effect waves-themed" type="submit">Customer List</a>
                </div>
            </div>
            <div class="panel-container show"> 
                <div class="panel-content p-0">
                    <form class="needs-validation" novalidate action="{{url('/customer/update/'.$customers->id)}}" method="post">
                    	@csrf
                        <div class="panel-content">
                            <div class="form-row">
                                <div class="col-md-4 mb-3">
                                    <label class="form-label" for="validationCustom03">Name<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Name" value="{{$customers->name}}" required>
                                    <div class="invalid-feedback">
                                        Please provide a valid name.
                                    </div>
                                </div> 
                                <div class="col-md-4 mb-3">
                                    <label class="form-label" for="validationCustomUsername">Email <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                         
                                        <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="{{$customers->email}}" required>
                                        <div class="invalid-feedback">
                                             Please provide a valid email.
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label class="form-label" for="validationCustom03">Phone <span class="text-danger">*</span></label>
                                    <input type="number" class="form-control" id="phone" name="phone" placeholder="Phone" value="{{$customers->phone}}" required>
                                    <div class="invalid-feedback">
                                        Please provide a valid phone.
                                    </div>
                                </div>
                            </div> 
                        </div>
                        <div class="panel-content border-faded border-left-0 border-right-0 border-bottom-0 d-flex flex-row align-items-center justify-content-start">
						    <button class="btn btn-primary" type="submit">Update</button>
						</div> 
                    </form> 
                </div>
            </div>
        </div> 
    </div> 
</div> 
@endsection
<script src="{{url('assets/js/formvalidation/validation.js')}}"></script>
