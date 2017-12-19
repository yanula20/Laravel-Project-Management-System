@extends('layouts.app')
@section('content')
<div class="col-md-6 col-lg-6 col-md-offset-4 col-lg-offset-3">
    <div class="panel panel-primary">
        <!-- Default panel contents -->
        <div class="panel-heading">Projects <a style="border-color: white" class="pull-right btn btn-primary btn-sm" href="/project/create">Add Company</a></div>
        <div class="panel-body">
            <!-- List group -->
            <ul class="list-group">
                @foreach($projects as $project) 

                    <li class="list-group-item"><a href="/projects/{{ $project->id }}">{{ $project->name }}</a></li>
                
                @endforeach
            </ul>
        </div>
       
    </div>
</div>
@endsection
