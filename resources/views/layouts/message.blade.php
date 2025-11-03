@if (session('message') )
    <div class="alert alert-info" role="alert">
        <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
        {{ session('message') }} 
    </div>
@endif 