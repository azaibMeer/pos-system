@extends('layouts.master')
@section('content')             
<div class="row">
    <div class="col-xl-6"> 
        <div id="panel-2" class="panel">
            <div class="panel-hdr">
                <h2>
                    Category Add
                </h2>
                <div class="panel-toolbar">
                   <a href="{{url('/category/list')}}" class="btn btn-sm btn-primary waves-effect waves-themed" type="submit">Category List</a>
                </div>
            </div>
            <div class="panel-container show"> 
                <div class="panel-content p-0">
                    <form class="needs-validation" novalidate action="{{url('/category/store')}}" method="post">
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
                                            Category already exists
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
                    <script>
                        // Example starter JavaScript for disabling form submissions if there are invalid fields
                        (function()
                        {
                            'use strict';
                            window.addEventListener('load', function()
                            {
                                // Fetch all the forms we want to apply custom Bootstrap validation styles to
                                var forms = document.getElementsByClassName('needs-validation');
                                // Loop over them and prevent submission
                                var validation = Array.prototype.filter.call(forms, function(form)
                                {
                                    form.addEventListener('submit', function(event)
                                    {
                                        if (form.checkValidity() === false)
                                        {
                                            event.preventDefault();
                                            event.stopPropagation();
                                        }
                                        form.classList.add('was-validated');
                                    }, false);
                                });
                            }, false);
                        })();

                    </script>
                </div>
            </div>
        </div> 
    </div> 
</div> 
@endsection