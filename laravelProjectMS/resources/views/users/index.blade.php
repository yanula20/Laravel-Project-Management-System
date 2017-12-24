@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
       <p></p>
		<div class="stats-buttons-grid">
       <div class="row col-lg-12 col-md-12 col-sm-12">
        <div class="col-lg-4 ">
  
        @foreach($users as $user)

            @if($user->role_id == 3)

                <div class="thumbnail" align="center">

                    <div class="icon green" align="center">
                        <img id="profile-img" class="profile-img-card" src="//ssl.gstatic.com/accounts/ui/avatar_2x.png" />
                    </div>

                    <div class="caption" align="center">
                        <h3>{{$user->name}}</h3>
                        <p>{{$user->email}}</p>
                        <p>role:&nbsp;{{$user->role->name}}</p>
                        
                            <div class="profile-btns-container" align="center">

                                @if($user->role_id == 3)
                                    
                                    <li style="list-style: none">
                                        <a  

                                        class="btn btn-danger tip delete-action" style="color: white" role="button" title="" 
                                        href="#" onclick=" 

                                            var result = confirm('Are you sure you wish to delete this project?');

                                                if( result ){

                                                    event.preventDefault();

                                                    document.getElementById('delete-form').submit();
                                                }
                                        " style="color: red;" ><i class="fa fa-trash-o"></i>Delete</a>

                                        <form id="delete-form" action="{{ route('users.destroy',[$user->id]) }}" method="POST" style="display: none;">

                                            <input type="hidden" name="_method" value="delete">

                                                {{ csrf_field() }}
                                        </form>
                                      
                                    </li>

                                @endif

                                <!--assign to task button  -->
                                <li style="list-style: none" class="dropdown" id="profile-btns">
                                    <a href="#" class="dropdown-toggle btn btn-info tip" data-toggle="dropdown" aria-expanded="false" aria-haspopup="true"><i class="fa fa-cloud-download"></i>Assign to Task&nbsp;<span class="caret"></span></a>
                                </li>
                                <!--assign to task button -->

                                <!--assign to project button -->
                                <li style="list-style: none" class="dropdown" id="profile-btns">
                                   <a href="#" class="dropdown-toggle btn btn-info tip" data-toggle="dropdown" aria-expanded="false" aria-haspopup="true"><i class="fa fa-clipboard" aria-hidden="true"></i>
                                    Assign to Project&nbsp;<span class="caret"></span>
                                    </a>
                                        <ul class="dropdown-menu">                                           
                                           
                                            @foreach($projects as $project => $attribute)
                                                                                            
                                                @if($attribute->user_id === Auth::user()->id)

                                                    <li><a type="submit" href="{{ route('users.index') }}">{{$attribute->name}}</a></li>

                                                @endif
                                           
                                            @endforeach
                                                                           
                                        </ul>
                                 </li>
                                 <!--assign to project btn -->  
                            </div><!--div buttons container-->                          
                        </div><!--div caption-->
                    </div><!--div.thumbnail-->
                        @endif
                @endforeach
            </div>          
        </div>  
    </div>
</div>
	</div>
</div>

@endsection