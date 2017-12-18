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

            <!--<a href="/projects/create/{{ $company->id }}" class="pull-right btn btn-default btn-sm">Add Project</a>-->
            
            @foreach($company->projects as $project)

                <div class="col-lg-4 col-md-4 col-sm-4">

                  <h2>{{ $project->name }}</h2>
                  <p class="text-danger"> {{$project->description}} </p>
                  <p><a class="btn btn-primary" href="/projects/{{ $project->id }}" role="button"> View Project »</a></p>

                </div>

            @endforeach
    </div>

</div>

<div class="col-sm-3 col-md-3 col-lg-3 pull-right">
    <!--<div class="sidebar-module sidebar-module-inset">
        <h4>About</h4>
        <p>Etiam porta <em>sem malesuada magna</em> mollis euismod. Cras mattis consectetur purus sit amet fermentum. Aenean lacinia bibendum nulla sed consectetur.</p>
    </div>-->
     <div class="sidebar-module">
        <h4>Actions</h4>
        <ol class="list-unstyled">
          <li><a href="#">Edit</a></li>
          <li><a href="#">Delete</a></li>
           <li><a href="#">Add new member</a></li>
        </ol>
    </div>

    <div class="sidebar-module">
        <h4>Members</h4>
        <ol class="list-unstyled">
          <li><a href="#">March 2014</a></li>
          <li><a href="#">February 2014</a></li>
          <li><a href="#">January 2014</a></li>
          <li><a href="#">December 2013</a></li>
          <li><a href="#">November 2013</a></li>
          <li><a href="#">October 2013</a></li>
          <li><a href="#">September 2013</a></li>
          <li><a href="#">August 2013</a></li>
          <li><a href="#">July 2013</a></li>
          <li><a href="#">June 2013</a></li>
          <li><a href="#">May 2013</a></li>
          <li><a href="#">April 2013</a></li>
        </ol>
    </div>

   

 </div>
                     

@endsection
