@extends('layouts.master')
@section('content')
<div class="row">
    <div class="col-xl-12">
        <div id="panel-1" class="panel">
            <div class="panel-hdr">
                <h2>
                    Attribute List
                </h2>
                <div class="panel-toolbar">
                    <a href="{{url('/attribute/add')}}" class="btn btn-sm btn-primary waves-effect waves-themed" type="submit">Add Attribute</a> 
                    <a href="{{url('/add/attribute/value')}}" class="btn btn-sm btn-primary waves-effect waves-themed ml-2" type="submit">Add Attribute Value</a>
                </div>
            </div>
            <div class="panel-container show">
                <div class="panel-content">
                <table id="dt-basic-example" class="table table-hover table-bordered  w-100">
                    <thead class="bg-primary-600">
                        <tr>
                            <th>Attribute</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($attributes as $attribute)
                         <tr>
                            <td>{{ucwords($attribute->name)}}</td>
                            <td>
                                    @if($attribute->status == 1)
                                    <span class="badge badge-primary">Active</span>
                                    @else
                                    <span class="badge badge-danger">In active</span>
                                    @endif 
                                </td>
                            <td>
                            <a href="{{ url('attribute/edit', ['category' => $attribute->id]) }}" class="btn btn-primary btn-sm btn-icon waves-effect waves-themed">
                            <i class="fal fa-edit"></i>
                            </a>
                            <a href="{{ url('attribute/delete', ['category' => $attribute->id]) }}" class="btn btn-primary btn-sm btn-icon waves-effect waves-themed">
                            <i class="fal fa-trash"></i>
                            </a>
                            @if($attribute->status == 0)
                            <a href="{{ url('attribute/active', ['category' => $attribute->id]) }}" class="btn btn-primary btn-sm btn-icon waves-effect waves-themed" title="inactive"><i class="fal fa-times-circle text-white"></i></a>
                            @elseif($attribute->status == 1)
                            <a href="{{ url('attribute/inactive', ['category' => $attribute->id]) }}" class="btn btn-primary btn-sm btn-icon waves-effect waves-themed" title="active"><i class="fal fa-check-circle text-white "></i></a>
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