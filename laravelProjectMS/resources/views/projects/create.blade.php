@extends('layouts.app')
@section('content')
 
<div class="row col-md-9 col-lg-9 col-sm-9 pull-left ">

    <?php echo "Company number:" ?> <?php var_dump($company_id)?>

    <!-- Example row of columns -->
    <div class="row col-sm-12 col-md-12 col-lg-12" style="background: white; margin: 10px; ">

        <h3>Create Project</h3>

        <form method="post" action="{{ route('projects.store') }}">
                                {{ csrf_field() }}

            <div class="form-group">

                <label style="{color: red, font-size: 20px}"for="project-name">Name<span class="required">*</span></label>

                <input placeholder="Enter name"  id="project-name" required name="name" spellcheck="false" class="form-control" />

            </div>

            @if($companies == null)
            <div class="form-group">

                <input  class="form-control" type="hidden" value="{{$company_id}}" name="company_id"/>

            </div>
            @endif

            @if($companies != null)

            <div class="form-group">

                <label for="company-content">Select company</label>

                <select name="company_id" class="form-control" > 

                @foreach($companies as $company)

                        <option value="{{$company->id}}"> {{$company->name}} </option>

                      @endforeach
                </select>
            </div>
            @endif


            <div class="form-group">

                <label style="{color: red, font-size: 20px}" for="days"><span class="required">Days</span></label>

                <input   placeholder="# of days"  id="project-days" required name="days" spellcheck="false" class="form-control" />

            </div>


            <div class="form-group">

                <label for="project-content">Description</label>

                <textarea placeholder="Enter description" style="resize: vertical" id="project-content" name="description" rows="5"spellcheck="false" class="form-control autosize-target text-left"></textarea>

            </div>

             <div class="form-group">

                <input type="submit" class="btn btn-primary" value="Submit"/>

            </div>
                           
         </form>
   
      </div>
</div>


<div class="col-sm-3 col-md-3 col-lg-3 pull-right">
 
     <div class="sidebar-module">
        <h4>Actions</h4>
        <ol class="list-unstyled">
          <li><a href="/projects">All Projects</a></li>
        </ol>
    </div>


 </div>
                     

@endsection
