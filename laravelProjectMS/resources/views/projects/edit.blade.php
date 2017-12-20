@extends('layouts.app')
@section('content')

<div class="row col-md-9 col-lg-9 col-sm-9 pull-left ">

    <!-- Example row of columns -->
    <div class="row col-sm-12 col-md-12 col-lg-12" style="background: white; margin: 10px; ">

         <h3>Edit Project</h3>

        <form method="post" action="{{ route('projects.update',[$project->id]) }}">
                                {{ csrf_field() }}

            <input type="hidden" name="_method" value="put">

            <div class="form-group">

                <label for="project-name">Name<span class="required">*</span></label>

                <input   placeholder="Enter name"  id="project-name" required name="name" spellcheck="false" class="form-control" value="{{ $project->name }}" />

            </div>

            <div class="form-group">

                <label style="{color: red, font-size: 20px}" for="days">Days<span class="required">*</span></label>

                <input   placeholder="Enter name"  value="{{ $project->days }}" id="project-days" required name="days" spellcheck="false" class="form-control" />

            </div>


            <div class="form-group">

                <label for="project-content">Description</label>

                    <textarea placeholder="Enter description" style="resize: vertical" id="project-content" name="description" rows="5"spellcheck="false" class="form-control autosize-target text-left">{{ $project->description }}</textarea>
            </div>

             <div class="form-group">

                <input type="submit" class="btn btn-primary" value="Submit"/>

            </div>
                           
         </form>
   
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
          <li><a href="/projects">All Projects</a></li>
          <li><a href="/projects/{{$project->id}}">Back to {{$project->name}}</a></li>
        </ol>
    </div>

    <!--<div class="sidebar-module">
        <h4>Members</h4>
        <ol class="list-unstyled">
          <li><a href="#">March 2014</a></li>
          <li><a href="#">February 2014</a></li>
         
        </ol>
    </div>-->

   

 </div>
                     

@endsection
