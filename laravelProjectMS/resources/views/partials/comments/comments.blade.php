 <!-- Example row of columns -->

<div class="row col-md-9 col-lg-9 col-sm-9"><!--row-->
</br>
</br>
    <div style="background: white; margin: 10px;">
            
            <!-- foreach through project's comments for a list-->

            @foreach($comments as $comment)

                <div class="col-sm-1">
                    <div class="thumbnail">
                        <img class="img-responsive user-photo" src="https://ssl.gstatic.com/accounts/ui/avatar_2x.png">
                    </div><!-- /thumbnail -->
                </div><!-- /col-sm-1 -->

                <div class="col-sm-5">

                    <div class="panel panel-default">

                        <div class="panel-heading">

                            <strong>{{$comment->url}}</strong></br>

                            <span class="text-muted"> {{$comment->created_at}}</span>
                            
                            @switch($comment->user)

                                @case($comment->user->first_name != null)

                                    <a href="users/{{$comment->user_id}}">{{$comment->user->first_name}}</a>

                                    @break
                                    
                                @case($comment->user->last_name != null)

                                    <a href="users/{{$comment->user_id}}">{{$comment->user->last_name}}</a>

                                    @break

                                  @case($comment->user->middle_name != null)

                                    <a href="users/{{$comment->user_id}}">{{$comment->user->middle_name}}</a>

                                    @break

                                @case($comment->user->city != null)

                                    <a href="users/{{$comment->user_id}}">{{$comment->user->city}}</a>

                                    @break

                                 @case($comment->user->name != null)

                                    <a href="users/{{$comment->user_id}}">{{$comment->user->name}}</a>

                                    @break      

                                @default
                                     <a href="users/{{$comment->user_id}}">{{'Anonymous'}}</a>
                            @endswitch

                        </div>
    
                        <div class="panel-body">

                            {{$comment->body}}

                        </div><!-- /panel-body -->

                    </div><!-- /panel panel-default -->

                </div><!-- /col-sm-5 -->

            @endforeach
            
    </div>

</div><!--row-->



