

<!-- an array of errors -->
@if (is_array($errors) && count($errors) > 0)
    <div class="alert alert-dismissable alert-danger">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        @foreach ($errors->all() as $error)
        <ul style="list-style-type:none"><li><strong>{!! $error !!}</strong></li></ul>
            
        @endforeach
    </div>
@endif


<!--variable, 1 error-->
@if (isset($errors))
    <div class="alert alert-dismissable alert-danger">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
       
            <ul style="list-style-type:none"><li><strong>{!! $errors !!}</strong></li></ul>
        
    </div>
@endif 
