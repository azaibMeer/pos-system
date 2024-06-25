@extends('layouts.master')
@section('content')
<div class="subheader mb-2">
<h1 class="subheader-title">
    Category
</h1>
<button class="btn btn-primary waves-effect waves-themed">Add Category</button>
</div>
<div class="row">
<div class="col-xl-12">
    <div id="panel-1" class="panel">
        <div class="panel-container show">
            <div class="panel-content">
                <table id="dt-basic-example" class="table table-hover table-bordered  w-100">
                    <thead class="bg-primary-600">
                        <tr>
                            <th>Category</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($categories as $category)
                         <tr>
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