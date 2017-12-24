@extends('layouts.app')
@section('content')
<div class="col-md-6 col-lg-6 col-md-offset-4 col-lg-offset-3">
    <div class="panel panel-primary">
        <!-- Default panel contents -->

        @if(Auth::user()->role_id != 3)

            <div class="panel-heading">Projects - Index <a style="border-color: white" class="pull-right btn btn-primary btn-sm" href="/projects/create">Add Project</a></div>
        
        @endif

        @if(Auth::user()->role_id === 3)

            <div class="panel-heading">Projects - Index <a style="border-color: white" class="pull-right btn btn-primary btn-sm hidden" href="/projects/create">Add Project</a></div>

        @endif

        <div class="panel-body">
            <!-- List group -->
            <ul class="list-group">
                @foreach($projects as $project) 

                    <li class="list-group-item"><a href="{{ route('projects.show', ['project' => $project->id]) }}">{{ $project->name }}</a></li>
                
                @endforeach
            </ul>
        </div>
       
    </div>
</div>
@endsection
