@extends('layouts.master')
@section('content')   
 <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<div class="row">
    <div class="col-xl-6"> 
        <div id="panel-2" class="panel">
            <div class="panel-hdr">
                <h2>
                    Outlet Update
                </h2>
                <div class="panel-toolbar">
                    <a href="{{url('/outlet/list')}}" class="btn btn-sm btn-primary waves-effect waves-themed" type="submit">Outlet List</a>
                </div>
            </div>
            <div class="panel-container show"> 
                <div class="panel-content p-0">
                    <form class="needs-validation" novalidate action="{{url('/outlet/update/'.$outlets->id)}}" method="post">
                    	@csrf
                        <div class="panel-content">
                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label" for="validationCustom03">Name<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Name" value="{{$outlets->name}}" required>
                                    <div class="invalid-feedback">
                                        Please provide a valid name.
                                    </div>
                                </div> 
                                  <div class="col-md-6 mb-3">
                                    <label class="form-label" for="validationCustomUsername">Address <span class="text-danger">*</span></label> 
                                        <input type="text" class="form-control" id="address" name="address" placeholder="Address" aria-describedby="inputGroupPrepend" value="{{$outlets->address}}" required>
                                        <div class="invalid-feedback">
                                             Please provide a valid address.
                                        </div> 
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label" for="validationCustom03">Contact Number <span class="text-danger">*</span></label>
                                    <input type="number" class="form-control" id="contact_number" name="contact_number" placeholder="Contact Number" value="{{$outlets->contact_number}}" required>
                                    <div class="invalid-feedback">
                                        Please provide a valid contact number.
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label" for="validationCustomUsername">Receipt Header <span class="text-danger">*</span></label> 
                                        <input type="text" class="form-control" id="receipt_header" name="receipt_header" placeholder="Receipt Header" aria-describedby="inputGroupPrepend" value="{{$outlets->receipt_header}}" >
                                        <div class="invalid-feedback">
                                             Please provide a valid receipt header.
                                        </div> 
                                </div>
                                 <div class="col-md-12 mb-3">
                                    <label class="form-label" for="validationCustom03">Receipt Footer <span class="text-danger">*</span></label>
                                  
                                   <textarea id="summernote" name="receipt_footer">{!! $outlets->receipt_footer !!}</textarea>
                                       <!-- <input type="hidden" name="saveToLocal" id="content-input" > -->
                                    <div class="invalid-feedback">
                                        Please provide a valid receipt footer.
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label" for="validationCustom03">Status <span class="text-danger">*</span></label>
                                    <select class="form-control" id="status" name="status">
                                        <option value="1">Active</option> 
                                        <option value="0">InActive</option> 
                                    </select>
                                    <div class="invalid-feedback">
                                        Please provide a valid status.
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
@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
<script src="{{url('assets/js/formvalidation/validation.js')}}"></script> 
<script>
      $('#summernote').summernote({
        placeholder: '',
        tabsize: 2,
        height: 200
      });
</script> 
@endsection