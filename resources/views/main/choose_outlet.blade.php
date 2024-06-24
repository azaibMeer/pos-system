@extends('layouts.master')
@section('content')

                        
<div class="subheader">
    <h1 class="subheader-title">
        <i class='subheader-icon fal fa-window'></i> Choose Outlets
    </h1>
</div>
<div class="row">
    <div class="col-xl-12">
        <div id="panel-12" class="panel">
                <div class="panel-container show">
                <div class="panel-content">
                <div class="card-columns">
                    @if(isset($outlets))
                    @foreach($outlets as $outlet)
                    <a href="{{url('/outletupdate/'.$outlet->id)}}">
                    <div class="card text-white bg-dark text-center">
                        <div class="card-body d-flex flex-column align-items-center">
                            <i class="fal fa-store fa-2x mb-3"></i>
                            <h3 class="">{{ucwords($outlet->name)}}</h3>
                            <p class="card-text">
                                Address : {{ucwords($outlet->address)}}
                            </p>
                        </div>
                    </div>
                    </a>
                    @endforeach
                    @endif
                </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection