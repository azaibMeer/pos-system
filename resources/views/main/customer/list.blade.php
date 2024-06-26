@extends('layouts.master')
@section('content')
<div class="row">
    <div class="col-xl-12">
        <div id="panel-1" class="panel">
            <div class="panel-hdr">
                <h2>
                    Customer List
                </h2>
                <div class="panel-toolbar">
                    <a href="{{url('/customer/create')}}" class="btn btn-sm btn-primary waves-effect waves-themed" type="submit">Customer Add</a> 
                </div>
            </div>
            <div class="panel-container show">
                <div class="panel-content">
                     
                    <!-- datatable start -->
                    <table id="dt-basic-example" class="table table-bordered table-hover table-striped w-100">
                        <thead class="bg-primary-600">
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Action</th> 
                            </tr>
                        </thead>
                        <tbody>
                        	@foreach ($customers as $key => $list)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$list->name}}</td>
                                <td>{{$list->email}}</td>
                                <td>{{$list->phone}}</td>
                                <td>
                                	<a href="{{url('/customer/edit/'.$list->id)}}" class="btn btn-primary btn-sm btn-icon waves-effect waves-themed" title="Edit Customer">
	                                    <i class="fal fa-pencil"></i>
	                                </a>
	                                <a href="{{url('/customer/delete/'.$list->id)}}" class="btn btn-primary btn-sm btn-icon waves-effect waves-themed" onclick="return confirm('Are you sure you want to delete this customer?')" title="Delete Customer">
	                                    <i class="fal fa-trash"></i>
	                                </a>
	                                <a href="{{url('/customer/history/'.$list->id)}}" class="btn btn-primary btn-sm btn-icon waves-effect waves-themed" title="History Customer">
	                                    <i class="fal fa-history"></i>
	                                </a>
                                </td> 
                            </tr> 
                        	@endforeach

                        </tbody> 
                    </table>
                    <!-- datatable end -->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
