@extends('layouts.master')
@section('content')
<div class="row">
    <div class="col-xl-12">
        <div id="panel-1" class="panel">
            <div class="panel-hdr">
                <h2>
                    Outlet List
                </h2>
                <div class="panel-toolbar">
                    <a href="{{url('/outlet/create')}}" class="btn btn-sm btn-primary waves-effect waves-themed" type="submit">Outlet Add</a> 
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
                                <th>Address</th>
                                <th>Phone</th>
                                <th>Status</th> 
                                <th>Action</th> 
                            </tr>
                        </thead>
                        <tbody>
                        	@foreach ($outlets as $key => $list)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$list->name}}</td>
                                <td>{{$list->address}}</td>
                                <td>{{$list->contact_number}}</td>
                                <td>
                                    @if($list->status == 1)
                                    <span class="badge badge-primary">Active</span>
                                    @else
                                    <span class="badge badge-danger">InActive</span>
                                    @endif 
                                </td>
                                <td>
                                	<a href="{{url('/outlet/edit/'.$list->id)}}" class="btn btn-primary btn-sm btn-icon waves-effect waves-themed"title="Edit Outlet">
	                                    <i class="fal fa-pencil" ></i>
	                                </a>
	                                <a href="{{url('/outlet/delete/'.$list->id)}}" class="btn btn-primary btn-sm btn-icon waves-effect waves-themed" onclick="return confirm('Are you sure you want to delete this oulet?')" title="Delete Outlet">
	                                    <i class="fal fa-trash"></i>
	                                </a> 
                                   @if($list->status == 0)
                                    <a href="{{ url('/outlet/active', ['outlet' => $list->id]) }}" class="btn btn-primary btn-sm btn-icon waves-effect waves-themed" title="inactive"><i class="fal fa-times-circle text-white"></i></a>
                                    @elseif($list->status == 1)
                                    <a href="{{ url('/outlet/inactive', ['outlet' => $list->id]) }}" class="btn btn-primary btn-sm btn-icon waves-effect waves-themed" title="active"><i class="fal fa-check-circle text-white "></i></a>
                                    @endif
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
