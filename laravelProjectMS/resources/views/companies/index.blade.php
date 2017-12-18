@extends('layouts.app')
@section('content')
<div class="col-md-6 col-lg-6 col-md-offset-4 col-lg-offset-3">
    <div class="panel panel-primary">
        <!-- Default panel contents -->
        <div class="panel-heading">Companies</div>
        <div class="panel-body">
            <!-- List group -->
            <ul class="list-group">
                @foreach($companies as $company) 

                    <li class="list-group-item"><a href="/companies/{{ $company->id }}">{{ $company->name }}</a></li>
                
                @endforeach
            </ul>
        </div>
       
    </div>
</div>
@endsection
