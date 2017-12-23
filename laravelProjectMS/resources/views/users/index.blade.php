@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
       <p></p>
		<div class="stats-buttons-grid">
       <div class="row">
        <div class="col-lg-4 ">
            @foreach($users as $user)
                <div class="thumbnail" align="center">

                    <div class="icon green">
                        <img id="profile-img" class="profile-img-card" src="//ssl.gstatic.com/accounts/ui/avatar_2x.png" />
                    </div>
                    <div class="caption">
                        <h3>{{$user->name}}</h3>
                        <p>{{$user->email}}</p>
                        <p>role:&nbsp;{{$user->role->name}}</p>
                        <p align="center">
                            <a href="#" class="btn btn-danger tip delete-action" title=""><i class="fa fa-trash-o"></i> Delete</a>
                            <a href="#" class="btn btn-info tip" title=""><i class="fa fa-cloud-download"></i> View</a>
                        </p>
                    </div>
                </div>
            @endforeach
        </div>
    
    </div>
</div>
	</div>
</div>

@endsection