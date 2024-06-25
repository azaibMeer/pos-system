@extends('layouts.master')
@section('content')
<div class="row">
    <div class="col-xl-12">
        <div id="panel-1" class="panel">
            <div class="panel-hdr">
                <h2>
                    Category List
                </h2>
                <div class="panel-toolbar">
                    <a href="{{url('/category/add')}}" class="btn btn-sm btn-primary waves-effect waves-themed" type="submit">Category Add</a> 
                </div>
            </div>
            <div class="panel-container show">
                <div class="panel-content">
                <table id="dt-basic-example" class="table table-hover table-bordered  w-100">
                    <thead class="bg-primary-600">
                        <tr>
                            <th>Id</th>
                            <th>Category</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($categories as $key => $category)
                         <tr>
                            <td>{{$key + 1 }}</td>
                            <td>{{ucwords($category->name)}}</td>
                            <td>
                                    @if($category->status == 1)
                                    <span class="badge badge-primary">Active</span>
                                    @else
                                    <span class="badge badge-danger">In active</span>
                                    @endif 
                                </td>
                            <td>
                            <a href="{{ url('category/edit', ['category' => $category->id]) }}" class="btn btn-primary btn-sm btn-icon waves-effect waves-themed">
                            <i class="fal fa-edit"></i>
                            </a>
                            <a href="{{ url('category/delete', ['category' => $category->id]) }}" class="btn btn-primary btn-sm btn-icon waves-effect waves-themed">
                            <i class="fal fa-trash"></i>
                            </a>
                            @if($category->status == 0)
                            <a href="{{ url('category/active', ['category' => $category->id]) }}" class="btn btn-primary btn-sm btn-icon waves-effect waves-themed" title="inactive"><i class="fal fa-times-circle text-white"></i></a>
                            @elseif($category->status == 1)
                            <a href="{{ url('category/inactive', ['category' => $category->id]) }}" class="btn btn-primary btn-sm btn-icon waves-effect waves-themed" title="active"><i class="fal fa-check-circle text-white "></i></a>
                            @endif
                            </td>
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



