@extends('layouts.app')
@section('content')

<div class="row col-md-9 col-lg-9 col-sm-9 pull-left ">

    <div class="jumbotron" >

        <h1>{{ $company->name }}</h1>

        <p class="lead">{{ $company->description }}</p>
       <!-- <p><a class="btn btn-lg btn-success" href="#" role="button">Get started today</a></p> -->
    </div>

    <!-- Example row of columns -->
    <div style="background: white; margin: 10px; ">
            
            @if(Auth::user()->role_id !== 3)

                <a href="/projects/create/{{ $company->id }}" class="pull-right btn btn-primary btn-sm">Add Project</a>

            @endif

            @foreach($company->projects as $project)

                <div class="col-lg-4 col-md-4 col-sm-4">

                  <h3>{{ $project->name }}</h3>

                  <p class="text-danger"> {{$project->description}} </p>

                  <p><a class="btn btn-primary" href="{{ route('projects.show', [$project->id])}}" role="button">View Project</a></p>

                </div>

            @endforeach
    </div>

</div>

<div class="col-sm-3 col-md-3 col-lg-3 pull-right">
  
    <div class="sidebar-module">

        <h4>Actions</h4>

        <ol class="list-unstyled">
            
            @if(Auth::user()->role_id === 3)

                <li><a  href="/companies">All Companies</a></li>

            @endif 
                
            @if(Auth::user()->role_id !== 3)

                <li><a hidden href="/companies">All Companies</a></li>

                <li><a href="/companies/{{$company->id}}/edit">Edit</a></li>

                <li><a href="/projects/create/{{ $company->id }}">Add Project</a></li>

                <li><a href="/companies/create">New Company</a></li>

            @endif
               
            
            </br>

                @if(Auth::user()->id === $company->user_id)

                    <li>
                        <a   
                        href="#" onclick=" 

                            var result = confirm('Are you sure you wish to delete this Company?');

                                if( result ){

                                    event.preventDefault();

                                    document.getElementById('delete-form').submit();
                                }
                        " style="color: red;" >Delete

                        </a>

                        <form id="delete-form" action="{{ route('companies.destroy',[$company->id]) }}" method="POST" style="display: none;">

                            <input type="hidden" name="_method" value="delete">

                                {{ csrf_field() }}
                        </form>

                    </li>

                @endif
        </ol>

    </div>
   

 </div>
                     

@endsection
