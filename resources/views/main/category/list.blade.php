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
                            <td>{{$category->status == 1 ? 'Active' : 'Inactive'}}</td>
                            <td>
                            <a href="{{ url('category/edit', ['category' => $category->id]) }}" class="btn btn-primary btn-sm btn-icon waves-effect waves-themed">
                            <i class="fal fa-edit"></i>
                            </a>
                            <a href="{{ url('category/delete', ['category' => $category->id]) }}" class="btn btn-primary btn-sm btn-icon waves-effect waves-themed">
                            <i class="fal fa-trash"></i>
                            </a>
                            <a href="javascript:void(0);" class="btn btn-primary btn-sm btn-icon waves-effect waves-themed">
                            <i class="fal fa-circle"></i>
                            </a>
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



